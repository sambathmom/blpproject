<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\ProcessMaterial;
use App\ProcessProduct;
use App\Staff;

class ProcessProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processproduct = DB::table('process_product')
            ->join('process_material', 'process_product.pm_id', '=', 'process_material.pm_id')
            ->join('staff', 'staff.staff_id', '=', 'process_product.staff_id')
            ->select('process_material.pm_name', 'process_product.*', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
            ->orderBy('pm_id','ASC')
            ->paginate(20); 
        $processmatial = DB::table('process_material')->get();
        $staffs = Staff::all();
        return view('processproduct.index',['processproducts' => $processproduct,'processmatials' =>$processmatial, 'staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processmaterial = DB::table('process_material')->get();
        $staffs = Staff::all();
        return view('processproduct.create',['processmaterials'=>$processmaterial, 'staffs' => $staffs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processproduct = new ProcessProduct;
        $data = $request->all();
        $processproduct->fill($data)->save();
        Session::flash('getmessage','Inserted successfully!');
        return redirect('processproduct/index');        
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
        $id = $request->pp_id;
        $processproduct = ProcessProduct::findOrfail($id);
        $data = $request->all();
        $processproduct->fill($data)->save();
        Session::flash('getmessage','Updated successfully!');
        return redirect('processproduct/index');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->pp_id;
        $processproduct = ProcessProduct::findOrfail($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        return redirect('processproduct/index');
    }
}
