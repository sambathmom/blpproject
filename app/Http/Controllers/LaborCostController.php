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
            ->join('work_type', 'work_type.wt_id', '=', 'labor_cost.wt_id')
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
    public function validationerror(Request $request){
        $rules = [
            'lc_name' => 'required',
            'cost' => 'required|numeric',
            'qty' => 'required|numeric'
        ];
        $message = [
            'lc_name' => 'labor cost name',
            'qty' => 'quantity',
            'cost' => 'cost'
        ];
       return $this -> validate($request,$rules,[],$message);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validationerror($request);
        $laborCost = new LaborCost;
        $data = $request->all();

        $laborCost->fill($data)->save();
        Session::flash('getmessage','Inserted successfully!');
        return redirect('laborcost/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this -> validationerror($request);
        $laborCostId = $request->lc_id;
        $laborCost = LaborCost::findOrFail($laborCostId);

        $update = $request->all();
        $laborCost->fill($update)->save();
        Session::flash('getmessage','Updated successfully!');
        return redirect('laborcost/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->lc_id;
        $laborCost = LaborCost::find($id)->delete();
        Session::flash('getmessage',' successfully!');
        return redirect('laborcost/index');
    }
}
