<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\ProcessMaterial;
use App\ProcessProduct;
class ProcessProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processProducts = DB::table('process_product')
            ->join('process_material', 'process_product.pm_id', '=', 'process_material.pm_id')
            ->select('process_material.pm_name', 'process_product.*')
            ->orderBy('pm_id','ASC')
            ->paginate(20); 
        $processMatials = DB::table('process_material')->get();
        return view('processproduct.index',['processProducts' => $processProducts,'processMatials' =>$processMatials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processMatials = DB::table('process_material')->get();
        return view('processproduct.create',['processMatials' =>$processMatials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processProduct = new ProcessProduct;
        $data = $request->all();
        $processProduct->fill($data)->save();
        Session::flash('getmessage','Deleted successfully!');
        return redirect('processproduct/index');        
    }
    public function update(Request $request)
    {
        $id = $request->pp_id;
        $processproduct = ProcessProduct::findOrfail($id);
        $data = $request->all();
        $processproduct->fill($data)->save();
        Session::flash('getmessage','Deleted successfully!');
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
