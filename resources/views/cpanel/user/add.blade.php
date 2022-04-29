@extends('cpanel.index')
@section('title', $title)
@section('content')
<div class="page-content">
	<!-- Page Breadcrumb -->
    <input class="id_userUser" value="{{isset($user) && $user['id'] ? $user['id'] : ''}}">
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý Thành viên</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12"> 
				<button class="btn btn-blue shiny submit_User"> <i class="fa fa-save"></i> Lưu lại </button>
				<a href="/cpanel/user" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> Hủy lưu </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
        <div class="widget radius-bordered">
            <div class="widget-body widget-body-white">
                <div class="row">
                    <div class="col-sm-7 col-xs-12">
                        <div class="form-title">Thông tin cá nhân</div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="first_nameUser">Họ đệm <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Họ và chữ lót tên người được cấp phát tài khoản"></i></label>
                                    <div>
                                        <input value="{{isset($user) && $user['first_name'] ? $user['first_name'] : ''}}" name="first_nameUser" type="text" id="first_nameUser" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label for="last_nameUser">Tên <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tên người được cấp phát tài khoản"></i></label>
                                    <div>
                                        <input value="{{isset($user) && $user['last_name'] ? $user['last_name'] : ''}}" name="last_nameUser" type="text" id="last_nameUser" class="form-control"> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="phoneUser">Số điện thoại</label>
                                    <div>
                                        <input value="{{isset($user) && $user['phone'] ? $user['phone'] : ''}}" name="phoneUser" type="text" id="phoneUser" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="genderUser">Giới tính</label>
                                    <div>
                                        <input type="hidden" class="genderUser" value="{{isset($user) && $user['gender'] ? $user['gender'] : ''}}">
                                        <select id="genderUser" name="genderUser" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="1" {{isset($user) && $user['gender'] == 1 ? 'selected' : ''}}>Nam</option>
                                            <option value="2" {{isset($user) && $user['gender'] == 2 ? 'selected' : ''}}>Nữ</option>
                                            <option value="3" {{isset($user) && $user['gender'] == 3 ? 'selected' : ''}}>Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <div>
                                <textarea name="addressUser" id="addressUser" class="form-control" rows="1">{{isset($user) && $user['address'] ? $user['address'] : ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-12">
                        <div class="form-title">Tài khoản đăng nhập</div>
                        <div class="form-group">
                            <label for="usernameUser">Tên đăng nhập <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tên tài khoản đăng nhập được cấp phát"></i></label>
                            <div id="check">
                                <input name="usernameUser" id="usernameUser" type="text" placeholder="" class="form-control checkid" value="{{isset($user) && $user['username'] ? $user['username'] : ''}}"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailUser">Địa chỉ Email<span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Địa chỉ Email của tài khoản được cấp phát"></i></label>
                            <div>
                                <input name="emailUser" id="emailUser" type="text" class="form-control" value="{{isset($user) && $user['email'] ? $user['email'] : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordUser">Mật khẩu <span class="text-danger">*</span></label>
                            <div>
                                <input name="passwordUser" id="passwordUser" type="password" class="form-control"> 
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