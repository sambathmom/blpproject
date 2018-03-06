<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessProduct;
use App\ProcessCleaning;
use App\ProcessMaterial;
use Session;
use DB;
use App\Staff;
use App\Grade;
use App\RawProduct;
use App\RawMaterial;
use App\WorkedRecords;
use App\LaborCost;

class ProcessCleaningController extends Controller
{
    protected $workTypeId = 4;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $processMaterials = ProcessMaterial::all();
        $grades = Grade::all();
        return view('processcleaning.create', compact('processMaterials', 'staffs', 'grades'));
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
            'cost' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
        $gradeId = $request->grade_id;
        $processMaterialId = $request->pm_id;
        $laborCost = new LaborCost;
        $laborCostObj = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId);
        $processMaterial = ProcessMaterial::findOrFail($processMaterialId);
        $rawProductId = $processMaterial->rp_id;
        $rawProduct = RawProduct::findOrFail($rawProductId);
        $rawMaterialId = $rawProduct->rm_id; 
        if ($laborCostObj) {           
            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $rawMaterialId;
            $workedRecord->lc_id = $laborCostObj->lc_id;
            $workedRecord->cost = $laborCostObj->cost;

            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Inserted successfully!');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processcleaning/create');
        }
        
    }
}
