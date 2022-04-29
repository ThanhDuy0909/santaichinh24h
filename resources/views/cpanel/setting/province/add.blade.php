@extends('cpanel.index')
@section('title', $title)
@section('content')
<input  type="hidden" class="active_province" value="1">
<div class="page-content">
	<form id="validateSubmit_pronvice" name="myForm" method="post" enctype="multipart/form-data" novalidate="novalidate" class="bv-form">
		<!-- Page Breadcrumb -->
		<div class="page-breadcrumbs breadcrumbs-fixed">
			<div class="buttons-task col-xs-12 col-md-12">
				<ul class="breadcrumb breadcrumbs-fixed">
					<li><i class="fa fa-table"></i></li>
					<li><a href="/cpanel/province">Danh mục tỉnh thành</a></li>
					<li class="toast-title">Thêm danh mục tỉnh thành</li>
				</ul>
			</div>
		</div>
		<!-- /Page Breadcrumb -->
		<div class="page-header position-relative page-header-fixed">
			<div class="header-title text-align-right">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-blue shiny"> <i class="fa fa-save"></i> Lưu lại </button>
					<a href="/cpanel/province" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> Hủy lưu </a>
				</div>
			</div>
		</div>
		<!-- Page Body -->
		<div class="page-body">
			<div class="row">
				<div class="col-lg-8 col-sm-8 col-xs-12">
					<div class="widget radius-bordered">
						<div class="widget-body widget-body-white"> <span class="form-title">Thông tin danh mục tỉnh thành</span>
							<div class="form-group">
								<label for="category_title">Tên danh mục <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Tên danh mục BST (VD: Thời trang nữ)"></i></label>
								<div>
									<input class="form-control auto-change-slug province_name" name="province_name" type="text" id="category_title" data-bv-field="category_title"></div> 
								</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="form-group">
										<input type="hidden" class="region_id" value="">
										<label for="parent_category"> Danh mục cha <span class="text-danger">*</span> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="Danh mục cấp trên của danh mục đang cập nhật"></i></label>
										<div>
											<select required size="5" name="region_id" id="region_id" class="form-control"></select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</form>
	<!-- /Page Body -->
</div>
@endsection