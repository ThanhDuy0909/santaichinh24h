<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends La_Controller{
    
    public function login(){
        $data['title']      = 'Đăng nhập Admin';
        
        $template           = 'cpanel.account.login';

        return view($template,isset($data)?$data:NULL); 
    }
}