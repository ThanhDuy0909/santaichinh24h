@extends('cpanel.index')
@section('title', $title)
@section('content')

@php 
$name_img = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==';
if(isset($news)){
	if(strpos($news['filename'], ' ') == true ){
        $exp_file = explode(" ",$news['filename']);
        $filename = $exp_file['0'].''.$exp_file['1'];
    }else {
       $filename = $news['filename'];
    }

	$upload_file =  $filename.' '.$news['hash'].' '.$news['ext'];
	$name_img 	 = asset('assets/news/'.$news['hash'].'.'.$news['ext']);
}
@endphp

<input type="hidden" class="active_news" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
	<input type="hidden" class="catelog_idMain" value="{{isset($id_tc) && $id_tc != '' ? $id_tc : ''}}">
    <input type="hidden" class="id_news" value="{{isset($news) && $news['id'] != '' ? $news['id'] : ''}}">
    <input type="hidden" class="idCatelog_news" value="{{isset($news) && $news['catelog_item_id'] != '' ? $news['catelog_item_id'] : ''}}">
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title titleNews"></li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12 btnNews"></div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
	<div class="row">
		<div class="col-lg-8 col-sm-8 col-xs-12">
			<div class="widget radius-bordered">
				<div class="widget-body widget-body-white">
					<div class="form-title">Nội Dung</div>
					<div class="form-group">
						<label for="inputTitle">Tiêu đề <span class="text-danger">*</span></label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tiêu đề bản tin"></i>
						<div>
							<input value="{{isset($news) && $news['title'] != '' ? $news['title'] : ''}}" name="news_title" type="text" id="inputTitle" class="form-control news_title"> 
                        </div>    
                    </div>
                    <div class="form-group">
						<label for="news_detail">Nội dung chi tiết <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Nội dung tin tức"></i></label>
						<div>
							<textarea id="news_detail" class="col-xs-12 news_detail"  rows="5">{{isset($news) && $news['content'] != '' ? $news['content'] : ''}}</textarea>
						</div> 
					</div>
					<div class="form-group">
						<label for="news_desc">Mô tả ngắn <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Nội dung mô tả ngắn của tin tức"></i></label>
						<div>
							<textarea id="news_desc" class="news_desc">{{isset($news) && $news['content_short'] != '' ? $news['content_short'] : ''}}</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-xs-12">
			<div class="widget radius-bordered">
				<div class="widget-body widget-body-white">
					<div class="form-title">Phân Loại</div>
					<div class="form-group">
						<label for="parent_category">Danh mục tin <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn danh mục chứa tin tức"></i></label>
						<div>
							<select class="getCatelogNews" multiple="multiple"></select>
						</div>
					</div>
				</div>
			</div>
			<div class="widget radius-bordered">
				<div class="widget-body widget-body-white">
					<div class="form-title">Hình ảnh</div>
					<div class="form-group">
						<label for="image_src">Ảnh chính <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title=""></i></label>
						<div> 
							<img 
							id="image_fileNews" 
							style="height:180px;" 
							class="img-thumbnail" 
							alt="150x150" 
							src="{{$name_img }}"
							>
						</div>
					<div class="form-group">
						<div>
                            <input class="upload_fileNews" type="hidden" value="{{isset($news) ? $upload_file : ''}}">
                            <input type="file" class="chosse_imgNews btn btn-default" style="margin-bottom: 5px;">
							<button class="btn btn-defaul remove_imgNews">Bỏ chọn </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- /Page Body -->
</div>
@endsection