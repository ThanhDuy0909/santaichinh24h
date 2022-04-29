<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account_Model;

class UserController extends La_Controller{
    
    public function index(Request $request){

        $id                 = $request['get'];

        if($id){
            $data['user']       = Account_Model::find($id);
            $data['title']      = 'Cập nhật người dùng';  
            $template           = 'cpanel.user.add';
        }else{
            $data['title']      = 'Quản lý danh mục người dùng';  
            $template           = 'cpanel.user.index';
        }  
        $data['active']     = 5;
        return view($template,isset($data)?$data:NULL); 
    }

    public function add(){
        $data['title']      = 'Thêm người dùng';
        
        $data['active']     = 5;

        $template           = 'cpanel.user.add';

        return view($template,isset($data)?$data:NULL); 
    }
}