<?php

namespace App\Http\Controllers;

use App\Usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 使用者登入頁面
class UserLoginController extends Controller
{
    public function login()
    {
        return view('.site.user.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }

    public function authenticate(Request $request)
    {
        $userid = $request->userid;
        $password = $request->password;

        if (Auth::attempt(['userid' => $userid, 'password' => $password])) {
            return redirect()->intended('/homepage');
        }else{
            return redirect('/login')->with('error','帳號密碼錯誤!');
        }
    }
}
