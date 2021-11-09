<?php

namespace App\Http\Controllers;

use App\{Projectlistpersonalmodel, Managerstartprojectmodel, Timeselectmodel,
        Penetrationmodel, Clientmodel, Serialmodel};
use Illuminate\Http\Request;

// 專案清單瀏覽_管理者
class ProjectListManagerController extends Controller
{
    public function index() {
        $listall_manager = Projectlistpersonalmodel::leftjoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')
       ->leftjoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')
       ->leftjoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')
       ->leftjoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')
       ->select('projectlistpersonalmodels.*','managerstartprojectmodels.projectname','penetrationmodels.categoryname','clientmodels.client as cc_name','serialmodels.projectname as ss_name','serialmodels.serial as ss_serial')
       ->orderby('projectlistpersonalmodels.id','desc')
       ->get();
        return view('.site.system.manager.teamrecordlist', compact('listall_manager'));
    }

    public function edit($id)   {
        $edit_index = Projectlistpersonalmodel::leftJoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')
        ->select('projectlistpersonalmodels.*', 'projectlistpersonalmodels.projectlistpersonal as pID', 'managerstartprojectmodels.projectname as mName')
        ->where(['projectlistpersonalmodels.id'=>$id])
        ->get();
        $lists = Managerstartprojectmodel::get();
        $list2 = Timeselectmodel::get();
        $projectlistpersonal = Projectlistpersonalmodel::where(['id'=>$id],'penetration')->get();
        $edit_index2 = Projectlistpersonalmodel::
        leftJoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')
        ->select('projectlistpersonalmodels.*','clientmodels.id as pID','clientmodels.client as cName')
        ->where(['projectlistpersonalmodels.id'=>$id])
        ->get();
        $lists4 = Clientmodel::get();
        $lists3 = Projectlistpersonalmodel::leftJoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')
        ->select('projectlistpersonalmodels.*','serialmodels.serial as ssNumber','serialmodels.projectname as ssName')
        ->where(['projectlistpersonalmodels.id'=>$id])
        ->get();
        $lists5 = Projectlistpersonalmodel::leftJoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')->select('projectlistpersonalmodels.*','penetrationmodels.id as pID','penetrationmodels.categoryname as pName')
        ->where(['projectlistpersonalmodels.id'=>$id])
        ->get();
        $test = Penetrationmodel::where('id','=',($projectlistpersonal[0]['penetration']))->get();
        $test2 = Serialmodel::where('id','=',($projectlistpersonal[0]['projectname']))->get();
        $time_change_new = Projectlistpersonalmodel::where(['id'=>$id])->get();

        return view('.site.system.manager.teamrecordedit', compact('edit_index','lists','list2','projectlistpersonal','edit_index2','lists4','test2','test','lists3','test','lists5','time_change_new'));
    }

    public function edit_getSelects($id)    {
        $selects = Penetrationmodel::where('m_id',$id)->get();
        return $selects;
    }

        public function edit_getSelects2($id)   {
        $selects2 = Serialmodel::where('c_id',$id)->get();
        return $selects2;
    }

    public function store(Request $request, $id)    {
        $update_index = Projectlistpersonalmodel::find($id);
        $update_index->time = $request->get('time_new');
        $update_index->client = $request->get('client_new');
        $update_index->serial = $request->get('serial_new');
        $update_index->projectlistpersonal = $request->get('projectlistpersonal_new');
        $update_index->penetration = $request->get('penetration_new');
        $update_index->starttime = $request->get('starttime_new');
        $update_index->endtime = $request->get('endtime_new');
        $update_index->totaltime = $request->get('totaltime_new');
        $update_index->summary = $request->get('summary_new');
        $update_index->remarks = $request->get('remarks_new');
        $update_index->time_change = $request->get('time_change_new');
        $update_index->save();

       //    update 目前工時
        $serial_id = Projectlistpersonalmodel::where('id','=',$id)->value('serial');
        $serial_totaltime = Projectlistpersonalmodel::where('serial','=',$serial_id)->sum('totaltime');
        $update_total_work_time = Serialmodel::find($serial_id);
        $update_total_work_time->total_work_time = $serial_totaltime;
        $update_total_work_time->save();

        return redirect('/teamrecord/list');
    }
}
