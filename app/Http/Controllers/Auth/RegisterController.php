<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account_Model;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerUser(){
        return view('user.login.register_user');
    }
    public function register(Request $request)
    {
        $account = new Account_Model();
        $account -> name = $request->name;
        $account -> email_account = $request->email_account;
        $account -> phone = $request->phone;
        $account -> username = $request->username;
        $account -> password = bcrypt($request->password);
        $account -> address = $request->address;
        $account -> gender = $request->gender;
        $account->save();

        return redirect('/register_user')->with('success', 'Đăng Ký Thành Công, Vui Lòng Quay Lại Trang Đăng Nhập');
    }
}
