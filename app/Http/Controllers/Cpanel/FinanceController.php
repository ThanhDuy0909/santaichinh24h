<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Finance_Model;
use App\Models\Finance_catelog_Model;
use App\Models\Finance_province_Model;

class FinanceController extends La_Controller{
    
    public function index(Request $request){
        $id = $request->get;

        $post = $request->id;

        $catelog_finanace        = "";

        $province_finanace        = "";

        if($post){
            $check              = Finance_Model::find($post);
            if($check){
                $finanace_catelog   = Finance_catelog_Model::where('finance_id',$check['id'])->get();
                if($finanace_catelog){
                    foreach($finanace_catelog as $key => $val){
                        if($key > 0){
                            $catelog_finanace .= ','. $val['catelog_id'];
                        }else{
                            $catelog_finanace .= $val['catelog_id'];
                        }
                    }
                    $check['catelog_item_id'] = $catelog_finanace;
                }
                $province_catelog   = Finance_province_Model::where('finance_id',$check['id'])->get();
                if($province_catelog){
                    foreach($province_catelog as $key_province => $val_province){
                        if($key_province > 0){
                            $province_finanace .= ','. $val_province['province_id'];
                        }else{
                            $province_finanace .= $val_province['province_id'];
                        }
                    }
                    $check['province_id'] = $province_finanace;
                }
                $data['finance']= $check;
            }
            $data['title']      ='Cập nhật tin tài chính';
            $template           = 'cpanel.finance.add';
        }else{
            $data['title']      ='Tin tài chính';
            $template           = 'cpanel.finance.index';
        }

        
        $data['active']     = 4;

        $data['id_tc']      = $id;

        return view($template,isset($data)?$data:NULL); 
    }

    public function add(Request $request){
        $id     = $request->get;

        $data['title']      ='Thêm tin tài chính';
        
        $data['active']     = 4;

        $data['id_tc']      = $id;

        $template           = 'cpanel.finance.add';

        return view($template,isset($data)?$data:NULL); 
    }
    
    
}