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
    public function viewWorkedRecords(Request $request)
    {
        $workedRecords = DB::table('worked_records')
            ->select('worked_records.staff_id','worked_records.wt_id', DB::raw('SUM(worked_records.qty) as totalqty'), 
                DB::raw('SUM(worked_records.cost) as totalcost'),
                'staff.last_name', 'staff.first_name', 'staff.middle_name', 'staff.staff_id')
            ->join('staff', 'staff.staff_id', '=', 'worked_records.staff_id')
    
            ->groupBy('worked_records.staff_id')
            ->get();
    
        
        return view('reports.viewworkedrecords', compact('workedRecords'));
    }

    /**
     * view worked records detail
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewworkedRecordsDetail($id,$worktypeid)
    {
      
        $staff = DB::table('Staff')
        ->select('Staff.*')
        ->where('Staff.staff_id', $id)
        ->first();
        $workedRecords = DB::table('worked_records')
        ->select('worked_records.staff_id','worked_records.wt_id','work_type.wt_name as workType',
        'staff.last_name', 'staff.first_name', 'staff.middle_name',
         'staff.staff_id','raw_product.rp_name as cleanMaterial','raw_product.qty as rawQuantity',
         'clean_product.qty as cleanQuantity','dried_product.qty as quantityDired')
        ->join('staff', 'staff.staff_id', '=', 'worked_records.staff_id')
        ->join('work_type','work_type.wt_id', '=', 'worked_records.wt_id')
        ->join('clean_product','clean_product.cp_id', '=','worked_records.item_id')
        ->join('dried_product','dried_product.dp_id', '=','worked_records.item_id')
        ->join('process_material','process_material.pm_id', '=','clean_product.pm_id')        
        ->join('raw_product','raw_product.rp_id', '=','process_material.rp_id')               
        ->join('raw_material','raw_product.rm_id', '=','raw_material.rm_id' ) 
                   
        ->where([ 
            ['worked_records.staff_id', $id],
            ['worked_records.wt_id', $worktypeid]
         ])
        ->get();
         
        return view('reports.viewworkedrecordsdetail',compact('workedRecords','staff','workType'));
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function viewLosingRowMaterials(Request $request)
   {
        $losingRawMaterials = DB::table('raw_material')
            ->select('raw_material.*', DB::raw('SUM(raw_product.qty) as totalqty'))
            ->join('raw_product', 'raw_product.rm_id', '=', 'raw_material.rm_id')
            ->groupBy('raw_product.rm_id')
            ->get();
        return view('reports.viewlosingrawmaterial', compact('losingRawMaterials'));
   }

    /**
     * view losing item detail
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewLosingItemDetail(Request $request, $id)
    {
        //$productMaterial = RawProduct::where('rm_id', $id)->first();
        //$processMaterialId = ProcessMaterial::where('rp_id', $productMaterial->rp_id)->first()->pm_id;
        $rawProducts =  DB::table('raw_product')
            ->select('raw_product.*', 'clean_product.qty', 'dried_product.qty', 'shaped_product.qty')
            ->join('process_material', 'process_material.rp_id', '=', 'raw_product.rp_id')
            ->join('clean_product', 'clean_product.pm_id', '=', 'process_material.pm_id')
            ->join('dried_product', 'dried_product.pm_id', '=', 'process_material.pm_id')
            ->join('shaped_product', 'shaped_product.pm_id', '=', 'process_material.pm_id')
            ->where('rm_id', '=', $id)
            ->get();
    
        dump($rawProducts); die();
        
        return view('reports.viewlosingitemdetail');
    }
}
