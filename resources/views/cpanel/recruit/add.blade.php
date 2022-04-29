@extends('cpanel.index')
@section('title', $title)
@section('content')
<input  type="hidden" class="active_recruit" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
    <input type="hidden" class="recruit_id" value="{{isset($recruit) && $recruit['id'] != '' ? $recruit['id'] : ''}}">
    <input type="hidden" class="job_industry" value="{{isset($recruit) && $recruit['job_industry'] != '' ? $recruit['job_industry'] : ''}}">
    <input type="hidden" class="province_recruit" value="{{isset($recruit) && $recruit['province_recruit'] != '' ? $recruit['province_recruit'] : ''}}">

    <input type="hidden" class="type_work" value="{{isset($recruit) && $recruit['type_work'] != '' ? $recruit['type_work'] : ''}}">
    <input type="hidden" class="education_level" value="{{isset($recruit) && $recruit['education_level'] != '' ? $recruit['education_level'] : ''}}">
    <input type="hidden" class="exp" value="{{isset($recruit) && $recruit['exp'] != '' ? $recruit['exp'] : ''}}">
    <input type="hidden" class="salary" value="{{isset($recruit) && $recruit['salary'] != '' ? $recruit['salary'] : ''}}">
    <div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title titlePost"></li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12">
                <button class="btn btn-blue shiny submit_recruit"> <i class="fa fa-save"></i> Lưu lại </button>
				<a href="/cpanel/recruit" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> Hủy lưu </a>
            </div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">THÔNG TIN TUYỂN DỤNG</div>
                        <div class="form-group">
                            <label for="recruit_title">Tiêu đề <span class="text-danger">*</span></label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tiêu đề bản tin"></i>
                            <div>
                                <input value="{{isset($recruit) && $recruit['title'] != '' ? $recruit['title'] : ''}}" name="recruit_title" type="text" id="recruit_title" class="form-control recruit_title auto-change-slug"> 
                            </div> 
                            
                        <div class="form-group">
                            <label for="job_Selectindustry">Danh mục ngành nghề <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn danh mục chứa tin đăng"></i></label>
                            <div>
                                <select id="job_Selectindustry" multiple="" style="width: 100%" tabindex="-1" class="job_Selectindustry"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="getAreaRecruit">Khu vực <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn danh mục tỉnh thành chứa tin đăng"></i></label>
                            <div>
                                <select  id="getAreaRecruit" multiple="multiple" style="width: 100%" tabindex="-1" class="getAreaRecruit"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Ngày hết hạn <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Thời gian hết hạn tin"></i></label>
                            <div>
                                @php
                                    $d=strtotime("+7 Day");
                                    $today = date("Y-m-d", $d);
                                @endphp
                                <input class="form-control expiry_date" type="date" value="{{isset($recruit) && $recruit['expiration_date'] != ''  ? $recruit['expiration_date'] :$today}}"> 
                            </div> 
                        </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">NỘI DUNG TUYỂN DỤNG</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="type_workSelect">Loại công việc <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Loại công việc"></i></label>
                                    <div>
                                        <select class="col-xs-12 type_workSelect" id="type_workSelect" name="type_workSelect">
                                            <option value="">-- Chọn loại công việc --</option>
                                            <option value="1" {{isset($recruit) && $recruit['type_work'] == 1 ? 'selected' : ''}}>Toàn thời gian</option>
                                            <option value="2" {{isset($recruit) && $recruit['type_work'] == 2 ? 'selected' : ''}}>Bán Thời gian</option>
                                            <option value="3" {{isset($recruit) && $recruit['type_work'] == 3 ? 'selected' : ''}}>Làm tại nhà</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="education_levelSelect">Trình độ học vấn <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Loại công việc"></i></label>
                                    <div>
                                        <select class="col-xs-12 education_levelSelect" id="education_levelSelect">
                                            <option value="">-- Chọn Trình độ học vấn --</option>
                                            <option value="1" {{isset($recruit) && $recruit['education_level'] == 1 ? 'selected' : ''}}>Đại học</option>
                                            <option value="2" {{isset($recruit) && $recruit['education_level'] == 2 ? 'selected' : ''}}>Cao đẳng</option>
                                            <option value="3" {{isset($recruit) && $recruit['education_level'] == 3 ? 'selected' : ''}}>THPT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="expSelect">Kinh nghiệm <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Loại công việc"></i></label>
                                    <div>
                                        <select class="col-xs-12 expSelect" id="expSelect" name="exp">
                                            <option value="">-- Chọn Kinh nghiệm --</option>
                                            <option value="1" {{isset($recruit) && $recruit['exp'] == 1 ? 'selected' : ''}}>1 năm</option>
                                            <option value="2" {{isset($recruit) && $recruit['exp'] == 2 ? 'selected' : ''}}>2 năm</option>
                                            <option value="3" {{isset($recruit) && $recruit['exp'] == 3 ? 'selected' : ''}}>Không Kinh Nghiệm</option>
                                            <option value="4" {{isset($recruit) && $recruit['exp'] == 4 ? 'selected' : ''}}>Dưới 1 năm</option>
                                            <option value="5" {{isset($recruit) && $recruit['exp'] == 5 ? 'selected' : ''}}>3 năm</option>
                                            <option value="6" {{isset($recruit) && $recruit['exp'] == 6 ? 'selected' : ''}}>4 năm</option>
                                            <option value="7" {{isset($recruit) && $recruit['exp'] == 7 ? 'selected' : ''}}>5 năm</option>
                                            <option value="8" {{isset($recruit) && $recruit['exp'] == 8 ? 'selected' : ''}}>Trên 5 năm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="salarySelect">Mức lương <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Loại công việc"></i></label>
                                    <div>
                                        <select class="col-xs-12 salarySelect" id="salarySelect">
                                            <option value="">-- Chọn Mức lương --</option>
                                            <option value="1" {{isset($recruit) && $recruit['salary'] == 1 ? 'selected' : ''}}>Thỏa thuận</option>
                                            <option value="2" {{isset($recruit) && $recruit['salary'] == 2 ? 'selected' : ''}}>Dưới 3 triệu</option>
                                            <option value="3" {{isset($recruit) && $recruit['salary'] == 3 ? 'selected' : ''}}>3 - 5 triệu</option>
                                            <option value="4" {{isset($recruit) && $recruit['salary'] == 4 ? 'selected' : ''}}>5 - 7 triệu</option>
                                            <option value="5" {{isset($recruit) && $recruit['salary'] == 5 ? 'selected' : ''}}>7 - 10 triệu</option>
                                            <option value="6" {{isset($recruit) && $recruit['salary'] == 6 ? 'selected' : ''}}>10 - 12 triệu</option>
                                            <option value="7" {{isset($recruit) && $recruit['salary'] == 7 ? 'selected' : ''}}>12 - 15 triệu</option>
                                            <option value="8" {{isset($recruit) && $recruit['salary'] == 8 ? 'selected' : ''}}>15 - 20 triệu</option>
                                            <option value="9" {{isset($recruit) && $recruit['salary'] == 9 ? 'selected' : ''}}>20 - 25 triệu</option>
                                            <option value="10" {{isset($recruit) && $recruit['salary'] == 10 ? 'selected' : ''}}>25 - 30 triệu</option>
                                            <option value="11" {{isset($recruit) && $recruit['salary'] == 11 ? 'selected' : ''}}>30 - 50 triệu</option>
                                            <option value="12" {{isset($recruit) && $recruit['salary'] == 12 ? 'selected' : ''}}>Trên 50 triệu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="content_work">Nội dung công việc <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Nội dung tin đăng"></i></label>
                                    <div>
                                        <textarea class="col-xs-12 content_work" rows="5" id="content_work">{{isset($recruit) && $recruit['content_work'] != '' ? $recruit['content_work'] : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="regime_work">Quyền lợi và chế độ <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Quyền lợi và chế độ"></i></label>
                                    <div>
                                        <textarea class="col-xs-12 regime_work" rows="5" id="regime_work">{{isset($recruit) && $recruit['regime_work'] != '' ? $recruit['regime_work'] : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile_work">Yêu cầu hồ sơ <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Yêu cầu hồ sơ"></i></label>
                                    <div>
                                        <textarea class="col-xs-12 profile_work" rows="5" id="profile_work">{{isset($recruit) && $recruit['profile_work'] != '' ? $recruit['profile_work'] : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_work">Thông tin liên hệ <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Thông tin liên hệ"></i></label>
                                    <div>
                                        <textarea class="col-xs-12 contact_work" rows="5" id="contact_work">{{isset($recruit) && $recruit['contact_work'] != '' ? $recruit['contact_work'] : ''}}</textarea>
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