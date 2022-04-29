<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Catelog_Model;
use App\Models\Account_Model;
use App\Models\Recruit_Model;
use App\Models\Recruit_catelog_Model;
use App\Models\Recruit_province_Model;
use App\Models\Area_provinceModel;
class Recruit extends La_Controller{
    public function index(Request $request){
        $id         = $request['id'];
        $job        = $request['job'];
        $region     = $request['region'];
        $province   = $request['province'];

        if($id != ""){
            $recruit                    = $this->getRecruitbyId($id);
            $template                   = 'user.recruit.detail';
        }else{
            if($job != ""){
                if($region != ""){
                    $recruit = $this->getRecruitbyRegionJob($job,$region);
                }else{
                    $recruit = $this->getRecruitbyProvinceJob($job,$province);
                }
            }else{
                if($region != ""){
                    $recruit = $this->getRecruitbyRegion($region);
                }else{
                    $recruit = $this->getRecruitbyProvince($province);
                }
            }
            $template                   = 'user.recruit.index';
        }

        $data['recruitPage']        = $recruit;

        $data['index']              = $this->getIndex();

        $data['idSelect']           = $id;

        $data['jobSelect']          = $job;

        $data['regionSelect']       = $region;

        $data['provinceSelect']     = $province;

        return view($template,isset($data)?$data:NULL); 
        
    }
    public function getRecruitbyId($va){
        $province_ = "";
        $recruit = Recruit_Model::where('id',$va)->where('active',1)->where('delete',1)->first();
        if($recruit){
            $region = Recruit_province_Model::where('recruit_id',$recruit['id'])->where('active',1)->where('delete',1)->get();
            if($region){
                foreach($region as $key_region => $val_region){
                    $area = Area_provinceModel::find($val_region['province_id']);
                    if($va != 0){
                        if($area){
                            if($area['region_id'] == $va){
                                if($key_region > 0){
                                    $province_ .= ' , '. $area['province'];
                                }else{
                                    $province_ .= $area['province'];
                                }
                            }
                        }
                    }else{
                        if($area){
                            if($key_region > 0){
                                $province_ .= ' , '. $area['province'];
                            }else{
                                $province_ .= $area['province'];
                            }
                        }
                    }
                }
            }
            $recruit['province']  = $province_;
            $recruit['region']    = $region;
        }
        return $recruit;
    }

    public function getRecruitbyRegion($va){
        $province_ = "";
        $recruit = Recruit_Model::where('active',1)->where('delete',1)->get();
        if($recruit){
            foreach($recruit as $key => $val){
                $region = Recruit_province_Model::where('recruit_id',$val['id'])->where('active',1)->where('delete',1)->get();
                if($region){
                    foreach($region as $key_region => $val_region){
                        $area = Area_provinceModel::find($val_region['province_id']);
                        if($va != 0){
                            if($area){
                                if($area['region_id'] == $va){
                                    if($key_region > 0){
                                        $province_ .= ' , '. $area['province'];
                                    }else{
                                        $province_ .= $area['province'];
                                    }
                                }
                            }
                        }else{
                            if($area){
                                if($key_region > 0){
                                    $province_ .= ' , '. $area['province'];
                                }else{
                                    $province_ .= $area['province'];
                                }
                            }
                        }
                    }
                }
                $recruit[$key]['province']  = $province_;
                $recruit[$key]['region']    = $region;
            }
        }

        return $recruit;
    }

    public function getRecruitbyProvince($va){
        $province_ = "";
        $recruit = Recruit_Model::where('active',1)->where('delete',1)->get();
        if($recruit){
            foreach($recruit as $key => $val){
                $region = Recruit_province_Model::where('province_id',$va)->where('recruit_id',$val['id'])->where('active',1)->where('delete',1)->get();
                if($region){
                    foreach($region as $key_region => $val_region){
                        $area = Area_provinceModel::find($val_region['province_id']);
                        if($area){
                            $province_ .= $area['province'];
                        }
                    }
                }
                $recruit[$key]['province']  = $province_;
                $recruit[$key]['region']    = $region;
            }
        }

        return $recruit;
    }
}