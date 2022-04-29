<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account_Model;


class ResertPassword extends Controller
{
    public function resertpass(){
        if (Auth::check()) {
            return view('user.profile.resert_pass');
        }
        return redirect('login_user');
    }
    public function resert_pass(Request $request)
    {
        $account = Account_Model::find(\auth()->id());
        $account -> password = bcrypt($request->password);
        $account->save();
        return redirect('resert_pass')->with('success','Mật khẩu đã được thay đổi vui lòng quay lại đăng nhập');
    }
}
