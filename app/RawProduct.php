<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawProduct extends Model
{
    protected $table = 'raw_product';
    protected $primaryKey = 'rp_id';
	protected $fillable=[
		'rm_id',
		'grade_id',
		'rp_name',
		'qty',
		'cost',
		'staff_id'
	];
}
