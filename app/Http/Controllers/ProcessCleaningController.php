<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessProduct;
use App\ProcessCleaning;
use Session;
use DB;
use App\Staff;

class ProcessCleaningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processCleanings = DB::table('process_cleaning')
        ->join('process_product', 'process_product.pp_id', '=', 'process_cleaning.pp_id')
        ->join('staff', 'staff.staff_id', '=', 'process_cleaning.staff_id')
        ->select('process_cleaning.*', 'process_product.pp_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('pc_id','ASC')
        ->paginate(20); 
        $processProducts = ProcessProduct::all();
        $staffs = Staff::all();
        return view('processcleaning.index', compact('processCleanings', 'processProducts', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processProducts = ProcessProduct::all();
        $staffs = Staff::all();
        return view('processcleaning.create', compact('processProducts', 'staffs'));
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
            'pc_name' => 'required',
            'cost' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
        $processCleaning = new ProcessCleaning;
        $data = $request->all();

        $processCleaning->fill($data)->save();
        Session::flash('getmessage','Inserted successfully!');
        return redirect('processcleaning/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
			'pc_name' => 'required',
			'qty' => 'required|numeric',
			'cost' => 'required|numeric',
		]);
    	$processCleaningId = $request->pc_id;
    	$processCleaning = ProcessCleaning::findOrFail($processCleaningId);
    	$update = $request->all();
        $processCleaning->fill($update)->save();
        Session::flash('getmessage','Updated successfully!');
    	return redirect('processcleaning/index');
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
		$processCleaning = ProcessCleaning::find($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        $response = [
            'status' => 200
        ];

        return $response;
    }
}
