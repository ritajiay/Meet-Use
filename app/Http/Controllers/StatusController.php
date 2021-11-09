<?php

namespace App\Http\Controllers;

use App\{projectlistpersonalmodel, clientmodel, statuslistmodel};
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
        $lists = Projectlistpersonalmodel::leftJoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')->leftJoin('statuslistmodels','projectlistpersonalmodels.status_id','=','statuslistmodels.id')->leftJoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')->leftJoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')->leftJoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')
        ->select('projectlistpersonalmodels.*','serialmodels.serial as ss_Serial','serialmodels.projectname as ss_projectname','statuslistmodels.statusname as ss_Statusname','clientmodels.client as cc_Name','managerstartprojectmodels.projectname as mp_Name','penetrationmodels.categoryname as pc_Name')->orderby('time','desc')->get();
        $status = Statuslistmodel::get();
        return view('.site.system.statuslist.status',compact('lists','status'));
    }

    public function store(Request $request) {
        $req = $request->get('id_copy');

        $update = Projectlistpersonalmodel::find($req);

        $update->status_id = $request->get('s_S');
        $update->save();

        return redirect('/status');
    }
}
