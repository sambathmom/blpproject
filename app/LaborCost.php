<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class LaborCost extends Model
{
    protected $table = 'labor_cost';
    protected $primaryKey= 'lc_id';
    protected $fillable = [ 
	    'grade_id',
	    'wt_id',
	    'lc_name',
	    'qty',
	    'cost'
	];

	public function getLaborCostIdentityByGradeAndWorkType($gradeId, $workTypeId)
	{
		$laborCostId = DB::table('labor_cost')
				   ->select('labor_cost.lc_id')
				   ->where([ 
					   ['labor_cost.grade_id', $gradeId],
					   ['labor_cost.wt_id', $workTypeId]
					])->first();
		return $laborCostId->lc_id;
	}
}
