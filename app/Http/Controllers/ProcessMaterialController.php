<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\RawProduct;
use Session;
use App\ProcessMaterial;

class ProcessMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processMaterials = DB::table('process_material')
            ->join('raw_product', 'raw_product.rp_id', '=', 'process_material.rp_id')
            ->join('staff','staff.staff_id', '=', 'process_material.staff_id')
            ->select('process_material.*', 'raw_product.rp_name','staff.*')
            ->orderBy('pm_id','ASC')
            ->paginate(20); 
        $rawProduct = DB::table('raw_product')->get();
        $staffs = DB::table('staff')->get();
        return view('processmaterial.index',['processMaterials' => $processMaterials, 'rawProducts' => $rawProduct,'staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawProduct = DB::table('raw_product')->get();
        $staffs = Staff::all();
        return view('processmaterial.create',['rawProducts'=>$rawProduct,'staffs'=>$staffs]);
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
            'rp_id' => 'required:process_material',
            'pm_name' => 'required:process_material',
            'qty' => 'required|numeric:process_material',
            'cost' => 'required|numeric:process_material',
        ]);
        $processMaterial = new ProcessMaterial;
        $data = $request->all();
        $processMaterial->fill($data)->save(); 
        Session::flash('getmessage','Insert successfully!');
        return redirect ('processmaterial/index');
    }
    
    public function update(Request $request)
    {
        $id = $request->pm_id;
        $processmaterial = ProcessMaterial::findOrFail($id);
        $data = $request->all();
        $processmaterial->fill($data)->save();   
        Session::flash('getmessage','Update successfully!');
        return redirect ('processmaterial/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->pm_id;
        $processMaterial = ProcessMaterial::findOrFail($id);
        $processMaterial->delete();
        Session::flash('getmessage','Deleted successfully!');
        return redirect ('processmaterial/index');
    }
}
