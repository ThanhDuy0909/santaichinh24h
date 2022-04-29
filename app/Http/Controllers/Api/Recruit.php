<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;

use App\Models\Catelog_Model;
use App\Models\Account_Model;
use App\Models\Recruit_Model;
use App\Models\Recruit_catelog_Model;
use App\Models\Recruit_province_Model;
class Recruit extends La_Controller{

    public function post_recruitment()
    {
        if (Auth::check()) {
            return view('user.tin_tuyen_dung.post_recruitment'); 
        }
        return redirect('login_user');
    }
    public function detail_recruitment()
    {
        return view('user.tin_tuyen_dung.detail_recruitment');
    }

    public function job(){
        $job  = "";
        $parent = Catelog_Model::where('parent_id',5)->where('child_id',Null)->where('active',1)->where('delete',1)->get();
            if(count($parent) > 0){
                $job = Catelog_Model::where('child_id',$parent[0]['id'])
                        ->where('active',1)
                        ->where('delete',1)
                        ->get();
            }
        return $this->ApiSusscce($job);
    }

    public function addRecruit(Request $request){
        $now                = strtotime(Carbon::now());
        $today              = strtotime(Carbon::today());
        $tomorrow           = strtotime(Carbon::tomorrow());

        $id_token           = $request['id_token'];
        $recruit_title      = $request['recruit_title'];
        $type_work          = $request['type_work'];
        $education_level    = $request['education_level'];
        $exp                = $request['exp'];
        $salary             = $request['salary'];
        $expiry_date        = $request['expiry_date'];
        $content_work       = $request['content_work'];
        $regime_work        = $request['regime_work'];
        $profile_work       = $request['profile_work'];
        $contact_work       = $request['contact_work'];

        $job_industry       = $request['job_industry'];
        $province_recruit   = $request['province_recruit'];

        $data_ = [
            'title'             => $recruit_title,
            'expiration_date'   => $expiry_date,
            'type_work'         => $type_work,
            'education_level'   => $education_level,
            'exp'               => $exp,
            'salary'            => $salary,
            'content_work'      => $content_work,
            'regime_work'       => $regime_work,
            'profile_work'      => $profile_work,
            'contact_work'      => $contact_work,
            'create_by_id'      => $id_token,
            'active'            => 0,
            'created_at'        => $now,
        ];


        $check_limits       = Recruit_Model::where('create_by_id',$id_token)->where('created_at','>=',$today)->where('created_at','<',$tomorrow)->count();
        if($check_limits > 2){
            return $this->ApiError(['mess' => 'Bạn đã đạt số lượng bài đăng cho phép trong ngày là 3 bài đăng']);
        }else{
            $id = Recruit_Model::insertGetId($data_);
            $exp_catelog = explode(',',$job_industry);
            if(count($exp_catelog) > 0){
                foreach($exp_catelog as $key_catelog => $val_catelog){
                    $catelog_ = [
                        'catelog_id' => $val_catelog,
                        'recruit_id' => $id,
                        'active'     => 0,
                        'created_at' => $now,
                    ];
                    Recruit_catelog_Model::insert($catelog_ );
                }
            }
    
            $exp_province = explode(',',$province_recruit);
            if(count($exp_province) > 0){
                foreach($exp_province as $key_province => $val_province){
                    $province_ = [
                        'province_id' => $val_province,
                        'recruit_id' => $id,
                        'active'     => 0,
                        'created_at' => $now,
                    ];
                    Recruit_province_Model::insert($province_ );
                }
            }
            return $this->ApiSusscce(['mess' => 'Thêm thành công']);
        }
    }

    public function findRecruit(Request $request){
        $id     = $request['id'];
        $check  = Recruit_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ']);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }


    public function updateRecruit(Request $request){
        $now                = strtotime(Carbon::now());

        $recruit_id         = $request['recruit_id'];
        $recruit_title      = $request['recruit_title'];
        $type_work          = $request['type_work'];
        $education_level    = $request['education_level'];
        $exp                = $request['exp'];
        $salary             = $request['salary'];
        $expiry_date        = $request['expiry_date'];
        $content_work       = $request['content_work'];
        $regime_work        = $request['regime_work'];
        $profile_work       = $request['profile_work'];
        $contact_work       = $request['contact_work'];

        $job_industry       = $request['job_industry'];
        $province_recruit   = $request['province_recruit'];

        $data_ = [
            'title'             => $recruit_title,
            'expiration_date'   => $expiry_date,
            'type_work'         => $type_work,
            'education_level'   => $education_level,
            'exp'               => $exp,
            'salary'            => $salary,
            'content_work'      => $content_work,
            'regime_work'       => $regime_work,
            'profile_work'      => $profile_work,
            'contact_work'      => $contact_work,
            'updated_at'        => $now,
        ];
        $recruit = Recruit_Model::find($recruit_id);

        Recruit_catelog_Model::where('recruit_id',$recruit_id)->delete();
        $exp_catelog = explode(',',$job_industry);
        if(count($exp_catelog) > 0){
            foreach($exp_catelog as $key_catelog => $val_catelog){
                $catelog_ = [
                    'catelog_id' => $val_catelog,
                    'recruit_id' => $recruit_id,
                    'active'     => $recruit['active'],
                    'created_at' => $now,
                ];
                Recruit_catelog_Model::insert($catelog_ );
            }
        }

        Recruit_province_Model::where('recruit_id',$recruit_id)->delete();
        $exp_province = explode(',',$province_recruit);
        if(count($exp_province) > 0){
            foreach($exp_province as $key_province => $val_province){
                $province_ = [
                    'province_id' => $val_province,
                    'recruit_id' => $recruit_id,
                    'active'     => $recruit['active'],
                    'created_at' => $now,
                ];
                Recruit_province_Model::insert($province_ );
            }
        }
        Recruit_Model::where('id',$recruit_id)->update($data_);
        return $this->ApiSusscce(['mess' => 'Cập nhật thành công']);
    }


    public function changeStatusRecruit(Request $request){
        $today              = strtotime(Carbon::now());
        $parent             = $request['parent'];
        $id                 = $request['id'];

        if($parent == ""){
            $check  = Catelog_Model::find($id);
            if($check){
                if($check['active']){
                    $check->active = false;
                    $catelog_finance =  Recruit_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = false;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Recruit_Model::where('id',$catelog_finance['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Recruit_province_Model::where('recruit_id',$catelog_finance['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    }   
                }else{
                    $check->active = true;
                    $catelog_finance =  Recruit_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = true;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Recruit_Model::where('id',$catelog_finance['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Recruit_province_Model::where('recruit_id',$catelog_finance['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    }   
                }
                $check->updated_at = $today;
                $check->update();
            }
        }else{
            $check  = Recruit_catelog_Model::where('recruit_id',$id)->first();
            if($check){
                if($check['active']){
                    $check->active = false;
                    Recruit_Model::where('id',$check['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    Recruit_catelog_Model::where('recruit_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    Recruit_province_Model::where('recruit_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                }else{
                    $check->active = true;
                    Recruit_Model::where('id',$check['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    Recruit_catelog_Model::where('recruit_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    Recruit_province_Model::where('recruit_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                }
            }
        }
        return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
    }

    public function deleteRecruit(Request $request){
        $today              = strtotime(Carbon::now());
        $id                 = $request['id'];

        $check  = Recruit_Model::find($id);
        if($check){
            Recruit_catelog_Model::where('recruit_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            Recruit_province_Model::where('recruit_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            $check->delete      = false;
            $check->updated_at  = $today;
            $check->update();
        }
        
        return $this->ApiSusscce(['mess' => 'Xóa thành công']);
    }

}