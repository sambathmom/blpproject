<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RawProduct;
use Session;
use App\ProcessMaterial;

class ProcessMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processmaterial = DB::table('process_material')
            ->join('raw_product', 'raw_product.rp_id', '=', 'process_material.rp_id')
            ->select('process_material.*', 'raw_product.rp_name')
            ->orderBy('pm_id','ASC')
            ->paginate(5); 
        $rawproduct = DB::table('raw_product')->get();
        return view('processmaterial.index',['processmaterials' => $processmaterial, 'rawproducts' => $rawproduct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawproduct = DB::table('raw_product')->get();
        return view('processmaterial.create',['rawproducts'=>$rawproduct]);
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
            'rp_id' => 'required:process_material',
            'pm_name' => 'required:process_material',
            'qty' => 'required|numeric:process_material',
            'cost' => 'required|numeric:process_material',
        ]);
        $processmaterial = new ProcessMaterial;
        $data = $request->all();
        $processmaterial->fill($data)->save(); 
        Session::flash('getmessage','Insert successfully');
        return redirect ('processmaterial/index');
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
        $id = $request->pm_id;
        $processmaterial = ProcessMaterial::findOrFail($id);
        $data = $request->all();
        $processmaterial->fill($data)->save();   
        Session::flash('getmessage','Update successfully');
        return redirect ('processmaterial/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->pm_id;
        $processmaterial = ProcessMaterial::findOrFail($id);
        $processmaterial->delete();
        Session::flash('getmessage','Deleted successfully');
        return redirect ('processmaterial/index');
    }
}
