<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkedRecords extends Model
{
    protected $table ="worked_records";
    protected $primaryKey = 'wr_id';
    protected $fillable = [
        'staff_id',
        'wt_id',
        'item_id',
        'lc_id',
        'qty',
        'memo'
     ];
}
