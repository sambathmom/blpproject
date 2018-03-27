<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessProduct extends Model
{
    protected $table = 'process_product';
    protected $primaryKey = 'pp_id';
	protected $fillable=[
		'pm_id',
		'pp_name',
		'qty',
		'cost',
		'staff_id'
	];
}
