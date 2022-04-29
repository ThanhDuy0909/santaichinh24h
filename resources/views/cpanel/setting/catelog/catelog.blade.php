@extends('cpanel.index')
@section('title', $title)
@section('content')
<input  type="hidden" class="active_catelog" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý danh mục đăng tin</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12"> 
				<a href="catelog/add" class="btn btn-blue shiny"> <i class="fa fa-plus"></i> Thêm danh mục đăng tin </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
	<div class="page-body">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="widget">
					<div class="widget-header with-footer"> <span class="widget-caption">Danh sách danh mục đăng tin</span></div>
					<div class="widget-body">
						<div class="flip-scroll">
							<div id="simpledatatable_wrapper">
								<div class="row">
									<div class="col-xs-12 col-md-6 text-align-right">
										<div id="simpledatatable_filter" class="dataTables_filter">
											<input type="hidden" class="search_catelog_1">
											<input type="hidden" class="search_catelog_2">
											<input type="hidden" class="search_catelog_3">
											<div class="input-group" style="display: flex;">
												<select name="search" id="search_catelog_1" class="form-control"></select>
												<select name="search" id="search_catelog_2" class="form-control" style="margin:0 5px;display:none"></select>
												<select name="search" id="search_catelog_3" class="form-control"style="display:none"></select>			
											</div>
										</div>
									</div>
								</div>
								<table class="margin-top-10 table table-hover table-bordered table-striped
															table-condensed flip-content">
									<thead class="flip-content bordered-palegreen">
										<tr>
											<th style="width: 4%;" class="center">STT</th>
											<th>Loại danh mục</th>
											<th>Danh mục đăng tin</th>
											<th>Danh mục con</th>
											<th style="width: 15%;" class="text-center">Trạng thái</th>
											<th class="center" style="width: 10%;">Thao tác</th>
										</tr>
									</thead>
									<tbody class="cpanelCatelog"></tbody>
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