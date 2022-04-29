@extends('cpanel.index')
@section('title', $title)
@section('content')
<div class="page-content">
	<!-- Page Breadcrumb -->
	<input class="catelog_idMain" value="{{isset($id_tc) && $id_tc != '' ? $id_tc : ''}}">
	<div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Quản lý doanh nghiệp</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12 ">
                <a href="business/add" class="btn btn-blue shiny"> <i class="fa fa-plus"></i> Thêm doanh nghiệp</a>
            </div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="widget radius-bordered">
        <div class="widget-header with-footer">
          <span class="widget-caption">Quản lý doanh nghiệp</span>
        </div>
        <div class="widget-body">
          <div class="flip-scroll">
            <form id="validateSubmitForm" name="myForm" method="post">
              <div id="simpledatatable_wrapper">
                <div class="row">
                  <div class="col-xs-12 col-md-7 text-align-right">
                    <div id="simpledatatable_filter" class="dataTables_filter">
                      <div class="input-group">
                        <input name="search" id="txt_search" class="form-control searchbusiness" placeholder="Nhập từ khóa cần tìm" value="" aria-controls="simpledatatable">
                      </div>
                    </div>
                  </div>
                </div>
                <table class="margin-top-10 table table-hover table-bordered table-striped table-condensed flip-content">
                  <thead class="flip-content bordered-palegreen">
                    <tr>
                      <th style="width:5%;" class="text-align-center">STT</th>
                      <th style="width: 10%;">Tài khoản</th>
                      <th style="width: 25%;">Tên doanh nghiệp</th>
                      <th class="center" style="width: 10%;">Số điện thoại</th>
                      <th class="center" style="width: 25%;">Địa chỉ</th>
                      <th scope="col" style="width: 10%;" class="text-align-center">Trạng thái</th>
                      <th class="center" style="width: 10%;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody class="cpanelbusiness"></tbody>
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