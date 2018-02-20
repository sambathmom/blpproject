<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessProduct;
use DB;
use App\ProcessShaping;
use Session;
use App\Staff;
class ProcessShapingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $processShapings = DB::table('process_shaping')
            ->join('process_product', 'process_product.pp_id', '=', 'process_shaping.pp_id')
            ->join('staff', 'staff.staff_id', '=', 'process_shaping.staff_id')
            ->select('process_shaping.*', 'process_product.pp_name','staff.*')
            ->orderBy('ps_id','ASC')
            ->paginate(20); 
        $processProduct = DB::table('process_product')->get();
        $staffs = Staff::all();
        return view('processshaping.index',
            ['processShapings' => $processShapings,
            'processProducts' => $processProduct,
            'staffs' => $staffs
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processProduct = DB::table('process_product')->get();
        $staffs = Staff::all();
        return view('processshaping.create', [
        'processProducts' => $processProduct,
        'staffs' => $staffs
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
            'pp_id' => 'required:process_shaping',
            'ps_name' => 'required:process_shaping',
            'qty' => 'required|numeric:process_shaping',
            'cost' => 'required|numeric:process_shaping',
        ]);
        $processShaping = new ProcessShaping;
        $data = $request->all();
        $processShaping->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');        
        return redirect('processshaping/index');
    }

    public function update(Request $request)
    {
        $id = $request->ps_id;
        $processShaping = ProcessShaping::findOrFail($id);
        $data = $request->all();
        $processShaping->fill($data)->save();
        Session::flash('getmessage','Update successfully!');    
        return redirect('processshaping/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->ps_id;
        ProcessShaping::findOrFail($id)->delete();
        Session::flash('getmessage','Deleted successfully!');        
        return redirect('processshaping/index');

    }
}
