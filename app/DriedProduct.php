<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriedProduct extends Model
{
    protected $table = 'dried_product';
    protected $primaryKey = 'dp_id';
	protected $fillable = [
		'pm_id',
        'staff_id',
        'grade_id',
        'user_id',
        'dp_name',
		'qty',
		'cost'
    ];
    
    public function getIdentity(){
        return $this->dp_id;
    }
}
