<?php

namespace App\Http\Controllers;

use App\{Usermodel, Positionmodel};
use Illuminate\Http\Request;

// 使用者建立
class UserCreateController extends Controller
{
    public function index()
    {
        $lists = Positionmodel::get();
        return view('.site.user.create', compact('lists'));
    }

    public function store(Request $request)
    {
        $usermodel = new Usermodel([
            'userid' => $request->get('userid'),
            'password' => bcrypt($request->get('password')),
            'username' => $request->get('username'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
        ]);
        $usermodel->save();
        return redirect('/login');
    }
}
