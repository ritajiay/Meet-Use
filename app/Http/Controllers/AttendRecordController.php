<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendRecordController extends Controller
{
    public function index() {
        return view('.site.system.attendrecord.attendlist');
    }
}
