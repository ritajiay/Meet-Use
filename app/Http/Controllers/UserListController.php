<?php

namespace App\Http\Controllers;

use App\{Usermodel, Positionmodel};
use Illuminate\Http\Request;

// 使用者清單
class UserListController extends Controller
{
    public function index()
    {
        $lists_user = Usermodel::leftJoin('positionmodels', 'usermodels.role', '=', 'positionmodels.id')
        ->select('usermodels.*','positionmodels.type')
        ->get();
        return view('.site.user.list', compact('lists_user'));
    }

    public function edit($id)
    {
        $edit = Usermodel::where(['id'=>$id])->get();
        $lists = Positionmodel::get();
        return view('.site.user.edit', compact('edit','lists'));
    }

    public function update(Request $request, $id)
    {
        $update = Usermodel::find($id);
        $update->password = bcrypt($request->get('password_new'));
        $update->role = $request->get('role_new');
        $update->save();
        return redirect('/list');
    }

    public function destroy($id)
    {
        $del = Usermodel::find($id);
        $del->delete();
        return redirect('/list');
    }

    public function checkbox(Request $request, $id) {
        $id = $request->get("data_id");
        dd($id);
        $sw_ch = Usermodel::find($id);
        $sw_ch->status = $request->get("sw_ch");
        $sw_ch->save();
        return redirect('/list');
    }
}
