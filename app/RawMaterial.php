<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $table = 'raw_material';
    protected $primaryKey = 'rm_id';
	protected $fillable=[
		'staff_id',
		'supplier_id',
		'grade_id',
		'rm_name',
		'qty',
		'cost'
	];
}
