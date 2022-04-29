<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\La_Controller;
use Illuminate\Http\Request;

use App\Models\Area_regionModel;
use App\Models\Area_provinceModel;
use App\Models\Catelog_Model;
use App\Models\Finance_Model;
use App\Models\Finance_province_Model;
use App\Models\Finance_catelog_Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Finance extends La_Controller{
    public function giaodich_cic(){                  //giao diện giao dịch cic
        if (Auth::check()) {
            return view('user.giaodich_cic.giaodich_cic'); 
        }
        return redirect('login_user');
        
    }
    public function post_cic(){                     //giao diện post tin giao dịch cic
        if (Auth::check()) {
            return view('user.giaodich_cic.post_cic');
        }
        return redirect('login_user');
        
    }
    public function detail_post_cic()
    {
        return view('user.giaodich_cic.detail_post_cic'); // detail post_cic
    }
    public function data(){                         //giao diện mua bán data
        if (Auth::check()) {
            return view('user.mua_ban_data.muaban_data');
        }
        return redirect('login_user');
        
    }
    public function post_data(){                    //giao diện đăng tin mua bán data
        if (Auth::check()) {
            return view('user.mua_ban_data.post_data');
        }
        return redirect('login_user');
    }
    public function detail_post_data()
    {
        return view('user.mua_ban_data.detail_post_data'); // detail post_data
    }

    public function tinchovay(){                    //giao diện tin cho vay
        if (Auth::check()) {
            return view('user.tin_cho_vay.tinchovay');
        }
        return redirect('login_user');
        
    }
    public function post_tinchovay(){               //giao diện đăng tin cho vay
        if (Auth::check()) {
            return view('user.tin_cho_vay.post_tinchovay');
        }
        return redirect('login_user');
    }
    public function detail_tin_chovay()
    {
        return view('user.tin_cho_vay.detail_tin_chovay'); // detail tin cho vay
    }
    public function gop_y(){                         //giao diện góp ý
        if (Auth::check()) {
            return view('user.gop_y.gop_y');
        }
        return redirect('login_user');
        
    }
    public function post_create(){                    //giao diện đăng tin
        if (Auth::check()) {
            return view('user.post_create.post_create');
        }
        return redirect('login_user');  
    }


    public function index(Request $request){
        $catelog = $request['catelog'];
        $id      = $request['id'];
        if($id != ""){
        }else{
            $finance    = $this->getFinancebyCatelog($catelog);
            $template   = 'user.finance.index';
        }
        $data['financePage']        = $finance;

        $data['id_catelog']         = $catelog;

        $data['index']              = $this->getIndex();

        return view($template,isset($data)?$data:NULL); 
    }

    public function getFinancebyCatelog($id){
        $province_ = "";
        $finance_cate = Finance_catelog_Model::where('catelog_id',$id)->where('active',1)->where('delete',1)->limit(8)->get();
        if($finance_cate){
            $cate_name = Catelog_Model::find($id);
            foreach($finance_cate as $key => $val){
                $finance = Finance_Model::where('id',$val['finance_id'])->where('active',1)->where('delete',1)->first();
                if($finance){
                    $provnce_finance = Finance_province_Model::where('finance_id',$finance['id'])->get();
                    if($provnce_finance){
                        foreach($provnce_finance as $key_region => $val_region){
                            $area = Area_provinceModel::find($val_region['province_id']);
                            if($area){
                                $province_ .= $area['province'];
                            }
                        }
                    }
                }
                $finance_cate[$key]['province']  = $province_;
                $finance_cate[$key]['finance']   = $finance;
            }
            $finance_cate['cate_name']   = $cate_name['name'];
        }
        return $finance_cate;
    }
}