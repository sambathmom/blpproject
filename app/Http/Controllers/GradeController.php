<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Session;
use DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Grade();
        $grades = $data::orderBy('grade_id','ASC')->paginate(20);
        return view ('grade/index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade/create');
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
            'grade_name' => 'required'
        ]);

        $grade = new Grade();
        $data = $request->all();

        $grade->fill($data)->save();
        Session::flash('getmess','Insert successfully!!!');
        return redirect('grade/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->grade_id;
        $grade = Grade::findOrFail($id);
        $update = $request->all();
        $grade->fill($update)->save();
        Session::flash('getmess','Update successfully!!!');
        return redirect('grade/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy($id)
    {
        $response = [];
        $grade = Grade::find($id)->delete();
        Session::flash('getmess','Deleted successfully!!!');
        $response = [
            'status' => 200
        ];

        return $response;
    }
}
