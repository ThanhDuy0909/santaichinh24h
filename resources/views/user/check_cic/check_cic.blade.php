<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check CIC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Nhúng jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

    <!--Fonts-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
        rel="stylesheet" type="text/css">

    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

    <link rel="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />

    <script src="{{ asset('js/select2.min.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"
                    style="margin-left: 50px;"></i>
                    {{auth()->user()->name}}
            </a>
            <a class="navbar-brand" href="#">
                <i class="fa fa-tags" aria-hidden="true" style="margin-left: 50px;"></i>
                Mã CIC: {{auth()->user()->ma_cic}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link"><i class="fa fa-search" aria-hidden="true"></i>Lượt tra
                            cứu:
                            {{auth()->user()->soluotcheck}}
                            </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"><i class="fa fa-clock-o" aria-hidden="true"></i>Hiệu lực
                            gói:
                            {{auth()->user()->ngayhethan}}</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"><i class="fa fa-bell" aria-hidden="true"></i></i>Thông
                            báo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{('logout_face')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a>
                    </li>

                    <li class="nav-item dropdown">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-box" style="margin-top:50px;">
        <h2>Check CIC</h2>
        <section class="content" id="checkcic">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <center>
                                <div class="card-body">
                                    <div class="form-group">
                                        <center>
                                            <h5>Nhập CMND<span class="req">*</span></h5>
                                        </center>
                                        <input class="form-input key_cic" type="text" name="key_cic"
                                            class="input form-control-lgin">
                                        <button id="tracuu" class="btn btn-success tracuu"><i class="fa fa-search"
                                                aria-hidden="true"></i></button>
                                        {{-- <button type="button" id="tracuuVPS" class="btn btn-success"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="tracuuFast" class="btn btn-success"><i
                                            class="fa fa-search" aria-hidden="true"></i></button> --}}
                                    </div>
                            </center>
                            {{-- <div class="form-group">
                                    
                                    <button type="button" id="tracuuMIRA" class="btn"
                                        style="background-color:#3399FF;"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <button type="button" id="tracuuMD" class="btn btn-success"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <button type="button" id="tracuuSHB" class="btn" style="background-color: #FFFF66"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                </div> --}}
                            <center>
                                <div class="form-group print_cic"
                                    style="border: 1px solid #33CCFF; max-width: 500px;height:200px;">
                                    Trả thông tin khách hàng về tại đây
                                </div>
                            </center>

                            {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="width:100%;">
                                            <input type="text" class="" name="cmnd" id="cmnd" autofocus=""
                                                style="margin-left:auto;width:100%;float:right;" />
                                            <label class="" for="name" style="clear:both;">CMND</label>
                                            <button type="button" id="tracuu" class="btn btn-success"><i
                                                    class="fa fa-search" aria-hidden="true"></i></button>
                                            <button type="button" id="tracuu" class="btn btn-success"><i
                                                    class="fa fa-search" aria-hidden="true"></i></button>
                                            <button type="button" id="tracuu" class="btn btn-success"><i
                                                    class="fa fa-search" aria-hidden="true"></i></button>
                                            <small id="cmndError" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-7" id="warp_buton">
                                                <button type="button" id="tracuu" class="btn btn-success"><i
                                                        class="fa fa-search" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col-md-6" id="warp_buton_1">

                                                <button type="button" id="tracuuVPS" class="btn btn-success"><i
                                                        class="fa fa-search" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col-md-8" id="warp_buton_2">
                                                <button type="button" id="tracuuFast"
                                                    class="btn btn-success float-right"><i class="fa fa-search"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            {{-- <div class="col-md-6"
                                    style="position: absolute;padding-right: 35px;margin-top: 150px;z-index:1; text-align: right;">

                                </div> --}}
                            <div class="col-md-12 mt-4" id="result"></div>
                            <div id="viewCICScreen" class="col-md-12"></div>
                            <!-- check duplicate -->
                            <!-- end check duplicate -->
                            <div class="col-md-12 mt-3 text_guide">
                                <div class="text-danger">
                                    <p><span style="color: #ff0000;">-=Trợl&yacute;CICs37=-</span></p>
                                    <p><span style="color: #ff0000;">WARNING!!! Trong những ng&agrave;y gần
                                            đ&acirc;y hệ thống CIC của Trung t&acirc;m t&iacute;n dụng Quốc
                                            Gia thuộc Ng&acirc;n h&agrave;ng Nh&agrave; nước đang rất chập
                                            chờn, hay lỗi v&agrave; sập. Tất cả c&aacute;c Ng&acirc;n
                                            h&agrave;ng, Cty t&agrave;i ch&iacute;nh đều check kết quả qua
                                            hệ thống n&agrave;y, saletaichinh cũng kh&ocirc;ng ngoại
                                            lệ&nbsp;mới c&oacute;&nbsp;kết quả ch&iacute;nh x&aacute;c trả
                                            cho bạn. N&ecirc;n khi cic.org.vn bị lỗi dẫn đến kết quả trả về
                                            chậm hoặc lỗi theo, c&oacute; thể check server dự ph&ograve;ng
                                            <strong>Check Cơ bản (CFast)</strong> để lấy kết quả tạm thời.
                                            Đ&acirc;y l&agrave; ảnh hưởng chung cả hệ thống, mọi người
                                            th&ocirc;ng cảm!!!</span></p>
                                    <p><span style="color: #0000ff;">Một số&nbsp;thời điểm c&oacute; thể cic
                                            trả kết quả chưa nhanh lắm, h&atilde;y tải lại trang (F5), nhập
                                            lại&nbsp;CMND check thử&nbsp;server kh&aacute;c: CFullV, CFullH,
                                            hoặc CFast&nbsp;si&ecirc;u&nbsp;nhanh.</span></p>
                                    <p><span style="color: #ff0000;"></span></p>
                                    <p><span style="color: #0000ff;">Bạn&nbsp;KO thể thu&ecirc; được 1 người
                                            ngồi check CIC cả th&aacute;ng cho bạn từ s&aacute;ng tới tối,
                                            bất cứ l&uacute;c n&agrave;o ngay khi bạn cần với tiền
                                            c&ocirc;ng 150k/th&aacute;ng đ&uacute;ng ko?</span></p>
                                    <p><span style="color: #0000ff;">Nhưng cũng với 150k đ&oacute;
                                            <strong>Trợl&yacute;CICs37</strong> sẽ gi&uacute;p bạn tự chủ
                                            động check cic s37 <strong>nhanh - ch&iacute;nh x&aacute;c - trả
                                                kq tức thời</strong>, gi&uacute;p bạn&nbsp;loại bỏ
                                            c&aacute;c KH nợ xấu, nợ ch&uacute; &yacute; để ko tốn thời gian
                                            &amp; chi ph&iacute; đi lại; biết được KH nợ mấy tctd để
                                            tr&aacute;nh bị KH khai man, giấu nợ; hỗ trợ việc t&iacute;nh
                                            to&aacute;n&nbsp;khoản&nbsp;vay ph&ugrave; hợp, n&acirc;ng tỷ lệ
                                            đậu hồ sơ... Khoản đầu tư qu&aacute; hời cho cả th&aacute;ng
                                            l&agrave;m việc chỉ với 150k. Đăng k&yacute; sử dụng ngay
                                            h&ocirc;m nay!!!</span></p>
                                    <p><span style="color: #0000ff;">Call &amp;&nbsp;Zalo:</span> <span
                                            style="color: #ff0000;"><strong>0123456789</strong></span></p>
                                    <p><span style="color: #0000ff;">Group hỗ trợ:</span>&nbsp;<a
                                            href="santaichinh24h">https://santaichinh24h</a>&nbsp;
                                    </p>
                                </div>
                                {{-- <img src="../client/img/slider2.png" alt=""
                                                        max-width="100%" height="252"/> --}}
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>

    <!-- /.row -->
    </div>

    <!-- /.container-fluid -->
    </section>

    </div>
</body>

</html>

<script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
