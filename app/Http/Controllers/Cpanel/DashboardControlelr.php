<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;

class DashboardControlelr extends La_Controller{
    
    public function index(){
        $data['title']      = 'Đăng nhập Admin';
        
        $data['active']     = 1;

        $template           = 'cpanel.dashboard.index';

        return view($template,isset($data)?$data:NULL); 
    }
}