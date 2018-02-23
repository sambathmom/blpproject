<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Grade;
use App\ProcessMaterial;
use App\DriedProduct;
use Session;
use DB;

use Illuminate\Http\Request;

class DriedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driedProducts = DB::table('dried_product')
        ->join('staff', 'staff.staff_id', '=', 'dried_product.staff_id')
        ->join('grade', 'grade.grade_id', '=', 'dried_product.grade_id')
        ->join('process_material', 'process_material.pm_id', '=', 'dried_product.pm_id')
        ->select('dried_product.*', 'process_material.pm_name', 'grade.grade_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('dp_id','ASC')
        ->paginate(20); 
        $processMaterials = processMaterial::all();
        $staffs = Staff::all();
        $grades = Grade::all();
        return view('driedproduct.index', compact('driedProducts', 'processMaterials', 'staffs', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $grades = Grade::all();
        $processMaterials = ProcessMaterial::all();
        return view('driedproduct/create', compact('staffs', 'grades', 'processMaterials'));
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
            'dp_name' => 'required'
        ]);

        $driedProduct = new DriedProduct;
        $data = $request->all();
        $driedProduct->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');
        return redirect ('driedproduct/index');
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
            'dp_name' => 'required'
        ]);
        $driedProductId = $request->dp_id;
        $driedProduct = DriedProduct::findOrFail($driedProductId);

        $update = $request->all();
        $driedProduct->fill($update)->save();
        Session::flash('getmessage','Updated successfully!');
        return redirect('driedproduct/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->dp_id;
        $driedProduct = DriedProduct::find($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        return redirect('driedproduct/index');     
    }
}
