<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkType;
use Session;

class WorkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workType = new WorKType;
        $workTypes = $workType::orderBy('wt_id','ASC')->paginate(20);
        return view ('worktype/index', compact('workTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worktype.create');
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
            'wt_name' => 'required'
        ]);

        $workType = new WorKType;
        $data = $request->all();

        $workType->fill($data)->save();
        Session::flash('getmessage','Inserted successfully!');
        return redirect('worktype/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->work_type_id;
        $workType = WorkType::findOrFail($id);
        $update = $request->all();
        $workType->fill($update)->save();
        Session::flash('getmessage','Updated successfully!');
        return redirect('worktype/index');
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
        $grade = WorKType::find($id)->delete();
        Session::flash('getmessage','Deleted successfully!');
        $response = [
            'status' => 200
        ];

        return $response;
    }
}
