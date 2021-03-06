@extends('cpanel.index')
@section('title', $title)
@section('content')

@php 
$name_img           = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==';
$month_graduate     = "";
$year_graduate      = "";
if(isset($candidates)){
	if(strpos($candidates['imgname'], ' ') == true ){
        $exp_file = explode(" ",$candidates['imgname']);
        $imgname = $exp_file['0'].''.$exp_file['1'];
    }else {
       $imgname = $candidates['imgname'];
    }

	$upload_img =  $imgname.' '.$candidates['imghash'].' '.$candidates['imgext'];
	$name_img 	 = asset('assets/candidates/'.$candidates['imghash'].'.'.$candidates['imgext']);

    if(strpos($candidates['filename'], ' ') == true ){
        $exp_file = explode(" ",$candidates['filename']);
        $filename = $exp_file['0'].''.$exp_file['1'];
    }else {
       $filename = $candidates['filename'];
    }
    $upload_file =  $filename.' '.$candidates['filehash'].' '.$candidates['fileext'];
    $name_cv 	 = asset('assets/cv/'.$candidates['filehash'].'.'.$candidates['fileext']);

    if($candidates['graduate_candidates'] != ""){
        $graduate_ = explode('-',$candidates['graduate_candidates']);
        if(count($graduate_) > 0){
            $month_graduate     = $graduate_[0];
            $year_graduate      = $graduate_[1];
        }
    }
}

$getSkill = DB::table('catelog')->where('id',11)->where('active',1)->where('delete',1)->get();
if($getSkill){
    foreach($getSkill as $key_skill => $val_skill){
        $child = DB::table('catelog')->where('child_id',$val_skill->id)->where('active',1)->where('delete',1)->get();
        $getSkill[$key_skill]->child = $child;
    }
}
@endphp
<input  type="hidden" class="active_candidates" value="1">
<div class="page-content">
	<!-- Page Breadcrumb -->
    <input type="hidden" class="id_candidates" value="{{isset($candidates) && $candidates['id'] ? $candidates['id'] : ''}}">
    <input type="hidden" class="job_industry" value="{{isset($candidates) && $candidates['job_industry'] != '' ? $candidates['job_industry'] : ''}}">
    <input type="hidden" class="province_candidates" value="{{isset($candidates) && $candidates['province_candidates'] != '' ? $candidates['province_candidates'] : ''}}">
    <input type="hidden" class="gender_candidates" value="{{isset($candidates) && $candidates['gender_candidates'] != '' ? $candidates['gender_candidates'] : ''}}">
    <input type="hidden" class="marital_candidates" value="{{isset($candidates) && $candidates['marital_candidates'] != '' ? $candidates['marital_candidates'] : ''}}">
    <input type="hidden" class="education_level" value="{{isset($candidates) && $candidates['education_level'] != '' ? $candidates['education_level'] : ''}}">

    <input type="hidden" class="month_graduate" value="{{isset($candidates) && $month_graduate != '' ? $month_graduate : ''}}">
    <input type="hidden" class="year_graduate" value="{{isset($candidates) && $year_graduate != '' ? $year_graduate : ''}}">
    <input type="hidden" class="skill_candidates" value="{{isset($candidates) && $candidates['skill_candidates'] != '' ? $candidates['skill_candidates'] : ''}}">
    <div class="page-breadcrumbs breadcrumbs-fixed">
		<div class="buttons-task col-xs-12 col-md-4">
			<ul class="breadcrumb breadcrumbs-fixed">
				<li><i class="fa fa-table"></i></li>
				<li class="toast-title">Qu???n l?? Th??nh vi??n</li>
			</ul>
		</div>
		<div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
			<div class="col-lg-12 col-sm-12 col-xs-12"> 
				<button class="btn btn-blue shiny submit_Candidates"> <i class="fa fa-save"></i> L??u l???i </button>
				<a href="/cpanel/candidates" class="btn btn-default shiny"> <i class="fa fa-refresh"></i> H???y l??u </a>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb -->
	<!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">Th??ng tin ???ng tuy???n</div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_province">T???nh th??nh ph???</label>
                                    <div>
                                        <select class="candidates_provinceSelect" name="candidates_provinceSelect" id="candidates_provinceSelect" style="width: 100%" tabindex="-1"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="recruitment">V??? tr?? ???ng tuy???n</label>
                                    <div>
                                        <select id="job_Selectindustry" multiple="multiple" style="width: 100%" tabindex="-1" class="job_Selectindustry"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-title">Th??ng tin c?? nh??n</div>
                                <div class="form-group">
                                    <label for="full_name">H??? v?? t??n <span class="text-danger">*</span></label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="H??? v?? t??n l??t"></i>
                                    <div>
                                        <input value="{{isset($candidates) && $candidates['full_nameCandidates'] != '' ? $candidates['full_nameCandidates'] : ''}}" name="full_nameCandidates" type="text" id="full_nameCandidates" class="form-control full_nameCandidates"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="genderSelect">Gi???i t??nh</label>
                                    <div>
                                        <select class="form-control genderSelect" name="genderSelect" id="genderSelect">
                                            <option value="">-- Ch???n gi???i t??nh --</option>
                                            <option value="1" {{isset($candidates) && $candidates['gender_candidates'] == 1 ? 'selected' : ''}}> Nam </option>
                                            <option value="2" {{isset($candidates) && $candidates['gender_candidates'] == 2 ? 'selected' : ''}}> N??? </option>
                                            <option value="3" {{isset($candidates) && $candidates['gender_candidates'] == 3 ? 'selected' : ''}}> Kh??c </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="maritalSlect">T??nh tr???ng h??n nh??n</label>
                                    <div>
                                        <select class="form-control maritalSlect" name="maritalSlect" id="maritalSlect">
                                            <option value="">-- Ch???n t??nh tr???ng --</option>
                                            <option value="1" {{isset($candidates) && $candidates['marital_candidates'] == 1 ? 'selected' : ''}}> ?????c th??n </option>
                                            <option value="2" {{isset($candidates) && $candidates['marital_candidates'] == 2 ? 'selected' : ''}}> ???? k???t h??n </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthday_candidates">Ng??y sinh</label>
                                    <div>
                                        <input value="{{isset($candidates) && $candidates['birthday_candidates'] != '' ? $candidates['birthday_candidates'] : ''}}" type="date" name="birthday_candidates" id="birthday_candidates" class="form-control birthday_candidates" required="" aria-invalid="false">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-title">Th??ng tin li??n h???</div>
                                <div class="form-group">
                                    <label for="phone_candidates">S??? ??i???n tho???i</label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="S??? ??i???n tho???i"></i>
                                    <div>
                                        <input value="{{isset($candidates) && $candidates['phone_candidates'] != '' ? $candidates['phone_candidates'] : ''}}" name="phone_candidates" type="tel" id="phone_candidates" class="form-control phone_candidates"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="email_candidates">Email</label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="?????a ch??? Email"></i>
                                    <div>
                                        <input value="{{isset($candidates) && $candidates['email_candidates'] != '' ? $candidates['email_candidates'] : ''}}" name="email_candidates" type="email" id="email_candidates" class="form-control email_candidates">
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label for="address">?????a ch???</label> <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="right" data-original-title="?????a ch??? doanh nghi???p"></i>
                                    <div>
                                        <textarea name="address_candidates" type="text" id="address_candidates" class="form-control address_candidates" rows="2">{{isset($candidates) && $candidates['address_candidates'] != '' ? $candidates['address_candidates'] : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">H???c v???n</div>
                        <div class="form-group">
                            <label for="school_candidates">Tr?????ng/kh??a h???c</label>
                            <div>
                                <input value="{{isset($candidates) && $candidates['school_candidates'] != '' ? $candidates['school_candidates'] : ''}}" name="school_candidates" type="tel" id="school_candidates" class="form-control school_candidates" > 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="education_levelSelect">Tr??nh ????? h???c v???n</label>
                                    <div>
                                        <select class="col-xs-12 education_levelSelect"  id="education_levelSelect" name="education_levelSelect">
                                            <option value="">-- Ch???n Tr??nh ????? h???c v???n --</option>
                                            <option value="1" {{isset($candidates) && $candidates['education_level'] == 1 ? 'selected' : ''}}>?????i h???c</option>
                                            <option value="2" {{isset($candidates) && $candidates['education_level'] == 2 ? 'selected' : ''}}>Cao ?????ng</option>
                                            <option value="3" {{isset($candidates) && $candidates['education_level'] == 3 ? 'selected' : ''}}>THPT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>T???t nghi???p</label>
                                    <div style="display:flex">
                                        <select class="form-control month_graduateSelect" name="month_graduateSelect" id="month_graduateSelect">
                                            <option value="">-- Ch???n th??ng --</option>
                                            @for($m = 1 ; $m < 13 ; $m++) 
                                                @php 
                                                    if($month_graduate != ""){
                                                        if($month_graduate == $m){
                                                            $selectMonth = 'selected';
                                                        }else{
                                                            $selectMonth = '';
                                                        }
                                                    }else{
                                                        $selectMonth = '';
                                                    }
                                                @endphp
                                                <option value="{{$m}}" {{$selectMonth}}>Th??ng {{$m}}</option>
                                            @endfor
                                        </select>
                                        <select class="form-control year_graduateSelect" name="year_graduateSelect" id="year_graduateSelect">
                                            <option value="">-- Ch???n n??m --</option>
                                            @for($y = 1990 ; $y < 2022 ; $y++) 
                                                @php 
                                                    if($year_graduate != ""){
                                                        if($year_graduate == $y){
                                                            $selectYear = 'selected';
                                                        }else{
                                                            $selectYear = '';
                                                        }
                                                    }else{
                                                        $selectYear = '';
                                                    }
                                                @endphp
                                                <option value="{{$y}}" {{$selectYear}}>N??m {{$y}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">B???ng c???p/Ch???ng ch???</div>
                        <input type="hidden" class="countlanguage" value="{{isset($candidates) && isset($candidates['candidates_en']) ? count($candidates['candidates_en']) - 1 : 0}}">
                        <div class="groupNgoaiNgu">
                            @if(isset($candidates) && isset($candidates['candidates_en']))
                                @for($i = 0 ; $i < count($candidates['candidates_en']) ; $i++)
                                    <input type="hidden" class="language_{{$i}}" value="{{$candidates['candidates_en'][$i]['language_id']}}">
                                    <input type="hidden" class="tdLanguage_{{$i}}" value="{{$candidates['candidates_en'][$i]['level_id']}}">
                                    <div class="row ngoaingu_{{$i}}">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                @if($i == 0)
                                                <label for="website">Tr??nh ????? ngo???i ng??? <a class="addlanguage">Th??m</a></label>
                                                @else
                                                <a class="removeLanguage" data-id="{{$i}}">X??a</a>
                                                @endif
                                                <div>
                                                    <select class="form-control languageSelect" name="languageSelect" id="languageSelect">
                                                        <option value="">-- Ch???n tr??nh ????? ngo???i ng??? --</option>
                                                        <option value="1"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['language_id'] == 1 ? 'selected' : ''}}>Anh </option>
                                                        <option value="2"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['language_id'] == 2 ? 'selected' : ''}}> M??? </option>
                                                        <option value="3"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['language_id'] == 3 ? 'selected' : ''}}> Nh???t </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="business_fax">Tr??nh ?????</label>
                                                <div>
                                                    <select class="form-control tdLanguageSelect" name="tdLanguageSelect" id="tdLanguageSelect">
                                                        <option value="">-- Ch???n tr??nh ????? --</option>
                                                        <option value="1"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['level_id'] == 1 ? 'selected' : ''}}>C?? B???n </option>
                                                        <option value="2"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['level_id'] == 2 ? 'selected' : ''}}>Kh?? </option>
                                                        <option value="3"  data-id="{{$i}}" {{$candidates['candidates_en'][$i]['level_id'] == 3 ? 'selected' : ''}}>L??u Lo??t </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @else 
                            <input type="hidden" class="language_0">
                            <input type="hidden" class="tdLanguage_0">
                            <div class="row ngoaingu_0">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="website">Tr??nh ????? ngo???i ng??? <a class="addlanguage">Th??m</a></label>
                                        <div>
                                            <select class="form-control languageSelect" name="languageSelect" id="languageSelect">
                                                <option value="">-- Ch???n tr??nh ????? ngo???i ng??? --</option>
                                                <option value="1"  data-id="0">Anh </option>
                                                <option value="2"  data-id="0"> M??? </option>
                                                <option value="3"  data-id="0"> Nh???t </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="business_fax">Tr??nh ?????</label>
                                        <div>
                                            <select class="form-control tdLanguageSelect" name="tdLanguageSelect" id="tdLanguageSelect">
                                                <option value="">-- Ch???n tr??nh ????? --</option>
                                                <option value="1"  data-id="0">C?? B???n </option>
                                                <option value="2"  data-id="0">Kh?? </option>
                                                <option value="3"  data-id="0">L??u Lo??t </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" class="countComputer" value="{{isset($candidates) && isset($candidates['candidates_computer']) ? count($candidates['candidates_computer']) - 1 : 0}}">
                        <div class="groupTinHoc">
                            @if(isset($candidates) && isset($candidates['candidates_computer']))
                                @for($i = 0 ; $i < count($candidates['candidates_computer']) ; $i++)
                                    <input type="hidden" class="computer_{{$i}}" value="{{$candidates['candidates_computer'][$i]['computer_id']}}">
                                    <input type="hidden" class="tdcomputer_{{$i}}" value="{{$candidates['candidates_computer'][$i]['level_id']}}">
                                    <div class="row tinhoc_{{$i}}">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                @if($i == 0)
                                                <label for="website">Tr??nh ????? tin h???c<a class="addComputer">Th??m</a></label>
                                                @else
                                                <a class="removeComputer" data-id="{{$i}}">X??a</a>
                                                @endif
                                                <div>
                                                    <select class="form-control computerSelect" name="computerSelect" id="computerSelect">
                                                        <option value="">-- Ch???n tr??nh ????? tin h???c--</option>
                                                        <option value="1"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['computer_id'] == 1 ? 'selected' : ''}}>Word </option>
                                                        <option value="2"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['computer_id'] == 2 ? 'selected' : ''}}> Excel </option>
                                                        <option value="3"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['computer_id'] == 3 ? 'selected' : ''}}> Power Point  </option>
                                                        <option value="4"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['computer_id'] == 4 ? 'selected' : ''}}> T???t c??? </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="business_fax">Tr??nh ?????</label>
                                                <div>
                                                    <select class="form-control tdComputerSelect" name="tdComputerSelect" id="tdComputerSelect">
                                                        <option value="">-- Ch???n tr??nh ????? --</option>
                                                        <option value="1"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['level_id'] == 1 ? 'selected' : ''}}>C?? B???n</option>
                                                        <option value="2"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['level_id'] == 2 ? 'selected' : ''}}>Kh??</option>
                                                        <option value="3"  data-id="{{$i}}" {{$candidates['candidates_computer'][$i]['level_id'] == 3 ? 'selected' : ''}}>T???t</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @else 
                                <input type="hidden" class="computer_0">
                                <input type="hidden" class="tdcomputer_0">
                                <div class="row tinhoc_0">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="website">Tr??nh ????? tin h???c<a class="addComputer">Th??m</a></label>
                                            <div>
                                                <select class="form-control computerSelect" name="computerSelect" id="computerSelect">
                                                    <option value="">-- Ch???n tr??nh ????? tin h???c--</option>
                                                    <option value="1"  data-id="0">Word</option>
                                                    <option value="2"  data-id="0">Excel</option>
                                                    <option value="3"  data-id="0">Power Point</option>
                                                    <option value="4"  data-id="0">T???t c??? </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="business_fax">Tr??nh ?????</label>
                                            <div>
                                                <select class="form-control tdcomputerSelect" name="tdcomputerSelect" id="tdcomputerSelect">
                                                    <option value="">-- Ch???n tr??nh ????? --</option>
                                                    <option value="1"  data-id="0">C?? B???n </option>
                                                    <option value="2"  data-id="0">Kh?? </option>
                                                    <option value="3"  data-id="0">T???t</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="otherDegrees_candidates">B???ng c???p kh??c</label>
                            <div>
                                <input name="otherDegrees_candidates" type="text" id="otherDegrees_candidates" value="{{isset($candidates) && $candidates['otherDegrees_candidates'] != '' ? $candidates['otherDegrees_candidates'] : ''}}" class="form-control otherDegrees_candidates"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">Kinh nghi???m l??m vi???c</div>
                        @if(isset($candidates) && $candidates['candidates_work'] != "")
                        @php 
                            $candidates_work = $candidates['candidates_work'];
                        @endphp
                        <div class="form-group">
                            <label for="">Kinh nghi???m l??m vi???c</label>
                            <div>
                                <input type="hidden" class="workExperience_candidates" value="{{isset($candidates) ? $candidates['workExperience_candidates'] : '0'}}">
                                <label>
                                    <input name="kinh_nghiem" type="checkbox" id="" class="check_workExp" {{isset($candidates) && $candidates['workExperience_candidates'] == 1 ? 'checked' : '' }}> <span class="text">Ch??a c?? kinh nghi???m</span> </label>
                            </div>
                        </div>
                        @if($candidates['workExperience_candidates'] != 1)
                        <input type="hidden" class="countExpWork" value="{{count($candidates_work)}}">
                        <div class="groupKinhNghiem">
                            @for($w = 0 ; $w < count($candidates_work) ; $w++)
                                @php                                                   
                                    $form_[$w]      = explode('-',$candidates_work[$w]['form_work']);
                                    $form_month[$w] = $form_[$w][0];
                                    $form_year[$w]  = $form_[$w][1];

                                    $to_[$w]        = explode('-',$candidates_work[$w]['to_work']);
                                    $to_month[$w]   = $to_[$w][0];
                                    $to_year[$w]    = $to_[$w][1];
                                @endphp
                                <div class="kinnh_nghiem{{$w}}">
                                    <input type="hidden" class="form_month{{$w}}" value="{{$form_month[$w]}}">
                                    <input type="hidden" class="form_year{{$w}}" value="{{$form_year[$w]}}">
                                    <input type="hidden" class="to_month{{$w}}" value="{{$to_month[$w]}}">
                                    <input type="hidden" class="to_year{{$w}}" value="{{$to_year[$w]}}">
                                    <div class="form-group">
                                        @if($w == 0)
                                            <label for="">V??? tr?? ch???c danh <a class="addExpWork">Th??m kinh nghi???m</a></label>
                                        @else
                                            <label for="">V??? tr?? ch???c danh <a class="removeExpWork" data-id="{{$w}}">X??a</a>
                                        @endif
                                        <div>
                                            <input value="{{$candidates_work[$w]['title_work']}}" name="title_work{{$w}}" type="text" id="" class="form-control title_work{{$w}}"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">C???p b???c</label>
                                        <div>
                                            <input value="{{$candidates_work[$w]['ranks_work']}}" name="ranks_work{{$w}}" type="text" id="ranks_work{{$w}}" class="form-control ranks_work{{$w}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">C??ng ty</label>
                                        <div>
                                            <input value="{{$candidates_work[$w]['company_work']}}" name="company_work{{$w}}" type="text" id="company_work{{$w}}" class="form-control company_work{{$w}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">?????n</label>
                                                <div style="display:flex">
                                                    <select class="form-control to_monthSelect" name="to_monthSelect" id="to_monthSelect">
                                                        <option value="" data-id="{{$w}}">-- Ch???n --</option>
                                                        @for($m = 1 ; $m < 13 ; $m++)
                                                            @php 
                                                                if($form_month[$w] == $m){
                                                                    $select_month[$w] = 'selected';
                                                                }else{
                                                                    $select_month[$w] = '';
                                                                }
                                                            @endphp
                                                            <option value="{{$m}}" data-id="{{$w}}" {{$select_month[$w]}}>Th??ng {{$m}}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="form-control to_yearSelect" name="to_yearSelect" id="to_yearSelect">
                                                        <option value="">-- Ch???n --</option>
                                                        @for($y = 1990 ; $y < 2022 ; $y++) 
                                                            @php 
                                                                if($form_year[$w] == $y){
                                                                    $select_year[$w] = 'selected';
                                                                }else{
                                                                    $select_year[$w] = '';
                                                                }
                                                            @endphp
                                                            <option value="{{$y}}" data-id="{{$w}}" {{$select_year[$w]}}>N??m {{$y}}</option>
                                                        @endfor
                                                    </select>                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">?????n</label>
                                                <div style="display:flex">
                                                    <select class="form-control to_monthSelect" name="to_monthSelect" id="to_monthSelect">
                                                        <option value="" data-id="{{$w}}">-- Ch???n --</option>
                                                        @for($m = 1 ; $m < 13 ; $m++) 
                                                            @php 
                                                                if($to_month[$w] == $m){
                                                                    $select_month[$w] = 'selected';
                                                                }else{
                                                                    $select_month[$w] = '';
                                                                }
                                                            @endphp
                                                            <option value="{{$m}}" data-id="{{$w}}" {{$select_month[$w] }}>Th??ng {{$m}}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="form-control to_yearSelect" name="to_yearSelect" id="to_yearSelect">
                                                        <option value="">-- Ch???n --</option>
                                                        @for($y = 1990 ; $y < 2022 ; $y++) 
                                                             @php 
                                                                if($to_year[$w] == $y){
                                                                    $select_year[$w] = 'selected';
                                                                }else{
                                                                    $select_year[$w] = '';
                                                                }
                                                            @endphp
                                                            <option value="{{$y}}" data-id="{{$w}}" {{$select_year[$w] }}>N??m {{$y}}</option>
                                                        @endfor
                                                    </select>                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="">M?? t??? c??ng vi???c</label>
                                    <div>
                                        <textarea name="content_work{{$w}}" type="text" id="content_work{{$w}}" class="form-control content_work{{$w}}" rows="2">{{$candidates_work[$w]['content_work']}}</textarea>
                                    </div>
                                </div>
                                </div>
                            @endfor
                        </div>
                        @endif
                        @else
                        <div class="form-group">
                            <label for="">Kinh nghi???m l??m vi???c</label>
                            <div>
                                <input type="hidden" class="workExperience_candidates" value="0">
                                <label>
                                    <input name="kinh_nghiem" type="checkbox" id="" class="check_workExp"> <span class="text">Ch??a c?? kinh nghi???m</span> </label>
                            </div>
                        </div>
                        <input type="hidden" class="countExpWork" value="0">
                        <div class="groupKinhNghiem">
                            <div class="kinnh_nghiem0">
                                <input type="hidden" class="form_month0">
                                <input type="hidden" class="form_year0">
                                <input type="hidden" class="to_month0">
                                <input type="hidden" class="to_year0">
                                <div class="form-group">
                                    <label for="">V??? tr?? ch???c danh <a class="addExpWork">Th??m kinh nghi???m</a></label>
                                    <div>
                                        <input name="title_work0" type="text" id="" class="form-control title_work0"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">C???p b???c</label>
                                    <div>
                                        <input name="ranks_work0" type="text" id="ranks_work0" class="form-control ranks_work0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">C??ng ty</label>
                                    <div>
                                        <input name="company_work0" type="text" id="company_work0" class="form-control company_work0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Th???i gian l??m vi???c</label>
                                            <div style="display:flex">
                                                <select class="form-control from_monthSelect" name="from_monthSelect" id="from_monthSelect">
                                                    <option value="" data-id="0">-- Ch???n --</option>
                                                    @for($m = 1 ; $m < 13 ; $m++) 
                                                        <option value="{{$m}}" data-id="0">Th??ng {{$m}}</option>
                                                    @endfor
                                                </select>
                                                <select class="form-control from_yearSelect" name="from_yearSelect" id="from_yearSelect">
                                                    <option value="">-- Ch???n --</option>
                                                    @for($y = 1990 ; $y < 2022 ; $y++) 
                                                        <option value="{{$y}}" data-id="0">N??m {{$y}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">?????n</label>
                                            <div style="display:flex">
                                                <select class="form-control to_monthSelect" name="to_monthSelect" id="to_monthSelect">
                                                    <option value="" data-id="0">-- Ch???n --</option>
                                                    @for($m = 1 ; $m < 13 ; $m++) 
                                                        <option value="{{$m}}" data-id="0">Th??ng {{$m}}</option>
                                                    @endfor
                                                </select>
                                                <select class="form-control to_yearSelect" name="to_yearSelect" id="to_yearSelect">
                                                    <option value="">-- Ch???n --</option>
                                                    @for($y = 1990 ; $y < 2022 ; $y++) 
                                                        <option value="{{$y}}" data-id="0">N??m {{$y}}</option>
                                                    @endfor
                                                </select>                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">M?? t??? c??ng vi???c</label>
                                    <div>
                                        <textarea name="content_work0" type="text" id="content_work0" class="form-control content_work0" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white" style="height: 200px;">
                        <div class="form-title">K??? n??ng chuy??n m??n</div>
                        <div class="form-group" > 
                                @if(isset($getSkill) && count($getSkill) > 0)
                                    @foreach($getSkill as $key_skill => $val_skill)
                                        @if(isset($val_skill->child) && count($val_skill->child) > 0)
                                            @foreach($val_skill->child as $key_skillchild => $val_skillchild)
                                                <div class="col-md-4">
                                                    <label>
                                                        @if(isset($candidates) && count($candidates['candidates_skill']) > 0)
                                                        <input 
                                                            name="check_skill" 
                                                            type="checkbox" 
                                                            class="check_skill" 
                                                            value="{{$val_skillchild->id}}"
                                                            @php
                                                            foreach($candidates['candidates_skill'] as $key_canskill => $val_canskill){
                                                                if($val_skillchild->id == $val_canskill['skill_id']){
                                                                    echo 'checked';
                                                                }   
                                                            }                                                     
                                                            @endphp
                                                        >
                                                        @else
                                                        <input 
                                                            name="check_skill" 
                                                            type="checkbox" 
                                                            class="check_skill" 
                                                            value="{{$val_skillchild->id}}"
                                                        >
                                                        @endif
                                                       
                                                        <span class="text">{{$val_skillchild->name}}</span> 
                                                    </label>
                                                </div>
                                            @endforeach
                                            @endif
                                    @endforeach
                                @endif
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">Th??nh t??ch n???i b???t</div>
                        <div class="form-group">
                            <label for="achievements_candidates">Th??nh t??ch n???i b???t</label>
                            <div>
                                <textarea name="achievements_candidates" type="text" id="achievements_candidates" class="form-control achievements_candidates" rows="5">{{isset($candidates) && $candidates['achievements_candidates'] != "" ? $candidates['achievements_candidates'] : ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">H??nh ???nh</div>
                        <div class="form-group">
                            <label for="image_src">???nh ch??nh <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title=""></i></label>
                            <div> 
                                <img 
                                id="image_fileCandidates" 
                                style="height:180px;" 
                                class="img-thumbnail" 
                                alt="150x150" 
                                src="{{$name_img }}"
                                >
                            </div>
                        <div class="form-group">
                            <div>
                                <input class="upload_imgCandidates" type="hidden" value="{{isset($candidates) ? $upload_img : ''}}">
                                <input type="file" class="chosse_imgCandidates btn btn-default" style="margin-bottom: 5px;">
                                <button class="btn btn-defaul remove_imgCandidates">B??? ch???n </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget radius-bordered">
                    <div class="widget-body widget-body-white">
                        <div class="form-title">T???p CV</div>
                        <div class="form-group">
                            <div>
                                <div>
                                    <iframe id="cv_fileCandidates" src="{{isset($candidates) ? $name_cv : ''}}" height="180" width="300"></iframe>
                                    <input class="upload_fileCandidates" type="hidden" value="{{isset($candidates) ? $upload_file : ''}}">
                                    <input type="file" class="chosse_fileCandidates btn btn-default" style="margin-bottom: 5px;">
                                    <button class="btn btn-defaul remove_fileCandidates">B??? ch???n </button>
                                </div>
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