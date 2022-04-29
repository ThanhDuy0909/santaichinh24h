<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginUser extends Controller
{
    public function login(){
        return view('User.login', [
            'title' => 'Đăng nhập tài khoản'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login_user');
    }
}
