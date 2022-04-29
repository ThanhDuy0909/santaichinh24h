@extends('user.index')
@section('title', 'Sàn Tài Chính 24h')
@section('content')
<section id="candidate-detail" class="mt-md-4 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="border blue rounded">
					<div class="bg-white py-2 px-4 rounded">
						<div class="row">
							<div class="col-md-2 col-4"> </div>
							<div class="col-md-6 col-8">
								<div class="text-center">
									<div class="text-danger font-weight-bold h5">{{$recruitPage['title']}}</div>
									<div class="text-primary font-weight-bold"></div>
								</div>
							</div>
							<div class="col-md-4"> <a class="btn text-white bg-success button-recruiment text-uppercase">Nộp đơn ứng tuyển</a> </div>
						</div>
						<div class="row mt-3">
							<div class="col-md-6 mt-1"> 
                                <span class="text-primary font-weight-bold">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> Trình độ:
                                </span> 
                                <span>
                                    {{$recruitPage['education_level'] == 1 ? 'Đại học' : ''}}
                                    {{$recruitPage['education_level'] == 2 ? 'Cao đẳng' : ''}}
                                    {{$recruitPage['education_level'] == 3 ? 'THPT' : ''}}
                                </span> 
                            </div>
							<div class="col-md-6 mt-1"> 
                                <span class="text-primary font-weight-bold">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Nhận hồ sơ đến:
                                </span> 
                                <span>{{$recruitPage['expiration_date']}}</span> 
                            </div>
							<div class="col-md-6 mt-1"> <span class="text-primary font-weight-bold">
                                    <i class="fa fa-history" aria-hidden="true"></i> Kinh nghiệm:
                                </span> 
                                <span>
                                    {{$recruitPage['exp'] == 1 ? '1 năm' : ''}}
                                    {{$recruitPage['exp'] == 2 ? '2 năm' : ''}}
                                    {{$recruitPage['exp'] == 3 ? 'Không Kinh Nghiệm' : ''}}
                                    {{$recruitPage['exp'] == 4 ? 'Dưới 1 năm' : ''}}
                                    {{$recruitPage['exp'] == 5 ? '3 năm' : ''}}
                                    {{$recruitPage['exp'] == 6 ? '4 năm' : ''}}
                                    {{$recruitPage['exp'] == 7 ? '5 năm' : ''}}
                                    {{$recruitPage['exp'] == 8 ? 'Trên 5 năm' : ''}}
                                </span> 
                            </div>
							<div class="col-md-6 mt-1"> 
                                <span class="text-primary font-weight-bold">
                                    <i class="fa fa-check-square" aria-hidden="true"></i> Loại công việc:
                                </span> 
                                <span>
                                    {{$recruitPage['type_work'] == 1 ? 'Toàn thời gian' : ''}}
                                    {{$recruitPage['type_work'] == 2 ? 'Bán Thời gian' : ''}}
                                    {{$recruitPage['type_work'] == 3 ? 'Làm tại nhà' : ''}}
                                </span> 
                            </div>
							<div class="col-md-6 mt-1"> <span class="text-primary font-weight-bold">
                                    <i class="fa fa-usd" aria-hidden="true"></i> Mức lương:
                                </span> 
                                <span>
                                    {{$recruitPage['salary'] == 1 ? 'Thỏa thuận' : ''}}
                                    {{$recruitPage['salary'] == 2 ? 'Dưới 3 triệu' : ''}}
                                    {{$recruitPage['salary'] == 3 ? '3 - 5 triệu' : ''}}
                                    {{$recruitPage['salary'] == 4 ? '5 - 7 triệu' : ''}}
                                    {{$recruitPage['salary'] == 5 ? '7 - 10 triệu' : ''}}
                                    {{$recruitPage['salary'] == 6 ? '10 - 12 triệu' : ''}}
                                    {{$recruitPage['salary'] == 7 ? '12 - 15 triệu' : ''}}
                                    {{$recruitPage['salary'] == 8 ? '15 - 20 triệu' : ''}}
                                    {{$recruitPage['salary'] == 9 ? '20 - 25 triệu' : ''}}
                                    {{$recruitPage['salary'] == 10 ? '25 - 30 triệu' : ''}}
                                    {{$recruitPage['salary'] == 11 ? '30 - 50 triệu' : ''}}
                                    {{$recruitPage['salary'] == 12 ? 'Trên 50 triệu' : ''}}
                                </span> 
                            </div>
							<div class="col-md-6 mt-1"> 
                                <span class="text-primary font-weight-bold">
                                    <i class="fa fa-building-o" aria-hidden="true"></i> Nơi làm việc:
                                </span> 
                                <span>{{$recruitPage['province']}}</span> 
                            </div>
						</div>
					</div>
				</div>
				<div class="border blue mt-3">
					<div class="bg-white py-3 px-4">
						<div class="grave_level">
							<div class="item">
								<div class="text-warning font-weight-bold h5">Mô tả công việc</div>
								<div class="pl-3">
									<div>{{$recruitPage['content_work']}}</div>
								</div>
							</div>
							<div class="item">
								<div class="text-warning font-weight-bold h5">Quyền lợi và chế độ</div>
								<div class="pl-3"> {{$recruitPage['regime_work']}}</div>
							</div>
							<div class="item">
								<div class="text-warning font-weight-bold h5">Nộp hồ sơ</div>
								<div class="pl-3">{{$recruitPage['profile_work']}}</div>
							</div>
							<div class="item">
								<div class="text-warning font-weight-bold h5">Thông tin liên hệ</div>
								<div class="pl-3">{{$recruitPage['contact_work']}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="posting-btn recruit mb-2"> <a href="#"> Đăng tin tuyển dụng</a> </div>
				<div class="related-records border blue">
					<div class="bg-white">
						<div class="titlle text-center">Việc làm tương tự</div>
						<div class="side-barr">
							<div class="relates-work"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mb-4"></div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="titlel-blue text-center">Nhà tuyển dụng hàng đầu</h4>
				<div class="wra border py-2 mb-3">
					<div id="owl-dtt" class="row">
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true"> </a>
						</div>
						<div class="item">
							<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true"> </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection