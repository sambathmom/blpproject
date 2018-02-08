<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'supplier_id';
	protected $fillable=[
		'company_name',
		'contact_person',
		'contact_title',
		'email',
		'phone'
	];
}
