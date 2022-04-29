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
                    if(data.is_delete == false || data.is_active == false || data.is_author != 0){
                        sessionStorage.removeItem('id_token');
                        sessionStorage.removeItem('is_author');
                        sessionStorage.removeItem('name');
                        sessionStorage.removeItem('is_role');
                        sessionStorage.removeItem('token');
            
                        window.location.href = linkUser; 
                    }else{
                        $('.pro_name').html('<div class="loginn"> <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/login-icon.png" class="loading" data-was-processed="true"></span> <a href="/profile">'+name+'</a> </div>');
                    }
                }
            });
        }else{
            $('.pro_name').html('<div class="loginn"> <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/login-icon.png" class="loading" data-was-processed="true"></span> <a href="/login">Đăng nhập</a> </div>');
        }
    }
    
    // Main Cpanel //
    $(document).ready(function(){
        
        var active_catelog      = $('.active_catelog').val();
        var active_region       = $('.active_region').val();
        var active_candidates   = $('.active_candidates').val();
        var active_finance      = $('.active_finance').val();
        var active_news         = $('.active_news').val();
    
        function parseCurrency( num ) {
            return parseFloat( num.replace( /,/g, '') );
        }
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        function reFormatNumber(num1) {
            return num1.toString().replace(/(,)/g, '')
        }
        function format_money(obj) {
            return parseFloat(reFormatNumber(obj));
        }
        function isValid(str) {
            return !/[a-zA ~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
    
        function getTotal(){
            var sotienvay   = $('.from_tongtienvay_ajaxInput').val() != "" ? $('.from_tongtienvay_ajaxInput').val() : 0;
            var thoihan     = $('.from_kihan_ajaxInput').val() != "" ? $('.from_kihan_ajaxInput').val() : 0;
            var laisuat     = $('.from_phantram_ajaxInput').val() != "" ? $('.from_phantram_ajaxInput').val() : 0;
            var phibaohiem  = $('.from_phantrambh_ajaxInput').val() != "" ? $('.from_phantrambh_ajaxInput').val() : 0;
    
            $.ajax({
                type: "post",
                url: '/calculate/loadlichsuvay',
                data:{
                    sotienvay :sotienvay,
                    thoihan:thoihan,
                    laisuat:laisuat,
                    phibaohiem:phibaohiem,
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    // $('#loantbls').toggle('.disabled');
                    $('.btnTragop').css('display','block');
                    $('.printTragop').html(obj.html);
                    $('.tfootPrintTrahop').html(obj.tongFott);
                    $('.from_totalvay_ajax').html(obj.tong + " VNĐ");
                }
            });
        }
        $('.btnTragop').click(function(){
            $('#loantbls').toggle('.disabled');
        })
    
    
        $("body").on("keyup",".monneyCalculate", function(){
            var sotienvay = $(this).val();
            if(sotienvay != ""){
                var formatsotienvay = format_money(sotienvay);
            }else{
                var formatsotienvay = 0;
            }
            if(!isNaN(formatsotienvay)){
                $('.from_tongtienvay_ajaxInput').val(parseCurrency(sotienvay) + 0);
                $(this).val(formatNumber(formatsotienvay));
            } else {
                $('.from_tongtienvay_ajaxInput').val(0);
                $(this).val(formatNumber(formatsotienvay));
            }
            getTotal();
        });
    
        $('#from_khv').change(function(){
            var from_khv = $(this).find(":selected").val();
            if(from_khv != ""){
                $('.from_kihan_ajaxInput').val(from_khv);
            }else{
                $('.from_kihan_ajaxInput').val(0);
                $('.from_laisuat_ajaxInput').val(0);
            }
            getTotal();
        });
    
        $("body").on("keyup",".from_ptr", function(){
            var lx = $(this).val();
            if(lx != ""){
                $('.from_phantram_ajaxInput').val(lx);
            }else{
                $('.from_ptr').val(0);
                $('.from_phantram_ajaxInput').val(0);
            }
            getTotal();
        });
    
        $("body").on("keyup",".form_bh", function(){
            var lx = $(this).val();
            if(lx != ""){
                $('.from_phantrambh_ajaxInput').val(lx);
            }else{
                $('.form_bh').val(0);
                $('.from_phantrambh_ajaxInput').val(0);
            }
            getTotal();
        });
    
    
    
        $("body").on("click", ".clickTaichinh", function(){
            var type = $(this).data('type');
            var key  = $(this).data('id');
            if(type == 'finance'){
                window.location.href = linkUser + 'finance?catelog=' + key;
            }else{
                window.location.href = linkUser + 'finance?id=' + key;
            }
        })
    
    
        $('.jobSelect').change(function(){
            var jobInput = $(this).find(":selected").val();
            if(jobInput != ""){
                $('.jobInput').val(jobInput);
            }else{
                $('.jobInput').val("");
            }
        })
    
        $('.provinceSelect').change(function(){
            var key = $(this).find(":selected").data('type');
            var id  = $(this).find(":selected").val();
            if(key == 'region'){
                $('.provinceInput').val('');
                $('.regionInput').val(id);
            }else{
                $('.provinceInput').val(id);
                $('.regionInput').val('');
            }
        })
        $("body").on("click", ".clickRegion", function(){
            var type = $(this).data('type');
            var key  = $(this).data('id');
            if(type == 'region'){
                window.location.href = linkUser + 'recruit?region=' + key;
            }else{
                window.location.href = linkUser + 'recruit?id=' + key;
            }
        })
        $("body").on("click", ".search_recruit", function(){
            var jobInput        = $('.jobInput').val();
            var provinceInput   = $('.provinceInput').val();
            var regionInput     = $('.regionInput').val();
            if(jobInput != "" || provinceInput !="" || regionInput != ""){
                if(regionInput != ""){
                    if(jobInput != ""){
                        window.location.href = linkUser + 'recruit?job=' + jobInput + '&&region=' + regionInput;
                    }else{
                        window.location.href = linkUser + 'recruit?region=' + regionInput;
                    }
                }else if(provinceInput != ""){
                    if(jobInput != ""){
                        window.location.href = linkUser + 'recruit?job=' + jobInput + '&&province=' + provinceInput;
                    }else if(provinceInput != ""){
                        window.location.href = linkUser + 'recruit?province=' + provinceInput;
                    }
                }else{
                    window.location.href = linkUser + 'recruit?job=' + jobInput;
                }
            }else{
                window.location.href = linkUser + 'recruit?region=0';
            }
        })
    
    
    
    
    
    
        $("body").on("click", "#tracuu", function(){
            var query_    = $('.key_cic').val();
            var key_      = 'irhR9mwwTs4sfFxJTcsz4C6xtwxrnG4w3VkTfgOeVws';
            var type_     = 2;
       
            if(query_ != ""){
              $.ajax({
                method: "POST",
                contentType: "application/json",
                url  : linkCic,
                datatype:'json',
                data : JSON.stringify({
                  query:query_,
                  key:key_,
                  type:type_
                }),
                dataType: 'json',
                success : function(data){
                  if(data.errCode == 4){
                    getTask(data.taskID);
                  }
                }
            });
            }
          })
          function getTask(taskID = null){
            $.ajax({
              method: "GET",
              url  : linkCic + '/' + taskID,
              success : function(cic){
                if(cic != ""){
                  if(cic.process == 100){
                    if(cic.data != "" && cic.data[0]['warningDetails'] != ""){
                     $('.print_cic').text(cic.data[0]['warningDetails']);
                    }else{
                      $('.print_cic').text('Bạn chưa có khoản nợ cic nào ^^');
                    }
                  }else{
                    getTask(cic.iDtask);
                    $('.print_cic').text('Dữ liệu đang xử lí ' + cic.process + '%');
                  }
                }
              }
            });
          }
    });