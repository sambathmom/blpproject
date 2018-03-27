<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\RawMaterial;
use App\Grade;
use App\Supplier;
use App\WorkedRecords;
use App\LaborCost;
use Session;
use DB;

class RawMaterialPurchasingController extends Controller
{

    protected $workTypeId = 1;

    /**
     * Display a listinwt_idg of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawMaterials = DB::table('raw_material')
            ->join('supplier', 'supplier.supplier_id', '=', 'raw_material.supplier_id')
            ->join('grade', 'grade.grade_id', '=', 'raw_material.grade_id')
            ->join('staff', 'staff.staff_id', '=', 'raw_material.staff_id')
            ->select('raw_material.*', 'supplier.company_name','grade.grade_name','staff.*')
            ->orderBy('rm_id','ASC')
            ->paginate(20); 
        $suppliers = DB::table('supplier')->get();
        $grades = DB::table('grade')->get();
        $staffs = DB::table('staff')->get();
        return view('rawmaterialpurchasing.index',['rawMaterials' => $rawMaterials, 'suppliers' => $suppliers,'grades' => $grades,'staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterials = Staff::all();
        $grades = Grade::all();
        $staffs = Staff::all();
        $suppliers = Supplier::all();
        return view('rawmaterialpurchasing.create',['rawMaterials'=>$rawMaterials,'grades'=>$grades, 'staffs' => $staffs, 'suppliers' => $suppliers]);
    }

    public function validationerror(Request $request){
        $rules = [
            'rm_name' => 'required:raw_material',
            'qty' => 'required|numeric:raw_material',
            'cost' => 'required|numeric:raw_material',
        ];  
       
        $message = [
            'rm_name' => 'raw material name',
            'qty' => 'quantity',
            'cost' => 'cost',
            
        ];
      return $this->validate($request, $rules, [], $message);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validationerror($request);

        $gradeId = $request->grade_id;
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);
        if ($laborCostObj) {
            $rawMaterail = new RawMaterial;
            $rawMaterailSave = $request->all();
            $rawMaterail->fill($rawMaterailSave)->save();
           
            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $rawMaterail->getIdentity();
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            
            Session::flash('getmessage','Insert successfully!');
            return redirect ('rawmaterialpurchasing/index');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('rawmaterialpurchasing/create');

        }
        
       
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
        $this->validationerror($request);
        $id = $request->rm_id;
        $gradeId = $request->grade_id;
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId); 
        if ($laborCostObj) {
            $rawMaterial = RawMaterial::findOrFail($id);
            $rawMaterialUpdate = $request->all();
            $rawMaterial->fill($rawMaterialUpdate)->save();


            $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId]])->first();
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Update successfully!');
            return redirect('rawmaterialpurchasing/index');
        } else {
            Session::flash('getmessage','Updated unsuccessfully! This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('rawmaterialpurchasing/index');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->rm_id;

        $rawMaterial = RawMaterial::findOrFail($id);
        $rawMaterial->delete();

        $workedRecord = WorkedRecords::where([ ['item_id', $id], ['wt_id', $this->workTypeId] ])->first();
        $workedRecord->delete();

        Session::flash('getmessage','Deleted successfully!');
        return redirect('rawmaterialpurchasing/index');
    }
}
