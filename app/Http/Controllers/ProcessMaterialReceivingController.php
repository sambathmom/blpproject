<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawProduct;
use App\Staff;
use App\LaborCost;
use App\ProcessMaterial;
use App\WorkedRecords;
use Session;
use DB;

class ProcessMaterialReceivingController extends Controller
{
    protected $workTypeId = 3; 

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
        $rawProducts = DB::table('raw_product')->get();
        $staffs = DB::table('staff')->get();
        return view('processmaterialreceiving.index',['processMaterials' => $processMaterials, 'rawProducts' => $rawProducts,'staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawProducts = RawProduct::all();
        $staffs = Staff::all();
        return view('processmaterialreceiving.create',['rawProducts'=>$rawProducts,'staffs'=>$staffs]);
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
        $prcessMaterialId = $request->rp_id;
        $rawProduct = RawProduct::findOrfail($prcessMaterialId);
        $gradeId = $rawProduct->grade_id;

        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId); 

        if ($laborCostObj) {
            $processMaterial = new ProcessMaterial;
            $processMaterialSave = $request->all();
            $processMaterial->fill($processMaterialSave)->save(); 

            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $processMaterial->getIdentity();
            $workedRecord->lc_id = $laborCostObj->lc_id;;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Insert successfully!');
            return redirect ('processmaterialreceiving/index');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processmaterialreceiving/create');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'rp_id' => 'required:process_material',
            'pm_name' => 'required:process_material',
            'qty' => 'required|numeric:process_material',
            'cost' => 'required|numeric:process_material',
        ]);

        $id = $request->pm_id;
        $prcessMaterialId = $request->rp_id;
        $rawProduct = RawProduct::findOrfail($prcessMaterialId);
        $gradeId = $rawProduct->grade_id;
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);

        if($laborCostObj) {
            $processMaterial = ProcessMaterial::findOrFail($id);
            $processMaterialUpdate = $request->all();
            $processMaterial->fill($processMaterialUpdate)->save();

           
            $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId] ])->first();
            $workedRecord->lc_id = $laborCostObj->lc_id;;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Update successfully!');
            return redirect('processmaterialreceiving/index');
        } else {
            ession::flash('getmessage','Updated unsuccessfully! This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processmaterialreceiving/index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->pm_id;
        
        $processMaterial = ProcessMaterial::findOrFail($id);
        $processMaterial->delete();

        $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId] ])->first();
        $workedRecord->delete();

        Session::flash('getmessage','Deleted successfully!');
        return redirect('processmaterialreceiving/index');
    }
}
