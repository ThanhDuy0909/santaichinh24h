<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Candidates_Model;
use App\Models\Candidates_catelog_Model;
use App\Models\Candidates_province_Model;
use App\Models\Candidates_en_Model;
use App\Models\Candidates_computer_Model;
use App\Models\Candidates_work_Model;
use App\Models\Candidates_skill_Model;
class CandidatesController extends La_Controller{
    
    public function index(Request $request){
        $id = $request->get;

        $catelog_candidates      = "";

        $province_candidates     = "";

        $skill_candidates        = "";

        if($id){
            $check              = Candidates_Model::find($id);
            if($check){
                $candidates_catelog   = Candidates_catelog_Model::where('candidates_id',$check['id'])->get();
                if($candidates_catelog){
                    foreach($candidates_catelog as $key => $val){
                        if($key > 0){
                            $catelog_candidates .= ','. $val['catelog_id'];
                        }else{
                            $catelog_candidates .= $val['catelog_id'];
                        }
                    }
                    $check['job_industry'] = $catelog_candidates;
                }
                $province_catelog   = Candidates_province_Model::where('candidates_id',$check['id'])->get();
                if($province_catelog){
                    foreach($province_catelog as $key_province => $val_province){
                        if($key_province > 0){
                            $province_candidates .= ','. $val_province['province_id'];
                        }else{
                            $province_candidates .= $val_province['province_id'];
                        }
                    }
                    $check['province_candidates'] = $province_candidates;
                }
                $data['candidates']= $check;

                $candidates_en   = Candidates_en_Model::where('candidates_id',$check['id'])->get();
                if($candidates_en){
                    $check['candidates_en'] = $candidates_en;
                }
                $candidates_computer   = Candidates_computer_Model::where('candidates_id',$check['id'])->get();
                if($candidates_computer){
                    $check['candidates_computer'] = $candidates_computer;
                }
                $candidates_work   = Candidates_work_Model::where('candidates_id',$check['id'])->get();
                if($candidates_work){
                    $check['candidates_work'] = $candidates_work;
                }

                $candidates_skill   = Candidates_skill_Model::where('candidates_id',$check['id'])->get();
                if($candidates_skill){
                    foreach($candidates_skill as $key_skill => $val_skill){
                        if($key_skill > 0){
                            $skill_candidates .= ','. $val_skill['skill_id'];
                        }else{
                            $skill_candidates .= $val_skill['skill_id'];
                        }
                    }
                    $check['skill_candidates'] = $skill_candidates;
                    $check['candidates_skill']  = $candidates_skill;
                }
                // dd($check['candidates_skill']);
            }
            $data['title']      ='Cập nhật hồ sơ ứng viên';
            $template           = 'cpanel.candidates.add';
        }else{
            $data['title']      ='Hồ sơ ứng viên';
            $template           = 'cpanel.candidates.index';
        }

        
        $data['active']     = 8;

        return view($template,isset($data)?$data:NULL); 
    }

    public function add(Request $request){
        $id     = $request->get;

        $data['title']      ='Thêm hồ sơ ứng viên';
        
        $data['active']     = 8;

        $template           = 'cpanel.candidates.add';

        return view($template,isset($data)?$data:NULL); 
    }
    
    
}