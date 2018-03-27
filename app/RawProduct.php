<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RawMaterial;

class RawProduct extends Model
{
    protected $table = 'raw_product';
    protected $primaryKey = 'rp_id';
	protected $fillable=[
		'rm_id',
		'grade_id',
		'user_id',
		'rp_name',
		'qty',
		'cost',
		'staff_id'
	];
	
	public function getIdentity(){
		return $this->rp_id;
	}

	public function rawMaterial()
    {
    	return $this->belongsTo('App\RawMaterial');
    }
}
