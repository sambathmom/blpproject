<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaborCost extends Model
{
    protected $table = 'labor_cost';
    protected $primaryKey= 'lc_id';
    protected $fillable = [ 
	    'grade_id',
	    'work_type_id',
	    'lc_name',
	    'qty',
	    'cost'
  	];
}
