<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessProduct;
use App\ProcessMaterial;
use Session;
use DB;
use App\Staff;
use App\Grade;
use App\RawProduct;
use App\RawMaterial;
use App\WorkedRecords;
use App\LaborCost;
use App\CleanProduct;

class ProcessCleaningController extends Controller
{
    protected $workTypeId = 4;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cleanProducts = DB::table('clean_product')
        ->join('staff', 'staff.staff_id', '=', 'clean_product.staff_id')
        ->join('grade', 'grade.grade_id', '=', 'clean_product.grade_id')
        ->join('process_material', 'process_material.pm_id', '=', 'clean_product.pm_id')
        ->select('clean_product.*', 'process_material.pm_name', 'grade.grade_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('cp_id','ASC')
        ->paginate(20); 
        $processMaterials = ProcessMaterial::all();
        $staffs = Staff::all();
        $grades = Grade::all();
        return view('processcleaning.index', compact('cleanProducts', 'processMaterials', 'staffs', 'grades')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $grades = Grade::all();
        $processMaterials = ProcessMaterial::all();
        return view('processcleaning/create', compact('staffs', 'grades', 'processMaterials')); 
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
            'cp_name' => 'required',
            'qty' => 'required|numeric',
            'cost' => 'required|numeric'
        ]);
        $gradeId = $request->grade_id;
        $laborcost = new LaborCost;
        $laborCostObj = $laborcost->getLaborCostByGradeAndWorkType($gradeId,$this->workTypeId);
        if ($laborCostObj) {
            $cleanProduct = new CleanProduct;
            $data = $request->all();
            $cleanProduct->fill($data)->save();
            $itemId = $cleanProduct->getIdentity();

            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $itemId;                    
            $workedRecord->wt_id = $this->workTypeId;          
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->qty = $request->qty;
            $workedRecord->save();
            Session::flash('getmessage','Insert successfully!');
            return redirect ('processcleaning/index');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processcleaning/create');
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
        $cleanProductId = $request->cp_id;
        $gradeId = $request->grade_id;

        $laborcost = new LaborCost;
        $laborCostObj = $laborcost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);

        if ($laborCostObj) {
            $data = $request->all();
            $cleanProduct = CleanProduct::findOrfail($cleanProductId);
            $cleanProduct->fill($data)->save();
            
            $workedRecord = WorkedRecords::where([['item_id',$cleanProductId],['wt_id', $this->workTypeId]])->first();
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->staff_id=$request->staff_id;
            $workedRecord->qty=$request->qty;
            $workedRecord->save();
            Session::flash('getmessage','Update successfully!');
            return redirect('processcleaning/index');
        } else {
            Session::flash('getmessage','Updated unsuccessfully! This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processcleaning/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cleanProductId = $request->cp_id;
        $cleanProduct = CleanProduct::find($cleanProductId);
        $cleanProduct->delete();
        $workedRecord = WorkedRecords::where([['item_id',$cleanProductId],['wt_id',$this->workTypeId]])->first();
        $workedRecord->delete();
        Session::flash('getmessage','Delete successfully!');
        return redirect('processcleaning/index');
    }
}
