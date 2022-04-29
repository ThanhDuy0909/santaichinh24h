@extends('cpanel.index')
@section('title', $title)
@section('content')
<input  type="hidden" class="active_recruit" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý tin tuyển dụng</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<a href="recruit/add" class="btn btn-blue shiny"> <i class="fa fa-plus"></i> Thêm tin tuyển dụng </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
	<div class="page-body">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="widget">
					<div class="widget-header with-footer"> <span class="widget-caption titleFinance"></span></div>
					<div class="widget-body">
						<div class="flip-scroll">
							<div id="simpledatatable_wrapper">
								<div class="row">
									<div class="col-xs-12 col-md-6 text-align-right">
										<div id="simpledatatable_filter" class="dataTables_filter">
											<div class="input-group">
												<select class="inputSearchRecruit"></select>
											</div>
										</div>
									</div>
								</div>
								<table class="margin-top-10 table table-hover table-bordered table-striped
															table-condensed flip-content">
									<thead class="flip-content bordered-palegreen">
										<tr>
											<th style="width: 4%;" class="center">STT</th>
											<th>Danh mục tin</th>
											<th>Tiêu đề</th>
											<th>Đăng bởi</th>
											<th>Ngày đăng</th>
											<th style="width: 15%;" class="text-center">Trạng thái</th>
											<th class="center" style="width: 10%;">Thao tác</th>
										</tr>
									</thead>
									<tbody class="cpanelRecruit"></tbody>
								</table>
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