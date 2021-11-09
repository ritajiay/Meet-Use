<?php

namespace App\Http\Controllers;

use App\{Managerstartprojectmodel, Penetrationmodel, Projectlistpersonalmodel,
    Socialprojectmodel, Timeselectmodel, Serialmodel, Usermodel, Clientmodel};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 執行記錄新增
class RecordCreateController extends Controller
{
    public function index()
    {
        $usermodels = Auth::user()->username;
        $lists = Managerstartprojectmodel::orderby('projectname','asc')->get();
        $lists4 = Clientmodel::orderby('client','asc')->get();
        $lists3 = Serialmodel::get();
        return view('.site.system.personal.record',compact('usermodels','lists','lists3','lists4'));
    }

    public function getSelects($id)
    {
        $selects = Penetrationmodel::where('m_id',$id)->orderby('categoryname','asc')->get();
        return $selects;
    }

    // 測api
    public function testtest(Request $request)
    {
        $id = $request->id;
        $selects = Penetrationmodel::where('m_id',$id)->orderby('categoryname','asc')->get();
        return $selects;
    }

    public function getSelects2($id)
    {
        $selects2 = Serialmodel::where('c_id',$id)->orderby('serial','asc')->get();
        return $selects2;
    }

    public function store(Request $request)
    {   
        $projectlistpersonalmodel = new projectlistpersonalmodel([
            'username' => $request->get('username'),
            'client' => $request->get('client'),
            'serial' => $request->get('serial'),
            'time' => $request->get('time'),
            'projectlistpersonal' => $request->get('projectlistpersonal'),
            'penetration' => $request->get('penetration'),
            'starttime' => $request->get('starttime'),
            'endtime' => $request->get('endtime'),
            'totaltime' => $request->get('totaltime'),
            'summary' => $request->get('summary'),
            'remarks' => $request->get('remarks'),
            'time_change' => $request->get('time_change'),
        ]);
        $projectlistpersonalmodel->save();

        $id = $request->get('serial');
        $update_totaltime = Projectlistpersonalmodel::where('serial','=',$id)->sum('totaltime');
        $update_work_day = Projectlistpersonalmodel::where('serial','=',$id)->sum('time_change');
        $serialmodel = Serialmodel::find($id);
        $serialmodel->total_work_time = $update_totaltime;
        $serialmodel->work_day = $update_work_day;
        $serialmodel->save();

        return redirect('/record/list');
    }
}
