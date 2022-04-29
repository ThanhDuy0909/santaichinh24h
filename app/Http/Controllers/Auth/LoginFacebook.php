<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\Infor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Account_his_Model;
use App\Models\Account_Model;
use Carbon\Carbon;
use Exception;

class LoginFacebook extends Controller
{
    
    public function login_face() // giao diện đăng nhập
    {
        return view('user.check_cic.login_face');
    }

    public function login_facebook()
    {
        // $id= Auth::user();
        // dd($id);
        if (Auth::check()) {
            return view('user.check_cic.infor_user');
        }
        // return redirect('login_face');
        return Socialite::driver('facebook')->redirect('login_face');
    }

    public function callback_facebook()
    {
        try{
            $user = Socialite::driver('facebook')->user();
            $facebook_id = Account_Model::where('facebook_id',$user->id)->first();

            if($facebook_id){
                Auth::login($facebook_id);
                return redirect()->route('infor_user');
            }else{
                $createUser = Account_Model::create([
                    'name' => $user->name,
                    'email'=>$user->email,
                    'facebook_id'=>$user->id,
                    // 'provider'=>$provider->provider,
                ]);
                Auth::login($createUser,true);
                return redirect()->route('infor_user');
            }
        }catch(Exception $exception){
            dd($exception->getMessage());
        }
    }
    // public function callback_facebook()
    // {
    //     $ip         = request()->ip();
    //     $today      = strtotime(Carbon::now());
    //     $user   = Socialite::driver('facebook')->user();
    //     $account    = Account_Model::where('facebook_id',$user->id)->first();
    //     $check      = Account_Model::where('email', $user->getEmail())->first();
    //     if(!$check){
    //         $infor = Account_Model::insertGetId ([
    //             'name' => $user->getName(),
    //             'email' => $user->getEmail(),
    //             'facebook_id'=>$user->id,
    //             // 'password' => '',

    //         ]);
    //         // Auth::login($infor);
    //         // return redirect()->route('infor_user');
    //         $last_id = $infor;
            
    //     }else{
    //         $last_id = $check->id;
    //     }

    //     $check_his = Account_his_Model::where('id_account',$last_id)->get();
    //     if(count($check_his) > 0 && !$check_his){
    //         foreach($check_his as $key_his => $val_his){
    //             $check_= Account_his_Model::where('ip_address',$ip)->where('id',$val_his['id'])->first();
    //             if(count($check_his) < 2){
    //                 $his_ = [
    //                     'ip_address'   => request()->ip(),
    //                     'id_account'   => $last_id,
    //                     'status'       => 1,
    //                     'created_at'   => $today,
    //                     'updated_at'   => $today,
    //                 ];         
    //                 Account_his_Model::insert($his_);            
    //             }else{
    //                 if(!$check_){
    //                     break;
    //                 }
    //             }

    //             // $success = new Social([
    //             //     'facebook_id' => $user->getId(),
    //             //     'provider' => 'facebook'
    //             // ]);
    //             // $success->login()->associate($infor);
    //             // $success->save();

    //             $account_name = Account_Model::where('id', $account->user)->first();
    //             Session::put('name', $account_name->name);
    //             Session::put('facebook_id', $account_name->facebook_id);
    //             Session::put('id', $account_name->id);
    //             return redirect()->route('infor_user')->with('message', 'Đăng nhập website thành công');
    //         }
    //     }  
    // }
    public function infor_user()
    {
        // $facebook_id= Auth::user();
        // dd($facebook_id);

        if (Auth::check()) {
            return view('user.check_cic.infor_user');
        }
        return redirect()->route('login_face');
        // return view('user.check_cic.infor_user');
        
    }
    public function create_infor(Request $request)
    {
        $infor = Account_Model::find(\auth()->id());
        // $infor = new Infor();
        // $infor -> id = $request->id;
        // $infor -> facebook_id = $request->facebook_id;
        // thông tin người dùng
        $infor -> name = $request->name;
        $infor -> email = $request-> email;
        $infor -> phone = $request-> phone;
        $infor -> address = $request-> address;

        $token_random = Str::random(6);
        $infor -> ma_cic = $token_random;
        
        $infor->save();

        return redirect()->route('success');

    }
    public function success()
    {   
        // $facebook_id= Auth::user();
        // dd($facebook_id);
        // $fb = $_GET['ma_cic'];
        // $infor = DB::select('SELECT ma_cic FROM inforcic , account WHERE inforcic.id = account.id AND inforcic.facebook_id = $fb');
        if (Auth::check()) {
            return view('user.check_cic.success');
        }
        return redirect('login_face');
        
    }
    public function check()
    {
        // $facebook_id= Auth::user();
        // dd($facebook_id);
        if (Auth::check('facebok_id')) {
            return view('user.check_cic.check_cic');
        }
        return redirect()->route('login_face');
        
    }
    public function logout_face()
    {
        Auth::logout();
        return redirect()->route('login_face');
    }
}

