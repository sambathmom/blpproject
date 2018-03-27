<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    
	protected $table = 'work_type';
    protected $primaryKey= 'wt_id';
    protected $fillable = [ 
	    'wt_name'
  	];
}
