<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleanProduct extends Model
{
    protected $table = 'clean_product';
    protected $primaryKey = 'cp_id';
	protected $fillable = [
		'pm_id',
        'staff_id',
        'grade_id',
        'user_id',
        'cp_name',
		'qty',
		'cost'
    ];
    
    public function getIdentity(){
        return $this->cp_id;
    }
}
