<?php

namespace App\Http\Controllers;
use App\{Managerstartprojectmodel, Penetrationmodel, Socialprojectmodel, 
         Projectlistpersonalmodel, Serialmodel, Clientmodel};
use Illuminate\Http\Request;
use DB;

// 專案名稱清單_管理者
class ManagerStartProjectController extends Controller
{
    public function index() {
        $lists = Managerstartprojectmodel::orderby('id','desc')->get();
        $lists2 = Penetrationmodel::get();
        $lists3 = DB::table('Penetrationmodels')
        ->leftJoin('Managerstartprojectmodels','Penetrationmodels.m_id','=','Managerstartprojectmodels.id')
        ->select('Penetrationmodels.*', 'Managerstartprojectmodels.projectname')->orderby('id','desc')
        ->get();
        $lists4 = DB::table('serialmodels')->leftJoin('clientmodels','serialmodels.C_id','=','clientmodels.id')->select('serialmodels.*','clientmodels.id as client_id','clientmodels.client as c_client')->orderby('id','desc')->
        get();
        $lists5 = Clientmodel::orderby('id','desc')->get();
        
        return view('.site.system.manager.projectname',compact('lists','lists2','lists3','lists4','lists5'));
    }

    public function destroy($id) {
        $del = Managerstartprojectmodel::find($id);
        $del->delete();
        return redirect('/projectname');
    }

    public function destroy2($id) {
        $del2 = Penetrationmodel::find($id);
        $del2->delete();
        return redirect('/projectname');
    }

    public function destroy3($id) {
        $del3 = Serialmodel::find($id);
        $del3->delete();
        return redirect('/projectname');
    }

        public function destroy4($id) {
        $del4 = Clientmodel::find($id);
        $del4->delete();
        return redirect('/projectname');
    }

    public function store_client(Request $request) {
        $clientmodel = new clientmodel([
            'client' => $request->get('client')
        ]);
        $clientmodel->save();
        return redirect('/projectname');
    }

    public function store_serial(Request $request) {
        $serialmodel = new serialmodel([
            'serial' => $request->get('serial'),
            'projectname' => $request->get('projectname'),
            'c_id' => $request->get('c_id'),
            'pro_st_time' => $request->get('pro_st_time'),
            'pro_end_time' => $request->get('pro_end_time'),
            'ex_work_time' => $request->get('ex_work_time'),
        ]);
        $serialmodel->save();
        return redirect('/projectname');
    }

    public function store_category(Request $request) {
        $managerstartprojectmodel = new managerstartprojectmodel([
            'projectname' => $request->get('projectname')
        ]);
        $managerstartprojectmodel->save();
        return redirect('/projectname');
    }

    public function store_object(Request $request) {
        $penetrationmodel = new penetrationmodel([
            'categoryname' => $request->get('objectname'),
            'm_id' => $request->get('m_id')
        ]);
        $penetrationmodel->save();
        return redirect('/projectname');
    }

    public function client_update(Request $request) {
        $id = $request->get('client_edit_id');
        $clientmodel = clientmodel::find($id);
        $clientmodel->client = $request->get('client_edit_input');
        $clientmodel->save();
        return redirect('/projectname');
    }

    public function serial_update(Request $request) {
        $id = $request->get('serial_id');
        $serial_client_before_input = $request->get('serial_client_before_input');
        $serialmodel = serialmodel::find($id);
        $serialmodel->serial = $request->get('serial_edit_input');
        $serialmodel->projectname = $request->get('projectname_edit_input');
        $serialmodel->c_id = $request->get('c_id');
        $serialmodel->pro_st_time = $request->get('pro_st_time_edit');
        $serialmodel->pro_end_time = $request->get('pro_end_time_edit');
        $serialmodel->ex_work_time = $request->get('ex_work_time_edit');
        $serialmodel->save();

        return redirect('/projectname');
    }

    public function category_update(Request $request) {
        $id = $request->get('category_id');
        $managerstartprojectmodel = managerstartprojectmodel::find($id);
        $managerstartprojectmodel->projectname = $request->get('category_edit');
        $managerstartprojectmodel->save();
        return redirect('/projectname');
    }

    public function object_update(Request $request) {
        $id = $request->get('object_edit_id');
        $penetrationmodel = penetrationmodel::find($id);
        $penetrationmodel->categoryname = $request->get('objectname_edit');
        $penetrationmodel->m_id = $request->get('m_id');
        $penetrationmodel->save();
        return redirect('/projectname');
    }
}
