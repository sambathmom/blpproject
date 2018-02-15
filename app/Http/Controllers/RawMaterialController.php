<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawMaterial;
use DB;
use App\Supplier;
use App\Grade;
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

        $rawMaterials = DB::table('raw_material')
            ->join('supplier', 'supplier.supplier_id', '=', 'raw_material.supplier_id')
            ->join('grade', 'grade.grade_id', '=', 'raw_material.grade_id')
            ->join('staff', 'staff.staff_id', '=', 'raw_material.staff_id')
            ->select('raw_material.*', 'supplier.company_name','grade.grade_name','staff.*')
            ->orderBy('rm_id','ASC')
            ->paginate(20); 
        $supplier = DB::table('supplier')->get();
        $grade = DB::table('grade')->get();
        $staffs = DB::table('staff')->get();
        return view('rawmaterial.index',
        ['rawMaterials' => $rawMaterials, 'supplier' => $supplier,'grade' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::table('supplier')->get();
        $staffs = DB::table('staff')->get();
        $grade = DB::table('grade')->get();
        return view('rawmaterial.new',['supplier' => $suppliers,'grade' => $grade,'staffs'=>$staffs]);

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
            'staff_id' => 'required:raw_material',
            'supplier_id' => 'required:raw_material',
            'grade_id' => 'required:raw_material',
            'rm_name' => 'required:raw_material',
            'qty' => 'required|numeric:raw_material',
            'cost' => 'required|numeric:raw_material',
        ]);
        $rawMaterail = new RawMaterial;
        $data = $request->all();
        $rawMaterail->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');        
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

    public function update(Request $request)
    {
        $this->validate($request, [

            'staff_id' => 'required:raw_material',
            'supplier_id' => 'required:raw_material',
            'grade_id' => 'required:raw_material',
            'rm_name' => 'required:raw_material',
            'qty' => 'required|numeric:raw_material',
            'cost' => 'required|numeric:raw_material',
        ]);
        $id = $request->rm_id;
        $rawMaterial = RawMaterial::findOrFail($id);
        $data = $request->all();
        $rawMaterial->fill($data)->save();
        Session::flash('getmessage','Update successfully!');      
        return redirect('rawmaterial/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->rm_id;
        $rawMaterial = RawMaterial::findOrFail($id);
        $rawMaterial->delete();
        Session::flash('getmessage','Deleted successfully!');
        return redirect('rawmaterial/index');
    }
}
