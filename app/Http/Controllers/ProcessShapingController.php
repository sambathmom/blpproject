<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessMaterial;
use App\Staff;
use App\Grade;
use DB;
use Session;
use App\ShapedProduct;
use App\LaborCost;
use App\WorkedRecords;

class ProcessShapingController extends Controller
{

    protected $workTypeId = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processShapings = DB::table('shaped_product')
            ->join('process_material', 'process_material.pm_id', '=', 'shaped_product.pm_id')
            ->join('staff', 'staff.staff_id', '=', 'shaped_product.staff_id')
            ->join('grade','grade.grade_id','=','shaped_product.grade_id')
            ->select('shaped_product.*', 'process_material.pm_name',
            'staff.first_name','staff.middle_name','staff.last_name','grade.grade_name')
            ->orderBy('sp_id','ASC')
            ->paginate(20); 
        $processMaterails = ProcessMaterial::all();
        $grades = Grade::all();
        $staffs = Staff::all();
        return view('processshaping.index',[
                        'processShapings' =>$processShapings,
                        'processMaterails' => $processMaterails,
                        'staffs' => $staffs,'grades' => $grades
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processMaterails = ProcessMaterial::all();
        $grades = Grade::all();
        $staffs = Staff::all();
        return view('processshaping.create', [
            'processMaterails' => $processMaterails,
            'staffs' => $staffs,'grades' => $grades
        ]);
    }
    public function validationerror(Request $request){
        $rules = [
            'sp_name' => 'required:process_shaping',
            'qty' => 'required|numeric:process_shaping',
            'cost' => 'required|numeric:process_shaping',
        ];  
       
        $message = [
            'sp_name' => 'shapping product name',
            'qty' => 'quantity',
            'cost' => 'cost',
            
        ];
      return $this->validate($request, $rules, [], $message);
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
        $gradeId = $request->grade_id;
        
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);

        if ($laborCostObj) {
            $shapedProduct = new ShapedProduct;
            $shapedProductSave = $request->all();
            $shapedProduct->fill($shapedProductSave)->save();
           
            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $shapedProduct->getIdentity();
            $workedRecord->lc_id = $laborCostObj->lc_id;;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
    
            Session::flash('getmessage','Insert successfully!');
            return redirect ('processshaping/index');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processshaping/create');
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validationerror($request);
        $id = $request->sp_id;
        $gradeId = $request->grade_id;
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);
        
        if ($laborCostObj) {
            $shapedProduct = shapedProduct::findOrFail($id);
            $shapedProductUpdate = $request->all();
            $shapedProduct->fill($shapedProductUpdate)->save();
            $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId]])->first();
            $workedRecord->lc_id = $laborCostObj->lc_id;;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Update successfully!');
            return redirect('processshaping/index');
        } else {
            Session::flash('getmessage','Updated unsuccessfully! This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect('processshaping/index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->sp_id;

        $shapedProduct = ShapedProduct::findOrFail($id);
        $shapedProduct->delete();

        $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId] ])->first();
        $workedRecord->delete();

        Session::flash('getmessage','Deleted successfully!');
        return redirect('processshaping/index');
    }
}
