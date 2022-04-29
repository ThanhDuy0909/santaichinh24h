<?php 

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\News_Model;
use App\Models\News_catelog_Model;
class NewsController extends La_Controller{
    
    public function index(Request $request){
        $id = $request->get;

        $news = $request->id;

        $catelog_news        = "";

        if($news){
            $check              = News_Model::find($news);
            if($check){
                $catelog_item_id   = News_catelog_Model::where('news_id',$check['id'])->get();
                if($catelog_item_id){
                    foreach($catelog_item_id as $key => $val){
                        if($key > 0){
                            $catelog_news .= ','. $val['catelog_id'];
                        }else{
                            $catelog_news .= $val['catelog_id'];
                        }
                    }
                    $check['catelog_item_id'] = $catelog_news;
                }
                $data['news']= $check;
            }
            $data['title']      ='Cập nhật tin tức';
            $template           = 'cpanel.news.add';
        }else{
            $data['title']      ='Tin tức';
            $template           = 'cpanel.news.index';
        }

        
        $data['active']     = 6;

        $data['id_tc']      = $id;

        return view($template,isset($data)?$data:NULL); 
    }

    public function add(Request $request){
        $id     = $request->get;

        $data['title']      ='Thêm tin tức';
        
        $data['active']     = 6;

        $data['id_tc']      = $id;

        $template           = 'cpanel.news.add';

        return view($template,isset($data)?$data:NULL); 
    }
    
    
}