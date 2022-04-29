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
use App\Models\Candidates_Model;
use App\Models\Candidates_catelog_Model;
use App\Models\Candidates_province_Model;
use App\Models\Candidates_en_Model;
use App\Models\Candidates_computer_Model;
use App\Models\Candidates_work_Model;
use App\Models\Candidates_skill_Model;
class Candidates extends La_Controller{

    public function getCandidates(){
        $candidates = Candidates_Model::where('delete',1)->get();
        if($candidates){
            foreach($candidates as $key => $val){
                if($val['gender_candidates'] == 1){
                    $gender_ = 'nam';
                }else if($val['gender_candidates'] == 2){
                    $gender_ = 'nữ';
                }else{
                    $gender_ = 'khác';
                }
                $candidates[$key]['gender']     = $gender_;
            }
        }
        return $this->ApiSusscce($candidates);
    }

    public function addCandidates(Request $request){
        $now                        = strtotime(Carbon::now());
        $today                      = strtotime(Carbon::today());
        $tomorrow                   = strtotime(Carbon::tomorrow());
        $id_token                   = $request['id_token'];
        $province_candidates        =  $request['province_candidates'];
        $job_industry               =  $request['job_industry'];
        $full_nameCandidates        =  $request['full_nameCandidates'];
        $gender_candidates          =  $request['gender_candidates'];
        $marital_candidates         =  $request['marital_candidates'];
        $birthday_candidates        =  $request['birthday_candidates'];
        $phone_candidates           =  $request['phone_candidates'];
        $email_candidates           =  $request['email_candidates'];
        $address_candidates         =  $request['address_candidates'];
        $school_candidates          =  $request['school_candidates'];
        $education_level            =  $request['education_level'];
        $month_graduate             =  $request['month_graduate'];
        $year_graduate              =  $request['year_graduate'];
        $language                   =  $request['language'];
        $tdLanguage                 =  $request['tdLanguage'];
        $computer                   =  $request['computer'];
        $tdcomputer                 =  $request['tdcomputer'];
        $otherDegrees_candidates    =  $request['otherDegrees_candidates'];

        $workExperience_candidates  =  $request['workExperience_candidates'];
        $title_work                 =  $request['title_work'];
        $ranks_work                 =  $request['ranks_work'];
        $company_work               =  $request['company_work'];
        $form_month                 =  $request['form_month'];
        $form_year                  =  $request['form_year'];
        $to_month                   =  $request['to_month'];
        $to_year                    =  $request['to_year'];
        $content_work               =  $request['content_work'];
        $skill_candidates           = $request['skill_candidates'];
        $achievements_candidates    = $request['achievements_candidates'];

        $dir_img                = '/assets/candidates/';
        $dir_file               = '/assets/cv/';
        $check_limits = Candidates_Model::where('create_by_id',$id_token)->where('created_at','>=',$today)->where('created_at','<',$tomorrow)->count();
        if($check_limits > 2){
            return $this->ApiError(['mess' => 'Bạn đã đạt số lượng bài đăng cho phép trong ngày là 3 bài đăng']);
        }else{
            if(!isset($request['emptyFileImg'])){
                if (!empty($_FILES['fileImg'])) {
                    $tempFile   = $_FILES['fileImg']['tmp_name'];
                    $imgname    = $_FILES['fileImg']['name'];
                    $imgext     = pathinfo($imgname, PATHINFO_EXTENSION);
                    $imghash    = 'Main'.md5(md5($imgname));
                }else{
                    $form_imgname  = $request['fileImg'];
                    $exp           = explode(" ",$form_imgname);
                    $imgname       = $exp[0];
                    $imghash       = $exp[1];
                    $imgext        = $exp[2];
                    $tempFile      = $exp[3];
                }
                $targetPath = getcwd() . $dir_img;
                $targetFile = $targetPath . $imghash.'.'.$imgext;
                move_uploaded_file($tempFile, $targetFile);
            }else{
                $imgname   = '';
                $imgext       = '';
                $imghash       = '';
            }

            if(!isset($request['emptyFileCv'])){
                if (!empty($_FILES['fileCv'])) {
                    $tempFile   = $_FILES['fileCv']['tmp_name'];
                    $filename    = $_FILES['fileCv']['name'];
                    $fileext     = pathinfo($filename, PATHINFO_EXTENSION);
                    $filehash    = 'Main'.md5(md5($filename));
                }else{
                    $form_filename  = $request['fileCv'];
                    $exp           = explode(" ",$form_filename);
                    $filename       = $exp[0];
                    $filehash       = $exp[1];
                    $fileext        = $exp[2];
                    $tempFile      = $exp[3];
                }
                $targetPath = getcwd() . $dir_file;
                $targetFile = $targetPath . $filehash.'.'.$fileext;
                move_uploaded_file($tempFile, $targetFile);
            }else{
                $filename   = '';
                $fileext       = '';
                $filehash       = '';
            }

            $data_ = [
                'full_nameCandidates'       => $full_nameCandidates,
                'imgname'                   => $imgname,
                'imghash'                   => $imghash,
                'imgext'                    => $imgext,
                'filename'                  => $filename,
                'filehash'                  => $filehash,
                'fileext'                   => $fileext,
                'gender_candidates'         => $gender_candidates,
                'marital_candidates'        => $marital_candidates,
                'birthday_candidates'       => $birthday_candidates,
                'phone_candidates'          => $phone_candidates,
                'email_candidates'          => $email_candidates,
                'address_candidates'        => $address_candidates,
                'school_candidates'         => $school_candidates,
                'education_level'           => $education_level,
                'graduate_candidates'       => $month_graduate. '-'. $year_graduate,
                'otherDegrees_candidates'   => $otherDegrees_candidates,
                'workExperience_candidates' => $workExperience_candidates,
                'achievements_candidates'   => $achievements_candidates,
                'create_by_id'              => $id_token,
                'active'                    => 0,
                'created_at'                => $now,
            ];

            $id = Candidates_Model::insertGetId($data_);
            $exp_catelog = explode(',',$job_industry);
            if(count($exp_catelog) > 0){
                foreach($exp_catelog as $key_catelog => $val_catelog){
                    $catelog_ = [
                        'catelog_id' => $val_catelog,
                        'candidates_id' => $id,
                        'created_at' => $now,
                    ];
                    Candidates_catelog_Model::insert($catelog_ );
                }
            }

            if($language != "" && $tdLanguage != ""){
                $exp_lang   = explode(',',$language);
                $exp_tdlang = explode(',',$tdLanguage);
                for($l = 0 ; $l < count($exp_lang); $l++){
                    if($exp_lang[$l] != "" && $exp_tdlang[$l] != ""){
                        $language_ = [
                            'candidates_id' => $id,
                            'language_id' => $exp_lang[$l],
                            'level_id' => $exp_tdlang[$l],
                        ];
                        Candidates_en_Model::insert($language_);
                    }
                }
            }

            if($computer != "" && $tdcomputer != ""){
                $exp_computer       = explode(',',$computer);
                $exp_tdlcomputer    = explode(',',$tdcomputer);
                for($l = 0 ; $l < count($exp_computer); $l++){
                    if($exp_computer[$l] != "" && $exp_tdlcomputer[$l] != ""){
                        $computer_ = [
                            'candidates_id' => $id,
                            'computer_id' => $exp_computer[$l],
                            'level_id' => $exp_tdlcomputer[$l],
                        ];
                        Candidates_computer_Model::insert($computer_);
                    }
                }
            }

            $province_ = [
                'province_id' => $province_candidates,
                'candidates_id' => $id,
                'created_at' => $now,
            ];
            Candidates_province_Model::insert($province_ );

            if($workExperience_candidates != 1){
                if(
                    $title_work != "" && 
                    $ranks_work != "" && 
                    $company_work != "" && 
                    $form_month != "" && 
                    $form_year != "" &&
                    $to_month != "" &&
                    $to_year != "" &&
                    $content_work != ""
                ){
                    $exp_title_work         = explode(',',$title_work);
                    $exp_ranks_work         = explode(',',$ranks_work);
                    $exp_company_work       = explode(',',$company_work);
                    $exp_form_month         = explode(',',$form_month);
                    $exp_form_year          = explode(',',$form_year);
                    $exp_to_month           = explode(',',$to_month);
                    $exp_to_year            = explode(',',$to_year);
                    $exp_content_work       = explode(',',$content_work);
                    for($l = 0 ; $l < count($exp_title_work); $l++){
                        if(
                            $exp_title_work[$l] != "" && 
                            $exp_ranks_work[$l] != "" &&
                            $exp_company_work[$l] != "" && 
                            $exp_form_month[$l] != "" &&
                            $exp_form_year[$l] != "" && 
                            $exp_to_month[$l] != "" &&
                            $exp_to_year[$l] != "" && 
                            $exp_content_work[$l] != "" 
                            ){
                            $work_ = [
                                'candidates_id' => $id,
                                'title_work'    => $exp_title_work[$l],
                                'ranks_work'    => $exp_ranks_work[$l],
                                'company_work'  => $exp_company_work[$l],
                                'form_work'     => $exp_form_month[$l].'-'.$exp_form_year[$l],
                                'to_work'       => $exp_to_month[$l].'-'.$exp_to_year[$l],
                                'content_work'  => $exp_content_work[$l],
                            ];
                            Candidates_work_Model::insert($work_);
                        }
                    }
                }
            }

            if($skill_candidates != ""){
                $exp_skill = explode(',',$skill_candidates);
                for($l = 0 ; $l < count($exp_skill); $l++){
                    $skill_ = [
                        'candidates_id' => $id,
                        'skill_id' => $exp_skill[$l],
                    ];
                    Candidates_skill_Model::insert($skill_);
                }
            }

            return $this->ApiSusscce(['mess' => 'Thêm thành công']);
        }
    }

    public function findCandidates(Request $request){
        $id     = $request['id'];
        $check  = Candidates_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ']);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }



    public function updateCandidates(Request $request){
        $now                        = strtotime(Carbon::now());
        $id                         = $request['id_candidates'];
        $province_candidates        =  $request['province_candidates'];
        $job_industry               =  $request['job_industry'];
        $full_nameCandidates        =  $request['full_nameCandidates'];
        $gender_candidates          =  $request['gender_candidates'];
        $marital_candidates         =  $request['marital_candidates'];
        $birthday_candidates        =  $request['birthday_candidates'];
        $phone_candidates           =  $request['phone_candidates'];
        $email_candidates           =  $request['email_candidates'];
        $address_candidates         =  $request['address_candidates'];
        $school_candidates          =  $request['school_candidates'];
        $education_level            =  $request['education_level'];
        $month_graduate             =  $request['month_graduate'];
        $year_graduate              =  $request['year_graduate'];
        $language                   =  $request['language'];
        $tdLanguage                 =  $request['tdLanguage'];
        $computer                   =  $request['computer'];
        $tdcomputer                 =  $request['tdcomputer'];
        $otherDegrees_candidates    =  $request['otherDegrees_candidates'];

        $workExperience_candidates  =  $request['workExperience_candidates'];
        $title_work                 =  $request['title_work'];
        $ranks_work                 =  $request['ranks_work'];
        $company_work               =  $request['company_work'];
        $form_month                 =  $request['form_month'];
        $form_year                  =  $request['form_year'];
        $to_month                   =  $request['to_month'];
        $to_year                    =  $request['to_year'];
        $content_work               =  $request['content_work'];
        $skill_candidates           = $request['skill_candidates'];
        $achievements_candidates    = $request['achievements_candidates'];

        $dir_img                = '/assets/candidates/';
        $dir_file               = '/assets/cv/';
        if(!isset($request['emptyFileImg'])){
            if (!empty($_FILES['fileImg'])) {
                $tempFile   = $_FILES['fileImg']['tmp_name'];
                $imgname    = $_FILES['fileImg']['name'];
                $imgext     = pathinfo($imgname, PATHINFO_EXTENSION);
                $imghash    = 'Main'.md5(md5($imgname));
            }else{
                $form_imgname  = $request['fileImg'];
                $exp           = explode(" ",$form_imgname);
                $imgname       = $exp[0];
                $imghash       = $exp[1];
                $imgext        = $exp[2];
                $tempFile      = isset($exp[3])?$exp[3] : "";
            }
            $targetPath = getcwd() . $dir_img;
            $targetFile = $targetPath . $imghash.'.'.$imgext;
            move_uploaded_file($tempFile, $targetFile);
        }else{
            $imgname   = '';
            $imgext       = '';
            $imghash       = '';
        }
        if(!isset($request['emptyFileCv'])){
            if (!empty($_FILES['fileCv'])) {
                $tempFile   = $_FILES['fileCv']['tmp_name'];
                $filename    = $_FILES['fileCv']['name'];
                $fileext     = pathinfo($filename, PATHINFO_EXTENSION);
                $filehash    = 'Main'.md5(md5($filename));
            }else{
                $form_filename  = $request['fileCv'];
                $exp            = explode(" ",$form_filename);
                $filename       = $exp[0];
                $filehash       = $exp[1];
                $fileext        = $exp[2];
                $tempFile       = isset($exp[3])?$exp[3] : "";
            }
            $targetPath = getcwd() . $dir_file;
            $targetFile = $targetPath . $filehash.'.'.$fileext;
            move_uploaded_file($tempFile, $targetFile);
        }else{
            $filename   = '';
            $fileext       = '';
            $filehash       = '';
        }
        $data_ = [
            'full_nameCandidates'       => $full_nameCandidates,
            'imgname'                   => $imgname,
            'imghash'                   => $imghash,
            'imgext'                    => $imgext,
            'filename'                  => $filename,
            'filehash'                  => $filehash,
            'fileext'                   => $fileext,
            'gender_candidates'         => $gender_candidates,
            'marital_candidates'        => $marital_candidates,
            'birthday_candidates'       => $birthday_candidates,
            'phone_candidates'          => $phone_candidates,
            'email_candidates'          => $email_candidates,
            'address_candidates'        => $address_candidates,
            'school_candidates'         => $school_candidates,
            'education_level'           => $education_level,
            'graduate_candidates'       => $month_graduate. '-'. $year_graduate,
            'otherDegrees_candidates'   => $otherDegrees_candidates,
            'workExperience_candidates' => $workExperience_candidates,
            'achievements_candidates'   => $achievements_candidates,
            'updated_at'                => $now,
        ];

        $candidates  = Candidates_Model::find($id);
        Candidates_catelog_Model::where('candidates_id',$id)->delete();
        $exp_catelog = explode(',',$job_industry);
        if(count($exp_catelog) > 0){
            foreach($exp_catelog as $key_catelog => $val_catelog){
                $catelog_ = [
                    'catelog_id' => $val_catelog,
                    'candidates_id' => $id,
                    'created_at' => $now,
                ];
                Candidates_catelog_Model::insert($catelog_ );
            }
        }

        Candidates_en_Model::where('candidates_id',$id)->delete();
        if($language != "" && $tdLanguage != ""){
            $exp_lang   = explode(',',$language);
            $exp_tdlang = explode(',',$tdLanguage);
            for($l = 0 ; $l < count($exp_lang); $l++){
                if($exp_lang[$l] != "" && $exp_tdlang[$l] != ""){
                    $language_ = [
                        'candidates_id' => $id,
                        'language_id' => $exp_lang[$l],
                        'level_id' => $exp_tdlang[$l],
                    ];
                    Candidates_en_Model::insert($language_);
                }
            }
        }

        Candidates_computer_Model::where('candidates_id',$id)->delete();
        if($computer != "" && $tdcomputer != ""){
            $exp_computer       = explode(',',$computer);
            $exp_tdlcomputer    = explode(',',$tdcomputer);
            for($l = 0 ; $l < count($exp_computer); $l++){
                if($exp_computer[$l] != "" && $exp_tdlcomputer[$l] != ""){
                    $computer_ = [
                        'candidates_id' => $id,
                        'computer_id' => $exp_computer[$l],
                        'level_id' => $exp_tdlcomputer[$l],
                    ];
                    Candidates_computer_Model::insert($computer_);
                }
            }
        }

        Candidates_province_Model::where('candidates_id',$id)->delete();
        $province_ = [
            'province_id' => $province_candidates,
            'candidates_id' => $id,
            'created_at' => $now,
        ];
        Candidates_province_Model::insert($province_ );

        Candidates_work_Model::where('candidates_id',$id)->delete();
        if($workExperience_candidates != 1){
            if(
                $title_work != "" && 
                $ranks_work != "" && 
                $company_work != "" && 
                $form_month != "" && 
                $form_year != "" &&
                $to_month != "" &&
                $to_year != "" &&
                $content_work != ""
            ){
                $exp_title_work         = explode(',',$title_work);
                $exp_ranks_work         = explode(',',$ranks_work);
                $exp_company_work       = explode(',',$company_work);
                $exp_form_month         = explode(',',$form_month);
                $exp_form_year          = explode(',',$form_year);
                $exp_to_month           = explode(',',$to_month);
                $exp_to_year            = explode(',',$to_year);
                $exp_content_work       = explode(',',$content_work);
                for($l = 0 ; $l < count($exp_title_work); $l++){
                    if(
                        $exp_title_work[$l] != "" && 
                        $exp_ranks_work[$l] != "" &&
                        $exp_company_work[$l] != "" && 
                        $exp_form_month[$l] != "" &&
                        $exp_form_year[$l] != "" && 
                        $exp_to_month[$l] != "" &&
                        $exp_to_year[$l] != "" && 
                        $exp_content_work[$l] != "" 
                        ){
                        $work_ = [
                            'candidates_id' => $id,
                            'title_work'    => $exp_title_work[$l],
                            'ranks_work'    => $exp_ranks_work[$l],
                            'company_work'  => $exp_company_work[$l],
                            'form_work'     => $exp_form_month[$l].'-'.$exp_form_year[$l],
                            'to_work'       => $exp_to_month[$l].'-'.$exp_to_year[$l],
                            'content_work'  => $exp_content_work[$l],
                        ];
                        Candidates_work_Model::insert($work_);
                    }
                }
            }
        }


        Candidates_skill_Model::where('candidates_id',$id)->delete();
        if($skill_candidates != ""){
            $exp_skill = explode(',',$skill_candidates);
            for($l = 0 ; $l < count($exp_skill); $l++){
                $skill_ = [
                    'candidates_id' => $id,
                    'skill_id' => $exp_skill[$l],
                ];
                Candidates_skill_Model::insert($skill_);
            }
        }

        Candidates_Model::where('id',$id)->update($data_);
        return $this->ApiSusscce(['mess' => 'Cập nhật thành công']);
    }

    public function changeStatusCandidates(Request $request){
        $now                    = strtotime(Carbon::now());
        $id = $request['id'];
        $check = Candidates_Model::find($id);
        if($check){
            if($check['active']){
                $check->active = false;
            }else{
                $check->active = true;
            }
            $check->updated_at = $now;
            $check->update();
        }
        return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
    }

    public function deleteCandidates(Request $request){
        $today              = strtotime(Carbon::now());
        $id                 = $request['id'];

        $check  = Candidates_Model::find($id);
        if($check){
            Candidates_catelog_Model::where('candidates_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            Candidates_province_Model::where('candidates_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            $check->delete      = false;
            $check->updated_at  = $today;
            $check->update();
        }
        
        return $this->ApiSusscce(['mess' => 'Xóa thành công']);
    }

}