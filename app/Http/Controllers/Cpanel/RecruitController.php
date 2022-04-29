<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\News_Model;
use App\Models\News_catelog_Model;
use App\Models\Catelog_Model;
use App\Models\Account_Model;

use App\Models\Recruit_Model;
use App\Models\Recruit_catelog_Model;
use App\Models\Recruit_province_Model;
class RecruitController extends La_Controller{

    public function index(Request $request){
        $id = $request->get;

        $catelog_recruit        = "";

        $province_recruit        = "";
        
        if($id){
            $check              = Recruit_Model::find($id);
            if($check){
                $recruit_catelog   = Recruit_catelog_Model::where('recruit_id',$check['id'])->get();
                if($recruit_catelog){
                    foreach($recruit_catelog as $key => $val){
                        if($key > 0){
                            $catelog_recruit .= ','. $val['catelog_id'];
                        }else{
                            $catelog_recruit .= $val['catelog_id'];
                        }
                    }
                    $check['job_industry'] = $catelog_recruit;
                }
                $province_catelog   = Recruit_province_Model::where('recruit_id',$check['id'])->get();
                if($province_catelog){
                    foreach($province_catelog as $key_province => $val_province){
                        if($key_province > 0){
                            $province_recruit .= ','. $val_province['province_id'];
                        }else{
                            $province_recruit .= $val_province['province_id'];
                        }
                    }
                    $check['province_recruit'] = $province_recruit;
                }
                $data['recruit']= $check;
            }
            $data['title']      ='Cập nhật tin tuyển dụng';
            $template           = 'cpanel.recruit.add';
        }else{
            $data['title']      ='Tin tuyển dụng';
            $template           = 'cpanel.recruit.index';
        }

        
        $data['active']     = 7;

        $data['id_tc']      = $id;

        return view($template,isset($data)?$data:NULL); 
    }

    public function add(Request $request){
        $id     = $request->get;

        $data['title']      ='Thêm tin tuyển dụng';
        
        $data['active']     = 7;

        $data['id_tc']      = $id;

        $template           = 'cpanel.recruit.add';

        return view($template,isset($data)?$data:NULL); 
    }

}