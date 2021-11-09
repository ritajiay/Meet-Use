<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serialmodel extends Model
{
    protected $fillable = [
        'serial','projectname','c_id','pro_st_time','pro_end_time','ex_work_time','total_work_time','work_day'
    ];
}
