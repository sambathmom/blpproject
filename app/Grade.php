<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	protected $table = 'grade';
    protected $primaryKey= 'grade_id';
    protected $fillable = [ 
	    'grade_name'
  	];
}
