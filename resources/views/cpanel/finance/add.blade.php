@extends('cpanel.index')
@section('title', $title)
@section('content')
<input type="hidden" class="active_finance" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
	<input type="hidden" class="catelog_idMain" value="{{isset($id_tc) && $id_tc != '' ? $id_tc : ''}}">
    <input type="hidden" class="id_finance" value="{{isset($finance) && $finance['id'] != '' ? $finance['id'] : ''}}">
    <input type="hidden" class="idCatelog_finance" value="{{isset($finance) && $finance['catelog_item_id'] != '' ? $finance['catelog_item_id'] : ''}}">
    <input type="hidden" class="idprovince_finance" value="{{isset($finance) && $finance['province_id'] != '' ? $finance['province_id'] : ''}}">
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title titlePost"></li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12 btnFinance"></div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-title">Nội Dung</div>

                                <div class="form-group">
                                    <label for="inputTitle">Tiêu đề <span class="text-danger">*</span></label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tiêu đề bản tin"></i>
                                    <div>
                                        <input value="{{isset($finance) && $finance['title'] != '' ? $finance['title'] : ''}}" name="post_title" class="post_title form-control" type="text" id="inputTitle" class="form-control auto-change-slug" data-bv-field="post_title"> </div> <small class="help-block" data-bv-validator="notEmpty" data-bv-for="post_title" data-bv-result="NOT_VALIDATED" style="display: none;">Tiêu đề bản tin không được bỏ trống</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="post_title" data-bv-result="NOT_VALIDATED" style="display: none;">Tiêu đề bản tin phải lớn hơn 2 ký tự</small></div>
                                <div class="form-group">
                                    <label for="category">Danh mục tin <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn danh mục chứa tin đăng"></i></label>
                                    <div>
                                        <select class="getCatelogFullbyType catelog_idPost" id="catelog_idPost"  multiple="multiple"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_province">Tỉnh thành <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn danh mục tỉnh thành chứa tin đăng"></i></label>
                                    <div>
                                        <select class="getAreaFull province_idPost" id="province_idPost" multiple="multiple"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="post_detail">Nội dung chi tiết <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Nội dung tin đăng"></i></label>
                                    <div>
                                    <textarea class="col-xs-12" rows="5" id="content_post" name="">{{isset($finance) && $finance['content'] != '' ? $finance['content'] : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_info">Thông tin liên hệ <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Thông tin liên hệ"></i></label>
                                    <div>
                                        <textarea class="col-xs-12" rows="5" id="contact_post" name="">{{isset($finance) && $finance['contact'] != '' ? $finance['contact'] : ''}}</textarea>
                                    </div>
                                </div>
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