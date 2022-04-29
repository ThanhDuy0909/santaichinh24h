<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Http\Request;

use App\Models\Area_regionModel;
use App\Models\Area_provinceModel;
use App\Models\Catelog_Model;
use App\Models\Finance_Model;
use App\Models\Finance_province_Model;
use App\Models\Finance_catelog_Model;
use Carbon\Carbon;

class Finance extends La_Controller{
    public function addfinance(Request $request){
        $now                = strtotime(Carbon::now());
        $today              = strtotime(Carbon::today());
        $tomorrow           = strtotime(Carbon::tomorrow());
        $id_user            = $request['id_token'];
        $post_title         = $request['post_title'];
        $idCatelog_finance  = $request['idCatelog_finance'];
        $idprovince_finance = $request['idprovince_finance'];
        $content_post       = $request['content_post'];
        $contact_post       = $request['contact_post'];

        $data_ = [
            'title'             => $post_title,
            'content'           => $content_post,
            'contact'           => $contact_post,
            'create_by_id'      => $id_user,
            'active'            => 0,
            'created_at'        => $now,
        ];

        $check_limits = Finance_Model::where('create_by_id',$id_user)->where('created_at','>=',$today)->where('created_at','<',$tomorrow)->count();
        if($check_limits > 2){
            return $this->ApiError(['mess' => 'Bạn đã đạt số lượng bài đăng cho phép trong ngày là 3 bài đăng']);
        }else{
            $id = Finance_Model::insertGetId($data_);
            $exp_catelog = explode(',',$idCatelog_finance);
            if(count($exp_catelog) > 0){
                foreach($exp_catelog as $key_catelog => $val_catelog){
                    $catelog_ = [
                        'catelog_id' => $val_catelog,
                        'finance_id' => $id,
                        'active'     => 0,
                        'created_at' => $now,
                    ];
                    Finance_catelog_Model::insert($catelog_ );
                }
            }
    
            $exp_province = explode(',',$idprovince_finance);
            if(count($exp_province) > 0){
                foreach($exp_province as $key_province => $val_province){
                    $province_ = [
                        'province_id' => $val_province,
                        'finance_id' => $id,
                        'active'     => 0,
                        'created_at' => $now,
                    ];
                    Finance_province_Model::insert($province_ );
                }
            }
            return $this->ApiSusscce(['mess' => 'Thêm thành công']);
        }
    }

    public function findfinance(Request $request){
        $id     = $request['id'];
        $check  = Finance_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ']);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }

    public function financeUpdate(Request $request){
        $today              = strtotime(Carbon::now());
        $id_finance         = $request['id_finance'];
        $id_user            = $request['id_token'];
        $post_title         = $request['post_title'];
        $idCatelog_finance  = $request['idCatelog_finance'];
        $idprovince_finance = $request['idprovince_finance'];
        $content_post       = $request['content_post'];
        $contact_post       = $request['contact_post'];


        $data_ = [
            'title'             => $post_title,
            'content'           => $content_post,
            'contact'           => $contact_post,
            'create_by_id'      => $id_user,
            'updated_at'        => $today,
        ];
        $finance = Finance_Model::find($id_finance);

        Finance_catelog_Model::where('finance_id',$id_finance)->delete();
        $exp_catelog = explode(',',$idCatelog_finance);
        if(count($exp_catelog) > 0){
            foreach($exp_catelog as $key_catelog => $val_catelog){
                $catelog_ = [
                    'catelog_id' => $val_catelog,
                    'finance_id' => $id_finance,
                    'active'     => $finance['active'],
                    'created_at' => $today,
                ];
                Finance_catelog_Model::insert($catelog_ );
            }
        }

        Finance_province_Model::where('finance_id',$id_finance)->delete();
        $exp_province = explode(',',$idprovince_finance);
        if(count($exp_province) > 0){
            foreach($exp_province as $key_province => $val_province){
                $province_ = [
                    'province_id' => $val_province,
                    'finance_id' => $id_finance,
                    'active'     => $finance['active'],
                    'created_at' => $today,
                ];
                Finance_province_Model::insert($province_ );
            }
        }
        Finance_Model::where('id',$id_finance)->update($data_);
        return $this->ApiSusscce(['mess' => 'Cập nhật thành công']);
    }

    public function changeStatusFinance(Request $request){
        $today              = strtotime(Carbon::now());
        $parent             = $request['parent'];
        $id                 = $request['id'];

        if($parent == ""){
            $check  = Catelog_Model::find($id);
            if($check){
                if($check['active']){
                    $check->active = false;
                    $catelog_finance =  Finance_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = false;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    }   
                }else{
                    $check->active = true;
                    $catelog_finance =  Finance_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = true;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    }   
                }
                $check->updated_at = $today;
                $check->update();
            }
        }else{
            $check  = Finance_catelog_Model::where('finance_id',$id)->first();
            if($check){
                if($check['active']){
                    $check->active = false;
                    Finance_Model::where('id',$check['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    Finance_catelog_Model::where('finance_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    Finance_province_Model::where('finance_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                }else{
                    $check->active = true;
                    Finance_Model::where('id',$check['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    Finance_catelog_Model::where('finance_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    Finance_province_Model::where('finance_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                }
            }
        }
        return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
    }

    public function deleteFinance(Request $request){
        $today              = strtotime(Carbon::now());
        $id                 = $request['id'];

        $check  = Finance_Model::find($id);
        if($check){
            Finance_catelog_Model::where('finance_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            Finance_province_Model::where('finance_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
            $check->delete      = false;
            $check->updated_at  = $today;
            $check->update();
        }
        
        return $this->ApiSusscce(['mess' => 'Xóa thành công']);
    }
}