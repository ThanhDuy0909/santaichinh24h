<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Account_his_Model;
use App\Models\Account_Model;

class LoginController extends Controller
{
    public function loginUser(){

        return view('user.login.login_user');
    }
    // public function login(Request $request)
    // {
    //     if (Auth::attempt(['username' => $request -> username , 'password' => $request -> password])) {
    //         return redirect('profile_user');
    //     }
    //     return redirect('login_user') -> with('error', 'Số điện thoại hoặc Password không chính xác'); // Đăng nhập lỗi thì quay lại from login
    // }
    // public function logout(){
    //     Auth::logout();
    //     return redirect('login_user');
    // }
    public function login(Request $request){
        $get     = $request->only('username','password');
        $today   = strtotime(Carbon::now());

        if (!Auth::attempt($get))
        {
            return $this->ApiError(['mess' => 'Tên tài khoản hoặc mật khẩu không đúng , vui lòng thử lại']);
        }
        $get_account = Account_Model::where('username', $request['username'])->where('is_active',1)->where('is_delete',1)->firstOrFail();
        if($get_account == ""){
            return $this->ApiError(['mess' => 'Tài khoản đã bị khóa hoặc đã bị xóa']);
        }

        $tokenResult = $get_account->createToken('auth_token');
        $token = $tokenResult->plainTextToken;

        $his_ = [
            'ip_address'   => request()->ip(),
            'id_account'   => $get_account['id'],
            'status'       => 1,
            'created_at'   => $today,
            'updated_at'   => $today,
        ];

        Account_his_Model::insert($his_);


        $result = [
            'id'            => $get_account->id,
            'name'          => $get_account->first_name . ' ' .  $get_account->last_name,
            'is_author'     => $get_account->is_author,
            'is_role'       => $get_account->is_role,
            'access_token'  => $token, 
            'token_type'    => 'Bearer',
            'mess'          => 'Tài khoản hợp lệ',
        ];
        return $this->ApiSusscce($result);
    }
}
