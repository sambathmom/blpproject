<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessMaterial extends Model
{
    protected $table = 'process_material';
    protected $primaryKey = 'pm_id';
	protected $fillable=[
		'rp_id',
		'pm_name',
		'qty',
		'cost'
	];
}
 