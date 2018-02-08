<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawMaterial;
use DB;
use App\Supplier;
use Session;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rawmaterial = DB::table('raw_material')
            ->join('supplier', 'supplier.supplier_id', '=', 'raw_material.supplier_id')
            ->select('raw_material.*', 'supplier.company_name')
            ->get();

        $suppliers = DB::table('supplier')->get();

        return view('rawmaterial.index',['rawmaterial' => $rawmaterial, 'supplier' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::table('supplier')->get();
        return view('rawmaterial.new',['supplier' => $suppliers]);
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
            'supplier_id' => 'required:raw_material',
            'grade_id' => 'required:raw_material',
            'rm_name' => 'required:raw_material',
            'qty' => 'required|numeric:raw_material',
            'cost' => 'required|numeric:raw_material',
        ]);
        $rawmaterail = new RawMaterial;
        $data = $request->all();
        $rawmaterail->fill($data)->save();
        Session::flash('getmessage','Insert successfully');
        return redirect ('rawmaterial/index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        echo "string";
        $id = $request->rm_id;
        $rawmaterial = RawMaterial::findOrFail($id);
        $rawmaterial->delete();
        return redirect('rawmaterial/index');
    }
}
