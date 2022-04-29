<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Models\Catelog_Model;
use App\Models\Finance_Model;
use App\Models\Account_Model;
use App\Models\News_Model;
use App\Models\Finance_province_Model;
use App\Models\Finance_catelog_Model;
use App\Models\News_catelog_Model;

use App\Models\Recruit_Model;
use App\Models\Recruit_catelog_Model;
use App\Models\Recruit_province_Model;

use App\Models\Candidates_Model;
use App\Models\Candidates_catelog_Model;
use App\Models\Candidates_province_Model;

use App\Models\Area_regionModel;
use App\Models\Area_provinceModel;
class La_Controller extends Controller{


    protected function getIndex(){
        $data['finance']        = $this->getFinance();
        $data['region']         = $this->getRegion();
        $data['candidates']     = $this->getCandidates();
        $data['job']            = $this->getJob();
        $data['news']           = $this->getNews();
        return $data;
     }

    protected function getRegion(){
        $region = Area_regionModel::where('active',1)->where('delete',1)->get();
        $active = 0;
        if($region){
            foreach($region as $key_region => $val_region){
                $province = Area_provinceModel::where('region_id',$val_region['id'])->where('active',1)->where('delete',1)->get();
                if($province){
                    foreach($province as $key_province => $val_province){
                        $recruit_province = Recruit_province_Model::where('province_id',$val_province['id'])->where('active',1)->where('delete',1)->get();
                        if($recruit_province){
                            foreach($recruit_province as $key_recruit_province => $val_recruit_province){
                                $recruit = Recruit_Model::where('id',$val_recruit_province['recruit_id'])->limit(8)->get();
                                $recruit_province[$key_recruit_province]['recruit'] = $recruit;
                            }
                        }
                        $province[$key_province]['recruit_province'] = $recruit_province;
                    }
                }
                $region[$key_region]['province'] = $province;
            }
        }
        return $region;
    }

    protected function getFinance(){
        $province_ = "";
        $catelog    = Catelog_Model::where('id',1)->where('delete',1)->where('active',1)->where('parent_id',Null)->get();
        if($catelog){
            foreach($catelog as $key => $val){
                $parent = Catelog_Model::where('parent_id',$val['id'])->where('active',1)->where('delete',1)->where('child_id',Null)->get();
                $catelog[$key]['parent']   = $parent;
                if($parent){
                    foreach($parent as $key_parent => $val_parent){
                        $child = Catelog_Model::where('child_id',$val_parent['id'])
                        ->where('active',1)
                        ->where('delete',1)
                        ->get();
                        if(count($child) > 0){
                            foreach($child as $key_child => $val_child){
                                $post = Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('active',1)->where('delete',1)->get();
                                if($post){
                                    foreach($post as $key_post => $val_post){
                                        $post_= Finance_Model::find($val_post['finance_id']);
                                        if($post_){
                                            $province_catelog   = Finance_province_Model::where('finance_id',$post_['id'])->get();
                                            if($province_catelog){
                                                foreach($province_catelog as $key_province => $val_province){
                                                    $area = Area_provinceModel::find($val_province['province_id']);
                                                    if($key_province > 0){
                                                        $province_ .= ' , '. $area['province'];
                                                    }else{
                                                        $province_ .= $area['province'];
                                                    }
                                                }
                                            }
                                            $post_['province'] = $province_;
                                        }
                                        $post[$key_post]['postSub']   = $post_;              
                                    }                     
                                }
                                $child[$key_child]['post']   = $post;
                            }
                        }
                        $parent[$key_parent]['child']   = $child;
                    }
                }
            }
        }

        return $catelog;
    }

    protected function getCandidates(){
        $candidates = Candidates_Model::where('active',1)->where('delete',1)->limit(8)->get();
        if($candidates){
            foreach($candidates as $key_andidates => $val_candidates){
                $user = Account_Model::find($val_candidates['create_by_id']);
                $candidates[$key_andidates]['username']    = $user['is_author'] ? 'Administrator' :$user['name'];

                $candidates_province = Candidates_province_Model::where('candidates_id',$val_candidates['id'])->first();
                if($candidates_province){
                    $province = Area_provinceModel::find($candidates_province['province_id']);
                    $candidates[$key_andidates]['province'] = $province['province'];
                }
            }
        }
        return $candidates;
    }

    protected function getJob(){
        $job  = "";
        $parent = Catelog_Model::where('parent_id',5)->where('child_id',Null)->where('active',1)->where('delete',1)->get();
            if(count($parent) > 0){
                $job = Catelog_Model::where('child_id',$parent[0]['id'])
                        ->where('active',1)
                        ->where('delete',1)
                        ->get();
            }
            return $job;
    }

    protected function getNews(){
        $news = News_Model::where('active',1)->where('delete',1)->limit(8)->get();
        return $news;
    }


    public function ApiSusscce($data){
        return response()->json(['status' => true,'data' => $data],200);
    }

    public function ApiError($data){
        return response()->json(['status' => false,'data' => $data],200);
    }

}