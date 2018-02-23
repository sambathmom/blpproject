<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShapedProduct extends Model
{
    protected $table = 'shaped_product';
    protected $primaryKey = 'sp_id';
    protected $fillable = [
        'user_id',
        'pm_id',
        'staff_id',
        'grade_id',
    	'sp_name',
    	'qty',
    	'cost'
    ];
}
