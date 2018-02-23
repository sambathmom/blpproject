<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\ShapedProduct;
use App\Staff;
use App\ProcessMaterial;
use App\Grade;
class ShapedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $shapedProducts = DB::table('shaped_product')
            ->join('process_material', 'process_material.pm_id', '=', 'shaped_product.pm_id')
            ->join('staff', 'staff.staff_id', '=', 'shaped_product.staff_id')
            ->join('grade','grade.grade_id','=','shaped_product.grade_id')
            ->select('shaped_product.*', 
            'process_material.pm_name',
            'staff.first_name','staff.middle_name','staff.last_name',
            'grade.grade_name')
            ->orderBy('sp_id','ASC')
            ->paginate(20); 
            $processMaterails = ProcessMaterial::all();
            $grades = Grade::all();
            $staffs = Staff::all();
            return view('shapedproduct.index',
             ['shapedProducts' =>$shapedProducts,
                'processMaterails' => $processMaterails,
                'staffs' => $staffs,'grades' => $grades
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processMaterails = ProcessMaterial::all();
        $grades = Grade::all();
        $staffs = Staff::all();
        return view('shapedproduct.create', [
        'processMaterails' => $processMaterails,
        'staffs' => $staffs,'grades' => $grades
        ]);
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
            'pm_id' => 'required:process_shaping',
            'sp_name' => 'required:process_shaping',
            'qty' => 'required|numeric:process_shaping',
            'cost' => 'required|numeric:process_shaping',
        ]);
        $shapedProducts = new ShapedProduct;
        $data = $request->all();
        $shapedProducts->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');      
        return redirect('shapedproduct/index');
    }

    public function update(Request $request)
    {
        $id = $request->sp_id;
        $shapedProducts = ShapedProduct::findOrFail($id);
        $data = $request->all();
        $shapedProducts->fill($data)->save();
        Session::flash('getmessage','Update successfully!');    
        return redirect('shapedproduct/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->sp_id;
        ShapedProduct::findOrFail($id)->delete();
        Session::flash('getmessage','Deleted successfully!');        
        return redirect('shapedproduct/index');

    }
}
