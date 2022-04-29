<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Area_regionModel;
use App\Models\Area_provinceModel;
use App\Models\Catelog_Model;

class SettingController extends La_Controller{
    
    public function province(Request $request){
        $id     = $request->get;
        $type   = $request->type;

        if($id){
            if($type == 1){
                $region = Area_regionModel::find($id);
                $name_  =  $region['region'];
                $ac_    =  "";
            }else{
                $province   = Area_provinceModel::find($id);
                $region     = Area_regionModel::find($province['region_id']);
                $name_      =  $province['province'];
                $ac_        =  $region['id'];
            }

            $data['id']         = $id;

            $data['region']     = Area_regionModel::where('active',1)->get();

            $data['name_']      = $name_;

            $data['ac_']        = $ac_;

            $data['title']      = 'Danh mục tỉnh thành';
        
            $data['active']     = 2;
    
            $template           = 'cpanel.setting.province.edit';
        }else{
            $data['title']      = 'Danh mục tỉnh thành';
        
            $data['active']     = 2;
    
            $template           = 'cpanel.setting.province.province';
        }


        return view($template,isset($data)?$data:NULL); 
    }

    public function provinceAdd(){

        $catelog = Catelog_Model::where('delete',0)->get();

        $data['title']      = 'Thêm tỉnh thành';
        
        $data['active']     = 2;

        $template           = 'cpanel.setting.province.add';

        return view($template,isset($data)?$data:NULL); 
    }

    public function catelog(Request $request){
        $id                 = $request->get;
        $id_    = "";
        $bc_    = "";
        $ac_    = "";
        if($id != null){
            $check          = Catelog_Model::find($id);
            if($check){
                $id_    = $check['id'];
                $data['name_']  = $check['name'];
                if($check['parent_id'] != null && $check['child_id'] != null){
                    $ac_    = $check['parent_id'];
                    $bc_    = $check['child_id'];
                }else{
                    if($check['parent_id'] != null){
                        $ac_    = $check['parent_id'];
                    }elseif($check['child_id'] != null){
                        $ac_    = $check['parent_id'];
                        $bc_    = $check['child_id'];
                    }
                }
            }
            $template           = 'cpanel.setting.catelog.edit';
        }else{
            $template           = 'cpanel.setting.catelog.catelog';
        }
        $catelog    = Catelog_Model::where('delete',1)->where('parent_id',Null)->get();
        if($catelog){
            foreach($catelog as $key => $val){
                $parent = Catelog_Model::where('parent_id',$val['id'])->where('delete',1)->where('child_id',Null)->get();
                $catelog[$key]['parent']   = $parent;
                if($parent){
                    foreach($parent as $key_parent => $val_parent){
                        $child = Catelog_Model::where('child_id',$val_parent['id'])->where('delete',1)->get();
                        $parent[$key_parent]['child']   = $child;
                    }
                }
            }
        }
        $data['id_']        = $id_;
        $data['ac_']        = $ac_;
        $data['bc_']        = $bc_;
        $data['catelog']    = $catelog;
        $data['active']     = 3;
        $data['title']      = 'Danh mục đăng tin';
        return view($template,isset($data)?$data:NULL); 
    }

    public function catelogAdd(){
        $data['title']      = 'Thêm danh mục đăng tin';
        
        $data['active']     = 3;

        $template           = 'cpanel.setting.catelog.add';

        return view($template,isset($data)?$data:NULL); 
    }
}