<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\WorkedRecords;
use App\WorkType;
use App\LaborCost;
use App\Staff;


class WorkedRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workedRecords = DB::table('worked_records')
        ->join('work_type', 'work_type.work_type_id', '=', 'worked_records.wt_id')
        ->join('labor_cost', 'labor_cost.lc_id', '=', 'worked_records.lc_id')
        ->join('staff', 'staff.staff_id', '=', 'worked_records.staff_id')
        ->select('worked_records.*', 'work_type.wt_name','work_type.work_type_id','labor_cost.lc_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('wr_id','ASC')
        ->paginate(20); 
        $staffs = Staff::all();
        $workTypes = WorkType::all();
        $laborCosts = LaborCost::all();
    return view('workedrecord/index',['workedRecords' => $workedRecords,'workTypes' => $workTypes, 'laborCosts' => $laborCosts, 'staffs' => $staffs]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $workTypes = WorkType::all();
        $laborCosts = LaborCost::all();
        return view('workedrecord/create',
        ['staffs' => $staffs, 'workTypes' =>$workTypes, 'laborCosts' => $laborCosts]);
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
            'memo' => 'required:worked_records',
            'qty' => 'required|numeric:worked_records'
        ]);
        $workedRecords = new WorkedRecords;
        $data = $request->all();
        $workedRecords->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect('workedrecord/index');
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
        $this->validate($request, [
            'memo' => 'required:worked_records',
            'qty' => 'required|numeric:worked_records'
        ]); 
        $id = $request->wr_id;
        $workedRecords = WorkedRecords::findOrFail($id);
        $data = $request->all();
        $workedRecords->fill($data)->save();
        Session::flash('getmessage','Update successfully!');
        return redirect('workedrecord/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->wr_id;
        $workedRecords = WorkedRecords::findOrfail($id);
        $workedRecords->delete();
        Session::flash('getmessage','Deleted successfully!');
        return redirect('workedrecord/index');

    }
}
