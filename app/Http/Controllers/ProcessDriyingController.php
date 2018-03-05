<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\ProcessMaterial;
use App\Grade; 
use App\DriedProduct;
use App\Sessio;
use App\WorkedRecords;
use App\LaborCost;
use Session;

class ProcessDriyingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $workType = 5;
    public function index()
    {
        $driedProducts = DB::table('dried_product')
        ->join('staff', 'staff.staff_id', '=', 'dried_product.staff_id')
        ->join('grade', 'grade.grade_id', '=', 'dried_product.grade_id')
        ->join('process_material', 'process_material.pm_id', '=', 'dried_product.pm_id')
        ->select('dried_product.*', 'process_material.pm_name', 'grade.grade_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('dp_id','ASC')
        ->paginate(20); 
        $processMaterials = processMaterial::all();
        $staffs = Staff::all();
        $grades = Grade::all();
        return view('processdriying.index', compact('driedProducts', 'processMaterials', 'staffs', 'grades'));
    
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
        return view('processdriying/create', compact('staffs', 'grades', 'processMaterials'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"Stirng";exit();
        $this->validate($request, [
            'dp_name' => 'required',
            'qty' => 'required|numeric',
            'cost' => 'required|numeric'
        ]);

        $driedProduct = new DriedProduct;
        $data = $request->all();
        
        $itemId = $driedProduct->getIdentity();
        $workedRecord = new WorkedRecords;
        $workedRecord->item_id = $itemId;
        $grade = $request->grade_id;
        
        $workedRecord->wt_id = $this->workType;
        $laborcost = new LaborCost;
        $workedRecord->lc_id = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->lc_id;        
        $workedRecord->cost = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->cost;
        $workedRecord->staff_id = $request->staff_id;
        $workedRecord->qty = $request->qty;
    
        $driedProduct->fill($data)->save();
        $workedRecord->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect ('processdriying/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $diredId = $request->dp_id;
        $data = $request->all();
        $driedProduct = DriedProduct::findOrfail($diredId);
        $driedProduct->fill($data)->save();

        $grade = $request->grade_id;
        $laborcost = new LaborCost;
        $workedRecord = WorkedRecords::where([['item_id',$diredId],['wt_id',$this->workType]])->first();
        $workedRecord->lc_id = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->lc_id;        
        $workedRecord->cost = $laborcost->getLaborCostByGradeAndWorkType($grade,$this->workType)->cost;
        $workedRecord->staff_id=$request->staff_id;
        $workedRecord->qty=$request->qty;
        $workedRecord->save();
        Session::flash('getmessage','Update successfully!');
        return redirect('processdriying/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $diredId = $request->dp_id;
        $driedProduct = DriedProduct::find($diredId);
        $driedProduct->delete();
        $workedRecord = WorkedRecords::where([['item_id',$diredId],['wt_id',$this->workType]])->first();
        $workedRecord->delete();
        Session::flash('getmessage','Delete successfully!');
        return redirect('processdriying/index');
    }
}
