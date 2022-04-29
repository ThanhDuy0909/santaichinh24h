@extends('cpanel.index')
@section('title', $title)
@section('content')
<div class="page-content">
	<!-- Page Breadcrumb -->
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý hồ sơ ứng viên</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12"> 
				<a href="candidates/add" class="btn btn-blue shiny"> <i class="fa fa-plus"></i> Thêm hồ sơ ứng viên </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer"> <span class="widget-caption">Danh sách hồ sơ ứng viên</span></div>
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <form id="validateSubmitForm" name="myForm" method="post">
                                <div id="simpledatatable_wrapper">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div id="simpledatatable_filter" class="dataTables_filter">
                                                <label>
                                                    <input name="search" type="search" class="searchUser form-control input-sm" placeholder="Tìm kiếm theo tên...." aria-controls="simpledatatable">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-hover table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content bordered-palegreen">
                                            <tr>
                                                <th style="width: 1%;" class="center">STT</th>
                                                <th class="center" style="width: 20%;">Họ tên</th>
                                                <th class="center" style="width: 20%;">Giới tính</th>
                                                <th style="width: 20%;" class="center">Email</th>
                                                <th style="width: 7%;" class="center">Điện thoại</th>
                                                <th style="width: 10%;" class="text-center">Trạng thái</th>
                                                <th style="width: 7%;" class="center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cpanelCandidates"></tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Page Body -->
                </div>
            </div>
        </div>
    </div>
	<!-- /Page Body -->
</div>
@endsection