<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Http\Request;


use App\Models\Area_regionModel;
use App\Models\Area_provinceModel;
use App\Models\Finance_Model;
use App\Models\Finance_province_Model;
use App\Models\Candidates_province_Model;
use Carbon\Carbon;
class Area extends La_Controller{

    public function getArea(){
        $region = Area_regionModel::where('delete',1)->get();
        if($region){
            foreach($region as $key => $val){
                $province = Area_provinceModel::where('region_id',$val['id'])->where('delete',1)->get();
                $region[$key]['province']   = $province;
            }
        }
        return $this->ApiSusscce($region);
    }

    public function changeStatusProvince(Request $request){
        $today = strtotime(Carbon::now());
        $id = $request['id'];
        $check = Area_provinceModel::find($id);
        if($check){
            if($check['active']){
                $check->active = false;
                $province_finance =  Finance_province_Model::where('province_id',$check['id'])->where('delete',1)->first();
                if($province_finance){
                    $province_finance->active        = false;
                    $province_finance->updated_at    = $today;
                    $province_finance->update();   
                }  

                $province_candidates =  Candidates_province_Model::where('province_id',$check['id'])->where('delete',1)->first();
                if($province_candidates){
                    $province_candidates->active        = false;
                    $province_candidates->updated_at    = $today;
                    $province_candidates->update();   
                }  
            }else{
                $check->active = true;
                $province_finance =  Finance_province_Model::where('province_id',$check['id'])->where('delete',1)->first();
                if($province_finance){
                    $province_finance->active        = true;
                    $province_finance->updated_at    = $today;
                    $province_finance->update();   
                }  
                $province_candidates =  Candidates_province_Model::where('province_id',$check['id'])->where('delete',1)->first();
                if($province_candidates){
                    $province_candidates->active        = true;
                    $province_candidates->updated_at    = $today;
                    $province_candidates->update();   
                }  
            }
            $check->updated_at  = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
        }else{
            return $this->ApiError(['mess' => 'Chuyển trạng thái không thành công']);
        }
    }

    public function changeStatusRegion(Request $request){
        $today = strtotime(Carbon::now());
        $id = $request['id'];
        $check = Area_regionModel::find($id);
        if($check){
            if($check['active']){
                $check->active = false;
                $province = Area_provinceModel::where('region_id',$check['id'])->get();
                if($province){
                    foreach($province as $key_province => $val_province){
                        Area_provinceModel::where('region_id',$val_province['id'])->update(['active' => false,'updated_at'   => $today]);
                        $province_finance =  Finance_province_Model::where('province_id',$val_province['id'])->where('delete',1)->first();
                        if($province_finance){
                            $province_finance->active        = false;
                            $province_finance->updated_at    = $today;
                            $province_finance->update();   
                        } 
                        $province_candidates =  Candidates_province_Model::where('province_id',$val_province['id'])->where('delete',1)->first();
                        if($province_candidates){
                            $province_candidates->active        = false;
                            $province_candidates->updated_at    = $today;
                            $province_candidates->update();   
                        }   
                    }
                }
            }else{
                $check->active = true;
                $province = Area_provinceModel::where('region_id',$check['id'])->get();
                if($province){
                    foreach($province as $key_province => $val_province){
                        Area_provinceModel::where('region_id',$val_province['id'])->update(['active' => true,'updated_at'   => $today]);
                        $province_finance =  Finance_province_Model::where('province_id',$val_province['id'])->where('delete',1)->first();
                        if($province_finance){
                            $province_finance->active        = true;
                            $province_finance->updated_at    = $today;
                            $province_finance->update();
                        }  
                        $province_candidates =  Candidates_province_Model::where('province_id',$val_province['id'])->where('delete',1)->first();
                        if($province_candidates){
                            $province_candidates->active        = true;
                            $province_candidates->updated_at    = $today;
                            $province_candidates->update();   
                        } 
                    }
                }
            }
            $check->updated_at  = $today;
            $check->update();

            return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
        }else{
            return $this->ApiError(['mess' => 'Chuyển trạng thái không thành công']);
        }
    }

    public function areaAdd(Request $requests){
        $today          = strtotime(Carbon::now());
        $region_id      = $requests['region_id'];
        $province_name  = $requests['province_name'];

        $data = [
            'region_id'     => $region_id,
            'province'      => $province_name,
            'active'        => 1,
            'created_at'    => $today,
        ];

        if($region_id > 0){
            Area_provinceModel::insert($data);
        }else{
            Area_regionModel::insert(['region' =>  $province_name,'created_at'    => $today]);
        }
        return $this->ApiSusscce(['mess' => 'Thêm thành công']);
    }

    public function findArea(Request $request){
        $id     = $request['id'];
        $main   = $request['main'];
        if($main != ""){
            $check = Area_provinceModel::find($id);
        }else{
            $check  = Area_regionModel::find($id);
        }
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ' , 'val' => $check]);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }

    public function areaUpdate(Request $requests){
        $today          = strtotime(Carbon::now());
        $id             = $requests['id'];
        $region_id      = $requests['region_id'];
        $province_name  = $requests['province_name'];

        if($region_id > 0){
            $province   =  Area_provinceModel::find($id);
            if($province){
                $province->region_id    = $region_id;
                $province->province     = $province_name;
                $province->updated_at   = $today;
                $province->update();
            }
        }else{
            $region     =  Area_regionModel::find($id);
            if($region){
                $region->region     = $province_name;
                $region->updated_at = $today;
                $region->update();
            }
        }
        return $this->ApiSusscce(['mess' => 'Chỉnh sửa thành công']);
    }


    public function deleteProvince(Request $request){
        $today  = strtotime(Carbon::now());
        $id     = $request['id'];
        $check = Area_provinceModel::find($id);
        if($check){
            $province_finance =  Finance_province_Model::where('province_id',$check['id'])->first();
            if($province_finance){
                $province_finance->delete        = false;
                $province_finance->updated_at    = $today;
                $province_finance->update();   
            }  
            $province_candidates =  Candidates_province_Model::where('province_id',$check['id'])->first();
            if($province_candidates){
                $province_candidates->delete        = false;
                $province_candidates->updated_at    = $today;
                $province_candidates->update();   
            } 
            
            $check->delete = false;
            $check->updated_at = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Xóa thành công']);
        }else{
            return $this->ApiError(['mess' => 'Xóa thất bại']);
        }
    }

    public function deleteRegion(Request $request){
        $today  = strtotime(Carbon::now());
        $id     = $request['id'];
        $check = Area_regionModel::find($id);
        if($check){
            $province = Area_provinceModel::where('region_id',$check['id'])->get();
            if($province){
                foreach($province as $key_province => $val_province){
                    Area_provinceModel::where('region_id',$val_province['id'])->update(['delete' => false,'updated_at'   => $today]);
                    $province_finance =  Finance_province_Model::where('province_id',$val_province['id'])->first();
                    if($province_finance){
                        $province_finance->delete        = false;
                        $province_finance->updated_at    = $today;
                        $province_finance->update();
                    }  
                    $province_candidates =  Candidates_province_Model::where('province_id',$val_province['id'])->first();
                    if($province_candidates){
                        $province_candidates->delete        = false;
                        $province_candidates->updated_at    = $today;
                        $province_candidates->update();   
                    } 
                }
            }



            $check->delete      = false;
            $check->updated_at  = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Xóa thành công']);
        }else{
            return $this->ApiError(['mess' => 'Xóa thất bại']);
        }
    }

}