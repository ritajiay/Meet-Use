<?php

namespace App\Http\Controllers;

use App\{Statuslistmodel, Projectlistpersonalmodel};
use Illuminate\Http\Request;

class StatusListController extends Controller
{
    public function index() {
        $status = Statuslistmodel::get();
        return view('.site.system.statuslist.statuslist',compact('status'));
    }

    public function store(Request $request) {
        $statuslistmodel = new Statuslistmodel([
            'statusname' => $request->get('statusname'),
        ]);
        $statuslistmodel->save();
        return redirect('/status/list');
    }

    public function edit(Request $request) {
        $req = $request->get('status_id_show');
        $statuslistmodel = Statuslistmodel::find($req);
        $statuslistmodel->statusname = $request->get('status_name_show');
        $statuslistmodel->save();
        return redirect('/status/list');
    }

    public function destroy($id) {
        $statuslistmodels = Statuslistmodel::find($id);
        $statuslistmodels->delete();
        return redirect('/status/list');
    }
}
