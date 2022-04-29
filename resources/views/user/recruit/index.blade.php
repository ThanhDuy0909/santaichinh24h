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
<div class="py-5" id="top-employer">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div id="search_employ" class="bg_employ mb-4">
					<div class="form-row">
						<div class="col-md-5">
							<label for="inputGroupSelect02" class="col-form-label">Vị trí: </label>
							<div class="mb-3 mb-md-0">
                                <input type="hidden" class="jobInput" value="{{isset($jobSelect)?$jobSelect : ''}}">
                                <select class="jobSelect">
                                    <option value="">-- Chọn vị trí việc làm --</option>
                                    @if(count($job)> 0)
                                        @foreach($job as $key_job => $val_job)
                                            @php
                                                if(isset($jobSelect)){
                                                    if($jobSelect == $val_job['id']){
                                                        $activeJob = 'selected';
                                                    }else{
                                                        $activeJob = '';
                                                    }
                                                }
                                            @endphp
                                            <option value="{{$val_job['id']}}" {{isset($jobSelect) ?$activeJob : ''}}>{{$val_job['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
							</div>
						</div>
						<div class="col-md-7">
							<label for="inputGroupSelect02" class="col-form-label">Tỉnh thành: </label>
							<div class="row">
								<div class="col-md-9">
                                    <input  type="hidden" class="regionInput" value="{{isset($regionSelect)?$regionSelect : ''}}">
                                    <input  type="hidden" class="provinceInput" value="{{isset($provinceSelect)?$provinceSelect : ''}}" >
                                    <select class="provinceSelect">
                                        <option value="" data-type="region">Chọn</option>
                                        <option value="0" data-type="region" {{isset($regionSelect) &&  $regionSelect == 0 ? 'selected' : ''}}>Toàn quốc</option>
                                        @if(count($region) > 0)
                                            @foreach($region as $key_region => $val_region)
                                                @php
                                                    if(isset($regionSelect)){
                                                        if($regionSelect == $val_region['id']){
                                                            $activeregion = 'selected';
                                                        }else{
                                                            $activeregion = '';
                                                        }
                                                    }
                                                @endphp
                                                <option value="{{$val_region['id']}}" data-type="region" {{isset($regionSelect) ?$activeregion : ''}}>{{$val_region['region']}}</option>
                                                @if(isset($val_region['province']) && count($val_region['province']) > 0)
                                                    @foreach($val_region['province'] as $key_province => $val_province)
                                                        @php
                                                            if(isset($provinceSelect)){
                                                                if($provinceSelect == $val_province['id']){
                                                                    $activeprovince = 'selected';
                                                                }else{
                                                                    $activeprovince = '';
                                                                }
                                                            }
                                                        @endphp
                                                        <option value="{{$val_province['id']}}" data-type="province" {{isset($provinceSelect) ?$activeprovince : ''}}>|__{{$val_province['province']}}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
								</div>
								<div class="col-md-3">
									<button class="btn-bali btn-success search_recruit">Tìm kiếm</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead class="thead-light">
								<tr>
									<th colspan="3" class="text-center important">Tin tuyển dụng</th>
								</tr>
							</thead>
							<tbody>
                                @if(isset($recruitPage) && count($recruitPage) > 0)
                                    @foreach($recruitPage as $key => $val)
                                        @if($val['province'] != "")
                                        <tr>
                                            <td class="title-news" style="width: 50%">
                                                <div class="item py-3">
                                                    <div class="title-work-lates mb-2"> 
                                                    <a class="clickRegion" data-type="item" data-id="{{$val['id']}}" style="cursor: pointer;" class="font-weight-bold">{{$val['title']}}</a> </div>
                                                    <div class="text-uppercase font-weight-bold"> </div>
                                                    <div class="d-flex justify-content-between flex-wrap"> 
                                                        <span>
                                                            <i class="fa fa-usd" aria-hidden="true"></i>&nbsp; 
                                                            {{$val['salary'] == 1 ? 'Thỏa thuận' : ''}}
                                                            {{$val['salary'] == 2 ? 'Dưới 3 triệu' : ''}}
                                                            {{$val['salary'] == 3 ? '3 - 5 triệu' : ''}}
                                                            {{$val['salary'] == 4 ? '5 - 7 triệu' : ''}}
                                                            {{$val['salary'] == 5 ? '7 - 10 triệu' : ''}}
                                                            {{$val['salary'] == 6 ? '10 - 12 triệu' : ''}}
                                                            {{$val['salary'] == 7 ? '12 - 15 triệu' : ''}}
                                                            {{$val['salary'] == 8 ? '15 - 20 triệu' : ''}}
                                                            {{$val['salary'] == 9 ? '20 - 25 triệu' : ''}}
                                                            {{$val['salary'] == 10 ? '25 - 30 triệu' : ''}}
                                                            {{$val['salary'] == 11 ? '30 - 50 triệu' : ''}}
                                                            {{$val['salary'] == 12 ? 'Trên 50 triệu' : ''}}
                                                        </span> 
                                                        <span>
                                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp; 
                                                                {{$val['education_level'] == 1 ? 'Đại học' : ''}}
                                                                {{$val['education_level'] == 2 ? 'Cao đẳng' : ''}}
                                                                {{$val['education_level'] == 3 ? 'THPT' : ''}}
                                                        </span> 
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$val['province']}}</td>
                                            <td class="date" style="width:15%"> 
                                                <span class="text-primary font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{$val['expiration_date']}}
                                                </span> 
                                            </td>
                                        </tr>	
                                        @endif
                                    @endforeach
                                @endif						
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-2"> <a class="buysell-data justify-content-between d-flex align-items-center" href="/post-recruitment-create"> Đăng Tin Tuyển Dụng <i class="fa fa-usd" aria-hidden="true"></i></a> </div>
				<div class="wrap-top-employer border">
					<div class="side-bar-title text-center"> Nhà tuyển dụng hàng đầu </div>
					<div class="col-md-12">
						<div class="row text-center">
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true"> </a>
							</div>
							<div class="col-md-6 col-4 wra-mgu-ig py-3">
								<a href=""> <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true"> </a>
							</div>
						</div>
					</div>
				</div>
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
			</div>
		</div>
	</div>
</div>
@endsection