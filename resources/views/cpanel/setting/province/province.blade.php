@extends('cpanel.index')
@section('title', $title)
@section('content')


<input  type="hidden" class="active_province" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý danh mục tỉnh thành</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12"> 
				<a href="province/add" class="btn btn-blue shiny"> <i class="fa fa-plus"></i> Thêm danh mục tỉnh thành </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
	<div class="page-body">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="widget">
					<div class="widget-header with-footer"> <span class="widget-caption">Danh sách danh mục tỉnh thành</span></div>
					<div class="widget-body">
						<div class="flip-scroll">
							<div id="simpledatatable_wrapper">
								<div class="row">
									<div class="col-xs-12 col-md-6 text-align-right">
										<div id="simpledatatable_filter" class="dataTables_filter">
											<div class="input-group">
												<input name="search" id="search_province" class="form-control" placeholder="Nhập từ khóa cần tìm" value="" aria-controls="simpledatatable"> <span class="input-group-btn">
												<!-- <button class="btn btn-default" id="btn_search" type="button"><i class="fa fa-search"></i></button> -->
											</span> </div>
										</div>
									</div>
								</div>
								<table class="margin-top-10 table table-hover table-bordered table-striped
															table-condensed flip-content">
									<thead class="flip-content bordered-palegreen">
										<tr>
											<th style="width: 4%;" class="center">STT</th>
											<th>Vùng miền</th>
											<th>Tỉnh thành</th>
											<th style="width: 15%;" class="text-center">Trạng thái</th>
											<th class="center" style="width: 10%;">Thao tác</th>
										</tr>
									</thead>
									<tbody class="cpanelArea"></tbody>
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