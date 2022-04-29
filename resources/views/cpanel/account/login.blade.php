@extends('cpanel.account.index')
@section('title', $title)
@section('content')
<div class="main-container container-fluid">
	<div class="page-container">
		<form class="form-signin bv-form" id="validateSubmitForm" name="myForm" enctype="multipart/form-data">
			<div class="login-container animated fadeInDown" style="margin: 10% auto;">
				<div class="loginbox bg-white">
					<div class="loginbox-title">ĐĂNG NHẬP</div>
					<div class="loginbox-textbox">
						<hr class="wide">
						<div class="form-group input-icon icon-right">
							<input name="username" type="text" class="form-control" placeholder="username hoặc Sđt"> <i class="fa fa-envelope-o circular"></i> 
							<small class="help-block" data-bv-validator="notEmpty" data-bv-for="username" data-bv-result="NOT_VALIDATED" style="display: none;">Tên đăng nhập không được bỏ trống</small></div>
					</div>
					<div class="loginbox-textbox">
						<div class="form-group input-icon icon-right">
							<input name="password" type="password" class="form-control" placeholder="Mật khẩu"> <i class="fa fa-lock circular"></i> 
							<small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">Mật khẩu không được bỏ trống</small></div>
					</div>
					<div class="loginbox-forgot"> <a href="auth/forget-password.html">Quên mật khẩu?</a> </div>
					<div class="loginbox-submit">
						<button type="submit" class="btn btn-primary btn-block ">Đăng nhập </button></div>
				</div>
			</div>
	</div>
</div>
@endsection