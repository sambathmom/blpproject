<?php

namespace App\Http\Controllers;
use DB;
use App\Staff;
use App\ProcessMaterial;
use App\RawProduct;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewWorkedRecords(Request $request){
    
       
        return view('reports.viewworkedrecords');
    }
   
    public function viewDetailWorkedRecords($startDate, $endDate)
    {
        $workedRecords = DB::table('staff')
            ->select('worked_records.staff_id','worked_records.wt_id', DB::raw('SUM(worked_records.qty) as totalqty'), 
                DB::raw('SUM(worked_records.cost) as totalcost'),
                'staff.last_name', 'staff.first_name', 'staff.middle_name', 'staff.staff_id')
            ->leftJoin('worked_records', 'staff.staff_id', '=', 'worked_records.staff_id')
            ->groupBy('worked_records.staff_id')
            ->whereDate('worked_records.created_at', '>=', $startDate)
            ->whereDate('worked_records.created_at', '<=', $endDate)
            ->whereNotIn('worked_records.wt_id',[1])
            ->get();  
            $response = [
                'status' => 200,
                'data' => $workedRecords
            ];
            return  $response;
    }

    /**
     * view worked records detail
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewworkedRecordsDetail($id,Request $request)
    {
        $startDate = $request->from;
        $endDate = $request->to;
        $staff = DB::table('Staff')
        ->select('Staff.*')
        ->where('Staff.staff_id', $id)
        ->first();
        
        $workedRecords = DB::table('worked_records')
        ->select('worked_records.staff_id','worked_records.created_at as date',
        'worked_records.wt_id','work_type.wt_name as workType',
        DB::raw('SUM(worked_records.cost) as cost'),
        DB::raw('SUM(worked_records.qty) as Quantity'),
        'staff.last_name', 'staff.first_name', 'staff.middle_name',
         'staff.staff_id','raw_product.rp_name as babyLotName')
        ->join('staff', 'staff.staff_id', '=', 'worked_records.staff_id')
        ->join('work_type','work_type.wt_id', '=', 'worked_records.wt_id')
        ->join('clean_product','clean_product.cp_id', '=','worked_records.item_id')
        ->join('dried_product','dried_product.dp_id', '=','worked_records.item_id')
        ->join('process_material','process_material.pm_id', '=','clean_product.pm_id')        
        ->join('raw_product','raw_product.rp_id', '=','process_material.rp_id')               
        ->join('raw_material','raw_product.rm_id', '=','raw_material.rm_id' ) 
        ->groupBy('raw_product.rp_name')
       
        ->where([ 
            ['worked_records.staff_id', $id],
           // ['worked_records.wt_id', $worktypeid]
         ])
         ->whereDate('worked_records.created_at', '>=', $startDate)
         ->whereDate('worked_records.created_at', '<=', $endDate)
        ->get();
         
        return view('reports.viewworkedrecordsdetail',compact('workedRecords','staff','worktypeid'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function viewLosingRowMaterials(Request $request)
    {
        return view('reports.viewlosingrawmaterial');
    }

    /**
     * view losing item detail
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewLosingItemDetail(Request $request, $id)
    {
        $startDate = $request->from;
        $endDate = $request->to;
        $rawProduct = RawProduct::where('rp_id', $id)->first();
        $processMaterialLosings =  DB::table('process_material')
            ->select('process_material.pm_name', 'process_material.qty', 'clean_product.qty AS cleanqty', 
            'dried_product.qty AS driedqty', 'shaped_product.qty as shapedqty', 'clean_product.staff_id as cleanstaff', 
            'dried_product.staff_id as driedstaff', 'shaped_product.staff_id as shapedstaff')
            ->join('clean_product', 'clean_product.pm_id', '=', 'process_material.pm_id')
            ->join('dried_product', 'dried_product.pm_id', '=', 'process_material.pm_id')
            ->join('shaped_product', 'shaped_product.pm_id', '=', 'process_material.pm_id')
            ->where ('process_material.rp_id', '=', $id)
            ->whereDate ('process_material.created_at', '>=', $startDate)
            ->whereDate('shaped_product.created_at', '<=', $endDate)
            ->get();
        return view('reports.viewlosingitemdetail', compact('processMaterialLosings', 'rawProduct'));
    }

    /**
     * view raw product losing
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewRawProductLosing($startDate, $endDate)
    {
        
        $losingRawProducts = DB::table('raw_product')
            ->select('raw_product.*', DB::raw('SUM(process_material.qty) as totalqty'))
            ->join('process_material', 'process_material.rp_id', '=', 'raw_product.rp_id')
            ->whereDate('process_material.created_at', '>=', $startDate)
            ->whereDate('process_material.created_at', '<=', $endDate)
            ->groupBy('process_material.rp_id')
            ->get();
        $response = [
            'status' => 200,
            'data' => $losingRawProducts
        ];
        return  $response;
    }
}