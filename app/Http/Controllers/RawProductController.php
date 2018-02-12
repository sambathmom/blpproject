<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RawMaterial;
use App\RawProduct;
use App\Grade;
use Session;

class RawProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $rawproduct = DB::table('raw_product')
            ->join('raw_material', 'raw_product.rm_id', '=', 'raw_material.rm_id')
            ->join('grade', 'grade.grade_id', '=', 'raw_product.grade_id')
            ->select('raw_product.*', 'raw_material.rm_name','grade.grade_name')
            ->orderBy('rm_id','ASC')
            ->paginate(20); 
        $rawmaterial = DB::table('raw_material')->get();
        $grade = DB::table('grade')->get();
        return view('rawproduct/index',['rawproducts' => $rawproduct, 'rawmaterials' => $rawmaterial,'grade' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawmaterial = DB::table('raw_material')->get();
        $grade = DB::table('grade')->get();
        return view('rawproduct/create',['rawmaterials'=>$rawmaterial,'grades'=>$grade]);
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
            'rm_id' => 'required:raw_product',
            'grade_id' => 'required:raw_product',
            'rp_name' => 'required:raw_product',
            'qty' => 'required|numeric:raw_product',
            'cost' => 'required|numeric:raw_product',
        ]);
        $rawproduct = new RawProduct;
        $data = $request->all();
        $rawproduct->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect ('rawproduct/index');
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
        $id = $request->rp_id;
        $rawproduct = RawProduct::findOrFail($id);
        $data = $request->all();
        $rawproduct->fill($data)->save();
        Session::flash('getmessage','Update successfully!');
        return redirect('rawproduct/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id =  $request->rp_id;
        $rawproduct = RawProduct::findOrFail($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        return back();
    }
}
