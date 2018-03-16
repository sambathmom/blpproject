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
            ->select('worked_records.staff_id', DB::raw('SUM(worked_records.qty) as totalqty'), 
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
    public function viewworkedRecordsDetail($id)
    {
        $staff = Staff::where('staff_id', $id)->first();
        $staffWorks = DB::table('clean_product')
            ->select('process_material.pm_name','staff.last_name', 'staff.first_name', 'staff.middle_name',
             'staff.staff_id', 'shaped_product.qty as shapedqty', 'process_material.qty as qty',
              'clean_product.qty as cleanqty','clean_product.cost as cost')
            ->join('process_material', 'process_material.pm_id', '=', 'clean_product.pm_id')
            ->join('shaped_product', 'shaped_product.pm_id', '=', 'process_material.pm_id')
            ->join('staff', 'staff.staff_id', '=', 'clean_product.staff_id')
            ->where('staff.staff_id', $id)
            ->get();
        return view('reports.viewworkedrecordsdetail', compact('staff', 'staffWorks'));
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