<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\serialmodel;

class ProjectStatusController extends Controller
{
    public function index() {
        $list = serialmodel::leftJoin('clientmodels','serialmodels.c_id','=','clientmodels.id')
        ->select('serialmodels.*','clientmodels.client as c_Name')->orderby('id','desc')->get();

        return view('.site.system.manager.projectstatus',compact('list'));
    }
}
