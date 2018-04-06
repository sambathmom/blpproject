<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\Grade;
use App\RawProduct;
use App\RawMaterial;
use App\WorkedRecords;
use App\LaborCost;
use Session;
class RawmaterialSeperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $workType = 2;
    public function index()
    {
        $rawProducts = DB::table('raw_product')
            ->join('raw_material', 'raw_product.rm_id', '=', 'raw_material.rm_id')
            ->join('grade', 'grade.grade_id', '=', 'raw_product.grade_id')
            ->join('staff', 'staff.staff_id', '=', 'raw_product.staff_id')
            ->select('raw_product.*', 'raw_material.rm_name','grade.grade_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
            ->orderBy('rm_id','ASC')
            ->paginate(20); 
        $rawMaterials = DB::table('raw_material')->get();
        $grades = DB::table('grade')->get();
        $staffs = Staff::all();
        return view('rawmaterialseperation/index',['rawProducts' => $rawProducts, 'rawMaterials' => $rawMaterials,'grades' => $grades, 'staffs' => $staffs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rawMaterials = RawMaterial::all();
        $grades = Grade::all();
        $staffs = DB::table('staff')->get();
        return view('rawmaterialseperation/create',['rawMaterials'=>$rawMaterials,'grades'=>$grades, 'staffs' => $staffs]);       
  
    }

    public function validationerror(Request $request){      
        $rules = [
            'rm_id' => 'required:raw_product',
            'grade_id' => 'required:raw_product',
            'rp_name' => 'required:raw_product',
            'qty' => 'required|numeric:raw_product',
            'cost' => 'required|numeric:raw_product',
        ];
        $message = [
            'rm_id' => 'raw product',
            'grade_id' =>'grade name',
            'rp_name' => 'raw product name',
            'qty' => 'quantity',
            'cost' => 'cost'
        ];
        $this->validate($request,$rules,[],$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validationerror($request);
        $grade = $request->grade_id;
        $laborcost = new LaborCost;
        $laborCostObj = $laborcost->getLaborCostByGradeAndWorkType($grade, $this->workType);

        if ($laborCostObj) {
            $rawMaterialSeperation = new RawProduct;
            $data = $request->all();
            $rawMaterialSeperation->fill($data)->save();
            $itemId = $rawMaterialSeperation->getIdentity();
            
            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $itemId;           
            $workedRecord->wt_id = $this->workType;           
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->staff_id=$request->staff_id;
            $workedRecord->qty=$request->qty;
            $workedRecord->save();
            Session::flash('getmessage','Insert successfully!');
            return redirect('rawmaterialseperation/index');   
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('rawmaterialseperation/create');
        }      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        $this->validationerror($request);
        $rawProductId = $request->rp_id;
        $grade = $request->grade_id;

        $laborcost = new LaborCost;
        $laborCostObj = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType);

        if ($laborCostObj) {
            $rawProducts = RawProduct::findOrfail($rawProductId);
            $data = $request->all();
            $rawProducts->fill($data)->save();          
            $workedRecord = WorkedRecords::where([['item_id',$rawProductId], ['wt_id',$this->workType]])->first();
            dd($workedRecord); die();
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->staff_id=$request->staff_id;
            $workedRecord->qty=$request->qty;
            $workedRecord->save();
            Session::flash('getmessage','Update successfully!');
            return redirect('rawmaterialseperation/index');
        } else {
            Session::flash('getmessage','Updated unsuccessfully! This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('rawmaterialseperation/index');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rawProductId = $request->rp_id;
        $rawProducts = RawProduct::findOrfail($rawProductId)->delete();
        $workedRecord = WorkedRecords::where([['item_id',$rawProductId],['wt_id',$this->workType]])->first();
        $workedRecord->delete();
        Session::flash('getmessage','Delete successfully!');
        return redirect('rawmaterialseperation/index');     
    }
}
