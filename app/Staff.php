<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   	protected $table = 'staff';
    protected $primaryKey= 'staff_id';
    protected $fillable = [ 
	    'first_name',
	    'middle_name',
	    'last_name',
	    'sex',
	    'email',
	    'phone',
	    'picture'
  	];
}
