<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessMaterial extends Model
{
    protected $table = 'process_material';
    protected $primaryKey = 'pm_id';
	protected $fillable=[
		'staff_id',
		'rp_id',
		'user_id',
		'pm_name',
		'qty',
		'cost'
	];

	public function getIdentity()
	{
		return $this->pm_id;
	}
}
 