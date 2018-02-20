<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RawMaterial;
use App\RawProduct;
use App\Grade;
use Session;
use App\Staff;

class RawProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawProducts = DB::table('raw_product')
            ->join('raw_material', 'raw_product.rm_id', '=', 'raw_material.rm_id')
            ->join('grade', 'grade.grade_id', '=', 'raw_product.grade_id')
            ->join('staff', 'staff.staff_id', '=', 'raw_product.staff_id')
            ->select('raw_product.*', 'raw_material.rm_name','grade.grade_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
            ->orderBy('rm_id','ASC')
            ->paginate(20); 
        $rawMaterials = DB::table('raw_material')->get();
        $grade = DB::table('grade')->get();
        $staffs = Staff::all();
        return view('rawproduct/index',['rawProducts' => $rawProducts, 'rawMaterials' => $rawMaterials,'grade' => $grade, 'staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterials = DB::table('raw_material')->get();
        $grades = DB::table('grade')->get();
        $staffs = Staff::all();
        return view('rawproduct/create',['rawMaterials'=>$rawMaterials,'grades'=>$grades, 'staffs' => $staffs]);
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
        $rawProduct = new RawProduct;
        $data = $request->all();
        $rawProduct->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect ('rawproduct/index');
    }

    public function update(Request $request)
    {
        $id = $request->rp_id;
        $rawProduct = RawProduct::findOrFail($id);
        $data = $request->all();
        $rawProduct->fill($data)->save();
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
        $rawProduct = RawProduct::findOrFail($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        return back();
    }
}
