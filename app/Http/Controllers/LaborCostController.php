<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\WorkType;
use Session;
use App\LaborCost;
use DB;

class LaborCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laborCosts = DB::table('labor_cost')
            ->join('grade', 'labor_cost.grade_id', '=', 'grade.grade_id')
            ->join('work_type', 'work_type.work_type_id', '=', 'labor_cost.work_type_id')
            ->select('labor_cost.*', 'grade.grade_name','work_type.wt_name')
            ->get();
        $grades = Grade::all();
        $workTypes = WorkType::all();
        return view('laborcost.index', compact('laborCosts', 'grades', 'workTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $workTypes = WorkType::all();
        return view('laborcost.create', compact('grades', 'workTypes'));
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
            'cost' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
        $laborCost = new LaborCost;
        $data = $request->all();

        $laborCost->fill($data)->save();
        Session::flash('getmess','Insert successfully!!!');
        return redirect('laborcost/index');
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
            'cost' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
        $laborCostId = $request->lc_id;
        $laborCost = LaborCost::findOrFail($laborCostId);

        $update = $request->all();
        $laborCost->fill($update)->save();
        Session::flash('getmess','Update successfully!!!');
        return redirect('laborcost/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [];
        $laborCost = LaborCost::find($id)->delete();
        Session::flash('getmess','Deleted successfully!!!');
        $response = [
            'status' => 200
        ];

        return $response;
    }
}
