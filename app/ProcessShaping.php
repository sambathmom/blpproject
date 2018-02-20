<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessShaping extends Model
{
    protected $table = 'process_shaping';
    protected $primaryKey = 'ps_id';
    protected $fillable = [
        'staff_id',
    	'pp_id',
    	'ps_name',
    	'qty',
    	'cost'
    ];
}
