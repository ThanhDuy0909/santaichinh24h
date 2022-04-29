@extends('cpanel.index')
@section('title', $title)
@section('content')
<input  type="hidden" class="active_catelog" value="1">
<div class="page-content">
	<form id="validateSubmit_catelogedit" name="myForm" method="post" enctype="multipart/form-data" novalidate="novalidate" class="bv-form">
		<!-- Page Breadcrumb -->
		<input type="hidden" class="id_catelogedit" value="{{$id_}}" >
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
					<button type="submit" class="btn btn-blue shiny"> <i class="fa fa-save"></i> Lưu lại </button>
					<a href="/cpanel/catelog" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> Hủy lưu </a>
				</div>
			</div>
		</div>
		<!-- Page Body -->
		<div class="page-body">
			<div class="row">
				<div class="col-lg-8 col-sm-8 col-xs-12">
					<div class="widget radius-bordered">
						<div class="widget-body widget-body-white"> <span class="form-title">Thông tin danh mục đăng tin</span>
							<div class="form-group">
								<label for="category_title">Tên danh mục <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tên danh mục BST (VD: Thời trang nữ)"></i></label>
								<div>
									<input value="{{$name_}}" class="form-control auto-change-slug catelog_nameedit" name="catelog_nameedit" type="text" id="category_title" data-bv-field="category_title"></div> 
								</div>
								@if($ac_ != "")
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<input type="hidden" class="catelog_idedit" value="{{$bc_ == '' ? $ac_ : $bc_}}">
												<label for="parent_category"> Danh mục đăng tin <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Danh mục cấp trên của danh mục đang cập nhật"></i></label>
												<div>
													<select required size="5" name="catelog_idedit" id="catelog_idedit" class="form-control">
														@if(isset($catelog) && count($catelog) > 0)
															@foreach($catelog as $key => $val)
																@php
																	if($val['id'] == $ac_ && $bc_ == ""){
																		$ac_p = "selected";
																	}else{
																		$ac_p = "";
																	}
																@endphp
																<option value="{{$val['id']}}" {{$ac_p}}>{{$val['name']}}</option>

																@if($bc_ != "" && $val['parent'] && count($val['parent']) > 0)
																	@foreach($val['parent'] as $key_parent => $val_parent)
																		@php
																			if($val_parent['id'] == $bc_){
																				$ac_c = "selected";
																			}else{
																				$ac_c = "";
																			}
																		@endphp
																		<option value="{{$val_parent['id']}}" {{$ac_c}}>|__{{$val_parent['name']}}</option>
																	@endforeach
																@endif
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>
									</div>
								@endif
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>
	<!-- /Page Body -->
</div>
@endsection