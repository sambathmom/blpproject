<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkedRecords extends Model
{
    protected $table ="worked_records";
    protected $primaryKey = 'wr_id';
    protected $fillable = [
        'user_id',
        'staff_id',
        'wt_id',
        'lc_id',
        'qty',
        'memo'

     ];
}
