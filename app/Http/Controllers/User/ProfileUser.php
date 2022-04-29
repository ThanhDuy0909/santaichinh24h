<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Account_Model;

class ProfileUser extends Controller
{
    public function profileUser(){
        $genders = DB::select('SELECT * FROM genders');
        if (Auth::check()) {
            return view('user.profile.profile_user',compact('genders'));
        }
        return redirect('login_user');
    }
    public function update(){
        if (Auth::check()) {
            return view('user.profile.update_profile');
        }
        return redirect('login_user');
    }
    public function update_profile(Request $request)
    {
        $account = Account_Model::find(\auth()->id());
        $account->name = $request->name;
        $account->email_account = $request->email_account;
        $account->phone = $request->phone;
        $account->address = $request->address;
        $account->gender = $request->gender;
        $account->save();
        return redirect('profile_user');
    }
}
