<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeselectmodel extends Model
{
    protected $fillable = [
        'time','totaltime','time_status',
    ];
}
