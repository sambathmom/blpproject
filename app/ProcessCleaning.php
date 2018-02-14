<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessCleaning extends Model
{
    protected $table = 'process_cleaning';
    protected $primaryKey = 'pc_id';
	protected $fillable = [
		'pp_id',
		'pc_name',
		'qty',
		'cost',
		'staff_id'
	];
}