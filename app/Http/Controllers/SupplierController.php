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
        $suppliers = $data::orderBy('supplier_id','ASC')->paginate(20); 
        return view('supplier/index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('supplier.create');
    }

    public  function validationerror(Request $request){
        $rules =[
            'company_name' => 'required:supplier',
            'contact_person' => 'required:supplier',
            'contact_title'=> 'required:supplier',
            'email' => 'required|email|unique:supplier',
            'phone' => 'required|numeric|unique:supplier',
        ];
        $message =[
            'company_name' => 'company name',
            'contact_person' => 'contact person',
            'contact_title'=> 'contact title',
            'email' => 'email',
            'phone' => 'phone',
        ];
        return $this->validate($request,$rules,[],$message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $this -> validationerror($request);
    	$supplier = new Supplier;
        $data = $request->all();
        $supplier->fill($data)->save();
        Session::flash('getmessage','Insert successfully!');
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
        $this -> validationerror($request);
        $id = $request->supplier_id;
        $supplier =  Supplier::findOrFail($id);
        $data = $request->all();
        $supplier ->fill($data)->save();
        Session::flash('getmessage','Update successfully!');
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
        Session::flash('getmessage','Deleted successfully!');
        return redirect ('supplier/index');
    } 
}
