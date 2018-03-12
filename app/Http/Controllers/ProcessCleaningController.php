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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processCleanings = DB::table('process_cleaning')
        ->join('process_product', 'process_product.pp_id', '=', 'process_cleaning.pp_id')
        ->join('staff', 'staff.staff_id', '=', 'process_cleaning.staff_id')
        ->select('process_cleaning.*', 'process_product.pp_name', 'staff.last_name', 'staff.first_name', 'staff.middle_name')
        ->orderBy('pc_id','ASC')
        ->paginate(20); 
        $staffs = Staff::all();
        $processMaterials = ProcessMaterial::all();
        $grades = Grade::all();
        return view('processcleaning.index', compact('processCleanings', 'processMaterials', 'staffs', 'grades'));
    }

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

        if ($laborCostObj) {
            $processMaterial = ProcessMaterial::findOrFail($processMaterialId);
            $rawProductId = $processMaterial->rp_id;
            $rawProduct = RawProduct::findOrFail($rawProductId);
            $rawMaterialId = $rawProduct->rm_id;
            
            
            $workedRecord = new WorkedRecords;
            $workedRecord->item_id = $rawMaterialId;
            $workedRecord->lc_id = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId)->lc_id;
            $workedRecord->cost = $laborCost->getLaborCostByGradeAndWorkType($gradeId, $this->workTypeId)->cost;
            $workedRecord->wt_id = $this->workTypeId;
            $workedRecord->qty = $request->qty;
            $workedRecord->staff_id = $request->staff_id;
            $workedRecord->save();
            Session::flash('getmessage','Inserted successfully!');
            return redirect('processcleaning/index');
        } else {
            Session::flash('getmessage','This labor cost was not created. Please go to create the labor cost that have the same grade and work type.');
            return redirect ('processcleaning/create');
        }
        
    }
}
