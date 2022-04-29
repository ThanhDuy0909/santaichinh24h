<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\La_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use App\Models\Account_Model;
use App\Models\News_Model;
use App\Models\Catelog_Model;
use App\Models\News_catelog_Model;
class News extends La_Controller{

    public function addNews(Request $request){
        $now                = strtotime(Carbon::now());
        $today              = strtotime(Carbon::today());
        $tomorrow           = strtotime(Carbon::tomorrow());
        $id_token           = $request['id_token'];
        $news_title         = $request['news_title'];
        $idCatelog_news     = $request['idCatelog_news'];
        $news_detail        = $request['news_detail'];
        $news_desc          = $request['news_desc'];
        
        $dir_upload         = '/assets/news/';

        $check_limits = News_Model::where('create_by_id',$id_token)->where('created_at','>=',$today)->where('created_at','<',$tomorrow)->count();
        if($check_limits > 2){
            return $this->ApiError(['mess' => 'Bạn đã đạt số lượng bài đăng cho phép trong ngày là 3 bài đăng']);
        }else{
            if(!isset($request['emptyFile'])){
                if (!empty($_FILES['file'])) {
                    $tempFile   = $_FILES['file']['tmp_name'];
                    $fileName   = $_FILES['file']['name'];
                    $type       = pathinfo($fileName, PATHINFO_EXTENSION);
                    $hash       = 'Main'.md5(md5($fileName));
                }else{
                    $form_filename  = $request['file'];
                    $exp            = explode(" ",$form_filename);
                    $fileName       = $exp[0];
                    $hash           = $exp[1];
                    $type           = $exp[2];
                    $tempFile       = $exp[3];
                }
                $targetPath = getcwd() . $dir_upload;
                $targetFile = $targetPath . $hash.'.'.$type;
                move_uploaded_file($tempFile, $targetFile);
            }else{
                $fileName   = '';
                $type       = '';
                $hash       = '';
            }
    
            $data_ = [
                'title'             => $news_title,
                'content_short'     => $news_detail,
                'content'           => $news_desc,
                'filename'          => $fileName,
                'hash'              => $hash,
                'ext'               => $type,
                'create_by_id'      => $id_token,
                'active'            => 0,
                'created_at'        => $now,
            ];
    
            $id  = News_Model::insert($data_);
    
            $exp_catelog = explode(',',$idCatelog_news);
            if(count($exp_catelog) > 0){
                foreach($exp_catelog as $key_catelog => $val_catelog){
                    $catelog_ = [
                        'catelog_id'    => $val_catelog,
                        'news_id'       => $id,
                        'active'        => 0,
                        'created_at'    => $now,
                    ];
                    News_catelog_Model::insert($catelog_ );
                }
            }
    
            return $this->ApiSusscce(['mess' => 'Thêm thành công']);   
        }   
    }
  
    public function findnews(Request $request){
        $id     = $request['id'];
        $check  = News_Model::find($id);
        
        if($check){
            return $this->ApiSusscce(['mess' => 'Dữ liệu hợp lệ']);
        }else{
            return $this->ApiError(['mess' => 'Dữ liệu không hợp lệ']);
        }
    }

    public function newsUpdate(Request $request){
        $today              = strtotime(Carbon::now());
        $id_news            = $request['id_news'];
        $news_title         = $request['news_title'];
        $idCatelog_news     = $request['idCatelog_news'];
        $news_detail        = $request['news_detail'];
        $news_desc          = $request['news_desc'];
        
        $dir_upload         = '/assets/news/';


        $tempFile = "";
        if(!isset($request['emptyFile'])){
            if (!empty($_FILES['file'])) {
                $tempFile   = $_FILES['file']['tmp_name'];
                $fileName   = $_FILES['file']['name'];
                $type       = pathinfo($fileName, PATHINFO_EXTENSION);
                $hash       = 'Main'.md5(md5($fileName));
            }else{
                $form_filename  = $request['file'];
                $exp            = explode(" ",$form_filename);
                $fileName       = $exp[0];
                $hash           = $exp[1];
                $type           = $exp[2];
                // $tempFile       = $exp[3];
            }
            $targetPath = getcwd() . $dir_upload;
            $targetFile = $targetPath . $hash.'.'.$type;
            move_uploaded_file($tempFile, $targetFile);
        }else{
            $fileName   = '';
            $type       = '';
            $hash       = '';
        }

        $data_ = [
            'title'             => $news_title,
            'content_short'     => $news_detail,
            'content'           => $news_desc,
            'filename'          => $fileName,
            'hash'              => $hash,
            'ext'               => $type,
            'updated_at'        => $today,
        ];
        $news = News_Model::find($id_news);

        News_catelog_Model::where('news_id',$id_news)->delete();
        $exp_catelog = explode(',',$idCatelog_news);
        if(count($exp_catelog) > 0){
            foreach($exp_catelog as $key_catelog => $val_catelog){
                $catelog_ = [
                    'catelog_id'    => $val_catelog,
                    'news_id'       => $id_news,
                    'active'        => $news['active'],
                    'created_at'    => $today,
                ];
                News_catelog_Model::insert($catelog_ );
            }
        }

        News_Model::where('id',$id_news)->update($data_);
        
        return $this->ApiSusscce(['mess' => 'Thêm thành công']);      
    }



    public function changeStatusNews(Request $request){
        $today              = strtotime(Carbon::now());
        $parent             = $request['parent'];
        $id                 = $request['id'];

        if($parent == ""){
            $check  = Catelog_Model::find($id);
            if($check){
                if($check['active']){
                    $check->active = false;
                    $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->get();
                    if($catelog_news){
                        foreach($catelog_news as $key => $val){
                            News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                            News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                        }
                    }
                }else{
                    $check->active = true;
                                     $catelog_news = News_catelog_Model::where('catelog_id',$check['id'])->where('delete',1)->get();
                    if($catelog_news){
                        foreach($catelog_news as $key => $val){
                            News_Model::where('id',$val['news_id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                            News_catelog_Model::where('id',$val['id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                        }
                    }
                }
                $check->updated_at = $today;
                $check->update();
            }
        }else{
            $check  = News_catelog_Model::where('news_id',$id)->first();
            if($check){
                if($check['active']){
                    $check->active = false;
                    News_Model::where('id',$check['news_id'])->where('delete',1)->update(['active' => false, 'updated_at' => $today]);
                    News_catelog_Model::where('news_id',$id)->where('delete',1)->update(['active' => false,'updated_at'   => $today]);
                }else{
                    $check->active = true;
                    News_Model::where('id',$check['news_id'])->where('delete',1)->update(['active' => true, 'updated_at' => $today]);
                    News_catelog_Model::where('news_id',$id)->where('delete',1)->update(['active' => true,'updated_at'   => $today]);
                }
            }
        }
        return $this->ApiSusscce(['mess' => 'Chuyển trạng thái thành công','active' => $check['active']]);
    }


    public function deleteNews(Request $request){
        $today              = strtotime(Carbon::now());
        $id  = $request['id'];

        $check  = News_Model::find($id);
        if($check){
            News_Model::where('id',$id)->update(['delete' => false,'updated_at'   => $today]);
            News_catelog_Model::where('news_id',$check['id'])->update(['delete' => false,'updated_at'   => $today]);
        }
        
        return $this->ApiSusscce(['mess' => 'Xóa thành công']);
    }
}