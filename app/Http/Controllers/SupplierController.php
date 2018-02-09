<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Supplier;
use DB;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = new Supplier;
        $suppliers = $data::orderBy('supplier_id','ASC')->paginate(3); 
        return view('supplier/index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    	return view('supplier/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:supplier',
            'phone' => 'required|numeric|unique:supplier',
        ]);
    	$supplier = new Supplier;
        $data = $request->all();
        $supplier->fill($data)->save();
        Session::flash('getmessage','Insert successfully');
        return redirect ('supplier/index');
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
        $this->validate($request, [
            'email' => 'required|email:supplier',
            'phone' => 'required|numeric:supplier',
        ]);
         $id = $request->supplier_id;
         $supplier =  Supplier::findOrFail($id);
         $data = $request->all();
         $supplier ->fill($data)->save();
         var_dump($supplier);
         Session::flash('getmessage','Update successfully');
         return redirect ('supplier/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $requset){
        $id = $requset->supplier_id;
        $delete = Supplier::findOrFail($id)->delete();
        return redirect ('supplier/index');
    } 
}
