<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RawMaterial;

class RawMaterial extends Model
{
    protected $table = 'raw_material';
    protected $primaryKey = 'rm_id';
	protected $fillable=[
		'user_id',
		'staff_id',
		'supplier_id',
		'grade_id',
		'rm_name',
		'qty',
		'cost'
	];

	public function rawProducts()
    {
    	return $this->hasMany('App\RawProduct');
	}
	public function getIndentity()
	{
		return $this->rm_id;
	}
}
