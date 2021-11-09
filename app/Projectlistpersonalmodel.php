<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectlistpersonalmodel extends Model
{
    protected $fillable = [
        'username','time','client','serial','projectlistpersonal','penetration','starttime','endtime','totaltime','summary','remarks','time_change','status_id','created_at'
    ];
}
