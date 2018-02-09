<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    
	protected $table = 'work_type';
    protected $primaryKey= 'work_type_id';
    protected $fillable = [ 
	    'wt_name'
  	];
}
