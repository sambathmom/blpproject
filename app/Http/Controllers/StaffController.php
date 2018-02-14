<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use Session;

class StaffController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index() 
	{
		$data = new Staff();
    	$staffs = $data::orderBy('staff_id','ASC')->paginate(20);
        return view('staff.index',compact('staffs'));
	}

	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create() 
	{
		return view('staff.create');
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
			'last_name' => 'required',
			'first_name' => 'required',
			'sex' => 'required',
		    'phone' => 'required|numeric|unique:staff',
		    'email' => 'required|email|unique:staff',
		]);
		$staff = new Staff();
		$destination = 'img_upload';
       	$picture = $request->file('picture');
       	$filename = $picture->getClientOriginalName();
       	$picture->move($destination, $filename);
       	$data = $request->all();

		$staff->fill($data)->save();
		Session::flash('getmessage','Inserted successfully!');
		return redirect('staff/index');
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function update(request $request)
	{		
		$this->validate($request, [
			'last_name' => 'required',
			'first_name' => 'required',
			'sex' => 'required',
			'phone' => 'required|numeric',
			'email' => 'required|email'
		]);
    	$staffId = $request->staff_id;
    	$staff = Staff::findOrFail($staffId);
    	if ($request->hasFile('picture'))
	    {
	       $destination = 'img_upload';
	       $picture = $request->file('picture');
	       $filename  = $picture->getClientOriginalName();
	       $picture->move($destination, $filename);
	       $staff->picture = $filename; 
	    }
    	$update = $request->all();
        $staff->fill($update)->save();
        Session::flash('getmessage','Updated successfully!');
    	return redirect('staff/index');
    }

    /**
     * remove the staff.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [];
		$staff = Staff::find($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        $response = [
            'status' => 200
        ];

        return $response;
    }
}
