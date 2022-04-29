@php
	$ac_ = "";
	$getTaichinh = DB::table('catelog')->where('id',1)->where('active',1)->where('delete',1)->get();
	if($getTaichinh){
		foreach($getTaichinh as $key_taichinh => $val_taichinh){
			$child = DB::table('catelog')->where('parent_id',$val_taichinh->id)->where('child_id',Null)->where('active',1)->where('delete',1)->get();
			$getTaichinh[$key_taichinh]->child = $child;
		}
	}

	$getTintuc = DB::table('catelog')->where('id',7)->where('active',1)->where('delete',1)->get();
	if($getTintuc){
		foreach($getTintuc as $key_tintuc => $val_tintuc){
			$child = DB::table('catelog')->where('parent_id',$val_tintuc->id)->where('child_id',Null)->where('active',1)->where('delete',1)->get();
			$getTintuc[$key_tintuc]->child = $child;
		}
	}
@endphp



<div class="page-sidebar sidebar-fixed" id="sidebar">
	<!-- Page Sidebar Header-->
	<div class="sidebar-header-wrapper">
		<input type="text" class="searchinput"> <i class="searchicon fa fa-search"></i>
		<div class="searchhelper">Tìm kiếm báo cáo, biểu đồ, Emails hoặc thông báo</div>
	</div>
	<!-- /Page Sidebar Header -->
	<!-- Sidebar Menu -->
	<ul class="nav sidebar-menu slimScrollDiv">
		<!--Dashboard-->
		<li class="clickMenu">
			<a href=""> <i class="menu-icon glyphicon glyphicon-home"></i> <span class="menu-text"> Bảng điều khiển </span> </a>
		</li>
		<!-- user-->
		<li class="clickMenu {{$active == 5 ? 'open active' : ''}}">
			<a href="#" class="menu-dropdown">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text"> Thành viên</span>
				<i class="menu-expand"></i>
			</a>
			<ul class="submenu" style="display: none;">
				<li class="{{$active == 5 ? 'active' : ''}}">
					<a href="{{url('cpanel/user')}}">
						<span class="menu-text">Tài khoản thành viên</span>
					</a>
				</li>
			</ul>
        </li>
		<!-- post tai chinh -->
		<li class="clickMenu {{$active == 4 ? 'open active' : ''}}">
			<a href="#" class="menu-dropdown">
				<i class="menu-icon fa fa-cubes"></i>
				<span class="menu-text"> Tài chính </span>
				<i class="menu-expand"></i>
			</a>
			<ul class="submenu getTaichinh" style="display: none;">
				@if($getTaichinh)
					@foreach($getTaichinh as $key_taichinh => $val_taichinh)
						@if($val_taichinh->child)
							@foreach($val_taichinh->child as $key_child => $val_child)
								@php
									if(isset($id_tc)){
										if($id_tc == $val_child->id){
											$ac_ = 'active';
										}else{
											$ac_ = '';
										}
									}
								@endphp
								<li class="{{$ac_}}">
									<a class="clickTaichinh" data-id="{{$val_child->id}}" style="cursor: pointer;">
										<span class="menu-text">{{$val_child->name}}</span>
									</a>
								</li>
							@endforeach
						@endif
					@endforeach
				@endif
			</ul>
        </li>
		<!-- Tuyen dung -->
		<li class="clickMenu {{$active == 7 || $active == 8 || $active == 9 ? 'open active' : ''}}">
			<a href="#" class="menu-dropdown">
				<i class="menu-icon fa fa-building"></i>
				<span class="menu-text"> Tuyển dụng</span>
				<i class="menu-expand"></i>
			</a>
			<ul class="submenu" style="display: none;">
				<li class="{{$active == 7 ? 'active' : ''}}">
					<a href="{{url('cpanel/recruit')}}">
						<span class="menu-text">Tin tuyển dụng</span>
					</a>
				</li>
				<li class="{{$active == 8 ? 'active' : ''}}">
					<a href="{{url('cpanel/candidates')}}">
						<span class="menu-text">Hồ sơ ứng viên</span>
					</a>
				</li>
			</ul>
		</li>
		<!-- Tin tuc -->
		<li  class="clickMenu {{$active == 6 ? 'open active' : ''}}">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text"> Nội dung </span> <i class="menu-expand"></i> </a>
			<ul class="submenu getTintuc" style="display: none;">
				@if($getTintuc)
					@foreach($getTintuc as $key_tintuc => $val_tintuc)
						@if($val_tintuc->child)
							@foreach($val_tintuc->child as $key_child => $val_child)
								@php
									if(isset($id_tc)){
										if($id_tc == $val_child->id){
											$ac_ = 'active';
										}else{
											$ac_ = '';
										}
									}
								@endphp
								<li class="{{$ac_}}">
									<a class="clickTintuc" data-id="{{$val_child->id}}" style="cursor: pointer;">
										<span class="menu-text">{{$val_child->name}}</span>
									</a>
								</li>
							@endforeach
						@endif
					@endforeach
				@endif
			</ul>
		</li>
		<!--Setting-->
		<li class="clickMenu {{$active == 2 || $active == 3 ? 'open active' : ''}}">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-gear"></i> <span class="menu-text">Cấu Hình
            </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li class="{{$active == 2 ? 'active' : ''}}">
					<a href="{{url('cpanel/province')}}"> <span class="menu-text">Danh mục tỉnh thành</span> </a>
				</li>
				<li class="{{$active == 3 ? 'active' : ''}}">
					<a href="{{url('cpanel/catelog')}}"> <span class="menu-text">Danh mục đăng tin</span> </a>
				</li>
			</ul>
		</li>
	</ul>
	<!-- /Sidebar Menu -->
</div>