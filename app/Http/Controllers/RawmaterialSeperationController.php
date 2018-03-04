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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rm_id' => 'required:raw_product',
            'grade_id' => 'required:raw_product',
            'rp_name' => 'required:raw_product',
            'qty' => 'required|numeric:raw_product',
            'cost' => 'required|numeric:raw_product',
        ]);
        $rawMaterialSeperation = new RawProduct;
        $data = $request->all();
        $rawMaterialSeperation->fill($data)->save();
        $itemId = $rawMaterialSeperation->getIdentity();
        
        $workedRecord = new WorkedRecords;
        $workedRecord->item_id = $itemId;
        $grade = $request->grade_id;
        
        $workedRecord->wt_id = $this->workType;
        $laborcost = new LaborCost;
        $workedRecord->lc_id = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->lc_id;        
        $workedRecord->cost = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->cost;
        $workedRecord->staff_id=$request->staff_id;
        $workedRecord->qty=$request->qty;
        $workedRecord->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect('rawmaterialseperation/index');
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
        $this->validate($request, [
            'rm_id' => 'required:raw_product',
            'grade_id' => 'required:raw_product',
            'rp_name' => 'required:raw_product',
            'qty' => 'required|numeric:raw_product',
            'cost' => 'required|numeric:raw_product',
        ]);
        $rawProductId = $request->rp_id;
        $grade = $request->grade_id;
        $rawProducts = RawProduct::findOrfail($rawProductId);
        $data = $request->all();
        $rawProducts->fill($data)->save();
       
        $laborcost = new LaborCost;
        $workedRecord = WorkedRecords::where([['item_id',$rawProductId],['wt_id',$this->workType]])->first();
        $workedRecord->lc_id = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->lc_id;        
        $workedRecord->cost = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->cost;
        $workedRecord->staff_id=$request->staff_id;
        $workedRecord->qty=$request->qty;
        $workedRecord->save();
        Session::flash('getmessage','Update successfully!');
        return redirect('rawmaterialseperation/index');
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
