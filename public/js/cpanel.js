function toastPopup(_type,_title = null,_message = null, _ok = null , _cancel = null){
  var type_   =   _type     != null ? _type : '';
  var title_   =   _title   != null ? _title : '';
  var message_ =   _message != null ? _message : '';
  var ok_      =   _ok      != null ? _ok : 'Okay';
  var cancel_  =   _cancel  != null? _cancel:'';
  if(cancel_ != ''){
    cuteAlert({
      type: type_,
      title: title_,
      message: message_,
      confirmText: ok_,
      cancelText: cancel_
    })
  }else{
    cuteAlert({
      type: type_,
      title: title_,
      message: message_,
      buttonText: ok_,
    })
  }
}

function toastBox(_type, _message, _sup = null , _settime = null){
cuteToast({
  type: _type, // or 'info', 'error', 'warning'
  message: _message,
  sup_text: _sup,
  timer: _settime
})
}


function profile(){
  if(token != null){
    $.ajax({
        method: "GET",
        url  : linkApi + route.profile,
        data : {},
        success : function(data){
            if(data.is_delete == false || data.is_active == false || data.is_author != 1){
                sessionStorage.removeItem('id_token');
                sessionStorage.removeItem('is_author');
                sessionStorage.removeItem('name');
                sessionStorage.removeItem('is_role');
                sessionStorage.removeItem('token');
    
                window.location.href = linkCpanel; 
            }else{
                $('.pro_name').html(name);
            }
        }
    });
  }
}


// Main Cpanel //
$(document).ready(function(){
  var active_province   = $('.active_province').val();
  var active_catelog    = $('.active_catelog').val();
  var active_recruit    = $('.active_recruit').val();
  var active_finance    = $('.active_finance').val();
  var active_user       = $('.active_user').val();
  var active_news       = $('.active_news').val();
  var active_candidates = $('.active_candidates').val();
  if(active_province == 1){ cpanelArea();}
  if(active_catelog == 1){ cpanelCatelog();}
  if(active_recruit == 1){ getRecruit(); getJob();getAreaRecruit();}
  if(active_finance == 1){ getFinance();getAreaFull();getCatelogFullbyType();getBtnSubmitFinance();}
  if(active_user == 1){ getUser();}
  if(active_news == 1){ getNews();getCatelogNews();getBtnSubmitNews()}
  if(active_candidates == 1){ getAreaCandidates();getJob()}


    function formatTime(unixTimestamp){

        var dt = new Date(unixTimestamp * 1000);

        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();


        return day + "-" + month + "-" + year;
    }   
    $('#validateSubmitForm').submit(function(event){

        event.preventDefault();
        $.ajax({
            method: "POST",
            headers:
        { 'X-CSRF-TOKEN': $("._token").val()},
            url  : linkApi + route.login,
            data : $('#validateSubmitForm').serialize(),
            success : function(data){
                if(data.status == true){
                    sessionStorage.setItem('id_token',data.data.id);
                    sessionStorage.setItem('is_author',data.data.is_author);
                    sessionStorage.setItem('name',data.data.name);
                    sessionStorage.setItem('is_role',data.data.is_role);
                    sessionStorage.setItem('token',data.data.access_token);

                    toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                    setTimeout(function() { 
                        window.location.href = linkCpanel;    
                    }, 2000);
                }else{
                    toastBox('error',data.data.mess ,'Vui lòng nhập lại' , 2000);
                }
            }
        });
    })

    $(".LogoutCpanel").click(function(){
      event.preventDefault();
        $.ajax({
          method: "GET",
          url  : linkApi + route.logout,
          data :{},
          success : function(data){
              if(data.status == true){
                  sessionStorage.removeItem('id_token');
                  sessionStorage.removeItem('is_author');
                  sessionStorage.removeItem('name');
                  sessionStorage.removeItem('is_role');
                  sessionStorage.removeItem('token');

                  toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                  setTimeout(function() { 
                      window.location.href = linkCpanel;    
                  }, 2000);
              }else{
                  toastBox('error','Lỗi xảy ra' ,'Vui lòng thử lại' , 2000);
              }
          }
      });
    });

    $(".clickMenu").click(function(){
        $(this).toggleClass('open');
    });
  function getJob(key = null){
    if(token != ""){
      $.ajax({
          method: "GET",
          url  : linkApi + route.job,
          data : {},
          success : function(data){
            var job_Selectindustry = "";
            $('.job_Selectindustry').html();
            var job_industry    = $('.job_industry').val();
            if(data.status){
              industry = data.data;
              industry.forEach((industry) => {
                if(job_industry != ""){
                  var exp_ = job_industry.split(',');
                  if(jQuery.inArray(String(industry.id),exp_) > -1){
                    job_Selectindustry += '<option value="'+ industry.id +'" selected>'+ industry.name +'</option>';
                  }else{
                    job_Selectindustry += '<option value="'+ industry.id +'">'+ industry.name +'</option>';
                  }
                }else{
                  job_Selectindustry += '<option value="'+ industry.id +'">'+ industry.name + '</option>';
                }               
              })
              $('.job_Selectindustry').html(job_Selectindustry);
            }
          }
      });
    }
  }
  $('.job_Selectindustry').select2({
    placeholder : 'Chọn',
    allowClear: true,
    maximumInputLength: 3,
    tags: true
  }).on("change", function (e) {
    var job_industry = $(e.currentTarget).val();
    if(job_industry != ""){
      $('.job_industry').val(job_industry);
    }
  })
  //=====================Cpanel=============================//
  //get Menu //
  $("body").on("click", ".clickTaichinh", function(){
    event.preventDefault();
    var id = $(this).data('id');
    if(id != null){
      $('.clickMenu').removeClass('open active');
      $('.submenu li').removeClass('active');
  
      window.location.href = linkCpanel + 'finance?get=' + id;
    }
  });
  $("body").on("click", ".clickTintuc", function(){
    event.preventDefault();
    var id = $(this).data('id');
    if(id != null){
      $('.clickMenu').removeClass('open active');
      $('.submenu li').removeClass('active');
  
      window.location.href = linkCpanel + 'news?get=' + id;
    }
  });

  //END get Menu //
  //setting area///
    $('#search_province').keyup(function(){
      var key = $(this).val().toLowerCase();
      cpanelArea(key);
    });

    var select_province = "";
    function cpanelArea(key = null){
      if(token != null){
        $.ajax({
            method: "GET",
            url  : linkApi + route.area,
            data : {},
            success : function(data){
                if(data.status){
                  if(key != null){
                    if(data.data.filter(table => table.region.toLowerCase().includes(key)) != ""){
                      area =   data.data.filter(table => table.region.toLowerCase().includes(key));
                    }else{
                      area =  data.data;
                    }
                  }else{
                    area =  data.data;
                  }
                  var stt                   = 1;
                  var page_setting_area     = "";
                  var page_setting_area_add = "";
                  var checkSettingArea      = "";
                  var checkSettingRegion    = "";

                  $('.cpanelArea').html("");
                  $('#region_id').html("");

                  page_setting_area_add += '<option value="0" selected="">Thêm miền</option>';
                  if(area != ""){
                    area.forEach((e) => {
                      page_setting_area_add += '<option value="'+ e.id + '">' + e.region +'</option>';
                      if(key != null){
                        if(data.data.filter(table => table.region.toLowerCase().includes(key)) == ""){
                          province =   e.province.filter(l => l.province.toLowerCase().includes(key));
                        }else{
                          province =  e.province;
                        }
                      }else{
                        province =  e.province;
                      }
               
                      if(e.active){
                        checkSettingRegion = "checked";
                      }else{
                        checkSettingRegion = "";
                      }
                      if(province.length > 0){
                          page_setting_area +=
                            '<input type="hidden" class="region_lenght_'+ e.id + '" value="'+ (parseInt(province.length) + 2) +'">' + 
                            '<tr class="selectable region_'+ e.id + '">' +
              
                              '<td class="center row_region_'+ e.id + '" rowspan="'+ (parseInt(province.length) + 2) +'">' + stt++ +'</td>' +  
                              '<td class="center row_region_'+ e.id + '" rowspan="'+ (parseInt(province.length) + 2) +'" >' + e.region +'</td>' + 
                            '</tr>'

                          page_setting_area +=
                          '<tr class="selectable region_'+ e.id + '">' +
                            '<td class="center"></td>' +
                            '<td class="text-center">' +
                              '<label class="status_" title="" data-action="lock" data-type="region" data-id="' + e.id +'">' +
                                '<input class="checkbox-slider main_check_'+ e.id +'  colored-blue" type="checkbox" '+ checkSettingRegion  +'> <span class="text"></span>' + 
                              '</label>'+
                            '</td>' +  
                            '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                              '<a class="btn btn-primary edit_" data-type="region" data-id="'+ e.id + '">Sửa</a>'+
                              '<a class="btn btn-danger delete_" data-type="region" data-id="'+ e.id + '">Xóa</a>' +
                            '</td>' +
                          '</tr>'
                          province.forEach((z) => {
                            
                            if(z.active){
                              checkSettingArea = "checked";
                            }else{
                              checkSettingArea = "";
                            }
                            page_setting_area +=
                            '<tr class="selectable region_'+ e.id + ' province_'+ z.id +'">' +
                              '<td class="center">' + z.province +'</td>' +  
                              '<td class="text-center">' +
                                '<label class="status_" title="" data-action="lock" data-type="province" data-id="' + z.id +'">' +
                                  '<input class="checkbox-slider main_check_'+ e.id +' check_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingArea  +'> <span class="text"></span>' + 
                                '</label>'+
                              '</td>' +
                              '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                '<a class="btn btn-primary edit_" data-type="province"  data-main="'+ e.id + '" data-id="'+ z.id + '">Sửa</a>'+
                                '<a class="btn btn-danger delete_" data-type="province" data-main="'+ e.id + '" data-id="'+ z.id + '">Xóa</a>' +
                              '</td>' +
                            '</tr>'

                            //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                          });
                      }else{
                        page_setting_area +=
                        '<input type="hidden" class="region_lenght_'+ e.id + '" value="1">' + 
                        '<tr class="selectable region_'+ e.id + '">' +     
                          '<td class="center row_region_'+ e.id + '" rowspan="1">' + stt++ +'</td>' +  
                          '<td class="center row_region_'+ e.id + '" rowspan="1" >' + e.region +'</td>' + 
                          '<td class="center"></td>' +
                          '<td class="text-center">' +
                            '<label class="status_" title="" data-action="lock" data-type="region" data-id="' + e.id +'">' +
                              '<input class="checkbox-slider main_check_'+ e.id +'  colored-blue" type="checkbox" '+ checkSettingRegion  +'> <span class="text"></span>' + 
                            '</label>'+
                          '</td>' +  
                          '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                            '<a class="btn btn-primary edit_" data-type="region"  data-id="'+ e.id + '">Sửa</a>'+
                            '<a class="btn btn-danger delete_" data-type="region" data-id="'+ e.id + '">Xóa</a>' +
                          '</td>' +
                        '</tr>'
                      }
                    });
                    
                    $('.cpanelArea').html(page_setting_area);
                    if(select_province  != ""){
                      $('#region_id').html(select_province);
                    }else{
                      $('#region_id').html(page_setting_area_add);
                    }
                  }
                }
            }
        });
      }
    }

    $('#region_id').change(function(){
      var region_id = $(this).find(":selected").val();
      if(region_id != ""){
        $('.region_id').val(region_id);
      }
    })
    $('#validateSubmit_pronvice').submit(function(event){
      event.preventDefault();
      var region_id = $('.region_id').val();
      var province_name = $('.province_name').val();
      if(province_name == ""){
        toastBox('error','Tên danh mục tỉnh đang trống' ,'Vui lòng nhập vào...' , 3000);
      }
      if(region_id == ""){
        toastBox('error','Tên danh mục cha chưa chọn' ,'Vui lòng chọn danh mục cha' , 3000);
      }
      if(province_name != "" && region_id != ""){
        $.ajax({
            method: "POST",
            url  : linkApi + route.areaAdd,
            data : {
              region_id:region_id,
              province_name:province_name
            },
            success : function(data){
                if(data.status == true){
                    toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                    setTimeout(function() { 
                        window.location.href = linkCpanel + 'province';    
                    }, 2000);
                }else{
                    toastBox('error',data.data ,'Vui lòng nhập lại' , 2000);
                }
            }
        });
      }
    })

    $('#region_idedit').change(function(){
      var region_idedit = $(this).find(":selected").val();
      if(region_idedit != ""){
        $('.region_idedit').val(region_idedit);
      }
    })
    $('#validateSubmit_pronviceedit').submit(function(event){
      event.preventDefault();
      var id            = $('.id_provinceedit').val();
      var region_id     = $('.region_idedit').val();
      var province_name = $('.province_nameedit').val();

      if(province_name == ""){
        toastBox('error','Tên danh mục tỉnh đang trống' ,'Vui lòng nhập vào...' , 3000);
      }
      if(region_id == ""){
        toastBox('error','Tên danh mục cha chưa chọn' ,'Vui lòng chọn danh mục cha' , 3000);
      }
      if(province_name != "" && region_id != ""){
        $.ajax({
            method: "POST",
            url  : linkApi + route.areaUpdate,
            data : {
              id:id,
              region_id:region_id,
              province_name:province_name
            },
            success : function(data){
                if(data.status == true){
                    toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                    setTimeout(function() { 
                        window.location.href = linkCpanel + 'province';    
                    }, 2000);
                }else{
                    toastBox('error',data.data ,'Vui lòng nhập lại' , 2000);
                }
            }
        });
      }
    })
  //END setting area///

  //Catelog//
    // $('#search_province').keyup(function(){
    //   var key = $(this).val().toLowerCase();
    //   cpanelArea(key);
    // });

    $('#search_catelog_1').change(function(){
      event.preventDefault();
      var key = $(this).find(":selected").val();
      if(key != ""){
        $('.search_catelog_1').val(key);
        $('#search_catelog_2').css('display','block');
        $('#search_catelog_3').css('display','none');
        cpanelCatelog('search');
      }else{
        $('.search_catelog_1').val("");
        $('.search_catelog_2').val("");
        $('.search_catelog_3').val("");
        $('#search_catelog_2').css('display','none');
        $('#search_catelog_3').css('display','none');
        cpanelCatelog();
      }
    });

    $('#search_catelog_2').change(function(){
      event.preventDefault();
      var key = $(this).find(":selected").val();
      if(key != ""){
        $('.search_catelog_2').val(key);
        $('#search_catelog_3').css('display','block');
      }else{
        $('.search_catelog_2').val("");
        $('.search_catelog_3').val("");
        $('#search_catelog_3').css('display','none');
      }
      cpanelCatelog('search');
    });

    $('#search_catelog_3').change(function(){
      event.preventDefault();
      var key = $(this).find(":selected").val();
      if(key != ""){
        $('.search_catelog_3').val(key);
      }else{
        $('.search_catelog_3').val("");
      }
      cpanelCatelog('search');
    });

    function cpanelCatelog(key = null){
      var search_1 = $('.search_catelog_1').val();
      var search_2 = $('.search_catelog_2').val();
      var search_3 = $('.search_catelog_3').val();
      if(token != null){
        $.ajax({
            method: "GET",
            url  : linkApi + route.catelog,
            data : {},
            success : function(data){
                if(data.status){
                  catelog                       =  data.data;
                  var stt                       = 1;
                  var page_setting_catelog      = "";
                  var checkSettingCatelog_1     = "";
                  var checkSettingCatelog_2     = "";
                  var checkSettingCatelog_3     = "";

                  var search_catelog_1          = "";
                  var search_catelog_2          = "";
                  var search_catelog_3          = "";
                  var select_catelog            = "";

                  $('.cpanelCatelog').html("");
                  $('#search_catelog').html("");

                  search_catelog_1 += '<option value="">Tìm kiếm theo loại danh mục</option>';
                  search_catelog_2 += '<option value="">Tìm kiếm theo dang mục đăng tin</option>';
                  search_catelog_3 += '<option value="">Tìm kiếm theo danh mục con</option>';
                  if(catelog != ""){
                    catelog.forEach((e) => {
                      select_catelog += '<option value="'+ e.id +'" selected>'+ e.name +'</option>';
                      if(e.active){
                        checkSettingCatelog_1 = "checked";
                      }else{
                        checkSettingCatelog_1 = "";
                      }
                      if(key != null){
                        parent = e.parent;
                        if(e.id == search_1){
                          search_catelog_1 += '<option value="'+ e.id +'" selected>'+ e.name +'</option>';
                          if(parent.length > 0){
                            page_setting_catelog +=
                            '<input type="hidden" class="catelog1_lenght_'+ e.id + '" value="'+ (parseInt(e.count)) +'">' + 
                            '<tr class="selectable catelog1_'+ e.id + '">' +
                              '<td class="center row_catelog1_'+ e.id + '" rowspan="'+ (parseInt(e.count)) +'">' + stt++ +'</td>' +  
                              '<td class="center row_catelog1_'+ e.id + '" rowspan="'+ (parseInt(e.count)) +'" >' + e.name +'</td>' + 
                            '</tr>'
                            page_setting_catelog +=
                            '<tr class="selectable catelog1_'+ e.id + '">' +
                              '<td class="center"></td>' +
                              '<td class="center"></td>' +
                              '<td class="text-center">' +
                                '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="" data-child="" data-id="' + e.id +'">' +
                                  '<input class="checkbox-slider catelog_parent_'+ e.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_1  +'> <span class="text"></span>' + 
                                '</label>'+
                              '</td>' +  
                              '<td class="center btn_form">' +
                                // '<a class="btn btn-primary edit_" data-type="catelog" data-id="'+ e.id + '">Sửa</a>'+
                                // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="" data-child="" data-id="'+ e.id + '">Xóa</a>' +
                              '</td>' +
                            '</tr>'
                            parent.forEach((z) => {
                              child =  z.child;    
                              if(z.active){
                                checkSettingCatelog_2 = "checked";
                              }else{
                                checkSettingCatelog_2 = "";
                              }   
                              if(search_2 != ""){
                                if(z.id == search_2){
                                  search_catelog_2 += '<option value="'+ z.id +'" selected>'+ z.name +'</option>';
                                  if(child.length > 0){
                                    page_setting_catelog +=
                                    '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="'+ (parseInt(z.count) + 2) +'">' + 
                                    '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                      '<td class="center row_catelog2_'+ z.id + '" rowspan="'+ (parseInt(z.count) + 2) +'" >' + z.name +'</td>' + 
                                    '</tr>'
                                    page_setting_catelog +=
                                    '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                      '<td class="center"></td>' +
                                      '<td class="text-center">' +
                                        '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'">' +
                                          '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                        '</label>'+
                                      '</td>' +  
                                      '<td class="center btn_form">' +
                                        // '<a class="btn btn-primary edit_" data-type="catelog" data-id="'+ z.id + '">Sửa</a>'+
                                        // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="' + z.id +'" data-id="'+ z.id + '">Xóa</a>' +
                                      '</td>' +
                                    '</tr>'
        
                                    child.forEach((j) => {
                                      if(j.active){
                                        checkSettingCatelog_3 = "checked";
                                      }else{
                                        checkSettingCatelog_3 = "";
                                      }
                                      if(search_3 != ""){
                                        if(j.id == search_3){
                                          search_catelog_3 += '<option value="'+ j.id +'" selected>'+ j.name +'</option>';
                                          page_setting_catelog +=
                                          '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +' catelog3_'+ j.id +'">' +                  
                                            '<td class="center row_catelog3_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                            '<td class="text-center">' +
                                              '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="'+ z.id +'" data-id="' + j.id +'">' +
                                                '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +' catelog_item_'+ j.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_3  +'> <span class="text"></span>' + 
                                              '</label>'+
                                            '</td>' +  
                                            '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                              '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ j.id + '">Sửa</a>'+
                                              '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="' + z.id +'" data-id="'+ j.id + '">Xóa</a>' +
                                            '</td>' +
                                          '</tr>'
                                        }else{
                                          search_catelog_3 += '<option value="'+ j.id +'">'+ j.name +'</option>';
                                        }
                                      }else{
                                        search_catelog_3 += '<option value="'+ j.id +'" selected>'+ j.name +'</option>';
                                        page_setting_catelog +=
                                        '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +' catelog3_'+ j.id +'">' +                  
                                          '<td class="center row_catelog3_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="'+ z.id +'" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +' catelog_item_'+ j.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_3  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                            '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ j.id + '">Sửa</a>'+
                                            '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="' + z.id +'" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                      }
                                    })
                                  }else{
                                    page_setting_catelog +=
                                    '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="1">' + 
                                    '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +                  
                                      '<td class="center row_catelog2_'+ z.id + '" rowspan="1" >' + z.name +'</td>' + 
                                      '<td class="center"></td>' +
                                      '<td class="text-center">' +
                                        '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'">' +
                                          '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                        '</label>'+
                                      '</td>' +  
                                      '<td class="center btn_form" >' +
                                        // '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ z.id + '">Sửa</a>'+
                                        // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="'+ z.id + '">Xóa</a>' +
                                      '</td>' +
                                    '</tr>'
                                  }
                                }else{
                                  search_catelog_2 += '<option value="'+ z.id +'">'+ z.name +'</option>';
                                }
                              }else{
                                search_catelog_2 += '<option value="'+ z.id +'">'+ z.name +'</option>';
                                if(child.length > 0){
                                  page_setting_catelog +=
                                  '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="'+ (parseInt(z.count) + 2) +'">' + 
                                  '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                    '<td class="center row_catelog2_'+ z.id + '" rowspan="'+ (parseInt(z.count) + 2) +'" >' + z.name +'</td>' + 
                                  '</tr>'
                                  page_setting_catelog +=
                                  '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                    '<td class="center"></td>' +
                                    '<td class="text-center">' +
                                      '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'">' +
                                        '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                      '</label>'+
                                    '</td>' +  
                                    '<td class="center btn_form">' +
                                      // '<a class="btn btn-primary edit_" data-type="catelog" data-id="'+ z.id + '">Sửa</a>'+
                                      // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="'+ z.id + '">Xóa</a>' +
                                    '</td>' +
                                  '</tr>'
                                  child.forEach((j) => {
                                    if(j.active){
                                      checkSettingCatelog_3 = "checked";
                                    }else{
                                      checkSettingCatelog_3 = "";
                                    }
                                    page_setting_catelog +=
                                    '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +' catelog3_'+ j.id +'">' +                  
                                      '<td class="center row_catelog3_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                      '<td class="text-center">' +
                                        '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="'+ z.id +'" data-id="' + j.id +'">' +
                                          '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +' catelog_item_'+ j.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_3  +'> <span class="text"></span>' + 
                                        '</label>'+
                                      '</td>' +  
                                      '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                        '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ j.id + '">Sửa</a>'+
                                        '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="' + z.id +'" data-id="'+ j.id + '">Xóa</a>' +
                                      '</td>' +
                                    '</tr>'
                                  })
                                }else{
                                  page_setting_catelog +=
                                  '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="1">' + 
                                  '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +                  
                                    '<td class="center row_catelog2_'+ z.id + '" rowspan="1" >' + z.name +'</td>' + 
                                    '<td class="center"></td>' +
                                    '<td class="text-center">' +
                                      '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'"">' +
                                        '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +' colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                      '</label>'+
                                    '</td>' +  
                                    '<td class="center btn_form" >' +
                                      // '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ z.id + '">Sửa</a>'+
                                      // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="'+ z.id + '">Xóa</a>' +
                                    '</td>' +
                                  '</tr>'
                                }
                              }          
                            });
                          }else{
                            page_setting_catelog +=
                            '<input type="hidden" class="catelog1_lenght_'+ e.id + '" value="1">' + 
                            '<tr class="selectable catelog1_'+ e.id + '">' +     
                              '<td class="center row_catelog1_'+ e.id + '" rowspan="1">' + stt++ +'</td>' +  
                              '<td class="center row_catelog1_'+ e.id + '" rowspan="1" >' + e.name +'</td>' + 
                              '<td class="center"></td>' +
                              '<td class="center"></td>' +
                              '<td class="text-center">' +
                                '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="" data-child="" data-id="' + e.id +'">' +
                                  '<input class="checkbox-slider catelog_parent_'+ e.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_1  +'> <span class="text"></span>' + 
                                '</label>'+
                              '</td>' +  
                              '<td class="center btn_form">' +
                                // '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ e.id + '">Sửa</a>'+
                                // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="" data-child="" data-id="'+ e.id + '">Xóa</a>' +
                              '</td>' +
                            '</tr>'
                          }
                        }else{
                          search_catelog_1 += '<option value="'+ e.id +'">'+ e.name +'</option>';
                        }
                      }else{
                        parent = e.parent;
                        search_catelog_1 += '<option value="'+ e.id +'">'+ e.name +'</option>';
                        if(parent.length > 0){
                          page_setting_catelog +=
                          '<input type="hidden" class="catelog1_lenght_'+ e.id + '" value="'+ (parseInt(e.count) + 2) +'">' + 
                          '<tr class="selectable catelog1_'+ e.id + '">' +
                            '<td class="center row_catelog_'+ e.id + '" rowspan="'+ (parseInt(e.count) + 2) +'">' + stt++ +'</td>' +  
                            '<td class="center row_catelog_'+ e.id + '" rowspan="'+ (parseInt(e.count) + 2) +'" >' + e.name +'</td>' + 
                          '</tr>'
                          page_setting_catelog +=
                          '<tr class="selectable catelog1_'+ e.id + '">' +
                            '<td class="center"></td>' +
                            '<td class="center"></td>' +
                            '<td class="text-center">' +
                              '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="" data-child="" data-id="' + e.id +'">' +
                                '<input class="checkbox-slider catelog_parent_'+ e.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_1  +'> <span class="text"></span>' + 
                              '</label>'+
                            '</td>' +  
                            '<td class="center btn_form">' +
                              // '<a class="btn btn-primary edit_" data-type="catelog" data-id="'+ e.id + '">Sửa</a>'+
                              // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="" data-child="" data-id="'+ e.id + '">Xóa</a>' +
                            '</td>' +
                          '</tr>'
                          parent.forEach((z) => {
                            select_catelog += '<option value="'+ z.id +'" selected> |__'+ z.name +'</option>';
                            child =  z.child;
                            search_catelog_2 += '<option value="'+ z.id +'">'+ z.name +'</option>';
                            if(z.active){
                              checkSettingCatelog_2 = "checked";
                            }else{
                              checkSettingCatelog_2 = "";
                            }
  
                            if(child.length > 0){
                              page_setting_catelog +=
                              '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="'+ (parseInt(z.count) + 2) +'">' + 
                              '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                '<td class="center row_catelog2_'+ z.id + '" rowspan="'+ (parseInt(z.count) + 2) +'" >' + z.name +'</td>' + 
                              '</tr>'
                              page_setting_catelog +=
                              '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +
                                '<td class="center"></td>' +
                                '<td class="text-center">' +
                                  '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'">' +
                                    '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                  '</label>'+
                                '</td>' +  
                                '<td class="center btn_form">' +
                                  // '<a class="btn btn-primary edit_" data-type="catelog" data-id="'+ z.id + '">Sửa</a>'+
                                  // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="'+ z.id + '">Xóa</a>' +
                                '</td>' +
                              '</tr>'
  
                              child.forEach((j) => {
                                search_catelog_3 += '<option value="'+ j.id +'">'+ j.name +'</option>';
                                if(j.active){
                                  checkSettingCatelog_3 = "checked";
                                }else{
                                  checkSettingCatelog_3 = "";
                                }
                                page_setting_catelog +=
                                '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +' catelog3_'+ j.id +'">' +                  
                                  '<td class="center row_catelog3_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                  '<td class="text-center">' +
                                    '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="'+ z.id +'" data-id="' + j.id +'">' +
                                      '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +' catelog_item_'+ j.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_3  +'> <span class="text"></span>' + 
                                    '</label>'+
                                  '</td>' +  
                                  '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                    '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ j.id + '">Sửa</a>'+
                                    '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="' + z.id +'" data-id="'+ j.id + '">Xóa</a>' +
                                  '</td>' +
                                '</tr>'
                              })
                            }else{
                              page_setting_catelog +=
                              '<input type="hidden" class="catelog2_lenght_'+ z.id + '" value="1">' + 
                              '<tr class="selectable catelog1_'+ e.id +' catelog2_'+ z.id +'">' +                  
                                '<td class="center row_catelog2_'+ z.id + '" rowspan="1" >' + z.name +'</td>' + 
                                '<td class="center"></td>' +
                                '<td class="text-center">' +
                                  '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="' + z.id +'"">' +
                                    '<input class="checkbox-slider catelog_parent_'+ e.id +' catelog_child_'+ z.id +'  colored-blue" type="checkbox" '+ checkSettingCatelog_2  +'> <span class="text"></span>' + 
                                  '</label>'+
                                '</td>' +  
                                '<td class="center btn_form" >' +
                                  // '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ z.id + '">Sửa</a>'+
                                  // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="' + e.id +'" data-child="" data-id="'+ z.id + '">Xóa</a>' +
                                '</td>' +
                              '</tr>'
                            }
                          });
                        }else{
                          page_setting_catelog +=
                          '<input type="hidden" class="catelog1_lenght_'+ e.id + '" value="1">' + 
                          '<tr class="selectable catelog1_'+ e.id + '">' +     
                            '<td class="center row_catelog1_'+ e.id + '" rowspan="1">' + stt++ +'</td>' +  
                            '<td class="center row_catelog1_'+ e.id + '" rowspan="1" >' + e.name +'</td>' + 
                            '<td class="center"></td>' +
                            '<td class="center"></td>' +
                            '<td class="text-center">' +
                              '<label class="status_" title="" data-action="lock" data-type="catelog" data-parent="" data-child="" data-id="' + e.id +'">' +
                                '<input class="checkbox-slider catelog_parent_'+ e.id +' colored-blue" type="checkbox" '+ checkSettingCatelog_1  +'> <span class="text"></span>' + 
                              '</label>'+
                            '</td>' +  
                            '<td class="center btn_form">' +
                              // '<a class="btn btn-primary edit_" data-type="catelog"  data-id="'+ e.id + '">Sửa</a>'+
                              // '<a class="btn btn-danger delete_" data-type="catelog" data-parent="" data-child="" data-id="'+ e.id + '">Xóa</a>' +
                            '</td>' +
                          '</tr>'
                        }
                      }                
                    });
                    
                    $('.cpanelCatelog').html(page_setting_catelog);
                    $('#search_catelog_1').html(search_catelog_1);
                    $('#search_catelog_2').html(search_catelog_2);
                    $('#search_catelog_3').html(search_catelog_3);
                    $('#catelog_id').html(select_catelog);
                  }
                }
            }
        });
      }
    }
    $('#catelog_id').change(function(){
      var catelog_id = $(this).find(":selected").val();
      if(catelog_id != ""){
        $('.catelog_id').val(catelog_id);
      }
    })
    $('#validateSubmit_catelog').submit(function(event){
      event.preventDefault();
      var catelog_id = $('.catelog_id').val();
      var catelog_name = $('.catelog_name').val();
      if(catelog_name == ""){
        toastBox('error','Tên danh mục tỉnh đang trống' ,'Vui lòng nhập vào...' , 3000);
      }
      if(catelog_id == ""){
        toastBox('error','Tên danh mục cha chưa chọn' ,'Vui lòng chọn danh mục cha' , 3000);
      }
      if(catelog_name != "" && catelog_id != ""){
        $.ajax({
            method: "POST",
            url  : linkApi + route.catelogAdd,
            data : {
              catelog_id:catelog_id,
              catelog_name:catelog_name
            },
            success : function(data){
                if(data.status == true){
                    toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                    setTimeout(function() { 
                        window.location.href = linkCpanel + 'catelog';    
                    }, 2000);
                }else{
                    toastBox('error',data.data ,'Vui lòng nhập lại' , 2000);
                }
            }
        });
      }
    })
    $('#catelog_idedit').change(function(){
      var catelog_idedit = $(this).find(":selected").val();
      if(catelog_idedit != ""){
        $('.catelog_idedit').val(catelog_idedit);
      }
    })
    $('#validateSubmit_catelogedit').submit(function(event){
      event.preventDefault();
      var id            = $('.id_catelogedit').val();
      var catelog_id    = $('.catelog_idedit').val();
      var catelog_name  = $('.catelog_nameedit').val();
      if(catelog_name == ""){
        toastBox('error','Tên danh mục tỉnh đang trống' ,'Vui lòng nhập vào...' , 3000);
      }
      if(catelog_id == ""){
        toastBox('error','Tên danh mục cha chưa chọn' ,'Vui lòng chọn danh mục cha' , 3000);
      }
      if(catelog_name != "" && catelog_id != ""){
        $.ajax({
            method: "POST",
            url  : linkApi + route.catelogUpdate,
            data : {
              id:id,
              catelog_id:catelog_id,
              catelog_name:catelog_name
            },
            success : function(data){
                if(data.status == true){
                    toastBox('success',data.data.mess ,'Đang chuyển trang....' , 2000);
                    setTimeout(function() { 
                        window.location.href = linkCpanel + 'catelog';    
                    }, 2000);
                }else{
                    toastBox('error',data.data ,'Vui lòng nhập lại' , 2000);
                }
            }
        });
      }
    })
  //End Catelog//
  //Finance//
  $('.inputSearchFinance').change(function(){
    event.preventDefault();
    var key = $(this).find(":selected").val();
    if(key != ""){
      getFinance(key);
    }else{
      getFinance(); 
    }
  });
  var type_id            = $('.catelog_idMain').val();
  var id_finance         = $('.id_finance').val();
  var idCatelog_finance  = $('.idCatelog_finance').val();
  var idprovince_finance = $('.idprovince_finance').val();
  function getFinance(key = null){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.catelog,
          data : {},
          success : function(data){
            if(data.status){
              catelog             =  data.data;
              var stt             = 1;
              var cpanelFinance       = "";
              var titleSearchFinance = "";
              var inputSearchFinance = "";

              var checkChild      = "";
              var checkChildFinance  = "";

              $('.titleFinance').text();
              

              $('.titleSearchFinance').html();

              $('.inputSearchFinance').html();

              $('.cpanelFinance').html();

              if(catelog != ""){
                catelog.forEach((e) => {
                    parent = e.parent;
                    if(parent.length > 0){
                      parent.forEach((z) => {
                        if(type_id != ""){
                          if(type_id == z.id){
                            child = z.child;
                            titleSearchFinance += 
                            '<a class="add_finance btn btn-blue shiny" data-id="'+ z.id +'">' + 
                            '<i class="fa fa-plus"></i>  Thêm '  + z.name + '</a>';

                            inputSearchFinance += 
                            '<option value="">Tìm kiếm theo danh mục tin</option>';

                            if(child.length > 0){
                              child.forEach((j) => {
                                
                                  post_ = j.post;
                                  if(j.active){
                                    checkChild = "checked";
                                  }else{
                                    checkChild = "";
                                  }

                                  if(key != null){
                                    if(key == j.id){
                                      inputSearchFinance += 
                                      '<option value="'+ j.id +'" selected>'+ j.name +'</option>';
                                      if(post_.length > 0){
                                        cpanelFinance +=
                                        '<input type="hidden" class="post_lenght_'+ j.id + '" value="'+ (parseInt(post_.length) + 2) +'">' + 
                                        '<tr class="selectable post_'+ j.id + '">' +              
                                          '<td class="center row_post_'+ j.id + '" rowspan="'+ (parseInt(post_.length) + 2) +'">' + stt++ +'</td>' +  
                                          '<td class="center row_post_'+ j.id + '" rowspan="'+ (parseInt(post_.length) + 2) +'" >' + j.name +'</td>' + 
                                        '</tr>'
                                        cpanelFinance +=
                                        '<tr class="selectable post_'+ j.id + '">' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="finance" data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                        post_.forEach((p) => {
                                
                                          if(p.active){
                                            checkChildFinance = "checked";
                                          }else{
                                            checkChildFinance = "";
                                          }
                                          cpanelFinance +=
                                          '<tr class="selectable post_'+ j.id + ' post_1'+ p.id +'">' +
                                            '<td class="center">' + p.title +'</td>' + 
                                            '<td class="center">' + p.username +'</td>' + 
                                            '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                            '<td class="text-center">' +
                                              '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                                '<input class="checkbox-slider  main_child_'+ j.id +'  main_child_post_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildFinance  +'> <span class="text"></span>' + 
                                              '</label>'+
                                            '</td>' +
                                            '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                              '<a class="btn btn-primary edit_" data-type="finance"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                              '<a class="btn btn-danger delete_" data-type="finance" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                            '</td>' +
                                          '</tr>'
              
                                          //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                        });
                                      }else{
                                        cpanelFinance +=
                                        '<input type="hidden" class="post_lenght_'+ j.id + '" value="1">' + 
                                        '<tr class="selectable post_'+ j.id + '">' +     
                                          '<td class="center row_post_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                          '<td class="center row_post_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="finance"  data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                      }
                                    }else{
                                      inputSearchFinance += 
                                      '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    }
                                  }else{
                                    inputSearchFinance += 
                                    '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    if(post_.length > 0){
                                      cpanelFinance +=
                                      '<input type="hidden" class="post_lenght_'+ j.id + '" value="'+ (parseInt(post_.length) + 2) +'">' + 
                                      '<tr class="selectable post_'+ j.id + '">' +              
                                        '<td class="center row_post_'+ j.id + '" rowspan="'+ (parseInt(post_.length) + 2) +'">' + stt++ +'</td>' +  
                                        '<td class="center row_post_'+ j.id + '" rowspan="'+ (parseInt(post_.length) + 2) +'" >' + j.name +'</td>' + 
                                      '</tr>'
                                      cpanelFinance +=
                                      '<tr class="selectable post_'+ j.id + '">' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form" >' +
                                          // '<a class="btn btn-primary edit_" data-type="finance" data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                      post_.forEach((p) => {
                              
                                        if(p.active){
                                          checkChildFinance = "checked";
                                        }else{
                                          checkChildFinance = "";
                                        }
                                        cpanelFinance +=
                                        '<tr class="selectable post_'+ j.id + ' post_1'+ p.id +'">' +
                                          '<td class="center">' + p.title +'</td>' + 
                                          '<td class="center">' + p.username +'</td>' + 
                                          '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                              '<input class="checkbox-slider  main_child_'+ j.id +'  main_child_post_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildFinance  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +
                                          '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                            '<a class="btn btn-primary edit_" data-type="finance"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                            '<a class="btn btn-danger delete_" data-type="finance" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
            
                                        //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                      });
                                    }else{
                                      cpanelFinance +=
                                      '<input type="hidden" class="post_lenght_'+ j.id + '" value="1">' + 
                                      '<tr class="selectable post_'+ j.id + '">' +     
                                        '<td class="center row_post_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                        '<td class="center row_post_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="finance" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form">' +
                                          // '<a class="btn btn-primary edit_" data-type="finance"  data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                    }
                                  }
                              });
                            }                 
                            $('.titleFinance').text(z.name);
                            $('.titleSearchFinance').html(titleSearchFinance);
                            $('.inputSearchFinance').html(inputSearchFinance);
                            $('.cpanelFinance').html(cpanelFinance);
                          }
                        }
                      })
                    }
                })
              }
            }
          }
      });
    }
  }

  function getAreaFull(){ 
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.area,
          data : {},
          success : function(data){
              if(data.status){
                var areaFull = "";                   
                $('.getAreaFull').html("");
                area = data.data;
                if(area != ""){
                  area.forEach((e) => {
                      province = e.province;
                      if(province.length > 0){
                        province.forEach((z) =>{ 
                          if(idprovince_finance != ""){
                            var exp_ = idprovince_finance.split(',');
                            if(jQuery.inArray(String(z.id),exp_) > -1){
                              areaFull += '<option value="'+ z.id +'" selected>'+ z.province +'</option>';
                            }else{
                              areaFull += '<option value="'+ z.id +'">'+ z.province +'</option>';
                            }
                          }else{
                            areaFull += '<option value="'+ z.id +'">'+ z.province +'</option>';
                          }
                        })
                      }
                  })
                }
                $('.getAreaFull').html(areaFull);
              }
          }
      });
    }
  }
  function getCatelogFullbyType(){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.catelog,
          data : {},
          success : function(data){
            if(data.status){
              catelog   =  data.data;
              var getCatelogFullbyType = "";
              $('.getCatelogFullbyType').html();
              if(catelog != ""){
                catelog.forEach((e) => {
                    parent = e.parent;
                    if(parent.length > 0){
                      parent.forEach((z) => {
                        if(type_id != ""){
                          if(type_id == z.id){
                            child = z.child;
                            if(child.length > 0){
                              child.forEach((j) =>{ 
                                if(idCatelog_finance != ""){
                                  var exp_ = idCatelog_finance.split(',');
                                  if(jQuery.inArray(String(j.id),exp_) > -1){
                                    getCatelogFullbyType += '<option value="'+j.id +'" selected>'+ j.name +'</option>';
                                  }else{
                                    getCatelogFullbyType += '<option value="'+ j.id +'">'+j.name +'</option>';
                                  }
                                }else{
                                  getCatelogFullbyType += '<option value="'+j.id +'">'+ j.name +'</option>';
                                }
                              })
                            }
                          }
                        }
                      })
                    }
                  })
                  $('.getCatelogFullbyType').html(getCatelogFullbyType);
              }
            }
          }
      });
    }
  }
  function getBtnSubmitFinance(){
    var type_id    = $('.catelog_idMain').val();
    var btnFinance = "";
    $('.btnFinance').html();
    btnFinance += 
    '<a class="submit_finance btn btn-blue shiny" data-id="'+ type_id +'">' + 
    '<i class="fa fa-save"></i>Lưu</a>';

    btnFinance += 
    '<a class="return_finance btn btn-default shiny" data-id="'+ type_id +'">' + 
    ' <i class="fa fa-refresh"></i>Hủy lưu</a>';

    $('.btnFinance').html(btnFinance);
  }
  $("body").on("click", ".return_finance", function(){
    var id = $(this).data('id');
    window.location.href = linkCpanel + 'finance?get=' + id;

  })
  $("body").on("click", ".add_finance", function(){
    var id = $(this).data('id');
    window.location.href = linkCpanel + 'finance/add?get=' + id;
  })
  $('.catelog_idPost').select2({
    placeholder : 'Chọn theo danh mục tin',
    allowClear: true,
    maximumInputLength: 3,
    tags: true
  }).on("change", function (e) {
    var idCatelog_finance = $(e.currentTarget).val();
    if(idCatelog_finance != ""){
      $('.idCatelog_finance').val(idCatelog_finance);
    }
  })

  $('.province_idPost').select2({
    placeholder : 'Chọn khu vực theo miền',
    allowClear: true,
    maximumInputLength: 3,
    tags: true
  }).on("change", function (e) {
    var idprovince_finance = $(e.currentTarget).val();
    if(idprovince_finance != ""){
      $('.idprovince_finance').val(idprovince_finance);
    }
  })
  $("body").on("click", ".submit_finance", function(){
    var id = $(this).data('id');
    //Finance//
    var post_title          = $('.post_title').val();
    var idCatelog_finance   = $('.idCatelog_finance').val();
    var idprovince_finance  = $('.idprovince_finance').val();
    var content_post        = $('#content_post').val();
    var contact_post        = $('#contact_post').val();
    //End Finance//
    if(id_finance != ""){
      updateFinance(id,id_finance,post_title,idCatelog_finance,idprovince_finance,content_post,contact_post);
    }else{
      submitFinance(id,post_title,idCatelog_finance,idprovince_finance,content_post,contact_post);
    }
  })
  //submit //
  function submitFinance(id,post_title,idCatelog_finance,idprovince_finance,content_post,contact_post){
    if(token != ""){
      if(post_title != "" && idCatelog_finance !="" && content_post != "" && contact_post != ""){
        $.ajax({
          method: "POST",
          url  : linkApi + route.addfinance,
          data : {
            id_token:id_token,
            post_title:post_title,
            idCatelog_finance:idCatelog_finance,
            idprovince_finance:idprovince_finance,
            content_post:content_post,
            contact_post:contact_post
          },
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'finance?get=' + id;
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 3000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }
  function updateFinance(id,id_finance,post_title,idCatelog_finance,idprovince_finance,content_post,contact_post){
    if(token != ""){
      if(post_title != "" && idCatelog_finance !="" && content_post != "" && contact_post != ""){
        $.ajax({
          method: "POST",
          url  : linkApi + route.financeUpdate,
          data : {
            id_token:id_token,
            id_finance:id_finance,
            post_title:post_title,
            idCatelog_finance:idCatelog_finance,
            idprovince_finance:idprovince_finance,
            content_post:content_post,
            contact_post:contact_post
          },
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'finance?get=' + id;
            }else{
              toastBox('error','Cập nhật thất bại' ,'Cập nhật thất bại', 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }
  //End Finance//
  //User//
  $('.searchUser').keyup(function(){
    var key = $(this).val();
    if(key != ""){
      getUser(key);
    }else{
      getUser();
    }

  })
  function getUser(key = null){
    if(token != ""){
      $.ajax({
        method: "GET",
        url  : linkApi + route.user,
        data : {},
        success : function(data){
          if(data.status){
            var user              = data.data;
            var cpanelUser        = "";
            var checkSettingUser  = "";
            var stt               = 1;
            $('.cpanelUser').html('');

            if(key != null){
              if(data.data.filter(table => table.name.toLowerCase().includes(key)) != ""){
                user =   data.data.filter(table => table.name.toLowerCase().includes(key));
              }else{
                user =  data.data;
              }
            }else{
              user =  data.data;
            }
            if(user.length > 0){
              user.forEach((z) => {
                            
                if(z.is_active){
                  checkSettingUser = "checked";
                }else{
                  checkSettingUser = "";
                }
                cpanelUser +=
                '<tr class="selectable user_'+ z.id + '">' +     
                  '<td class="center row_user_'+ z.id + '" rowspan="1">' + stt++ +'</td>' +  
                  '<td class="center row_user_'+ z.id + '" rowspan="1" >' + z.name +'</td>' + 
                  '<td class="center">' + z.author +'</td>' +
                  '<td class="center">' + z.email +'</td>' +
                  '<td class="center">' + z.phone +'</td>' +
                  '<td class="text-center">' +
                    '<label class="status_" title="" data-action="lock" data-type="user"  data-id="' + z.id +'">' +
                      '<input class="checkbox-slider user_parent_'+ z.id +' colored-blue" type="checkbox" '+ checkSettingUser  +'> <span class="text"></span>' + 
                    '</label>'+
                  '</td>' +  
                  '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                    '<a class="btn btn-primary edit_" data-type="user"  data-id="'+ z.id + '">Sửa</a>'+
                    '<a class="btn btn-danger delete_" data-type="user" data-id="'+ z.id + '">Xóa</a>' +
                  '</td>' +
                '</tr>'
              });
            }
            $('.cpanelUser').html(cpanelUser);
          }
        }
      });
    }
  }
  var checkfirst_nameUser = false;
  var checklast_nameUser  = false;
  var checkphoneUser      = false;
  var checkaddressUser    = false;
  var checkgenderUser     = false;
  var checkusernameUser   = false;
  var checkemailUser      = false;
  var checkpasswordUser   = false;
  $("body").on("click", ".submit_User", function(){
    var id_userUser   = $('.id_userUser').val();
    var first_nameUser= $('#first_nameUser').val();
    var last_nameUser = $('#last_nameUser').val();
    var phoneUser     = $('#phoneUser').val();
    var genderUser    = $('.genderUser').val();
    var addressUser   = $('#addressUser').val();
  
    var usernameUser  = $('#usernameUser').val();
    var emailUser     = $('#emailUser').val();
    var passwordUser  = $('#passwordUser').val();
    if(id_userUser != ""){
      checkfirst_nameUser = true;
      checklast_nameUser  = true;
      checkphoneUser      = true;
      checkaddressUser    = true;
      checkgenderUser     = true;
      checkusernameUser   = true;
      checkemailUser      = true;
      checkpasswordUser   = true;
      getEditUser(id_userUser,first_nameUser,last_nameUser,phoneUser,phoneUser,genderUser,addressUser,usernameUser,emailUser,passwordUser);
    }else{
      getAddUser(first_nameUser,last_nameUser,phoneUser,phoneUser,genderUser,addressUser,usernameUser,emailUser,passwordUser);
    }
  });

  function getAddUser(first_nameUser,last_nameUser,phoneUser,phoneUser,genderUser,addressUser,usernameUser,emailUser,passwordUser){
    if(token != ""){
      if(
        checklast_nameUser &&
        checkfirst_nameUser &&
        checkphoneUser &&
        checkaddressUser &&
        checkgenderUser &&
        checkusernameUser&&
        checkemailUser &&
        checkpasswordUser 
      ){
        $.ajax({
          method: "POST",
          url  : linkApi + route.addUser,
          data : {
            first_nameUser:first_nameUser,
            last_nameUser:last_nameUser,
            phoneUser:phoneUser,
            genderUser:genderUser,
            addressUser:addressUser,
            usernameUser:usernameUser,
            emailUser:emailUser,
            passwordUser:passwordUser,
          },
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'user'; 
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin', 1000);
      }
    }
  }
  function getEditUser(id_userUser,first_nameUser,last_nameUser,phoneUser,phoneUser,genderUser,addressUser,usernameUser,emailUser,passwordUser){
    if(token != ""){
      if(
        checklast_nameUser &&
        checkfirst_nameUser &&
        checkphoneUser &&
        checkaddressUser &&
        checkgenderUser &&
        checkusernameUser&&
        checkemailUser &&
        checkpasswordUser 
      ){
        $.ajax({
          method: "POST",
          url  : linkApi + route.updateUser,
          data : {
            id_userUser:id_userUser,
            first_nameUser:first_nameUser,
            last_nameUser:last_nameUser,
            phoneUser:phoneUser,
            genderUser:genderUser,
            addressUser:addressUser,
            usernameUser:usernameUser,
            emailUser:emailUser,
            passwordUser:passwordUser,
          },
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'user'; 
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin', 1000);
      }
    }
  }
  $('#last_nameUser').change(function(){
    var last_nameUser = $(this).val();
    if (last_nameUser.length < 3)
    {
      toastBox('error','Định dạng tên không đúng hoặc đang trống','Định dạng tên không đúng hoặc đang trống' , 1000);
      $('#last_nameUser').css('color','red');
      checklast_nameUser = false;
    }else{
      $('#last_nameUser').css('color','');
      checklast_nameUser = true;
    }
  });
  $('#first_nameUser').change(function(){
    var last_nameUser = $(this).val();
    if (last_nameUser.length < 3)
    {
      toastBox('error','Định dạng tên không đúng hoặc đang trống','Định dạng tên không đúng hoặc đang trống' , 1000);
      $('#first_nameUser').css('color','red');
      checkfirst_nameUser = false;
    }else{
      $('#first_nameUser').css('color','');
      checkfirst_nameUser = true;
    }
  });
  $('#phoneUser').change(function(){
    var parent_phone = /[0-9 -()+]+$/;
    var phone       = $(this).val();
    if((phone.length < 10) || (!parent_phone.test(phone)))
    {
      toastBox('error','Định dạng số điện thoại không đúng hoặc đang trống','Định dạng số điện thoại không đúng hoặc đang trống', 1000);
      $('#phoneUser').css('color','red');
      checkphoneUser = false;
    }else{
      $.ajax({
        method: "POST",
        url  : linkApi + route.checkphoneUser,
        data : {
          phone:phone
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('#phoneUser').css('color','');
            checkphoneUser = true;
          }else{
            toastBox('error',data.data.mess ,data.data.mess, 1000);
            $('#phoneUser').css('color','red');
            checkphoneUser = false;
          }
        }
      });
    }
  });
  $('#addressUser').change(function(){
    var dc = $(this).val();
    if (dc.length < 6)
    {
      toastBox('error','Định dạng địa chỉ không đúng hoặc đang trống','Định dạng địa chỉ không đúng hoặc đang trống', 1000);
      $('#addressUser').css('color','red');
      checkaddressUser = false;
    }else{
      $('#addressUser').css('color','');
      checkaddressUser = true;
    }
  });
  $('#genderUser').change(function(){
    event.preventDefault();
    var key = $(this).find(":selected").val();
    if(key != ""){
      checkgenderUser = true;
      $('.genderUser').val(key);
    }else{
      checkgenderUser = false;
      $('.genderUser').val();
    }
  });
  $('#usernameUser').change(function(){
    var usernameUser = $(this).val();
    if (usernameUser.length < 3)
    {
      toastBox('error','Định dạng tên không đúng hoặc đang trống','Định dạng tên không đúng hoặc đang trống' , 1000);
      $('#usernameUser').css('color','red');
      checkusernameUser = false;
    }else{
      $.ajax({
        method: "POST",
        url  : linkApi + route.checknameUser,
        data : {
          usernameUser:usernameUser
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('#usernameUser').css('color','');
            checkusernameUser = true;
          }else{
            toastBox('error',data.data.mess ,data.data.mess, 1000);
            $('#usernameUser').css('color','red');
            checkusernameUser = false;
          }
        }
      });
    }
  });
  $('#emailUser').change(function(){
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var email        = $(this).val();
    if(!filter.test(email) || email == '')
    {
      toastBox('error','Định dạng email không đúng hoặc đang trống','Định dạng email không đúng hoặc đang trống', 1000);
      $('#emailUser').css('color','red');
      checkemailUser  = false;
    }else{
      $.ajax({
        method: "POST",
        url  : linkApi + route.checkemailUser,
        data : {
          email:email
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('#emailUser').css('color','');
            checkemailUser = true;
          }else{
            toastBox('error',data.data.mess ,data.data.mess, 1000);
            $('#emailUser').css('color','red');
            checkemailUser = false;
          }
        }
      });
    }
  });
  $('#passwordUser').change(function(){
    var passwordUser = $(this).val();
    if (passwordUser.length < 6)
    {
      toastBox('error','Định dạng mật khẩu không đúng hoặc đang trống','Định dạng mật khẩu không đúng hoặc đang trống' , 1000);
      $('#passwordUser').css('color','red');
      checkpasswordUser = false;
    }else{
      $('.error_name').html('');
      $('#passwordUser').css('color','');
      checkpasswordUser = true;
    }
  });
  //End User//
  //News//
  var id_news         = $('.id_news').val();
  var idCatelog_news  = $('.idCatelog_news').val();
  function getNews(key = null){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.catelog,
          data : {},
          success : function(data){
            if(data.status){
              catelog             =  data.data;
              var stt             = 1;
              var cpanelNews      = "";
              var titleSearchNews = "";
              var inputSearchNews = "";

              var checkChild      = "";
              var checkChildNews  = "";

              $('.titleNews').text();
              

              $('.titleSearchNews').html();

              $('.inputSearchNews').html();

              $('.cpanelNews').html();

              if(catelog != ""){
                catelog.forEach((e) => {
                    parent = e.parent;
                    if(parent.length > 0){
                      parent.forEach((z) => {
                        if(type_id != ""){
                          if(type_id == z.id){
                            child = z.child;
                            titleSearchNews += 
                            '<a class="add_news btn btn-blue shiny" data-id="'+ z.id +'">' + 
                            '<i class="fa fa-plus"></i>  Thêm '  + z.name + '</a>';

                            inputSearchNews += 
                            '<option value="">Tìm kiếm theo danh mục tin</option>';

                            if(child.length > 0){
                              child.forEach((j) => {
                                
                                  news_ = j.news;
                                  if(j.active){
                                    checkChild = "checked";
                                  }else{
                                    checkChild = "";
                                  }

                                  if(key != null){
                                    if(key == j.id){
                                      inputSearchNews += 
                                      '<option value="'+ j.id +'" selected>'+ j.name +'</option>';
                                      if(news_.length > 0){
                                        cpanelNews +=
                                        '<input type="hidden" class="news_lenght_'+ j.id + '" value="'+ (parseInt(news_.length) + 2) +'">' + 
                                        '<tr class="selectable news_'+ j.id + '">' +              
                                          '<td class="center row_news_'+ j.id + '" rowspan="'+ (parseInt(news_.length) + 2) +'">' + stt++ +'</td>' +  
                                          '<td class="center row_news_'+ j.id + '" rowspan="'+ (parseInt(news_.length) + 2) +'" >' + j.name +'</td>' + 
                                        '</tr>'
                                        cpanelNews +=
                                        '<tr class="selectable news_'+ j.id + '">' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="news" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="finance" data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                        news_.forEach((p) => {
                                
                                          if(p.active){
                                            checkChildNews = "checked";
                                          }else{
                                            checkChildNews = "";
                                          }
                                          cpanelNews +=
                                          '<tr class="selectable news_'+ j.id + ' news_1'+ p.id +'">' +
                                            '<td class="center">' + p.title +'</td>' + 
                                            '<td class="center">' + p.username +'</td>' + 
                                            '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                            '<td class="text-center">' +
                                              '<label class="status_" title="" data-action="lock" data-type="news" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                                '<input class="checkbox-slider  main_child_'+ j.id +'  main_child_news_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildNews  +'> <span class="text"></span>' + 
                                              '</label>'+
                                            '</td>' +
                                            '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                              '<a class="btn btn-primary edit_" data-type="news"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                              '<a class="btn btn-danger delete_" data-type="news" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                            '</td>' +
                                          '</tr>'
              
                                          //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                        });
                                      }else{
                                        cpanelNews +=
                                        '<input type="hidden" class="news_lenght_'+ j.id + '" value="1">' + 
                                        '<tr class="selectable news_'+ j.id + '">' +     
                                          '<td class="center row_news_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                          '<td class="center row_news_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="news" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="finance"  data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                      }
                                    }else{
                                      inputSearchNews += 
                                      '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    }
                                  }else{
                                    inputSearchNews += 
                                    '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    if(news_.length > 0){
                                      cpanelNews +=
                                      '<input type="hidden" class="news_lenght_'+ j.id + '" value="'+ (parseInt(news_.length) + 2) +'">' + 
                                      '<tr class="selectable news_'+ j.id + '">' +              
                                        '<td class="center row_news_'+ j.id + '" rowspan="'+ (parseInt(news_.length) + 2) +'">' + stt++ +'</td>' +  
                                        '<td class="center row_news_'+ j.id + '" rowspan="'+ (parseInt(news_.length) + 2) +'" >' + j.name +'</td>' + 
                                      '</tr>'
                                      cpanelNews +=
                                      '<tr class="selectable news_'+ j.id + '">' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="news" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form" >' +
                                          // '<a class="btn btn-primary edit_" data-type="finance" data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                      news_.forEach((p) => {
                              
                                        if(p.active){
                                          checkChildNews = "checked";
                                        }else{
                                          checkChildNews = "";
                                        }
                                        cpanelNews +=
                                        '<tr class="selectable news_'+ j.id + ' news_1'+ p.id +'">' +
                                          '<td class="center">' + p.title +'</td>' + 
                                          '<td class="center">' + p.username +'</td>' + 
                                          '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="news" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                              '<input class="checkbox-slider  main_child_'+ j.id +'  main_child_news_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildNews  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +
                                          '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                            '<a class="btn btn-primary edit_" data-type="news"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                            '<a class="btn btn-danger delete_" data-type="news" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
            
                                        //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                      });
                                    }else{
                                      cpanelNews +=
                                      '<input type="hidden" class="news_lenght_'+ j.id + '" value="1">' + 
                                      '<tr class="selectable news_'+ j.id + '">' +     
                                        '<td class="center row_news_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                        '<td class="center row_news_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="news" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider main_child_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form">' +
                                          // '<a class="btn btn-primary edit_" data-type="finance"  data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                    }
                                  }
                              });
                            }                 
                            $('.titleNews').text(z.name);
                            $('.titleSearchNews').html(titleSearchNews);
                            $('.inputSearchNews').html(inputSearchNews);
                            $('.cpanelNews').html(cpanelNews);
                          }
                        }
                      })
                    }
                })
              }
            }
          }
      });
    }
  }
  function getCatelogNews(){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.catelog,
          data : {},
          success : function(data){
            if(data.status){
              catelog   =  data.data;
              var getCatelogNews = "";
              $('.getCatelogFullbyType').html();
              if(catelog != ""){
                catelog.forEach((e) => {
                    parent = e.parent;
                    if(parent.length > 0){
                      parent.forEach((z) => {
                        if(type_id != ""){
                          if(type_id == z.id){
                            if(id_news == ""){
                              getCatelogNews += '<option value="">Chọn theo danh mục tin</option>';
                            }
                            child = z.child;
                            if(child.length > 0){
                              child.forEach((j) =>{ 
                                if(idCatelog_news != ""){
                                  var exp_ = idCatelog_news.split(',');
                                  if(jQuery.inArray(String(j.id),exp_) > -1){
                                    getCatelogNews += '<option value="'+j.id +'" selected>'+ j.name +'</option>';
                                  }else{
                                    getCatelogNews += '<option value="'+ j.id +'">'+j.name +'</option>';
                                  }
                                }else{
                                  getCatelogNews += '<option value="'+j.id +'">'+ j.name +'</option>';
                                }
                              })
                              }
                          }
                        }
                      })
                    }
                  })
                  $('.getCatelogNews').html(getCatelogNews);
              }
            }
          }
      });
    }
  }
  function getBtnSubmitNews(){
    var type_id            = $('.catelog_idMain').val();
    var btnNews = "";
    $('.btnNews').html();
    btnNews += 
    '<a class="submit_news btn btn-blue shiny" data-id="'+ type_id +'">' + 
    '<i class="fa fa-save"></i>Lưu</a>';

    btnNews += 
    '<a class="return_news btn btn-default shiny" data-id="'+ type_id +'">' + 
    ' <i class="fa fa-refresh"></i>Hủy lưu</a>';

    $('.btnNews').html(btnNews);
  }
  $("body").on("click", ".return_news", function(){
    var id = $(this).data('id');
    window.location.href = linkCpanel + 'news?get=' + id;

  })
  $("body").on("click", ".add_news", function(){
    var id = $(this).data('id');
    window.location.href = linkCpanel + 'news/add?get=' + id;
  })

  $('.getCatelogNews').select2({
    placeholder : 'Chọn theo danh mục tin',
    allowClear: true,
    maximumInputLength: 3,
    tags: true
  }).on("change", function (e) {
    var idCatelog_news = $(e.currentTarget).val();
    if(idCatelog_news != ""){
      $('.idCatelog_news').val(idCatelog_news);
    }
  })
  $('.chosse_imgNews').change(function(){
    var file_data = $(this).prop('files')[0];  
    var type = file_data.type;
    var reader = new FileReader();
    if (type.match('image')){
      var match = [
          "image/SVG",
          "image/SVG+xml",
          "image/svg",
          "image/svg+xml",
          "image/PNG",
          "image/png",
          "image/png+xml",
          "image/jpeg",
          "image/JPEG",
          "image/jpeg+xml"
      ]; 
      //kiểm tra kiểu file
      if (
      type == match[0] || 
      type == match[1] || 
      type == match[2] || 
      type == match[3] ||
      type == match[4] || 
      type == match[5] || 
      type == match[6] || 
      type == match[7] || 
      type == match[8] || 
      type == match[9] || 
      type == match[10] 
      ){
          reader.onload = function (e) {
              $('.upload_fileNews').val('');
              $('#image_fileNews').attr('src', e.target.result);
          }
          reader.readAsDataURL(file_data);
      }else{
          $('.upload_fileNews').val();
      }
    }
  })
  $(document).on('click','.remove_imgNews', function(e){
    $('#image_fileNews').attr('src', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==');
    $('.upload_fileNews').val('');
    $('.chosse_imgNews').val('');  
    // $('#upload').attr('required','required');  
  })
  $("body").on("click", ".submit_news", function(){
    var id = $(this).data('id');
    //News//
    var news_title          = $('.news_title').val();
    var idCatelog_news      = $('.idCatelog_news').val();
    var news_detail         = $('.news_detail').val();
    var news_desc           = $('.news_desc').val();
    var upload_fileNews     = $.trim($('.upload_fileNews').val());
    if(upload_fileNews == ''){
        var file_dataNews   = $('.chosse_imgNews').prop('files')[0]; 
    }else{
        var file_dataNews   = $.trim($('.upload_fileNews').val());
    } 
    //End News//

    if(id_news != ""){
      updateNews(id,id_news,news_title,idCatelog_news,news_detail,news_desc,file_dataNews);
    }else{
      submitNews(id,news_title,idCatelog_news,news_detail,news_desc,file_dataNews);
    }
  })
  //submit //
  function submitNews(id,news_title,idCatelog_news,news_detail,news_desc,file_dataNews){
    if(token != ""){
      if(news_title != "" && idCatelog_news !="" && news_detail != "" && news_desc != ""){
        var form_data = new FormData(); 
        form_data.append("id_token", id_token);

        form_data.append("news_title", news_title);

        form_data.append("idCatelog_news", idCatelog_news);

        form_data.append("news_detail", news_detail);

        form_data.append("news_desc", news_desc);
        
        if(file_dataNews !== undefined){
          form_data.append('file', file_dataNews);
        }else{
            form_data.append('emptyFile', file_dataNews);
        }  
        $.ajax({
          method: "POST",
          url  : linkApi + route.addNews,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'news?get=' + id;
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }
  function updateNews(id,id_news,news_title,idCatelog_news,news_detail,news_desc,file_dataNews){
    if(token != ""){
      if(news_title != "" && idCatelog_news !="" && news_detail != "" && news_desc != ""){
        var form_data = new FormData(); 
        form_data.append("id_news", id_news);

        form_data.append("news_title", news_title);

        form_data.append("idCatelog_news", idCatelog_news);

        form_data.append("news_detail", news_detail);

        form_data.append("news_desc", news_desc);
        
        if(file_dataNews !== undefined){
          form_data.append('file', file_dataNews);
        }else{
            form_data.append('emptyFile', file_dataNews);
        }

        $.ajax({
          method: "POST",
          url  : linkApi + route.newsUpdate,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'news?get=' + id;
            }else{
              toastBox('error','Cập nhật thất bại' ,'Cập nhật thất bại', 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }
  //end News//
  //recruit//
  function getAreaRecruit(){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.area,
          data : {},
          success : function(data){
              if(data.status){
                var getAreaRecruit = "";                   
                $('.getAreaRecruit').html("");
                var province_recruit    = $('.province_recruit').val();
                area = data.data;
                if(area != ""){
                  area.forEach((e) => {
                      province = e.province;
                      if(province.length > 0){
                        province.forEach((z) =>{ 
                          if(province_recruit != ""){
                            var exp_ = province_recruit.split(',');
                            if(jQuery.inArray(String(z.id),exp_) > -1){
                              getAreaRecruit += '<option value="'+ z.id +'" selected>'+ z.province +'</option>';
                            }else{
                              getAreaRecruit += '<option value="'+ z.id +'">'+ z.province +'</option>';
                            }
                          }else{
                            getAreaRecruit += '<option value="'+ z.id +'">'+ z.province +'</option>';
                          }
                        })
                      }
                  })
                }
                $('.getAreaRecruit').html(getAreaRecruit);
              }
          }
      });
    }
  }
  $('.getAreaRecruit').select2({
    placeholder : 'Chọn',
    allowClear: true,
    maximumInputLength: 3,
    tags: true
  }).on("change", function (e) {
    var province_recruit = $(e.currentTarget).val();
    if(province_recruit != ""){
      $('.province_recruit').val(province_recruit);
    }
  })

  $('.type_workSelect').change(function(){
    var type_work = $(this).find(":selected").val();
    if(type_work != ""){
      $('.type_work').val(type_work);
    }else{
      $('.type_work').val("");
    }
  })

  $('.education_levelSelect').change(function(){
    var education_level = $(this).find(":selected").val();
    if(education_level != ""){
      $('.education_level').val(education_level);
    }else{
      $('.education_level').val("");
    }
  })

  $('.expSelect').change(function(){
    var exp = $(this).find(":selected").val();
    if(exp != ""){
      $('.exp').val(exp);
    }else{
      $('.exp').val("");
    }
  })

  $('.salarySelect').change(function(){
    var salary = $(this).find(":selected").val();
    if(salary != ""){
      $('.salary').val(salary);
    }else{
      $('.salary').val("");
    }
  })

  $('.inputSearchRecruit').change(function(){
    var key = $(this).find(":selected").val();
    if(key != ""){
      getRecruit(key);
    }else{
      getRecruit();
    }
  })

  function getRecruit(key = null){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.catelog,
          data : {},
          success : function(data){
            if(data.status){
              catelog             =  data.data;
              var stt             = 1;
              var cpanelRecruit       = "";
              var inputSearchRecruit = "";

              var checkChild      = "";
              var checkChildRecruit  = ""; 

              $('.inputSearchRecruit').html();

              $('.cpanelRecruit').html();

              if(catelog != ""){
                catelog.forEach((e) => {
                  if(e.id == 5){
                      parent = e.parent;
                      if(parent.length > 0){
                        parent.forEach((z) => {
                          if(z.id == 6){
                            child = z.child;
                            inputSearchRecruit += 
                            '<option value="">Tìm kiếm theo danh mục tin</option>';
                            if(child.length > 0){
                              child.forEach((j) => {                      
                                recruit_ = j.recruit;
                                  if(j.active){
                                    checkChild = "checked";
                                  }else{
                                    checkChild = "";
                                  }
    
                                  if(key != null){
                                    if(key == j.id){
                                      inputSearchRecruit += 
                                      '<option value="'+ j.id +'" selected>'+ j.name +'</option>';
                                      if(recruit_.length > 0){
                                        cpanelRecruit +=
                                        '<input type="hidden" class="recruit_lenght_'+ j.id + '" value="'+ (parseInt(recruit_.length) + 2) +'">' + 
                                        '<tr class="selectable recruit_'+ j.id + '">' +              
                                          '<td class="center row_recruit_'+ j.id + '" rowspan="'+ (parseInt(recruit_.length) + 2) +'">' + stt++ +'</td>' +  
                                          '<td class="center row_recruit_'+ j.id + '" rowspan="'+ (parseInt(recruit_.length) + 2) +'" >' + j.name +'</td>' + 
                                        '</tr>'
                                        cpanelRecruit +=
                                        '<tr class="selectable recruit_'+ j.id + '">' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider recruit_catelog_'+ j.id +' colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="finance" data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="finance" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                        recruit_.forEach((p) => {
                                
                                          if(p.active){
                                            checkChildRecruit = "checked";
                                          }else{
                                            checkChildRecruit = "";
                                          }
                                          cpanelRecruit +=
                                          '<tr class="selectable recruit_'+ j.id + ' recruit_1'+ p.id +'">' +
                                            '<td class="center">' + p.title +'</td>' + 
                                            '<td class="center">' + p.username +'</td>' + 
                                            '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                            '<td class="text-center">' +
                                              '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                                '<input class="checkbox-slider  recruit_catelog_'+ j.id +' recruit_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildRecruit  +'> <span class="text"></span>' + 
                                              '</label>'+
                                            '</td>' +
                                            '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                              '<a class="btn btn-primary edit_" data-type="recruit"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                              '<a class="btn btn-danger delete_" data-type="recruit" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                            '</td>' +
                                          '</tr>'
              
                                          //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                        });
                                      }else{
                                        cpanelRecruit +=
                                        '<input type="hidden" class="recruit_lenght_'+ j.id + '" value="1">' + 
                                        '<tr class="selectable recruit_'+ j.id + '">' +     
                                          '<td class="center row_recruit_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                          '<td class="center row_recruit_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="center"></td>' +
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="" data-id="' + j.id +'">' +
                                              '<input class="checkbox-slider recruit_catelog_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +  
                                          '<td class="center btn_form">' +
                                            // '<a class="btn btn-primary edit_" data-type="recruit"  data-id="'+ j.id + '">Sửa</a>'+
                                            // '<a class="btn btn-danger delete_" data-type="recruit" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
                                      }
                                    }else{
                                      inputSearchRecruit += 
                                      '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    }
                                  }else{
                                    inputSearchRecruit += 
                                    '<option value="'+ j.id +'">'+ j.name +'</option>';
                                    if(recruit_.length > 0){
                                      cpanelRecruit +=
                                      '<input type="hidden" class="recruit_lenght_'+ j.id + '" value="'+ (parseInt(recruit_.length) + 2) +'">' + 
                                      '<tr class="selectable recruit_'+ j.id + '">' +              
                                        '<td class="center row_recruit_'+ j.id + '" rowspan="'+ (parseInt(recruit_.length) + 2) +'">' + stt++ +'</td>' +  
                                        '<td class="center row_recruit_'+ j.id + '" rowspan="'+ (parseInt(recruit_.length) + 2) +'" >' + j.name +'</td>' + 
                                      '</tr>'
                                      cpanelRecruit +=
                                      '<tr class="selectable recruit_'+ j.id + '">' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider recruit_catelog_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form" >' +
                                          // '<a class="btn btn-primary edit_" data-type="recruit" data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="recruit" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                      recruit_.forEach((p) => {
                              
                                        if(p.active){
                                          checkChildRecruit = "checked";
                                        }else{
                                          checkChildRecruit = "";
                                        }
                                        cpanelRecruit +=
                                        '<tr class="selectable recruit_'+ j.id + ' recruit_1'+ p.id +'">' +
                                          '<td class="center">' + p.title +'</td>' + 
                                          '<td class="center">' + p.username +'</td>' + 
                                          '<td class="center">' + formatTime(p.created_at) +'</td>' + 
                                          '<td class="text-center">' +
                                            '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="' + j.id +'" data-id="' + p.id +'">' +
                                              '<input class="checkbox-slider recruit_catelog_'+ j.id +'  recruit_'+ p.id +'  colored-blue" type="checkbox" '+ checkChildRecruit  +'> <span class="text"></span>' + 
                                            '</label>'+
                                          '</td>' +
                                          '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                                            '<a class="btn btn-primary edit_" data-type="recruit"  data-parent="'+ type_id + '" data-id="'+ p.id + '">Sửa</a>'+
                                            '<a class="btn btn-danger delete_" data-type="recruit" data-parent="'+ j.id + '" data-id="'+ p.id + '">Xóa</a>' +
                                          '</td>' +
                                        '</tr>'
            
                                        //page_setting_area_add += '<option value="'+ z.id + '_province"> |__' + z.province +'</option>';
                                      });
                                    }else{
                                      cpanelRecruit +=
                                      '<input type="hidden" class="recruit_lenght_'+ j.id + '" value="1">' + 
                                      '<tr class="selectable recruit_'+ j.id + '">' +     
                                        '<td class="center row_recruit_'+ j.id + '" rowspan="1">' + stt++ +'</td>' +  
                                        '<td class="center row_recruit_'+ j.id + '" rowspan="1" >' + j.name +'</td>' + 
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="center"></td>' +
                                        '<td class="text-center">' +
                                          '<label class="status_" title="" data-action="lock" data-type="recruit" data-parent="" data-id="' + j.id +'">' +
                                            '<input class="checkbox-slider recruit_catelog_'+ j.id +'  colored-blue" type="checkbox" '+ checkChild  +'> <span class="text"></span>' + 
                                          '</label>'+
                                        '</td>' +  
                                        '<td class="center btn_form">' +
                                          // '<a class="btn btn-primary edit_" data-type="recruit"  data-id="'+ j.id + '">Sửa</a>'+
                                          // '<a class="btn btn-danger delete_" data-type="recruit" data-parent="" data-id="'+ j.id + '">Xóa</a>' +
                                        '</td>' +
                                      '</tr>'
                                    }
                                  }
                              });
                            }                 
                            $('.inputSearchRecruit').html(inputSearchRecruit);
                            $('.cpanelRecruit').html(cpanelRecruit);
                          }
                        })
                      }
                  }                 
                })
              }
            }
          }
      });
    }
  }


  $("body").on("click", ".submit_recruit", function(){
    var recruit_title       = $('.recruit_title').val();
    var recruit_id          = $('.recruit_id').val();
    var job_industry        = $('.job_industry').val();
    var province_recruit    = $('.province_recruit').val();
    var type_work           = $('.type_work').val();
    var education_level     = $('.education_level').val();
    var exp                 = $('.exp').val();
    var salary              = $('.salary').val();
    var expiry_date         = $('.expiry_date').val();
    var content_work        = $('.content_work').val();
    var regime_work         = $('.regime_work').val();
    var profile_work        = $('.profile_work').val();
    var contact_work        = $('.contact_work').val();
    if(recruit_id == ""){
      addRecruit(
        recruit_title,
        job_industry,
        province_recruit,
        type_work,
        education_level,
        exp,
        salary,
        expiry_date,
        content_work,
        regime_work,
        profile_work,
        contact_work,
        );
    }else{
      updateRecruit(
        recruit_id,
        recruit_title,
        job_industry,
        province_recruit,
        type_work,
        education_level,
        exp,
        salary,
        expiry_date,
        content_work,
        regime_work,
        profile_work,
        contact_work,
        );
    }

  });

  function addRecruit(
    recruit_title,
    job_industry,
    province_recruit,
    type_work,
    education_level,
    exp,
    salary,
    expiry_date,
    content_work,
    regime_work,
    profile_work,
    contact_work,
  ){
    if(token != ""){
      if(
        recruit_title != "" && 
        job_industry !="" && 
        province_recruit != "" && 
        type_work != "" &&
        education_level != "" && 
        exp !="" && 
        salary != "" && 
        expiry_date != "" &&
        content_work != "" &&
        regime_work != "" &&
        profile_work != "" &&
        contact_work != "" 
        ){
        var form_data = new FormData(); 
        form_data.append("id_token", id_token);

        form_data.append("recruit_title", recruit_title);

        form_data.append("job_industry", job_industry);

        form_data.append("province_recruit", province_recruit);

        form_data.append("type_work", type_work);

        form_data.append("education_level", education_level);

        form_data.append("exp", exp);

        form_data.append("salary", salary);

        form_data.append("expiry_date", expiry_date);

        form_data.append("content_work", content_work);

        form_data.append("regime_work", regime_work);

        form_data.append("profile_work", profile_work);

        form_data.append("contact_work", contact_work);
        
        $.ajax({
          method: "POST",
          url  : linkApi + route.addRecruit,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'recruit';
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }

  function updateRecruit(
    recruit_id,
    recruit_title,
    job_industry,
    province_recruit,
    type_work,
    education_level,
    exp,
    salary,
    expiry_date,
    content_work,
    regime_work,
    profile_work,
    contact_work,
  ){
    if(token != ""){
      if(
        recruit_title != "" && 
        job_industry !="" && 
        province_recruit != "" && 
        type_work != "" &&
        education_level != "" && 
        exp !="" && 
        salary != "" && 
        expiry_date != "" &&
        content_work != "" &&
        regime_work != "" &&
        profile_work != "" &&
        contact_work != "" 
        ){
        var form_data = new FormData(); 
        form_data.append("recruit_id", recruit_id);

        form_data.append("recruit_title", recruit_title);

        form_data.append("job_industry", job_industry);

        form_data.append("province_recruit", province_recruit);

        form_data.append("type_work", type_work);

        form_data.append("education_level", education_level);

        form_data.append("exp", exp);

        form_data.append("salary", salary);

        form_data.append("expiry_date", expiry_date);

        form_data.append("content_work", content_work);

        form_data.append("regime_work", regime_work);

        form_data.append("profile_work", profile_work);

        form_data.append("contact_work", contact_work);
        
        $.ajax({
          method: "POST",
          url  : linkApi + route.updateRecruit,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'recruit';
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }

  //End recruit //
  //candidates //
  var count_language = $('.countlanguage').val();
  var pageLanguae    = "";
  $("body").on("click",".addlanguage", function(){
    count_language++;
    $('.countlanguage').val(count_language);
    pageLanguae = "";
    pageLanguae += 
    '<div class="row ngoaingu_'+ count_language +'">' + 
        '<input type="hidden" class="language_'+count_language+'">' +
        '<input type="hidden" class="tdLanguage_'+count_language+'">' +
        '<div class="col-sm-6">'+
          '<div class="form-group">'+
              '<a href="#" class="removeLanguage" data-id="'+count_language+'">Xóa</a>'+
              '<div>'+
                  '<select class="form-control languageSelect" name="languageSelect" id="languageSelect">'+
                      '<option value="">-- Chọn trình độ ngoại ngữ --</option>' + 
                      ' <option value="1"  data-id="'+count_language+'">Anh </option>' + 
                      '<option value="2"  data-id="'+count_language+'"> Mỹ </option>' + 
                      ' <option value="3"  data-id="'+count_language+'"> Nhật </option>' + 
                  '</select>'+
              '</div>' + 
          '</div>' + 
        '</div>' + 
        '<div class="col-sm-6">'+
          '<div class="form-group">'+
              '<label for="business_fax"></label>'+
              '<div>'+
                  '<select class="form-control tdLanguageSelect" name="tdLanguageSelect" id="tdLanguageSelect">'+
                      '<option value="">-- Chọn trình độ --</option>' + 
                      '<option value="1"  data-id="'+count_language+'">Cơ Bản </option>' + 
                      '<option value="2"  data-id="'+count_language+'">Khá </option>' + 
                      '<option value="3"  data-id="'+count_language+'">Lưu Loát </option>' + 
                  '</select>' + 
              '</div>' + 
          '</div>' + 
        '</div>' +
    '</div>'

    $('.groupNgoaiNgu').append(pageLanguae);
  })
  $("body").on("click",".removeLanguage", function(){
    var key = $(this).data('id');
    if(key != ""){
      $('.ngoaingu_' + key).remove();
    }
  })

  $("body").on("change",".languageSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.language_' + key).val(value);
    }else{
      $('.language_' + key).val(value);
    }
  })

  $("body").on("change",".tdLanguageSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.tdLanguage_' + key).val(value);
    }else{
      $('.tdLanguage_' + key).val(value);
    }
  })

  var count_computer = $('.countComputer').val();
  var pageComputer   = "";
  $("body").on("click",".addComputer", function(){
    count_computer++;
    $('.countComputer').val(count_computer);
    pageComputer = "";
    pageComputer += 
    '<div class="row tinhoc_'+ count_computer +'">' + 
        '<input type="hidden" class="computer_'+count_computer+'">' +
        '<input type="hidden" class="tdcomputer_'+count_computer+'">' +
        '<div class="col-sm-6">'+
          '<div class="form-group">'+
              '<a href="#" class="removecComputer" data-id="'+count_computer+'">Xóa</a>'+
              '<div>'+
                  '<select class="form-control computerSelect" name="computerSelect" id="computerSelect">'+
                      '<option value="">-- Chọn trình độ ngoại ngữ --</option>' + 
                      ' <option value="1"  data-id="'+count_computer+'">Word </option>' + 
                      '<option value="2"  data-id="'+count_computer+'"> Excel</option>' + 
                      ' <option value="3"  data-id="'+count_computer+'">Power Point </option>' + 
                      ' <option value="4"  data-id="'+count_computer+'">Tất cả </option>' + 
                  '</select>'+
              '</div>' + 
          '</div>' + 
        '</div>' + 
        '<div class="col-sm-6">'+
          '<div class="form-group">'+
              '<label for="business_fax"></label>'+
              '<div>'+
                  '<select class="form-control tdcomputerSelect" name="tdcomputerSelect" id="tdcomputerSelect">'+
                      '<option value="">-- Chọn trình độ --</option>' + 
                      '<option value="1"  data-id="'+count_computer+'">Cơ Bản </option>' + 
                      '<option value="2"  data-id="'+count_computer+'">Khá </option>' + 
                      '<option value="3"  data-id="'+count_computer+'">Tốt</option>' + 
                  '</select>' + 
              '</div>' + 
          '</div>' + 
        '</div>' +
    '</div>'

    $('.groupTinHoc').append(pageComputer);
  })
  $("body").on("click",".removecComputer", function(){
    var key = $(this).data('id');
    if(key != ""){
      $('.tinhoc_' + key).remove();
    }
  })

  $("body").on("change",".computerSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.computer_' + key).val(value);
    }else{
      $('.computer_' + key).val(value);
    }
  })

  $("body").on("change",".tdcomputerSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.tdcomputer_' + key).val(value);
    }else{
      $('.tdcomputer_' + key).val(value);
    }
  })

  getCandidates()
  function getCandidates(key = null){
    if(token != ""){
      $.ajax({
        method: "GET",
        url  : linkApi + route.candidates,
        data : {},
        success : function(data){
          if(data.status){
            var cpanelCandidates        = "";
            var checkSettingCandidates  = "";
            var stt               = 1;
            $('.cpanelCandidates').html('');

            if(key != null){
              if(data.data.filter(table => table.full_nameCandidates.toLowerCase().includes(key)) != ""){
                candidates =   data.data.filter(table => table.full_nameCandidates.toLowerCase().includes(key));
              }else{
                candidates =  data.data;
              }
            }else{
              candidates =  data.data;
            }
            if(candidates.length > 0){
              candidates.forEach((z) => {
                            
                if(z.active){
                  checkSettingCandidates = "checked";
                }else{
                  checkSettingCandidates = "";
                }
                cpanelCandidates +=
                '<tr class="selectable candidates_'+ z.id + '">' +     
                  '<td class="center row_candidates_'+ z.id + '" rowspan="1">' + stt++ +'</td>' +  
                  '<td class="center row_candidates_'+ z.id + '" rowspan="1" >' + z.full_nameCandidates +'</td>' + 
                  '<td class="center">' + z.gender +'</td>' +
                  '<td class="center">' + z.email_candidates +'</td>' +
                  '<td class="center">' + z.phone_candidates +'</td>' +
                  '<td class="text-center">' +
                    '<label class="status_" title="" data-action="lock" data-type="candidates"  data-id="' + z.id +'">' +
                      '<input class="checkbox-slider candidates_parent_'+ z.id +' colored-blue" type="checkbox" '+ checkSettingCandidates  +'> <span class="text"></span>' + 
                    '</label>'+
                  '</td>' +  
                  '<td class="center btn_form" style="display: flex;justify-content: space-around">' +
                    '<a class="btn btn-primary edit_" data-type="candidates"  data-id="'+ z.id + '">Sửa</a>'+
                    '<a class="btn btn-danger delete_" data-type="candidates" data-id="'+ z.id + '">Xóa</a>' +
                  '</td>' +
                '</tr>'
              });
            }
            $('.cpanelCandidates').html(cpanelCandidates);
          }
        }
      });
    }
  }


  function getAreaCandidates(){
    if(token != null){
      $.ajax({
          method: "GET",
          url  : linkApi + route.area,
          data : {},
          success : function(data){
              if(data.status){
                area = data.data;
                var candidates_provinceSelect = "";                   
                $('.candidates_provinceSelect').html("");
                var province_candidates    = $('.province_candidates').val();
                if(area != ""){
                  area.forEach((e) => {
                      province = e.province;
                      if(province_candidates == ""){
                        candidates_provinceSelect += '<option value="">Chọn</option>';
                      }
                      if(province.length > 0){
                        province.forEach((z) =>{ 
                          if(province_candidates != ""){
                            var exp_ = province_candidates.split(',');
                            if(jQuery.inArray(String(z.id),exp_) > -1){
                              candidates_provinceSelect += '<option value="'+ z.id +'" selected>'+ z.province +'</option>';
                            }else{
                              candidates_provinceSelect += '<option value="'+ z.id +'">'+ z.province +'</option>';
                            }
                          }else{
                            candidates_provinceSelect += '<option value="'+ z.id +'">'+ z.province +'</option>';
                          }
                        })
                      }
                  })
                }
                $('.candidates_provinceSelect').html(candidates_provinceSelect);
              }
          }
      });
    }
  }

  $('.candidates_provinceSelect').change(function(){
    var province_candidates = $(this).find(":selected").val();
    if(province_candidates != ""){
      $('.province_candidates').val(province_candidates);
    }else{
      $('.province_candidates').val("");
    }
  })
  $('.genderSelect').change(function(){
    var gender_candidates = $(this).find(":selected").val();
    if(gender_candidates != ""){
      $('.gender_candidates').val(gender_candidates);
    }else{
      $('.gender_candidates').val("");
    }
  })
  $('.maritalSlect').change(function(){
    var marital_candidates = $(this).find(":selected").val();
    if(marital_candidates != ""){
      $('.marital_candidates').val(marital_candidates);
    }else{
      $('.marital_candidates').val("");
    }
  })
  $('.month_graduateSelect').change(function(){
    var month_graduate = $(this).find(":selected").val();
    if(month_graduate != ""){
      $('.month_graduate').val(month_graduate);
    }else{
      $('.month_graduate').val("");
    }
  })

  $('.year_graduateSelect').change(function(){
    var year_graduate = $(this).find(":selected").val();
    if(year_graduate != ""){
      $('.year_graduate').val(year_graduate);
    }else{
      $('.year_graduate').val("");
    }
  })

  $('.chosse_imgCandidates').change(function(){
    var file_data = $(this).prop('files')[0];  
    var type = file_data.type;
    var reader = new FileReader();
    if (type.match('image')){
      var match = [
          "image/SVG",
          "image/SVG+xml",
          "image/svg",
          "image/svg+xml",
          "image/PNG",
          "image/png",
          "image/png+xml",
          "image/jpeg",
          "image/JPEG",
          "image/jpeg+xml"
      ]; 
      //kiểm tra kiểu file
      if (
      type == match[0] || 
      type == match[1] || 
      type == match[2] || 
      type == match[3] ||
      type == match[4] || 
      type == match[5] || 
      type == match[6] || 
      type == match[7] || 
      type == match[8] || 
      type == match[9] || 
      type == match[10] 
      ){
          reader.onload = function (e) {
              $('.upload_imgCandidates').val('');
              $('#image_fileCandidates').attr('src', e.target.result);
          }
          reader.readAsDataURL(file_data);
      }else{
          $('.upload_imgCandidates').val();
      }
    }
  })
  $(document).on('click','.remove_imgCandidates', function(e){
    $('#image_fileCandidates').attr('src', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==');
    $('.upload_imgCandidates').val('');
    $('.chosse_imgCandidates').val('');  
    // $('#upload').attr('required','required');  
  })

  $('.chosse_fileCandidates').change(function(){
    var file_data = $(this).prop('files')[0]; 
    console.log(file_data); 
    var type = file_data.type;
    var reader = new FileReader();
    if (type.match('application')){
      var match = [
          "application/pdf",
      ]; 
      //kiểm tra kiểu file
      if (
      type == match[0]
      ){
          reader.onload = function (e) {
              $('.upload_fileCandidates').val('');
              $('#cv_fileCandidates').css('display','block');
              $('#cv_fileCandidates').attr('src', e.target.result);
          }
          reader.readAsDataURL(file_data);
      }else{
          $('.upload_fileCandidates').val();
      }
    }
  })
  $(document).on('click','.remove_fileCandidates', function(e){
    $('#cv_fileCandidates').css('display','none');
    $('.upload_fileCandidates').val('');
    $('.chosse_fileCandidates').val('');  
    // $('#upload').attr('required','required');  
  })

  $(".check_workExp").change(function () {
      if (this.checked) {
          //I am checked
          var workExperience_candidates = $('.workExperience_candidates').val(1);
          $('.groupKinhNghiem').css('display','none');
      } else {
        var workExperience_candidates = $('.workExperience_candidates').val(0);
        $('.groupKinhNghiem').css('display','block');
      }
  });

  var count_work = $('.countExpWork').val();
  var pageWork   = "";
  $("body").on("click",".addExpWork", function(){
    count_work++;
    $('.countExpWork').val(count_work);
    pageWork = "";
    pageWork += 
      '<div class="kinnh_nghiem'+count_work+'">' + 
        '<input type="hidden" class="form_month'+count_work+'">' +
        '<input type="hidden" class="form_year'+count_work+'">' +
        '<input type="hidden" class="to_month'+count_work+'">' + 
        '<input type="hidden" class="to_year'+count_work+'">' +
        '<div class="form-group">' +
            ' <label for="">Vị trí chức danh <a class="removeExpWork" data-id="'+count_work+'">Xóa</a></label>'+
            '<div>'+
                '<input name="title_work'+count_work+'" type="text" class="form-control title_work'+count_work+'">'+
            '</div>'+
        '</div>'+
        '<div class="form-group">' +
            '<label for="">Cấp bậc</label>'+
            '<div>'+
                ' <input name="ranks_work'+count_work+'" type="text" id="ranks_work'+count_work+'" class="form-control ranks_work'+count_work+'">'+
            '</div>'+
        '</div>'+
        '<div class="form-group">' +
            '<label for="">Công ty</label>'+
            '<div>'+
                ' <input name="company_work'+count_work+'" type="text" id="company_work'+count_work+'" class="form-control company_work'+count_work+'">'+
            '</div>'+
        '</div>'+
        '<div class="row">' +
            '<div class="col-sm-6">'+ 
                '<div class="form-group">'+ 
                    '<label for="">Thời gian làm việc</label>' + 
                    ' <div style="display:flex">' + 
                        '<select class="form-control from_monthSelect" name="from_monthSelect" id="from_monthSelect">'+
                          '<option value="" data-id="'+count_work+'">-- Chọn --</option>'
                            for(var m = 1 ; m < 13 ; m++){
                              pageWork += '<option value="'+ m +'" data-id="'+count_work+'">Tháng ' + m +'</option>'
                            }
                        pageWork +='</select>' +

                        '<select class="form-control from_yearSelect" name="from_yearSelect" id="from_yearSelect">'+
                            '<option value="" data-id="'+count_work+'">-- Chọn --</option>'
                            for(var y = 1990 ; y < 2023 ; y++){
                              pageWork += '<option value="'+ y +'" data-id="'+count_work+'">Năm ' + y +'</option>'
                            } 
                        pageWork +='</select>' +
                    '</div>' +
                '</div>'+
            '</div>'+

            '<div class="col-sm-6">'+ 
                '<div class="form-group">'+ 
                    ' <label for="">Đến</label>'+
                    ' <div style="display:flex">' +
                        '<select class="form-control to_monthSelect" name="to_monthSelect" id="to_monthSelect">'+
                            '<option value="" data-id="'+count_work+'">-- Chọn --</option>'
                              for(var m = 1 ; m < 13 ; m++){
                                pageWork += '<option value="'+ m +'" data-id="'+count_work+'">Tháng ' + m +'</option>'
                              }
                          pageWork +='</select>' +

                          '<select class="form-control to_yearSelect" name="to_yearSelect" id="to_yearSelect">'+
                              '<option value="" data-id="'+count_work+'">-- Chọn --</option>'
                              for(var y = 1990 ; y < 2023 ; y++){
                                pageWork += '<option value="'+ y +'" data-id="'+count_work+'">Năm ' + y +'</option>'
                              } 
                          pageWork +='</select>' +
                    '</div>' +
                '</div>'+
            '</div>'+
        '</div>'+

        '<div class="form-group">' +
            ' <label for="">Mô tả công việc</label>'+
            '<div>'+
                '<textarea name="content_work'+count_work+'" type="text" id="content_work'+count_work+'" class="form-control content_work'+count_work+'" rows="2"></textarea>'+
            '</div>'+
        '</div>'+



      '</div>'

    $('.groupKinhNghiem').append(pageWork);
  })

  $("body").on("change",".from_monthSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
      $('.form_month' + key).val(value);
  })
  $("body").on("change",".from_yearSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.form_year' + key).val(value);
    }else{
      $('.frorm_year' + key).val(value);
    }
  })
  $("body").on("change",".to_monthSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    $('.to_month' + key).val(value);
  })

  $("body").on("change",".to_yearSelect", function(){
    var key   = $(this).find(":selected").data('id');
    var value = $(this).find(":selected").val();
    if(value != ""){
      $('.to_year' + key).val(value);
    }else{
      $('.to_year' + key).val(value);
    }
  })

  $("body").on("click",".removeExpWork", function(){
    var key = $(this).data('id');
    if(key != ""){
      $('.kinnh_nghiem' + key).remove();
    }
  })

  var skill_ = $('.skill_candidates').val();
  if(skill_){
    var exp_ = skill_.split(',');
    var skill_candidates = exp_; 
  }else{
    var skill_candidates = []; 
  }

  $("body").on("click", ".check_skill", function(){
      var $this  = $(this);
      var  check = $this.val();

      if($this.prop('checked')){
          skill_candidates.push(check);
      }else{
        skill_candidates.splice($.inArray(check, skill_candidates),1);
      }
      $('.skill_candidates').val(skill_candidates);
  });

  $("body").on("click", ".submit_Candidates", function(){
      var id_candidates       = $('.id_candidates').val();

      if(id_candidates == ""){
        submitCandidates()
      }else{
        updateCandidates();
      }

  })

  function submitCandidates(){
    if(token != ""){
      var province_candidates = $('.province_candidates').val();
      var job_industry        = $('.job_industry').val();
      var full_nameCandidates = $('.full_nameCandidates').val();
      var gender_candidates   = $('.gender_candidates').val();
      var marital_candidates  = $('.marital_candidates').val();
      var birthday_candidates = $('.birthday_candidates').val();
      var phone_candidates    = $('.phone_candidates').val();
      var email_candidates    = $('.email_candidates').val();
      var address_candidates  = $('.address_candidates').val();
      var school_candidates   = $('.school_candidates').val();
      var education_level     = $('.education_level').val();
      var month_graduate      = $('.month_graduate').val();
      var fileImg_candidates  = $.trim($('.upload_imgCandidates').val());
      var year_graduate       = $('.year_graduate').val();
      if(fileImg_candidates == ''){
          var img_dataCandidates   = $('.chosse_imgCandidates').prop('files')[0]; 
      }else{
          var img_dataCandidates   = $.trim($('.upload_imgCandidates').val());
      } 

      var upload_fileCandidates  = $.trim($('.upload_fileCandidates').val());
      if(upload_fileCandidates == ''){
          var cv_dataCandidates   = $('.chosse_fileCandidates').prop('files')[0]; 
      }else{
          var cv_dataCandidates   = $.trim($('.upload_fileCandidates').val());
      } 

      var language_   = [];
      var tdLanguage_ = [];
      var count_language = $('.countlanguage').val();
      for(var i = 0 ; i <= count_language ; i++){
        var language_i    = $('.language_' + i).val();
        var tdLanguage_i  = $('.tdLanguage_' + i).val();
        if(language_i != "undefined"){
          language_.push(language_i);
        }
        if(tdLanguage_i != "undefined"){
          tdLanguage_.push(tdLanguage_i);
        }
      }

      var computer_       = [];
      var tdcomputer_     = [];
      var count_computer  = $('.countComputer').val();
      for(var i = 0 ; i <= count_computer ; i++){
        var computer_i    = $('.computer_' + i).val();
        var tdcomputer_i  = $('.tdcomputer_' + i).val();
        if(computer_i != "undefined"){
          computer_.push(computer_i);
        }
        if(tdcomputer_i != "undefined"){
          tdcomputer_.push(tdcomputer_i);
        }
      }
      var otherDegrees_candidates  = $('.otherDegrees_candidates').val();
      var workExperience_candidates= $('.workExperience_candidates').val();

      var title_work      = [];
      var ranks_work      = [];
      var company_work    = [];
      var form_month      = [];
      var form_year       = [];
      var to_month        = [];
      var to_year         = [];
      var content_work    = [];
      var countExpWork  = $('.countExpWork').val();
      if(workExperience_candidates != 1){
        for(var i = 0 ; i <= countExpWork ; i++){
          var title_work_i    = $('.title_work' + i).val();
          var ranks_work_i    = $('.ranks_work' + i).val();
          var company_work_i  = $('.company_work' + i).val();
          var form_month_i    = $('.form_month' + i).val();

          var form_year_i     = $('.form_year' + i).val();
          var to_month_i      = $('.to_month' + i).val();
          var to_year_i       = $('.to_year' + i).val();
          var content_work_i  = $('.content_work' + i).val();

          if(title_work_i != "undefined"){
            title_work.push(title_work_i);
          }
          if(ranks_work_i != "undefined"){
            ranks_work.push(ranks_work_i);
          }

          if(company_work_i != "undefined"){
            company_work.push(company_work_i);
          }
          if(form_month_i != "undefined"){
            form_month.push(form_month_i);
          }

          if(form_year_i != "undefined"){
            form_year.push(form_year_i);
          }
          if(to_month_i != "undefined"){
            to_month.push(to_month_i);
          }

          if(to_year_i != "undefined"){
            to_year.push(to_year_i);
          }
          if(content_work_i != "undefined"){
            content_work.push(content_work_i);
          }
        }
      }

      var skill_candidates        = $('.skill_candidates').val();
      var achievements_candidates = $('.achievements_candidates').val();
      if(
        province_candidates != "" && 
        job_industry !="" && 
        full_nameCandidates != "" && 
        gender_candidates != "" &&
        marital_candidates != "" && 
        birthday_candidates !="" && 
        phone_candidates != "" && 
        email_candidates != "" &&
        address_candidates != "" &&
        school_candidates != "" &&
        education_level != "" &&
        month_graduate != ""  &&
        year_graduate != ""  &&
        language_     != "" &&
        tdLanguage_  != ""  &&
        computer_     != "" &&
        tdcomputer_  != ""  &&

        title_work != "" &&
        ranks_work != "" &&
        company_work != ""  &&
        form_month != ""  &&
        form_year     != "" &&
        to_month  != ""  &&
        to_year     != "" &&
        content_work  != "" 
        ){
        var form_data = new FormData(); 
        form_data.append("id_token", id_token);

        form_data.append("province_candidates", province_candidates);

        form_data.append("job_industry", job_industry);

        form_data.append("full_nameCandidates", full_nameCandidates);

        form_data.append("gender_candidates", gender_candidates);

        form_data.append("marital_candidates", marital_candidates);

        form_data.append("birthday_candidates", birthday_candidates);

        form_data.append("phone_candidates", phone_candidates);

        form_data.append("email_candidates", email_candidates);

        form_data.append("address_candidates", address_candidates);

        form_data.append("school_candidates", school_candidates);

        form_data.append("education_level", education_level);

        form_data.append("month_graduate", month_graduate);

        form_data.append("year_graduate", year_graduate);

        if(img_dataCandidates !== undefined){
          form_data.append('fileImg', img_dataCandidates);
        }else{
            form_data.append('emptyFileImg', img_dataCandidates);
        }  

        if(cv_dataCandidates !== undefined){
          form_data.append('fileCv', cv_dataCandidates);
        }else{
            form_data.append('emptyFileCv', cv_dataCandidates);
        }  

        form_data.append("language", language_);

        form_data.append("tdLanguage", tdLanguage_);

        form_data.append("computer", computer_);

        form_data.append("tdcomputer", tdcomputer_);

        form_data.append("otherDegrees_candidates", otherDegrees_candidates);

        form_data.append("workExperience_candidates", workExperience_candidates);
        
        form_data.append("title_work", title_work);

        form_data.append("ranks_work", ranks_work);

        form_data.append("company_work", company_work);

        form_data.append("form_month", form_month);

        form_data.append("form_year", form_year);

        form_data.append("to_month", to_month);

        form_data.append("to_year", to_year);

        form_data.append("content_work", form_month);

        form_data.append("skill_candidates", skill_candidates);

        form_data.append("achievements_candidates", achievements_candidates);

        $.ajax({
          method: "POST",
          url  : linkApi + route.addCandidates,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'candidates';
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }


  function updateCandidates(){
    if(token != ""){
      var id_candidates       = $('.id_candidates').val();
      var province_candidates = $('.province_candidates').val();
      var job_industry        = $('.job_industry').val();
      var full_nameCandidates = $('.full_nameCandidates').val();
      var gender_candidates   = $('.gender_candidates').val();
      var marital_candidates  = $('.marital_candidates').val();
      var birthday_candidates = $('.birthday_candidates').val();
      var phone_candidates    = $('.phone_candidates').val();
      var email_candidates    = $('.email_candidates').val();
      var address_candidates  = $('.address_candidates').val();
      var school_candidates   = $('.school_candidates').val();
      var education_level     = $('.education_level').val();
      var month_graduate      = $('.month_graduate').val();
      var fileImg_candidates  = $.trim($('.upload_imgCandidates').val());
      var year_graduate       = $('.year_graduate').val();
      if(fileImg_candidates == ''){
          var img_dataCandidates   = $('.chosse_imgCandidates').prop('files')[0]; 
      }else{
          var img_dataCandidates   = $.trim($('.upload_imgCandidates').val());
      } 

      var upload_fileCandidates  = $.trim($('.upload_fileCandidates').val());
      if(upload_fileCandidates == ''){
          var cv_dataCandidates   = $('.chosse_fileCandidates').prop('files')[0]; 
      }else{
          var cv_dataCandidates   = $.trim($('.upload_fileCandidates').val());
      } 

      var language_   = [];
      var tdLanguage_ = [];
      var count_language = $('.countlanguage').val();
      for(var i = 0 ; i <= count_language ; i++){
        var language_i    = $('.language_' + i).val();
        var tdLanguage_i  = $('.tdLanguage_' + i).val();
        if(language_i != "undefined"){
          language_.push(language_i);
        }
        if(tdLanguage_i != "undefined"){
          tdLanguage_.push(tdLanguage_i);
        }
      }

      var computer_       = [];
      var tdcomputer_     = [];
      var count_computer  = $('.countComputer').val();
      for(var i = 0 ; i <= count_computer ; i++){
        var computer_i    = $('.computer_' + i).val();
        var tdcomputer_i  = $('.tdcomputer_' + i).val();
        if(computer_i != "undefined"){
          computer_.push(computer_i);
        }
        if(tdcomputer_i != "undefined"){
          tdcomputer_.push(tdcomputer_i);
        }
      }
      var otherDegrees_candidates  = $('.otherDegrees_candidates').val();
      var workExperience_candidates= $('.workExperience_candidates').val();

      var title_work      = [];
      var ranks_work      = [];
      var company_work    = [];
      var form_month      = [];
      var form_year       = [];
      var to_month        = [];
      var to_year         = [];
      var content_work    = [];
      var countExpWork  = $('.countExpWork').val();
      if(workExperience_candidates != 1){
        for(var i = 0 ; i <= countExpWork ; i++){
          var title_work_i    = $('.title_work' + i).val();
          var ranks_work_i    = $('.ranks_work' + i).val();
          var company_work_i  = $('.company_work' + i).val();
          var form_month_i    = $('.form_month' + i).val();

          var form_year_i     = $('.form_year' + i).val();
          var to_month_i      = $('.to_month' + i).val();
          var to_year_i       = $('.to_year' + i).val();
          var content_work_i  = $('.content_work' + i).val();

          if(title_work_i != "undefined"){
            title_work.push(title_work_i);
          }
          if(ranks_work_i != "undefined"){
            ranks_work.push(ranks_work_i);
          }

          if(company_work_i != "undefined"){
            company_work.push(company_work_i);
          }
          if(form_month_i != "undefined"){
            form_month.push(form_month_i);
          }

          if(form_year_i != "undefined"){
            form_year.push(form_year_i);
          }
          if(to_month_i != "undefined"){
            to_month.push(to_month_i);
          }

          if(to_year_i != "undefined"){
            to_year.push(to_year_i);
          }
          if(content_work_i != "undefined"){
            content_work.push(content_work_i);
          }
        }
      }

      var skill_candidates        = $('.skill_candidates').val();
      var achievements_candidates = $('.achievements_candidates').val();
      // console.log(marital_candidates);
      if(
        province_candidates != "" && 
        job_industry !="" && 
        full_nameCandidates != "" && 
        gender_candidates != "" &&
        marital_candidates != "" && 
        birthday_candidates !="" && 
        phone_candidates != "" && 
        email_candidates != "" &&
        address_candidates != "" &&   
        school_candidates != "" &&
        education_level != "" &&
        month_graduate != ""  &&
        year_graduate != ""  &&
        language_     != "" &&
        tdLanguage_  != ""  &&
        computer_     != "" &&
        tdcomputer_  != ""  &&

        title_work != "" &&
        ranks_work != "" &&
        company_work != ""  &&
        form_month != ""  &&
        form_year     != "" &&
        to_month  != ""  &&
        to_year     != "" &&
        content_work  != "" 
        ){
        var form_data = new FormData(); 
        form_data.append("id_candidates", id_candidates);

        form_data.append("province_candidates", province_candidates);

        form_data.append("job_industry", job_industry);

        form_data.append("full_nameCandidates", full_nameCandidates);

        form_data.append("gender_candidates", gender_candidates);

        form_data.append("marital_candidates", marital_candidates);

        form_data.append("birthday_candidates", birthday_candidates);

        form_data.append("phone_candidates", phone_candidates);

        form_data.append("email_candidates", email_candidates);

        form_data.append("address_candidates", address_candidates);

        form_data.append("school_candidates", school_candidates);

        form_data.append("education_level", education_level);

        form_data.append("month_graduate", month_graduate);

        form_data.append("year_graduate", year_graduate);

        if(img_dataCandidates !== undefined){
          form_data.append('fileImg', img_dataCandidates);
        }else{
            form_data.append('emptyFileImg', img_dataCandidates);
        }  

        if(cv_dataCandidates !== undefined){
          form_data.append('fileCv', cv_dataCandidates);
        }else{
            form_data.append('emptyFileCv', cv_dataCandidates);
        }  

        form_data.append("language", language_);

        form_data.append("tdLanguage", tdLanguage_);

        form_data.append("computer", computer_);

        form_data.append("tdcomputer", tdcomputer_);

        form_data.append("otherDegrees_candidates", otherDegrees_candidates);

        form_data.append("workExperience_candidates", workExperience_candidates);
        
        form_data.append("title_work", title_work);

        form_data.append("ranks_work", ranks_work);

        form_data.append("company_work", company_work);

        form_data.append("form_month", form_month);

        form_data.append("form_year", form_year);

        form_data.append("to_month", to_month);

        form_data.append("to_year", to_year);

        form_data.append("content_work", form_month);

        form_data.append("skill_candidates", skill_candidates);

        form_data.append("achievements_candidates", achievements_candidates);

        $.ajax({
          method: "POST",
          url  : linkApi + route.updateCandidates,
          cache: false,
          contentType: false,
          processData: false,
          data : form_data,
          success : function(data){
            console.log(data);
            if(data.status){
              toastBox('success',data.data.mess ,data.data.mess, 1000);
              window.location.href = linkCpanel + 'candidates';
            }else{
              toastBox('error',data.data.mess ,data.data.mess, 1000);
            }
          }
        });
      }else{
        toastBox('error','Vui lòng điền đủ thông tin','Vui lòng điền đủ thông tin' , 1000);
      }
    }
  }
  //End candidates //


    //status active//
    $("body").on("click", ".status_", function(){
      event.preventDefault();
      var type  = $(this).data('type');
      var id    = $(this).data('id');
      var parent= $(this).data('parent');
      var child = $(this).data('child');
      if(type == "region"){
        regionStatus(id);
      }else if(type == "province"){
        provinceStatus(id);
      }else if(type == "catelog"){
        catelogStatus(parent,child,id);
      }else if(type == "finance"){
        financeStatus(parent,id);
      }else if(type == "user"){
        userStatus(id);
      }else if(type == "news"){
        newsStatus(parent,id);
      }else if(type == "recruit"){
        recruitStatus(parent,id);
      }else if(type == "candidates"){
        candidatesStatus(id);
      }else{
        return false;
      }
    });
  
    function regionStatus(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusRegion,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            if(data.data.active){
              $('.main_check_' + id).prop('checked',true);
            }else{
              $('.main_check_' + id).prop('checked',false);
            }
            toastBox('success',data.data.mess ,data.data.mess, 1000);
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    function provinceStatus(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusProvince,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            if(data.data.active){
              $('.check_' + id).prop('checked',true);
            }else{
              $('.check_' + id).prop('checked',false);
            }
            toastBox('success',data.data.mess ,data.data.mess, 1000);
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
  
    function  catelogStatus(parent,child,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusCatelog,
        data : {
          id:id,
          parent:parent,
          child:child,
        },
        success : function(data){
          if(data.status){
            if(data.data.active){
              if(parent == ""){
                $('.catelog_parent_' + id).prop('checked',true);
              }else if(child == ""){
                $('.catelog_child_' + id).prop('checked',true);
              }else{
                $('.catelog_item_' + id).prop('checked',true);
              }
            }else{
              if(parent == ""){
                $('.catelog_parent_' + id).prop('checked',false);
              }else if(child == ""){
                $('.catelog_child_' + id).prop('checked',false);
              }else{
                $('.catelog_item_' + id).prop('checked',false);
              }
            }
            toastBox('success',data.data.mess ,data.data.mess, 1000);
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    function financeStatus(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusFinance,
        data : {
          id:id,
          parent:parent,
        },
        success : function(data){
            if(data.status){
                if(parent == ""){
                  if(data.data.active){
                    $('.main_child_' + id).prop('checked',true);
                  }else{
                    $('.main_child_' + id).prop('checked',false);
                  }             
                }else{
                  if(data.data.active){
                    $('.main_child_post_' + id).prop('checked',true);
                  }else{
                    $('.main_child_post_' + id).prop('checked',false);
                  }    
                }
              toastBox('success',data.data.mess ,data.data.mess, 1000);
            }else{
              toastBox('error',data.data.mess ,data.data.mess , 1000);
            }
          }
      });
    }

    function userStatus(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusUser,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            if(data.data.active){
              $('.user_parent_' + id).prop('checked',true);
            }else{
              $('.user_parent_' + id).prop('checked',false);
            }
            toastBox('success',data.data.mess ,data.data.mess, 1000);
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    function newsStatus(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusNews,
        data : {
          id:id,
          parent:parent,
        },
        success : function(data){
            if(data.status){
                if(parent == ""){
                  if(data.data.active){
                    $('.main_child_' + id).prop('checked',true);
                  }else{
                    $('.main_child_' + id).prop('checked',false);
                  }             
                }else{
                  if(data.data.active){
                    $('.main_child_news_' + id).prop('checked',true);
                  }else{
                    $('.main_child_news_' + id).prop('checked',false);
                  }    
                }
              toastBox('success',data.data.mess ,data.data.mess, 1000);
            }else{
              toastBox('error',data.data.mess ,data.data.mess , 1000);
            }
          }
      });
    }
    function recruitStatus(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusRecruit,
        data : {
          id:id,
          parent:parent,
        },
        success : function(data){
            if(data.status){
                if(parent == ""){
                  if(data.data.active){
                    $('.recruit_catelog_' + id).prop('checked',true);
                  }else{
                    $('.recruit_catelog_' + id).prop('checked',false);
                  }             
                }else{
                  if(data.data.active){
                    $('.recruit_' + id).prop('checked',true);
                  }else{
                    $('.recruit_' + id).prop('checked',false);
                  }    
                }
              toastBox('success',data.data.mess ,data.data.mess, 1000);
            }else{
              toastBox('error',data.data.mess ,data.data.mess , 1000);
            }
          }
      });
    }
    function candidatesStatus(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.changeStatusCandidates,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            if(data.data.active){
              $('.candidates_parent_' + id).prop('checked',true);
            }else{
              $('.candidates_parent_' + id).prop('checked',false);
            }
            toastBox('success',data.data.mess ,data.data.mess, 1000);
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    //end status//
    //edit//
    $("body").on("click", ".edit_", function(){
      var type      = $(this).data('type');
      var id        = $(this).data('id');
      var main      = $(this).data('main');
      var parent    = $(this).data('parent');
  
      if(type == "region"){
        regionEdit(id);
      }else if(type == "province"){
        provinceEdit(id);
      }else if(type == "catelog"){
        catelogEdit(id);
      }else if(type == "finance"){
        financeEdit(id,parent);
      }else if(type == "user"){
        userEdit(id);
      }else if(type == "news"){
        newsEdit(id,parent);
      }else if(type == "recruit"){
        recruitEdit(id);
      }else if(type == "candidates"){
        candidatesEdit(id);
      }else{
        return false;
      }
    });
    function provinceEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findArea,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'province?get=' + id + '&type=2'; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function regionEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findArea,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'province?get=' + id + '&type=1'; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function catelogEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findcatelog,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'catelog?get=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function financeEdit(id,parent){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findfinance,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'finance?get=' + parent + '&id=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function userEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findUser,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'user?get=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function newsEdit(id,parent){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findnews,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'news?get=' + parent + '&id=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    function recruitEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findRecruit,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'recruit?get=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }

    function candidatesEdit(id){
      if(token != null){
        $.ajax({
            method: "POST",
            url  : linkApi + route.findCandidates,
            data : {
              id:id
            },
            success : function(data){
              if(data.status){
                toastBox('success',data.data.mess ,data.data.mess , 1000);
                window.location.href = linkCpanel + 'candidates?get=' + id; 
              }else{
                toastBox('error',data.data.mess ,data.data.mess , 1000);
              }
            }
        });
      }
    }
    //End edit//
    //delete//
    $("body").on("click", ".delete_", function(){
      event.preventDefault();
      var type  = $(this).data('type');
      var id    = $(this).data('id');
      var main  = $(this).data('main');
      var parent= $(this).data('parent');
      var child = $(this).data('child');
      if(type == "region"){
        regionDelete(id);
      }else if(type == "province"){
        provinceDelete(id,main);
      }else if(type == "catelog"){
        catelogDelete(parent,child,id);
      }else if(type == "finance"){
        financeDelete(parent,id);
      }if(type == "user"){
        userDelete(id);
      }else if(type == "news"){
        newsDelete(parent,id);
      }else if(type == "recruit"){
        recruitDelete(parent,id);
      }else if(type == "candidates"){
        candidatesDelete(id);
      }else{
        return false;
      }
    });
    function regionDelete(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteRegion,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('.region_' + id ).remove();
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    function provinceDelete(id,main){
      var lenght = $('.region_lenght_' + main).val();
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteProvince,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('.row_region_' + main).attr('rowspan',(parseInt(lenght) - 1));
            $('.region_lenght_' + main).val(parseInt(lenght) - 1);
            $('.province_' + id ).remove();
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }

    function catelogDelete(parent,child,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteCatelog,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            if(parent != "" && child != ""){
              var cate_2 = $('.catelog2_lenght_' + child).val();
              var cate_1 = $('.catelog1_lenght_' + parent).val();
              $('.row_catelog2_' + child).attr('rowspan',(parseInt(cate_2) - 1));
              $('.catelog2_lenght_' + child).val(parseInt(cate_2) - 1);

              $('.row_catelog_' + parent).attr('rowspan',(parseInt(cate_1) - 1));
              $('.catelog1_lenght_' + parent).val(parseInt(cate_1) - 1);

              $('.catelog3_' + id ).remove();
            }else{
              if(parent != ""){
                var cate_2 = $('.catelog2_lenght_' + id).val();
                var cate_1 = $('.catelog1_lenght_' + parent).val();
                $('.row_catelog_' + parent).attr('rowspan',(parseInt(cate_1) - parseInt(cate_2)));
                $('.catelog1_lenght_' + parent).val(parseInt(cate_1) - parseInt(cate_2));
                $('.catelog2_' + id ).remove();
              }else{
                $('.catelog1_' + id ).remove();
              }
            }
  
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    function financeDelete(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteFinance,
        data : {
          id:id,
          parent:parent
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            if(parent != ""){
              var cate_ = $('.post_lenght_' + parent).val();
              $('.row_post_' + parent).attr('rowspan',(parseInt(cate_) - 1));
              $('.post_lenght_' + parent).val(parseInt(cate_) - 1);

              $('.post_1' + id).remove();
            }else{
              $('.post_' + id).remove();
            }
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }

    function userDelete(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteUser,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('.user_' + id ).remove();
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }

    function newsDelete(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteNews,
        data : {
          id:id,
          parent:parent
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            if(parent != ""){
              var cate_ = $('.news_lenght_' + parent).val();
              $('.row_news_' + parent).attr('rowspan',(parseInt(cate_) - 1));
              $('.news_lenght_' + parent).val(parseInt(cate_) - 1);

              $('.news_1' + id).remove();
            }else{
              $('.news_' + id).remove();
            }
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }

    function recruitDelete(parent,id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteRecruit,
        data : {
          id:id,
          parent:parent
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            if(parent != ""){
              var cate_ = $('.recruit_lenght_' + parent).val();
              $('.row_recruit_' + parent).attr('rowspan',(parseInt(cate_) - 1));
              $('.recruit_lenght_' + parent).val(parseInt(cate_) - 1);

              $('.recruit_1' + id).remove();
            }else{
              $('.recruit_' + id).remove();
            }
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }

    function candidatesDelete(id){
      $.ajax({
        method: "POST",
        url  : linkApi + route.deleteCandidates,
        data : {
          id:id
        },
        success : function(data){
          if(data.status){
            toastBox('success',data.data.mess ,data.data.mess, 1000);
            $('.candidates_' + id ).remove();
          }else{
            toastBox('error',data.data.mess ,data.data.mess , 1000);
          }
        }
      });
    }
    //end delete//
  //=====================END Cpanel=============================//
})
