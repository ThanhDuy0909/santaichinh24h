<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use App\Models\Account_Model;
use App\Models\Finance_Model;
use App\Models\Catelog_Model;
use App\Models\News_Model;
use App\Models\Finance_province_Model;
use App\Models\Finance_catelog_Model;
use App\Models\News_catelog_Model;
class User extends La_Controller{

    public function index(Request $request){
        $user = Account_Model::where('is_delete',1)->where('is_author',0)->get();
        if($user){
            foreach($user as $key => $val){
                if($val['gender'] == 0){
                    $gender_ = 'nam';
                }else if($val['gender'] == 1){
                    $gender_ = 'nữ';
                }else{
                    $gender_ = 'khác';
                }
                $user[$key]['name']     = $val['first_name'] . ' ' . $val['last_name'];
                $user[$key]['gender']   = $gender_;
                $user[$key]['author']   = $val['is_author'] == 1 ? 'Quản trị viên' : 'Người dùng';
            }
        }
        return $this->ApiSusscce($user);
    }

    public function addUser(Request $request){
        $today      = strtotime(Carbon::now());
        // $first_name = $request['first_nameUser'];
        // $last_name  = $request['last_nameUser'];
        $name  = $request['nameUser'];
        $phone      = $request['phoneUser'];
        $gender     = $request['genderUser'];
        $address    = $request['addressUser'];
        $username   = $request['usernameUser'];
        $email      = $request['emailUser'];
        $password   = $request['passwordUser'];

        $data_ = [
            // 'first_name'    => $first_name,
            // 'last_name'     => $last_name,
            'name'     => $name,
            'phone'         => $phone,
            'gender'        => $gender,
            'address'       => $address,
            'username'      => $username,
            'email'         => $email,
            'password'      => Hash::make($password),
            'is_author'     => 0,
            'is_active'     => 0,
            'is_delete'     => 1,
            'created_at'    => $today,
        ];
        
        Account_Model::insert($data_);
        return $this->ApiSusscce(['mess' => 'Tài khoản tạo thành công']);
    }

    
    public function findUser(Request $request){
        $id     = $request['id'];

        $check  = Account_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ' , 'val' => $check]);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }

    public function updateUser(Request $request){
        $today      = strtotime(Carbon::now());
        $id_userUser= $request['id_userUser'];
        // $first_name = $request['first_nameUser'];
        // $last_name  = $request['last_nameUser'];
        $name  = $request['nameUser'];
        $phone      = $request['phoneUser'];
        $gender     = $request['genderUser'];
        $address    = $request['addressUser'];
        $username   = $request['usernameUser'];
        $email      = $request['emailUser'];
        $password   = $request['passwordUser'];

        
        $user = Account_Model::find($id_userUser);
        if($user){
            // $user->first_name   = $first_name;
            // $user->last_name    = $last_name;
            $user->last_name    = $name;
            $user->phone        = $phone;
            $user->gender       = $gender;
            $user->address      = $address;
            $user->username     = $username;
            $user->email        = $email;
            if($password != ""){
                $user->password        = Hash::make($password);
            }
            $user->updated_at        = $today;
            $user->update();

            return $this->ApiSusscce(['mess' => 'Tài khoản cập nhật thành công']);
        }else{
            return $this->ApiError(['mess' => 'Tài khoản cập nhật không thành công']);
        }

    }


    public function changeStatusUser(Request $request){
        $today  = strtotime(Carbon::now());
        $id     = $request['id'];
        $check  = Account_Model::find($id);
        if($check){
            if($check['is_active']){
                $check->is_active = false;
                $news = News_Model::where('create_by_id',$check['id'])->get();
                if($news){
                   foreach($news as $key_news => $val_news){
                    News_catelog_Model::where('news_id',$val_news['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                   } 
                }
                $finance = Finance_Model::where('create_by_id',$check['id'])->get();
                if($finance){
                   foreach($finance as $key_finance => $val_finance){
                        Finance_catelog_Model::where('finance_id',$val_finance['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$val_finance['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                   } 
                }
            }else{
                $check->is_active = true;
                $news = News_Model::where('create_by_id',$check['id'])->get();
                if($news){
                   foreach($news as $key_news => $val_news){
                    News_catelog_Model::where('news_id',$val_news['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                   } 
                }
                $finance = Finance_Model::where('create_by_id',$check['id'])->get();
                if($finance){
                   foreach($finance as $key_finance => $val_finance){
                        Finance_catelog_Model::where('finance_id',$val_finance['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$val_finance['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                   } 
                }
            }
            $check->updated_at  = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['is_active']]);
        }else{
            return $this->ApiError(['mess' => 'Chuyển trạng thái không thành công']);
        }
    }


    public function deleteUser(Request $request){
        $today  = strtotime(Carbon::now());
        $id     = $request['id'];
        $check = Account_Model::find($id);
        if($check){
            $news = News_Model::where('create_by_id',$check['id'])->get();
            if($news){
               foreach($news as $key_news => $val_news){
                News_catelog_Model::where('news_id',$val_news['id'])->update(['delete' => false,'updated_at'   => $today]);
               } 
            }
            $finance = Finance_Model::where('create_by_id',$check['id'])->get();
            if($finance){
               foreach($finance as $key_finance => $val_finance){
                    Finance_catelog_Model::where('finance_id',$val_finance['id'])->update(['delete' => false,'updated_at'   => $today]);
                    Finance_province_Model::where('finance_id',$val_finance['id'])->update(['delete' => false,'updated_at'   => $today]);
               } 
            }
            $check->is_delete = false;
            $check->updated_at = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Xóa thành công']);
        }else{
            return $this->ApiError(['mess' => 'Xóa thất bại']);
        }
    }


    public function checknameUser(Request $request){
        $username = $request['usernameUser'];
        $check = Account_Model::where('username',$username)->first();
        if($check){
            return $this->ApiError(['mess' => 'Tên đăng nhập đã tồn tại']);
        }else{
            return $this->ApiSusscce(['mess' => 'Tên đăng nhập hợp lệ']);
        }
    }

    public function checkemailUser(Request $request){
        $email = $request['email'];
        $check = Account_Model::where('email',$email)->first();
        if($check){
            return $this->ApiError(['mess' => 'Email đã tồn tại']);
        }else{
            return $this->ApiSusscce(['mess' => 'Email hợp lệ']);
        }
    }

    public function checkphoneUser(Request $request){
        $phone = $request['phone'];
        $check = Account_Model::where('phone',$phone)->first();
        if($check){
            return $this->ApiError(['mess' => 'Phone đã tồn tại']);
        }else{
            return $this->ApiSusscce(['mess' => 'Phone hợp lệ']);
        }
    }
}