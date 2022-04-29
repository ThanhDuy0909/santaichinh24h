@extends('user.index')
@section('title', 'Sàn Tài Chính 24h')
@section('content')

@php
	$ac_ = "";
	$getTaichinh = DB::table('catelog')->where('id',1)->where('active',1)->where('delete',1)->get();
	if($getTaichinh){
		foreach($getTaichinh as $key_taichinh => $val_taichinh){
			$child = DB::table('catelog')->where('parent_id',$val_taichinh->id)->where('child_id',Null)->where('active',1)->where('delete',1)->get();
			$getTaichinh[$key_taichinh]->child = $child;
		}
	}

	$region  	= "";
	$finance  	= "";
	$candidates = "";
	$job 		= "";
	$news		= "";
	if(isset($index)){
		$region 	= isset($index['region']) && $index['region'] != "" ? $index['region'] : '';
		$finance 	= isset($index['finance']) && $index['finance'] != "" ? $index['finance'] : '';
		$candidates = isset($index['candidates']) && $index['candidates'] != "" ? $index['candidates'] : '';
		$job 		= isset($index['job']) && $index['job'] != "" ? $index['job'] : '';
		$news 		= isset($index['news']) && $index['news'] != "" ? $index['news'] : '';
	}

@endphp

<div id="tt-pageContent">
	<section id="search" style="background:url('//santaichinh24h.vn/resource/701101/assets/./images/bg-search.png');background-position:center center; background-repeat: no-repeat;background-size: auto;" data-section-id="search">
		<div class="container">
			<div class="search-block pt-3 pb-4">
				<div class="title">
					<h3 class="text-center">SÀN GIAO DỊCH TÀI CHÍNH</h3></div>
				<div class="wrap-item wrap-item d-flex justify-content-around flex-wrap">
					@if($getTaichinh)
						@foreach($getTaichinh as $key_taichinh => $val_taichinh)
							@if($val_taichinh->child)
								@foreach($val_taichinh->child as $key_child => $val_child)
									<div class="item"><a class="clickTaichinh" data-type="finance" data-id="{{$val_child->id}}" style="cursor: pointer;text-transform: uppercase;">{{$val_child->name}}</a></div>
								@endforeach
							@endif
						@endforeach
					@endif
					{{-- <div class="item"><a href="/giaodich_cic" style="cursor: pointer;text-transform: uppercase;">Giao Dịch CIC</a></div>
					<div class="item"><a href="/muaban_data" style="cursor: pointer;text-transform: uppercase;">Mua - Bán Data</a></div>
					<div class="item"><a href="/tinchovay" style="cursor: pointer;text-transform: uppercase;">Tin Cho Vay</a></div> --}}
					{{-- <div class="item"><a href="#" style="cursor: pointer;text-transform: uppercase;">Diễn dàn</a></div> --}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="search-form mt-4 p-4">
						<h4 class="pb-3">Tìm việc cực dễ tại SANTAICHINH24h</h4>
						<div class="optionnn d-flex flex-column">
							<input type="hidden" class="jobInput" >
							<select class="jobSelect">
								<option value="">-- Chọn vị trí việc làm --</option>
								{{-- @if(count($job)>0)
									@foreach($job as $key_job => $val_job)
										<option value="{{$val_job['id']}}">{{$val_job['name']}}</option>
									@endforeach
								@endif --}}
							</select>
							<input  type="hidden" class="regionInput">
							<input  type="hidden" class="provinceInput" >
							<select class="provinceSelect">
								<option value="" data-type="region">Chọn</option>
								<option value="0" data-type="region">Toàn quốc</option>
								@if(count($region) > 0)
									@foreach($region as $key_region => $val_region)
										<option value="{{$val_region['id']}}" data-type="region">{{$val_region['region']}}</option>
										@if(isset($val_region['province']) && count($val_region['province']) > 0)
											@foreach($val_region['province'] as $key_province => $val_province)
												<option value="{{$val_province['id']}}" data-type="province">|__{{$val_province['province']}}</option>
											@endforeach
										@endif
									@endforeach
								@endif
							</select>
						</div>
						<div class="btnn text-center mt-2">
							<button class="find-job btn-bali btn-success search_recruit">Tìm việc ngay</button>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="btn-create mt-4 py-4 d-flex flex-column align-items-center justify-content-center">
						<div class="fie"><a href="/create_cv">Tạo hồ sơ xin việc</a><span style="background:url(//santaichinh24h.vn/files/images/icon/icon-create.png)"></span></div>
						<div class="fie"><a href="/post_recruitment">Đăng tin tuyển dụng</a><span style="background:url(//santaichinh24h.vn/files/images/icon/pen-icon.png)"></span></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="recruitment" data-section-id="recruitment">
		<div class="container">
			<div class="titlel-rec mb-md-5">
				<h3 class="text-center"><a style="font-size:18px !important">VIỆC LÀM THEO VÙNG MIỀN</a></h3> </div>
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@if(count($region))
							@foreach($region as $key_region => $val_region)
								<div class="col-md-6">
									<div> 
										<a  class="table-title clickRegion" data-type="region" data-id="{{$val_region['id']}}" style="cursor: pointer;color:white;display: flex;align-items: center;justify-content: center">
											{{$val_region['region']}}
										</a> 
									</div>								
									@if(isset($val_region['province']) && count($val_region['province']) > 0)
									<table class="table">
										<tbody>
											@foreach($val_region['province'] as $key_province => $val_province)
												@if(isset($val_province['recruit_province']) && count($val_province['recruit_province']) > 0)									
													@foreach($val_province['recruit_province'] as $key_recruit_province => $val_recruit_province)
														@if(isset($val_recruit_province['recruit']) && count($val_recruit_province['recruit']) > 0)												
															@foreach($val_recruit_province['recruit'] as $key_recruit => $val_recruit)
																<tr>
																	<td>
																		<div> <a class="clickRegion" data-type="item" data-id="{{$val_recruit['id']}}" class="name-jobs" style="cursor: pointer;">{{$val_recruit['title']}}</a> </div>
																		<div class="infoo d-flex">
																			<div>
																				{{$val_recruit['salary'] == 1 ? 'Thỏa thuận' : ''}}
																				{{$val_recruit['salary'] == 2 ? 'Dưới 3 triệu' : ''}}
																				{{$val_recruit['salary'] == 3 ? '3 - 5 triệu' : ''}}
																				{{$val_recruit['salary'] == 4 ? '5 - 7 triệu' : ''}}
																				{{$val_recruit['salary'] == 5 ? '7 - 10 triệu' : ''}}
																				{{$val_recruit['salary'] == 6 ? '10 - 12 triệu' : ''}}
																				{{$val_recruit['salary'] == 7 ? '12 - 15 triệu' : ''}}
																				{{$val_recruit['salary'] == 8 ? '15 - 20 triệu' : ''}}
																				{{$val_recruit['salary'] == 9 ? '20 - 25 triệu' : ''}}
																				{{$val_recruit['salary'] == 10 ? '25 - 30 triệu' : ''}}
																				{{$val_recruit['salary'] == 11 ? '30 - 50 triệu' : ''}}
																				{{$val_recruit['salary'] == 12 ? 'Trên 50 triệu' : ''}}
																			</div>
																			<div> 
																				<span>
																					<i class="fa fa-clock-o"></i> {{date('d-m-Y', strtotime($val_recruit['created_at']))}}

																				</span> 
																			</div>
																		</div>
																	</td>
																	<td class="cityy" style="width: 25%;">{{$val_province['province']}}</td>
																</tr>
															@endforeach		
														@endif
													@endforeach	
												@endif
											@endforeach
											<tr>
												<td colspan="2">
													<div class="seemore text-right"> <a class="clickRegion" data-type="region" data-id="{{$val_region['id']}}" style="cursor: pointer;">Tiếp theo &gt;&gt;</a> </div>
												</td>
											</tr>	
										</tbody>
									</table>
									@endif
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col-md-3">
					<div class="side-barr">
						<div class="">
							<div class="table-title"><a href="/ho_so_ung_vien">Danh sách hồ sơ xin việc</a></div>
							@if(count($candidates) > 0)
								<table class="table content-item">
									<tbody>
									@foreach($candidates as $key_candidates => $val_candidates)
									<tr>
										<td class="name-candidate">
											<a class="name-jobs" title=""> <span><i class="fa fa-link"></i></span> Hồ sơ xin việc {{$val_candidates['id']}} </a>
											<div class="wrapppp font-weight-bold"> <span>{{$val_candidates['username']}}</span> </div>
											<div class="info d-flex justify-content-between mt-1">
												<div class="cityy">{{$val_candidates['province']}}</div>
												<div>
													<i class="fa fa-graduation-cap" aria-hidden="true"></i>
													{{$val_recruit['education_level'] == 1 ? 'Đại học' : ''}}
													{{$val_recruit['education_level'] == 2 ? 'Cao đẳng' : ''}}
													{{$val_recruit['education_level'] == 3 ? 'THPT' : ''}}
												</div>
											</div>
										</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2">
											<div class="seemore text-right"><a href="/candidates">Tiếp theo &gt;&gt;</a></div>
										</td>
									</tr>
									</tbody>
								</table>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<section class="col-md-12" id="post-featured" data-section-id="post_featured">
						<!-- foreach-->
						@if(count($finance) > 0)
							@foreach($finance as $key_finance => $val_finance)
								@if($val_finance['parent'])
									@foreach($val_finance['parent'] as $key_finance_parnet => $val_finance_parent)
									<div> 
										<a data-type="finance" data-id="{{$val_finance_parent->id}}" class="table-title clickTaichinh" style="cursor: pointer;color:white;background: #00a651;display: flex;align-items: center;justify-content: center;">
											{{$val_finance_parent['name']}}
										</a> 
									</div>
									@if($val_finance_parent['child'])
									<table class="table" style="width: 100%">
										<tbody>
											@foreach($val_finance_parent['child'] as $key_finance_child => $val_finance_child)
												@if($val_finance_child['post'])
													@foreach($val_finance_child['post'] as $key_finance_post => $val_finance_post)
														@if($val_finance_post['postSub'])
														@php 
															$val_finance_postSub = $val_finance_post['postSub'];
														@endphp
																<tr class="__web-inspector-hide-shortcut__">
																	<td class="title-news" style="width: 100%">
																		<a href="/post-data-trading/-271">{{$val_finance_postSub['title']}} </a>
																	</td>
																	@if(isset($val_finance_postSub['province']))
																	<td style="width:400px">
																		<p style="
																			overflow: hidden;
																			-webkit-line-clamp: 1;
																			display: -webkit-box;
																			-webkit-box-orient: vertical;
																			height: 20px;
																			color:blue
																		">
																		{{$val_finance_postSub['province']}}
																		</p>
																	</td>
																	@endif
																	<td class="date">{{date('d-m-Y', strtotime($val_finance_postSub['created_at']))}}</td>
																</tr>
														@endif
													@endforeach
												@endif
											@endforeach
											<tr>
												<td class="date" colspan="4">
													<div class="text-right"> <a href="/">Tiếp theo &gt;&gt;</a> </div>
												</td>
											</tr>
										</tbody>
									</table>
									@endif
									@endforeach
								@endif
							@endforeach
						@endif
					</section>
					@if(count($news) > 0)
					<div class="col-md-12">
						<h4 class="titlel-blue text-center">Tin tức tài chính - thị trường </h4>
						@if(count($news) > 0)
							@foreach($news as $key_news => $val_news)
							<div id="owl-news" class="owl-carousel owl-theme owl-loaded owl-drag">
								<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(-1230px, 0px, 0px); transition: all 0.25s ease 0s; width: 2665px;">
										<div class="owl-item cloned" style="width: 190px; margin-right: 15px;">
											<div class="item">
												<a href="#">
													<div class="card card-news border-0 "> 
														<img class="card-img-top" src="{{asset('assets/news/'.$val_news['hash'].'.'.$val_news['ext']);}}">
														<div class="card-body p-0">
															<div class="date-news font-weight-bold">{{date('d-m-Y', strtotime($val_news['created_at']))}} </div>
															<h4 class="card-title text-center text-md-left">{{$val_news['content_short']}}</h4> </div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						@endif
						<div class="text-center pb-3"> <a href="../templates/news/tin-tuc-tai-chinh-thi-truong.php" class="read-more">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> </div>
					</div>
					@endif
				</div>
				<section id="top-employer" data-section-id="partner_logo">
					<h4 class="titlel-blue text-center">Nhà tuyển dụng hàng đầu</h4>
					<div class="wra border py-2 mb-3">
						<div id="owl-dtt" class="row">
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png"> </a>
							</div>
							<div class="item">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png"> </a>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-3">
				<section id="banner-right" data-section-id="banner_right">
					<div class="wrap-banner-ads">
						<a href=""><img src="//santaichinh24h.vn/files/images/logo/ads1.png" alt="//santaichinh24h.vn/files/images/logo/ads1.png"></a>
					</div>
					<div class="wrap-banner-ads">
						<a href=""><img src="//santaichinh24h.vn/files/images/logo/ads2.png" alt="//santaichinh24h.vn/files/images/logo/ads2.png" class="loading" data-was-processed="true"></a>
					</div>
					<div class="wrap-banner-ads">
						<a href=""><img src="//santaichinh24h.vn/files/images/logo/ads3.png" alt="//santaichinh24h.vn/files/images/logo/ads3.png"></a>
					</div>
					<div class="wrap-banner-ads">
						<a href=""><img src="//santaichinh24h.vn/files/images/logo/ads4.png" alt="//santaichinh24h.vn/files/images/logo/ads4.png"></a>
					</div>
					<div class="wrap-banner-ads">
						<a href=""><img src="//santaichinh24h.vn/files/images/logo/ads5.png" alt="//santaichinh24h.vn/files/images/logo/ads5.png"></a>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@endsection