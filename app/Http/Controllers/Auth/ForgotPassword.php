<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Account_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Controller
{
    public function forgot(){
        return view('user.login.forgotpass');
    }

    public function forgot_pass(Request $request)//recover_pass
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail =  "Đặt lại mật khẩu website santaichinh24h".' '.$now;
        $user = Account_Model::where('email','=',$data['email'])->get();
        foreach($user as $key => $value)
        {
           $id = $value->id;
        }
        if($user)
        {
            $count_user = $user->count();
            if($count_user==0)
            {
                return redirect()->back()->with('error','Email chưa đăng ký để lấy lại mật khẩu');
            }else{
                $token_random = Str::random(8);
                $user = Account_Model::find($id);
                $user -> remember_token = $token_random;
                $user -> save();

                $to_email = $data['email'];
                $link_reset_pass = url("/user/login/news_pass?email=".$to_email.'&token='.$token_random);

                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email']);
                

                Mail::send('user.login.forgot_pass_notify',['data'=>$data], function($message) use ($title_mail,$data)
                {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'],$title_mail);
                });
                return redirect()->back()->with('message','Gửi email thành công, vui lòng đăng nhập vào email để thay đổi mật khẩu');
            }
        }
    }
    public function news_pass()
    {
        return view('user.login.news_pass');
    }
    public function update_new_pass(Request $request)
    {   
        $data = $request->all();
        $token_random = Str::random(8);
        $user = Account_Model::where('email','=',$data['email'])->where('remember_token','=',$data['token'])->get();
        $count = $user->count();
        if($count>0)
        {
            foreach($user as $key => $cus)
            {
                $id = $cus->id;
            }
            $resert = Account_Model::find($id);
            $resert->password = bcrypt($data['password']);
            //$resert->password = md5($data['password']);
            $resert->remember_token = $token_random;
            $resert->save();
            return redirect('login_user')->with('message','Mật khẩu đã được cập nhật, vui lòng đăng nhập');

        }else{
            return redirect('forgotpass')->with('error','Link đã hết hạn');
        }
    }
}
