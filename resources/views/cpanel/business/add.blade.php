@extends('cpanel.index')
@section('title', $title)
@section('content')
@php 
$name_img = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==';
if(isset($business)){
	if(strpos($business['filename'], ' ') == true ){
        $exp_file = explode(" ",$business['filename']);
        $filename = $exp_file['0'].''.$exp_file['1'];
    }else {
       $filename = $business['filename'];
    }

	$upload_file =  $filename.' '.$business['hash'].' '.$business['ext'];
	$name_img 	 = asset('assets/business/'.$business['hash'].'.'.$business['ext']);
}
@endphp
<input class="jobRecruit" value="{{isset($business) && $business != '' ? $business['business_industry'] : ''}}">
<input class="business_id" value="{{isset($business) && $business != '' ? $business['id'] : ''}}">
<input type="hidden" class="business_city" value="{{isset($business) && $business != '' ? $business['id'] : ''}}">
<input class="business_id" value="{{isset($business) && $business != '' ? $business['id'] : ''}}">
<input class="business_id" value="{{isset($business) && $business != '' ? $business['id'] : ''}}">
<div class="page-content">
		<div class="page-breadcrumbs breadcrumbs-fixed">
			<div class="buttons-task col-xs-12 col-md-12">
				<ul class="breadcrumb breadcrumbs-fixed">
					<li><i class="fa fa-table"></i></li>
					<li><a href="/cpanel/province">Danh mục đăng tin</a></li>
					<li class="toast-title">Thêm danh mục đăng tin</li>
				</ul>
			</div>
		</div>
		<!-- /Page Breadcrumb -->
		<div class="page-header position-relative page-header-fixed">
			<div class="header-title text-align-right">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<button class="btn btn-blue shiny submitbusiness" data-id=""> <i class="fa fa-save"></i> Lưu lại </button>
					<a href="/cpanel/recruit/business" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> Hủy lưu </a>
				</div>
			</div>
		</div>
		<!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                    <div class="form-title">Thông tin doanh nghiệp</div>
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label for="inputTitle">Tên doanh nghiệp <span class="text-danger">*</span>
                            </label>
                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tên doanh nghiệp"></i>
                            <div>
                                <input name="business_name" type="text" id="business_name" class="form-control business_name auto-change-slug" data-bv-field="business_name">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="business_phone">Số điện thoại</label>
                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Số điện thoại doanh nghiệp"></i>
                            <div>
                            <input name="business_phone" type="tel" id="business_phone" class="form-control business_phone">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="business_email">Email </label>
                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Email doanh nghiệp"></i>
                            <div>
                            <input name="business_email" type="email" id="business_email" class="form-control business_email">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Website doanh nghiệp"></i>
                            <div>
                            <input name="business_website" type="text" id="website" class="form-control business_website">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="business_fax">FAX </label>
                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="FAX doanh nghiệp"></i>
                            <div>
                            <input name="business_fax" type="text" id="business_fax" class="form-control business_fax">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label for="business_selectCity">Tỉnh thành</label>
                            <div>
                                <select class="form-control business_selectCity"></select>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" class="business_Dis">
                            <label for="business_selectDis">Quận huyện</label>
                            <div>
                                <select class="form-control business_selectDis" name="business_selectDis" id="business_selectDis">
                                    <option value="0">-- Chọn Quận Huyện --</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" class="business_ward">
                            <label for="business_selectWard">Phường xã</label>
                            <div>
                                <select class="form-control business_selectWard" name="business_selectWard" id="business_selectWard">
                                    <option value="0">-- Chọn Phường xã --</option>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_address">Địa chỉ </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Địa chỉ doanh nghiệp"></i>
                        <div>
                            <textarea name="business_address" type="text" id="business_address" class="form-control business_address" rows="2"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                    <div class="form-group">
                        <input type="hidden" class="business_industry">
                        <label for="business_Selectindustry">Lĩnh vực kinh doanh <span class="text-danger">*</span>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Lĩnh vực kinh doanh của doanh nghiệp"></i>
                        </label>
                        <div>
                            <select multiple="multiple" name="business_Selectindustry" id="business_Selectindustry" class="business_Selectindustry" style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_desc">Mô tả <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Thông tin mô tả về doanh nghiệp"></i>
                        </label>
                        <div>
                            <textarea row="5" style="width:100%" id="business_desc" name="business_desc" class="business_desc"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                    <div class="form-title">Thông tin pháp lý</div>
                    <div class="form-group">
                        <label for="business_code">Mã số thuế </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Mã số thuế doanh nghiệp"></i>
                        <div>
                        <input name="business_code" type="text" id="business_code" class="form-control business_code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registration_certificate">Giấy phép kinh doanh</label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Giấy phép đăng ký kinh doanh của doanh nghiệp"></i>
                        <div>
                        <input name="business_registration_certificate" type="text" id="business_registration_certificate" class="form-control business_registration_certificate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registration_certificate_date">Ngày cấp giấy phép </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Ngày cấp giấy phép kinh doanh của doanh nghiệp"></i>
                        <div>
                        <input name="business_registration_certificate_date" type="text" id="business_registration_certificate_date" class="form-control business_registration_certificate_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_registration_certificate_in">Nơi cấp giấy phép </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Nơi cấp giấy phép kinh doanh doanh nghiệp"></i>
                        <div>
                        <input name="business_registration_certificate_in" type="text" id="business_registration_certificate_in" class="form-control business_registration_certificate_in">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_type">Loại hình doanh nghiệp </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Loại doanh kinh doanh của doanh nghiệp"></i>
                        <div>
                        <input name="business_type" type="text" id="business_type" class="form-control business_type">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_legal_representative">Người đại diện pháp luật</label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Người đại diện pháp luật của doanh nghiệp"></i>
                        <div>
                        <input name="business_legal_representative" type="text" id="business_legal_representative" class="form-control business_legal_representative">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="business_founded_at">Ngày thành lập </label>
                        <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Ngày thành lập doanh nghiệp"></i>
                        <div>
                        <input name="business_founded_at" type="text" id="business_founded_at" class="form-control business_founded_at">
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                    <div class="form-title">Tài khoản quản lý</div>
                    <div class="form-group">
                        <input type="hidden" class="bussinees_user">
                        <label for="bussinees_Selectuser">Chọn tài khoản <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn tài khoản có thể quản lý doanh nghiệp này"></i>
                        </label>
                        <div>
                            <select name="bussinees_Selectuser" id="bussinees_Selectuser" class="bussinees_Selectuser" style="width: 100%"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-blue btn-sm" href="/cpanel/user/add">Thêm tài khoản</a>
                    </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
				<div class="widget-body widget-body-white">
					<div class="form-title">Logo</div>
					<div class="form-group">
						<label for="image_src">Ảnh chính <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title=""></i></label>
						<div> 
							<img 
							id="image_filebusiness" 
							style="height:180px;" 
							class="img-thumbnail" 
							alt="150x150" 
							src="{{$name_img }}"
							>
						</div>
					<div class="form-group">
						<div>
                            <input class="upload_filebusiness" type="hidden" value="{{isset($business) ? $upload_file : ''}}">
                            <input type="file" class="chosse_imgbusiness btn btn-default" style="margin-bottom: 5px;">
							<button class="btn btn-defaul remove_imgbusiness">Bỏ chọn </button>
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