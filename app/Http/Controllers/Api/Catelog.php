<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Http\Request;

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
use Carbon\Carbon;
class Catelog extends La_Controller{

    public function getCatelog(){
        $catelog    = Catelog_Model::where('delete',1)->where('parent_id',Null)->get();
        $total      = 0;
        if($catelog){
            $to_parent = 0;
            foreach($catelog as $key => $val){
                $parent = Catelog_Model::where('parent_id',$val['id'])->where('delete',1)->where('child_id',Null)->get();
                $catelog[$key]['parent']   = $parent;
                $to_parent  = count($parent);
                $to_child   = 0 ;
                $to_post    = 0; 
                if($parent){
                    foreach($parent as $key_parent => $val_parent){
                        $child = Catelog_Model::where('child_id',$val_parent['id'])
                        ->where('delete',1)
                        ->get();
                        if(count($child) > 0){
                            $to_child                       += count($child) + 1;
                            foreach($child as $key_child => $val_child){
                                $post = Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                if($post){
                                    foreach($post as $key_post => $val_post){
                                        $post_= Finance_Model::find($val_post['finance_id']);            
                                        if($post_){
                                            $user = Account_Model::find($post_['create_by_id']);
                                            $post[$key_post]['id']          =  $post_['id'];
                                            $post[$key_post]['title']       =  $post_['title'];
                                            $post[$key_post]['content']     =  $post_['content'];
                                            $post[$key_post]['contact']     =  $post_['contact'];
                                            $post[$key_post]['created_at']  =  $post_['created_at'];
                                            $post[$key_post]['username']    = $user['is_author'] ? 'Administrator' :$user['name'];
                                        }
                                    }                              
                                }
                                $child[$key_child]['post']   = $post;
    
                                
                                $news = News_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                if($news){
                                    foreach($news as $key_news => $val_news){
                                        $news_= News_Model::find($val_news['news_id']);            
                                        if($news_){
                                            $user = Account_Model::find($news_['create_by_id']);
                                            $news[$key_news]['id']              =  $news_['id'];
                                            $news[$key_news]['title']           =  $news_['title'];
                                            $news[$key_news]['content_short']   =  $news_['content_short'];
                                            $news[$key_news]['content']         =  $news_['content'];
                                            $news[$key_news]['created_at']      =  $news_['created_at'];
                                            $news[$key_news]['username']        = $user['is_author'] ? 'Administrator' :$user['name'];
                                        }
                                    }                              
                                }
                                $child[$key_child]['news']   = $news;

                                $recruit = Recruit_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                if($recruit){
                                    foreach($recruit as $key_recruit => $val_recruit){
                                        $recruit_= Recruit_Model::find($val_recruit['recruit_id']);            
                                        if($recruit_){
                                            $user = Account_Model::find($recruit_['create_by_id']);
                                            $recruit[$key_recruit]['id']          =  $recruit_['id'];
                                            $recruit[$key_recruit]['title']       =  $recruit_['title'];
                                            $recruit[$key_recruit]['created_at']  =  $recruit_['created_at'];
                                            $recruit[$key_recruit]['username']    = $user['is_author'] ? 'Administrator' :$user['name'];
                                        }
                                    }                              
                                }
                                $child[$key_child]['recruit']   = $recruit;
                            }
                        }else{
                            $to_child                       += count($child);
                        }
                        $parent[$key_parent]['child']   = $child;
                        $parent[$key_parent]['count']   = count($child);
                    }
                }
                $total = $to_parent  +  $to_child;
                $catelog[$key]['count'] = $total;
            }
        }
        return $this->ApiSusscce($catelog);
    }

    public function catelogAdd(Request $request){
        $today          = strtotime(Carbon::now());
        $id             = $request['catelog_id'];
        $catelog_name   = $request['catelog_name'];
        $check          = Catelog_Model::find($id);
        $catelog_parent = NULL;
        $catelog_child  = NULL;
        if($check){
            if($check['parent_id'] == ""){
                $catelog_parent = $check['id'];
            }else{
                $catelog_parent = $check['parent_id'];
                $catelog_child  = $check['id'];
            }
        }
        $data = [
            'name'          => $catelog_name,
            'parent_id'     => $catelog_parent,
            'child_id'      => $catelog_child,
            'created_at'    => $today,
        ];
        Catelog_Model::insert($data);
        return $this->ApiSusscce(['mess' => 'Thêm thành công']);
    }

    public function findcatelog(Request $request){
        $id     = $request['id'];
        $check  = Catelog_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ']);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }

    public function catelogUpdate(Request $request){
        $today          = strtotime(Carbon::now());
        $id             = $request['id'];
        $catelog_id     = $request['catelog_id'];
        $catelog_name   = $request['catelog_name'];

        $parent         = null;
        $child          = null;
        $check  = Catelog_Model::find($catelog_id);
        if($check){
            if($check['parent_id'] != null){
                $parent = $check['parent_id'];
                $child  = $check['id'];
            }else{
                $parent = $check['id'];
            }
        }

        $data_              = Catelog_Model::find($id);
        $data_->name        = $catelog_name;
        $data_->parent_id   = $parent;
        $data_->child_id    = $child;
        $data_->updated_at  = $today;
        $data_->update();

        return $this->ApiSusscce(['mess' => 'Chỉnh sửa thành công']);
    }

    public function deleteCatelog(Request $request){
        $today              = strtotime(Carbon::now());
        $id  = $request['id'];
        $check  = Catelog_Model::find($id);
        if($check){
            if($check['child_id'] != ""){
                $id = $check['id'];
                Catelog_Model::where('id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
                $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->get();
                if($catelog_news){
                    foreach($catelog_news as $key => $val){
                        News_Model::where('id',$val['news_id'])->update(['delete' => false, 'updated_at' => $today]);
                        News_catelog_Model::where('id',$val['id'])->update(['delete' => false, 'updated_at' => $today]);
                    }
                }
                $catelog_finance =  Finance_catelog_Model::where('catelog_id',$check['id'])->first();
                if($catelog_finance){
                    $catelog_finance->delete        = false;
                    $catelog_finance->updated_at    = $today;
                    $catelog_finance->update();
                    Finance_Model::where('id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                    Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                }  
                $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$check['id'])->first();
                if($catelog_recruit){
                    $catelog_recruit->delete        = false;
                    $catelog_recruit->updated_at    = $today;
                    $catelog_recruit->update();
                    Recruit_Model::where('id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                    Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                }   
                
                $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$check['id'])->first();
                if($catelog_candidates){
                    $catelog_candidates->delete        = false;
                    $catelog_candidates->updated_at    = $today;
                    $catelog_candidates->update();
                    Candidates_Model::where('id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                    Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                } 
            }else{
                if($check['parent_id'] == ""){
                    Catelog_Model::where('parent_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
                    $parent =  Catelog_Model::where('parent_id',$check['id'])->get();
                    if($parent){
                        foreach($parent as $key_parent => $val_parent){
                            Catelog_Model::where('child_id',$val_parent['id'])->update(['delete' => false,'updated_at'   => $today]);
                            $child = Catelog_Model::where('child_id',$val_parent['id'])->get();
                            if($child){
                                foreach($child as $key_child => $val_child){
                                    $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->get();
                                    if($catelog_news){
                                        foreach($catelog_news as $key => $val){
                                            News_Model::where('id',$val['news_id'])->update(['delete' => false, 'updated_at' => $today]);
                                            News_catelog_Model::where('id',$val['id'])->update(['delete' => false, 'updated_at' => $today]);
                                        }
                                    }
                                    
                                    $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->first();
                                    if($catelog_finance){
                                        $catelog_finance->delete        = false;
                                        $catelog_finance->updated_at    = $today;
                                        $catelog_finance->update();
                                        Finance_Model::where('id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                                        Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                                    }       
                                    $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->first();
                                    if($catelog_recruit){
                                        $catelog_recruit->delete        = false;
                                        $catelog_recruit->updated_at    = $today;
                                        $catelog_recruit->update();
                                        Recruit_Model::where('id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                                        Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                                    }  
                                    
                                    $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$val_child['id'])->first();
                                    if($catelog_candidates){
                                        $catelog_candidates->delete        = false;
                                        $catelog_candidates->updated_at    = $today;
                                        $catelog_candidates->update();
                                        Candidates_Model::where('id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                                        Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                                    } 
                                }
                            }
                        }         
                    }
                }else{
                    Catelog_Model::where('child_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
                    $child = Catelog_Model::where('child_id',$check['id'])->get();
                    if($child){
                        foreach($child as $key_child => $val_child){ 
                            $catelog_news = News_catelog_Model::where('catelog_id',$val_child['id'])->get();
                            if($catelog_news){
                                foreach($catelog_news as $key => $val){
                                    News_Model::where('id',$val['news_id'])->update(['delete' => false, 'updated_at' => $today]);
                                    News_catelog_Model::where('id',$val['id'])->update(['delete' => false, 'updated_at' => $today]);
                                }
                            }
                            
                            $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->first();
                            if($catelog_finance){
                                $catelog_finance->delete        = false;
                                $catelog_finance->updated_at    = $today;
                                $catelog_finance->update();
                                Finance_Model::where('id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                                Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->update(['delete' => false,'updated_at'   => $today]);
                            }  
                            $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->first();
                            if($catelog_recruit){
                                $catelog_recruit->delete        = false;
                                $catelog_recruit->updated_at    = $today;
                                $catelog_recruit->update();
                                Recruit_Model::where('id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                                Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->update(['delete' => false,'updated_at'   => $today]);
                            } 

                            $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$val_child['id'])->first();
                            if($catelog_candidates){
                                $catelog_candidates->delete        = false;
                                $catelog_candidates->updated_at    = $today;
                                $catelog_candidates->update();
                                Candidates_Model::where('id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                                Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->update(['delete' => false,'updated_at'   => $today]);
                            } 
                        }
                    } 
                }
            }
            $check->delete = 0;
            $check->updated_at = $today;
            $check->update();
            return $this->ApiSusscce(['mess' => 'Xóa thành công']);
        }else{
            return $this->ApiError(['mess' => 'Xóa thất bại']);
        }
    }

    public function changeStatusCatelog(Request $request){
        $today              = strtotime(Carbon::now());
        $parent = $request['parent'];
        $child  = $request['child'];
        $id  = $request['id'];

        $check  = Catelog_Model::find($id);
        if($check){
            if($check['active']){
                $check->active = false;
                if($check['child_id'] != ""){
                    $id = $check['id'];
                    Catelog_Model::where('id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
  
                    $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->get();
                    if($catelog_news){
                        foreach($catelog_news as $key => $val){
                            News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                            News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                        }
                    }
                    $catelog_finance =  Finance_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = false;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    }    
                    $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_recruit){
                        $catelog_recruit->active        = false;
                        $catelog_recruit->updated_at    = $today;
                        $catelog_recruit->update();
                        Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    }  
                    $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_candidates){
                        $catelog_candidates->active        = false;
                        $catelog_candidates->updated_at    = $today;
                        $catelog_candidates->update();
                        Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                    }    
                }else{
                    if($check['parent_id'] == ""){
                        Catelog_Model::where('parent_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        $parent =  Catelog_Model::where('parent_id',$check['id'])->where('delete',1)->get();
                        if($parent){
                            foreach($parent as $key_parent => $val_parent){
                                Catelog_Model::where('child_id',$val_parent['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                $child = Catelog_Model::where('child_id',$val_parent['id'])->where('delete',1)->get();
                                if($child){
                                    foreach($child as $key_child => $val_child){
                        
                                        $catelog_news = News_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                        if($catelog_news){
                                            foreach($catelog_news as $key => $val){
                                                News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                                                News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                                            }
                                        }
                                        $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_finance){
                                            $catelog_finance->active        = false;
                                            $catelog_finance->updated_at    = $today;
                                            $catelog_finance->update();
                                            Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                            Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                        }  
                                        $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_recruit){
                                            $catelog_recruit->active        = false;
                                            $catelog_recruit->updated_at    = $today;
                                            $catelog_recruit->update();
                                            Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                            Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                        }    
                                        $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_candidates){
                                            $catelog_candidates->active        = false;
                                            $catelog_candidates->updated_at    = $today;
                                            $catelog_candidates->update();
                                            Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                            Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                        }                                   
                                    }
                                }
                            }         
                        }
                    }else{
                        Catelog_Model::where('child_id',$check['id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                        $child = Catelog_Model::where('child_id',$check['id'])->where('delete',1)->get();
                        if($child){
                            foreach($child as $key_child => $val_child){
  
                                $catelog_news = News_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                if($catelog_news){
                                    foreach($catelog_news as $key => $val){
                                        News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                                        News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                                    }
                                }
                                $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                if($catelog_finance){
                                    $catelog_finance->active        = false;
                                    $catelog_finance->updated_at    = $today;
                                    $catelog_finance->update();
                                    Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                    Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                }  
                                $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                if($catelog_recruit){
                                    $catelog_recruit->active        = false;
                                    $catelog_recruit->updated_at    = $today;
                                    $catelog_recruit->update();
                                    Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                    Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                }  
                                $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                                if($catelog_candidates){
                                    $catelog_candidates->active        = false;
                                    $catelog_candidates->updated_at    = $today;
                                    $catelog_candidates->update();
                                    Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                    Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                                }  
                            }
                        } 
                    }
                }
            }else{
                $check->active = true;
                if($check['child_id'] != ""){
                    $id = $check['id'];
                    Catelog_Model::where('id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->get();
                    if($catelog_news){
                        foreach($catelog_news as $key => $val){
                            News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                            News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                        }
                    }
                    
                    $catelog_finance =  Finance_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_finance){
                        $catelog_finance->active        = true;
                        $catelog_finance->updated_at    = $today;
                        $catelog_finance->update();
                        Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    }   
                    $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_recruit){
                        $catelog_recruit->active        = true;
                        $catelog_recruit->updated_at    = $today;
                        $catelog_recruit->update();
                        Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    }  
                    $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->first();
                    if($catelog_candidates){
                        $catelog_candidates->active        = true;
                        $catelog_candidates->updated_at    = $today;
                        $catelog_candidates->update();
                        Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                    } 
                }else{
                    if($check['parent_id'] == ""){
                        Catelog_Model::where('parent_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        $parent =  Catelog_Model::where('parent_id',$check['id'])->where('delete',1)->get();
                        if($parent){
                            foreach($parent as $key_parent => $val_parent){
                                Catelog_Model::where('child_id',$val_parent['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                $child = Catelog_Model::where('child_id',$val_parent['id'])->where('delete',1)->get();
                                if($child){
                                    foreach($child as $key_child => $val_child){
                    
                                        $catelog_news = News_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                        if($catelog_news){
                                            foreach($catelog_news as $key => $val){
                                                News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                                                News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                                            }
                                        }
                                        $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_finance){
                                            $catelog_finance->active        = true;
                                            $catelog_finance->updated_at    = $today;
                                            $catelog_finance->update();
                                            Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                            Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                        }  
                                        $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_recruit){
                                            $catelog_recruit->active        = true;
                                            $catelog_recruit->updated_at    = $today;
                                            $catelog_recruit->update();
                                            Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                            Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                        } 
                                        $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                        if($catelog_candidates){
                                            $catelog_candidates->active        = true;
                                            $catelog_candidates->updated_at    = $today;
                                            $catelog_candidates->update();
                                            Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                            Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                        } 
                                    }
                                }
                            }         
                        }
                    }else{
                        Catelog_Model::where('child_id',$check['id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                        $child = Catelog_Model::where('child_id',$check['id'])->where('delete',1)->get();
                        if($child){
                            foreach($child as $key_child => $val_child){
                                $catelog_news = News_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->get();
                                if($catelog_news){
                                    foreach($catelog_news as $key => $val){
                                        News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                                        News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                                    }
                                }
                                $catelog_finance =  Finance_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                if($catelog_finance){
                                    $catelog_finance->active        = true;
                                    $catelog_finance->updated_at    = $today;
                                    $catelog_finance->update();
                                    Finance_Model::where('id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                    Finance_province_Model::where('finance_id',$catelog_finance['finance_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                }  
                                $catelog_recruit =  Recruit_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                if($catelog_recruit){
                                    $catelog_recruit->active        = true;
                                    $catelog_recruit->updated_at    = $today;
                                    $catelog_recruit->update();
                                    Recruit_Model::where('id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                    Recruit_province_Model::where('recruit_id',$catelog_recruit['recruit_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                } 
                                $catelog_candidates =  Candidates_catelog_Model::where('catelog_id',$val_child['id'])->where('delete',1)->first();
                                if($catelog_candidates){
                                    $catelog_candidates->active        = true;
                                    $catelog_candidates->updated_at    = $today;
                                    $catelog_candidates->update();
                                    Candidates_Model::where('id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                    Candidates_province_Model::where('candidates_id',$catelog_candidates['candidates_id'])->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                                } 
                            }
                        } 
                    }
                }
            }
            $check->updated_at = $today;
            $check->update();
        }
        return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
    }
}