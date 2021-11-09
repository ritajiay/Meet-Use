<?php

namespace App\Http\Controllers;

use App\{Projectlistpersonalmodel, Managerstartprojectmodel, Penetrationmodel,Timeselectmodel, Serialmodel, Clientmodel};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

// 專案清單瀏覽_個人
class RecordListController extends Controller
{
public function index()
{
    $user_name = Auth::user()->username;
    $date = Carbon::today()->toDateString();

    $list_now = Projectlistpersonalmodel::whereDate('projectlistpersonalmodels.created_at',Carbon::today())
    ->where('username','=',$user_name)
    ->leftjoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')
    ->leftjoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')
    ->leftjoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')
    ->leftjoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')
    ->select('projectlistpersonalmodels.*','managerstartprojectmodels.projectname','penetrationmodels.categoryname','clientmodels.client as cc_name','serialmodels.projectname as ss_name','serialmodels.serial as ss_serial')
    ->orderby('projectlistpersonalmodels.id','desc')
    ->get();

    $list_all = Projectlistpersonalmodel::where('username','=',$user_name)
    ->whereDate('projectlistpersonalmodels.created_at','!=',$date)
    ->leftjoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')
    ->leftjoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')
    ->leftjoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')
    ->leftjoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')
    ->select('projectlistpersonalmodels.*','managerstartprojectmodels.projectname','penetrationmodels.categoryname','clientmodels.client as cc_name','serialmodels.projectname as ss_name','serialmodels.serial as ss_serial')
    ->orderby('projectlistpersonalmodels.id','desc')
    ->get();

    return view('.site.system.personal.recordlist', compact('list_now','list_all'));
}

public function edit($id)
{
    $edit_index = Projectlistpersonalmodel::
    leftJoin('managerstartprojectmodels','projectlistpersonalmodels.projectlistpersonal','=','managerstartprojectmodels.id')
    ->select('projectlistpersonalmodels.*', 'managerstartprojectmodels.id as pID', 'managerstartprojectmodels.projectname as mName')
    ->where(['projectlistpersonalmodels.id'=>$id])
    ->get();
    $edit_index2 = Projectlistpersonalmodel::
    leftJoin('clientmodels','projectlistpersonalmodels.client','=','clientmodels.id')
    ->select('projectlistpersonalmodels.*', 'projectlistpersonalmodels.id as pID','clientmodels.client as cName')
    ->where(['projectlistpersonalmodels.id'=>$id])
    ->get();
    $lists = Managerstartprojectmodel::orderby('projectname','asc')->get();
    $list1 = Projectlistpersonalmodel::where(['id'=>$id])->get();
    $list2 = Timeselectmodel::get();
    $lists4 = Clientmodel::orderby('client','asc')->get();
    $lists3 = Projectlistpersonalmodel::leftJoin('serialmodels','projectlistpersonalmodels.serial','=','serialmodels.id')
    ->select('projectlistpersonalmodels.*','serialmodels.id as s_ID','serialmodels.projectname as sName','serialmodels.serial as ssName')->where(['projectlistpersonalmodels.id'=>$id])
    ->get();
    $lists5 = Projectlistpersonalmodel::leftJoin('penetrationmodels','projectlistpersonalmodels.penetration','=','penetrationmodels.id')->select('projectlistpersonalmodels.*','penetrationmodels.id as pID','penetrationmodels.categoryname as pName')
    ->where(['projectlistpersonalmodels.id'=>$id])
    ->get();
    $projectlistpersonal = Projectlistpersonalmodel::where(['id'=>$id])->get();
    $test = Penetrationmodel::where('id','=',($projectlistpersonal[0]['penetration']))->get();
    $test2 = Serialmodel::where('id','=',($projectlistpersonal[0]['serial']))->get();
    $time_change_new = Projectlistpersonalmodel::where(['id'=>$id])->get();

    return view('.site.system.personal.recordedit', compact('edit_index','lists','list1','list2','lists3','lists4','projectlistpersonal','test','edit_index2','test2','lists5','time_change_new'));
}

public function edit_getSelects($id)
{
    $selects = Penetrationmodel::where('m_id',$id)->get();
    return $selects;
}

    public function edit_getSelects2($id)
{
    $selects2 = Serialmodel::where('c_id',$id)->orderby('serial','asc')->get();
    return $selects2;
}

public function update(Request $request, $id)
{
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
    $work_day_totaltime = Projectlistpersonalmodel::where('serial','=',$serial_id)->sum('time_change');
    $update_total_work_time = Serialmodel::find($serial_id);
    $update_total_work_time->total_work_time = $serial_totaltime;
    $update_total_work_time->work_day = $work_day_totaltime;
    $update_total_work_time->save();

    return redirect('/record/list');
}

public function destroy($id)
{
    $serial_id = Projectlistpersonalmodel::where('id','=',$id)->value('serial');
    $project_totaltime = Projectlistpersonalmodel::where('serial','=',$serial_id)->sum('totaltime');
    $work_day_totaltime = Projectlistpersonalmodel::where('serial','=',$serial_id)->sum('time_change');
    $del_pro_totaltime = Projectlistpersonalmodel::where('id','=',$id)->value('totaltime');
    $del_work_day_totaltime = Projectlistpersonalmodel::where('id','=',$id)->value('time_change');
    $sum_pro_totaltime = $project_totaltime - $del_pro_totaltime;
    $sum_work_day_totaltime = $work_day_totaltime - $del_work_day_totaltime;

    $update_totaltime = Serialmodel::find($serial_id);
    $update_totaltime->total_work_time = $sum_pro_totaltime;
    $update_totaltime->work_day = $sum_work_day_totaltime;
    $update_totaltime->save();

//    刪除專案清單瀏覽_個人(今日)
    $del_index = Projectlistpersonalmodel::find($id);
    $del_index->delete();

    return redirect('/record/list');
}

}
