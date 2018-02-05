<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use Session;

class StaffController extends Controller
{
	public function index() 
	{
		$data = new Staff;
    	$staffs = $data::orderBy('staff_id','ASC')->paginate(20);
        return view('staff.index',compact('staffs'));
	}

	public function new() 
	{
		return view('staff/new');
	}  	

	public function insert(request $request)
	{
		$this->validate($request, [
		    'name' => 'required|unique:staff',
			'email' => 'required|unique:staff',
		]);
		
		$staff = new Staff();
		$data = $request->all();
		$destination = 'img_upload';
       	$picture = $request->file('picture');
       	$filename = $picture->getClientOriginalName();
       	$picture->move($destination, $filename);
		$staff->fill($data)->save();
		Session::flash('getmess','Insert successfully!!!');
		return redirect('staff/index');
	}


	public function edit($id)
	{
		$edit = Staff::find($id);
    	return view('staff.edit',compact('edit'));
	}

	public function update(Request $request){
    	$staffId = $request->staff_id;
    	$staffmodel = Staff::findOrFail($staffId);
    	$update = $request->all();
        $staff->fill($update)->save();
        Session::flash('getmess','Update successfully!!!');
    	return redirect('staff');
    }
}
