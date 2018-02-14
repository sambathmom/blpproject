<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\WorkType;
class TestController extends Controller
{
    public function index()
    {
    	$use = DB::table('work_type')->get();
    	return view('test/index',['use'=>$use]);
    }
    public function update(){
    	echo "string";
    }
}
