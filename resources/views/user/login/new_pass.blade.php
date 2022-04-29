<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">

    <meta name="format-detection" content="telephone=no">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="santaichinh24h">

    <meta name="keywords" content="santaichinh24h">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- css -->
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">

    <link href="{{ asset('css/skin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/boostrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/typicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/superweb-custom.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('css/flatsome.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('css/mnd_laivay_cp.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('js/cute-alert-master/style.css') }}" />

    <script src="{{ asset('js/cute-alert-master/cute-alert.js') }}"></script>
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

<body class="loaded">
    <header class="blockk_header" data-section-id="header">
        <!-- tt-mobile menu -->
        <nav class="panel-menu mobile-main-menu">
            <ul class="block-center">
                <li class="profile"><a href="/candidates">Hồ sơ ứng viên</a></li>
                <li class="post"><a href="/post-create">Đăng tin</a></li>
                <li class="comt"><a href="/feedback-posting">Góp ý</a></li>
            </ul>
            <div class="mm-navbtn-names">
                <div class="mm-closebtn">Đóng</div>
                <div class="mm-backbtn">Trở về</div>
            </div>
        </nav> <!-- tt-mobile-header -->
        <div class="tt-mobile-header">
            <div class="container-fluid">
                <div class="tt-header-row">
                    <div class="tt-mobile-parent-menu">
                        <a class="tt-logo tt-logo-alignment" href="/">
                            <img src="//santaichinh24h.vn/files/images/logo/logo-ff.png" height="40px" alt="Logo"
                                class="loading" data-was-processed="true"></a>
                    </div>

                    <div class="tt-mobile-parent-search tt-parent-box">
                        <div class="block-right">
                            <div class="loginn">
                                <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/login-icon.png"
                                        class="loading" data-was-processed="true"></span>
                                <a href="#">Đăng nhập</a>
                            </div>
                            <div class="sign-up">
                                <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/signup-icon.png"
                                        class="loading" data-was-processed="true"></span>
                                <a href="#">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <!-- /currency -->
                </div>
            </div>
        </div>
        <!-- tt-desktop-header -->
        <div class="tt-desktop-header">
            <div class="container">
                <div class="flex-roww">
                    <div class="tt-header-holder">
                        <div class="tt-col-obj tt-obj-options">
                            <div class="block-center d-flex align-items-center justify-content-center">
                                <div class="profile"><a href="/candidates">Hồ sơ ứng viên</a>
                                </div>
                                <div class="post px-2"><a href="/post-create">Đăng tin</a>
                                </div>
                                <div class="comt"><a href="/feedback-posting">Góp ý</a>
                                </div>
                            </div>
                            <div class="block-right">
                                {{-- <div class="loginn">
                                    <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/login-icon.png"
                                            class="loading" data-was-processed="true"></span>
                                    <a href="/login_user">Đăng nhập</a>
                                </div> --}}
                                <div class="sign-up">
                                    <span><img src="//santaichinh24h.vn/resource/701101/assets/./images/signup-icon.png"
                                            class="loading" data-was-processed="true"></span>
                                    <a href="/login_user">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tt-col-obj tt-obj-logo">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="/">
                            <img src="//santaichinh24h.vn/files/images/logo/logo-ff.png" alt="Logo"
                                class="loading" data-was-processed="true">
                        </a>
                        <!-- /logo -->
                    </div>
                </div>
            </div>
        </div>
        <!-- stuck nav -->

    </header>

    <div class="block-footer-info text-center">
        <div class="d-flex justify-content-center">
            <div class="block-btn">
                <a href="#checkcic"><i class="fa fa-credit-card" aria-hidden="true"></i><br> Check CIC</a>
            </div>
            <!--<div class="block-btn" id ="div" value="Show Alert"><a href="http://santaichinh24h.vn/"><i class="fa fa-handshake-o" aria-hidden="true"></i></br> Mua data</a></div>-->
            <div class="block-btn"><a href="#bangtinhlaixuat"><i class="fa fa-calculator"
                        aria-hidden="true"></i><br>
                    Bảng tính lãi xuất</a></div>
            <div class="block-btn"><a href="/post-recruitment-create"><i class="fa fa-users"
                        aria-hidden="true"></i>
                    <br> Đăng tin tuyển dụng</a></div>
            <div class="block-btn"><a href="/candidates"><i class="fa fa-address-card" aria-hidden="true"></i> <br>
                    Hồ
                    sơ ứng viên</a></div>
            <div class="block-btn"><a href="/create-profile"><i class="fa fa-pencil-square-o"
                        aria-hidden="true"></i><br> Tạo hồ sơ</a></div>
        </div>
    </div>
    <script language="javascript">
        var div = document.getElementById("div");
        div.onclick = function() {
            alert("xin vui lòng liên hệ admin santaichinh24h");
        }
    </script>
    <div id="tt-pageContent" class="border-top pb-4">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">ĐẶT LẠI MẬT KHẨU</h1>
                <div class="tt-login-form">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                {{-- <h2 class="tt-title">ĐĂNG KÝ MỚI</h2>
                                <p>
                                    Bằng cách tạo tài khoản, bạn sẽ có thể đăng tin tuyển dụng, tin CIC, tin cho vay,
                                    trao đổi hồ sơ và còn nhiều hơn thế nữa.
                                </p>
                                <div class="form-group">
                                    <a href="/register_user" class="btn btn-top btn-border">TẠO TÀI KHOẢN</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item" style="border: 1px solid #e9e7e7;">
                                <div class="form-default form-top">
                                    @php
                                        $token = $_GET['token'];
                                        $email = $_GET['email'];
                                    @endphp
                                    <form action="{{'update_pass'}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="email" value="{{ $email }}" />
                                            <input type="hidden" name="token" value="{{ $token }}" />
                                            <label for="loginInputName">NHẬP MẬT KHẨU MỚI</label>
                                            <div class="tt-required">* Yêu cầu bắt buộc</div>
                                            <input type="password" name="password" class="form-control" id="loginInputName"
                                                placeholder="Nhập mật khẩu mới">
                                        </div>

                                        <div class="row">
                                            <div class="col-auto mr-auto">
                                                <div class="form-group">
                                                    <button class="btn btn-border" type="submit">GỬI</button>
                                                    {{-- <input type="submit" name="action" value="login"> --}}
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-end">
                                                {{-- <div class="form-group">
                                                    <ul class="additional-links">
                                                        <li><a href="">Quên mật khẩu ?</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="social_icons">
        <a class="social-icon" href="https://zalo.me/0917704624" target="_blank"><img
                src="//santaichinh24h.vn/resource/701101/assets/images/oa_logo.png" class="loading"
                data-was-processed="true"></a>
    </div>
    <footer class="block_footer" data-section-id="footer">
        <div class="py-3"
            style="background:url('//santaichinh24h.vn/resource/701101/assets/./images/footer-bg.png'); background-size:cover; background-position: center center; background-repeat: no-repeat;">
            <div class="tt-footer-custom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo-footer">
                                <a href="#"><img src="//santaichinh24h.vn/files/images/logo/logo-ff.png"
                                        class="loading" data-was-processed="true"></a>
                            </div>
                            <ul class="menu-footer">
                                <li><a href="#">Giao dịch CIC - chi tiết</a></li>
                                <li><a href="#">Mua bán data</a></li>
                                <li><a href="#">Đăng tin cho vay</a></li>
                                <li><a href="#">Diễn đàn chia sẻ</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-titlel font-weight-bold">THÔNG TIN HỖ TRỢ</div>
                            <div class="contact-footinfo">
                                <address>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3"><i class="fa fa-phone-square"
                                                aria-hidden="true"></i></div>
                                        <div><span>Hỗ trợ đăng tin</span><br><strong>02838226060</strong></div>
                                    </div>
                                </address>
                                <address>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <div><span>Email hỗ trợ</span><br><strong>contact@careerbuilder.vn</strong>
                                        </div>
                                    </div>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-titlel font-weight-bold">CHÍNH SÁCH &amp; QUY ĐỊNH</div>
                            <ul class="menu-footer">
                                <li><a href="#">Phí đăng tin VIP?</a></li>
                                <li><a href="#">Tin VIP là gì?</a></li>
                                <li><a href="#">Cách đăng tin VIP</a></li>
                                <li><a href="#">Để đăng tin của bạn có thứ hạng cao?</a></li>
                            </ul>
                        </div>

                        <div class="col-md-3">
                            <div class="footer-titlel font-weight-bold">FACEBOOK FANPAGE</div>
                            <div class="facebook">
                                <div class="fb-page fb_iframe_widget"
                                    data-href="https://www.facebook.com/santaichinh24h.vn" data-tabs="" data-width=""
                                    data-height="" data-small-header="false" data-adapt-container-width="true"
                                    data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered"
                                    fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=255&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsantaichinh24h.vn&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=&amp;width=">
                                    <span style="vertical-align: bottom; width: 255px; height: 130px;"><iframe
                                            name="f26e3c505358f48" width="1000px" height="1000px"
                                            data-testid="fb:page Facebook Social Plugin"
                                            title="fb:page Facebook Social Plugin" frameborder="0"
                                            allowtransparency="true" allowfullscreen="true" scrolling="no"
                                            allow="encrypted-media"
                                            src="https://www.facebook.com/v9.0/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df3e89d693843004%26domain%3Dsantaichinh24h.vn%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fsantaichinh24h.vn%252Ff2dbb13325073b8%26relation%3Dparent.parent&amp;container_width=255&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsantaichinh24h.vn&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=&amp;width="
                                            style="border: none; visibility: visible; width: 255px; height: 130px;"
                                            class=""></iframe></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container address-footer">
                <div class="wrapp py-4">
                    <div class="headquarter"><a href="#">Trụ sở chính: Tầng 6, Tòa nhà Pasteur, 139 Pasteur, Phường
                            6,
                            Quận 3, TP. Hồ Chí Minh</a> - <a href="tel:02838226060">Tel: 02838226060</a></div>
                    <div class="office"><a href="#">Văn phòng: Văn phòng: Tầng 17, Tòa nhà VIT, 519 Kim Mã,
                            Quận Ba
                            Đình, Hà Nội.</a></div>
                </div>
            </div>
        </div>
        <div class="copyright text-center">Copyright © SanTaiChinh24h.vn</div>
    </footer>
    <a href="#" class="tt-back-to-top tt-align-center no-radius">BACK TO TOP</a>
    <!-- modal (AddToCartProduct) -->

    <!-- modal (quickViewModal) -->

    <!-- modalVideoProduct -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="//santaichinh24h.vn/resource/701101/assets/external/bootstrap/js/bootstrap.min.js"></script> -->

    <script src="//santaichinh24h.vn/resource/701101/assets/owl/owl.carousel.min.js"></script>

    <script src="//santaichinh24h.vn/resource/701101/assets/external/slick/slick.min.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/elevatezoom/jquery.elevatezoom.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/magnific-popup/jquery.magnific-popup.min.js">
    </script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/perfect-scrollbar/perfect-scrollbar.min.js">
    </script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/panelmenu/panelmenu.js"></script>
    <div class="mm-fullscreen-bg"></div>
    <!-- <script src="//santaichinh24h.vn/resource/701101/assets/external/instafeed/instafeed.min.js"></script> -->
    <script src="//santaichinh24h.vn/resource/701101/assets/external/rs-plugin/js/jquery.themepunch.tools.min.js">
    </script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js">
    </script>
    <!-- <script src="//santaichinh24h.vn/resource/701101/assets/external/countdown/jquery.plugin.min.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/countdown/jquery.countdown.min.js"></script> -->
    <script src="//santaichinh24h.vn/resource/701101/assets/external/lazyLoad/lazyload.min.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/js/main.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/form/jquery.form.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/js/jquery.validate.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/external/form/jquery.form-init.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//santaichinh24h.vn/resource/701101/assets/js/custom.js"></script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
            <div></div>
        </div>
        <div class=" fb_iframe_widget fb_invisible_flow"
            fb-iframe-plugin-query="app_id=&amp;attribution=setup_tool&amp;container_width=375&amp;current_url=http%3A%2F%2Fsantaichinh24h.vn%2Flogin&amp;is_loaded_by_facade=true&amp;local_state=%7B%22v%22%3A1%2C%22path%22%3A2%2C%22chatState%22%3A1%2C%22visibility%22%3A%22not-hidden%22%2C%22showUpgradePrompt%22%3A%22not_shown%22%7D&amp;locale=vi_VN&amp;log_id=f4f8c0ca-07cb-4802-b077-4ffbc6d42cb9&amp;logged_in_greeting=Xin%20ch%C3%A0o!%20Ch%C3%BAng%20t%C3%B4i%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20cho%20b%E1%BA%A1n%3F&amp;logged_out_greeting=Xin%20ch%C3%A0o!%20Ch%C3%BAng%20t%C3%B4i%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20cho%20b%E1%BA%A1n%3F&amp;page_id=103255321682571&amp;request_time=1649566902983&amp;sdk=joey">
            <span style="vertical-align: bottom; width: 1000px; height: 0px;"><iframe name="f36d8de281a8494"
                    width="1000px" height="1000px" data-testid="dialog_iframe" title="" frameborder="0"
                    allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media"
                    src="https://www.facebook.com/v9.0/plugins/customerchat.php?app_id=&amp;attribution=setup_tool&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2de2730a851748%26domain%3Dsantaichinh24h.vn%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fsantaichinh24h.vn%252Ff2dbb13325073b8%26relation%3Dparent.parent&amp;container_width=375&amp;current_url=http%3A%2F%2Fsantaichinh24h.vn%2Flogin&amp;is_loaded_by_facade=true&amp;local_state=%7B%22v%22%3A1%2C%22path%22%3A2%2C%22chatState%22%3A1%2C%22visibility%22%3A%22not-hidden%22%2C%22showUpgradePrompt%22%3A%22not_shown%22%7D&amp;locale=vi_VN&amp;log_id=f4f8c0ca-07cb-4802-b077-4ffbc6d42cb9&amp;logged_in_greeting=Xin%20ch%C3%A0o!%20Ch%C3%BAng%20t%C3%B4i%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20cho%20b%E1%BA%A1n%3F&amp;logged_out_greeting=Xin%20ch%C3%A0o!%20Ch%C3%BAng%20t%C3%B4i%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20cho%20b%E1%BA%A1n%3F&amp;page_id=103255321682571&amp;request_time=1649566902983&amp;sdk=joey"
                    style="padding: 0px; position: fixed; z-index: 2147483646; box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 12px 0px; border-radius: 16px; bottom: 24px; top: auto; right: 0px; margin: 0px 12px; width: calc(100% - 24px); height: 60px; visibility: visible;"
                    class=""></iframe></span>
        </div>
        <div class="fb_dialog  fb_dialog_advanced" alignment="right" mobile_path="/">
            <div class="fb_dialog_content"><iframe name="blank_f36d8de281a8494" width="60px" tabindex="-1"
                    data-testid="bubble_iframe" frameborder="0" allowtransparency="true" allowfullscreen="true"
                    scrolling="no" allow="encrypted-media"
                    src="https://www.facebook.com/v9.0/plugins/customer_chat/bubble"
                    style="background: none; border-radius: 60px; bottom: 70px; box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 12px 0px; display: block; height: 60px; margin: 0px 12px; overflow: visible; padding: 0px; position: fixed; right: 12px; top: auto; width: 60px; z-index: 2147483644;"></iframe><iframe
                    name="availabilityStatus_f36d8de281a8494" tabindex="-1" data-testid="availabilityStatus_iframe"
                    frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no"
                    allow="encrypted-media" src="https://www.facebook.com/v9.0/plugins/customer_chat/bubble"
                    style="border-radius: 50%; bottom: 67.5px; height: 15px; position: fixed; right: 24px; width: 15px; z-index: 2147483646;"></iframe><iframe
                    name="unread_f36d8de281a8494" tabindex="-1" data-testid="unread_iframe" frameborder="0"
                    allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media"
                    src="https://www.facebook.com/v9.0/plugins/customer_chat/bubble"
                    style="background: none; border-radius: 4pt; bottom: 114px; height: 24px; position: fixed; right: 22px; width: 20px; z-index: 2147483645;"></iframe>
            </div>
        </div>
    </div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v9.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->

    <script>
        var toolbarOptions = ['bold', 'italic', 'underline', 'image', 'link'];
        if ($('#jseditor').lenght) {
            var quill = new Quill('#jseditor', {
                modules: {
                    // Equivalent to { toolbar: { container: '#toolbar' }}
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
    </script>
    <!-- <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> -->
    <!-- <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('jsedittor');
        }); // Thay thế text area có id là area1 trở thành WYSIWYG editor sử dụng nicEditor
    </script> -->

    <div class="vcard" style="display:none">
        <img style="float:left; margin-right:4px" src="//santaichinh24h.vn/files/images/logo/logo-ff.png" alt="photo"
            class="photo">
        <a class="url fn" href="//santaichinh24h.vn">santaichinh24h.superweb.xyz</a>
        <div class="org">santaichinh24h.superweb.xyz</div>
        <div class="adr">
            <div class="street-address">Mobile: 02838226060</div>
            <span class="locality">Can Tho</span>, <span class="region">City</span> <span
                class="postal-code">920000</span>
        </div>
        <div class="tel">02838226060</div>
    </div>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "legalName": "santaichinh24h.superweb.xyz",
            "url": "//santaichinh24h.vn",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "02838226060",
                "contactType": "Sales"
            }],
            "logo": "//santaichinh24h.vn/files/images/logo/logo-ff.png",
            "sameAs": ["https://www.facebook.com/supertech.vn/",
                "https://plus.google.com/+Superweb",
                "https://www.youtube.com/channel/UCBrgDhP39kqw9jSxJJWB7mA"
            ]
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "santaichinh24h.superweb.xyz",
            "short_name": "Super Tech",
            "url": "//santaichinh24h.vn",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "//santaichinh24h.vn/search?q={search_term}",
                "query-input": "required name=search_term"
            }
        }
    </script>


    <script>
        $('#owl-news').owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            smartSpeed: 250,
            autoplay: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 3
                },

                1000: {
                    items: 3
                },
                1300: {
                    items: 4
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var max_fields = 4;
            var max_fields_ex = 5;
            var wrapper = $(".group-container");

            var add_button = $(".add_form_field");

            var x = 1;
            var y = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        '<div class="row form-group main-form"><select class="custom-select col-md-4" id="inputGroupSelect01"><option selected>Chọn..</option><option value="1">Mỹ</option><option value="2">Nhật</option></select><div class="col-md-8"><div class="row align-items-center"><label class="col-md-3">Trình độ</label><select class="custom-select col-md-5" id="inputGroupSelect01"><option selected>Chọn..</option><option value="2">Cao cấp</option><option value="2">Trung cấp</option></select><div class="col-md-3"><a href="javascript:void(0)" class="text-primary delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></div></div></div></div>'
                    ); //add input box
                } else {
                    alert('Vượt quá giới hạn cho phép')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).closest('div.form-group').remove();
                x--;
            })

            z = 1;
            var max_fields = 4;
            $('.add-experience').click(function(e) {
                e.preventDefault();
                if (z < max_fields) {
                    z++;
                    $('#countWorkExp').val(z++);
                    $("#work-experience").append(
                        '<div class="border-top pt-3 mt-3 box_exp"><div class="form-group row align-items-center"><label class="col-md-3">Vị trí / chức danh <span class="required">*</span></label><div class="col-md-6"><input name="chucdanh[]" class="form-control" required></div></div><div class="form-group row align-items-center"><label class="col-md-3">Công ty <span class="required">*</span></label><div class="col-md-6"><input name="congty[]" id="company" class="form-control" required></div></div><div class="form-group row align-items-center"><label class="col-md-3">Thời gian làm việc <span class="required">*</span></label><div class="col-md-9"><div class="row form-group align-items-center"><div class="col-md-5"><div class="d-flex align-items-center"><select class="custom-select" id="thanglamviectu[]" name="thanglamviectu[]"><option selected>Tháng</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><select class="custom-select ml-2" id="namlamviectu[]" name="namlamviectu[]"><option selected>Năm</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option><option value="2042">2042</option><option value="2043">2043</option><option value="2044">2044</option><option value="2045">2045</option><option value="2046">2046</option><option value="2047">2047</option><option value="2048">2048</option><option value="2049">2049</option><option value="2050">2050</option></select></div></div><div class="col-md-7"><div class="row align-items-center"><label class="mr-2">Đến</label><div class="col-sm-7"><div class="d-flex"><select class="custom-select" id="thanglamviectuden[]" name="thanglamviectuden[]"><option selected>Tháng</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><select class="custom-select ml-2" id="namlamviectuden[]" name="namlamviectuden[]"><option selected>Năm</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option><option value="2042">2042</option><option value="2043">2043</option><option value="2044">2044</option><option value="2045">2045</option><option value="2046">2046</option><option value="2047">2047</option><option value="2048">2048</option><option value="2049">2049</option><option value="2050">2050</option></select></div></div></div></div></div></div></div><div class="form-group row"><label for="exampleFormControlTextarea1" class="col-md-3">Mô tả công việc <span class="required">*</span></label><div class="col-md-9"><textarea class="form-control" id="exampleFormControlTextarea1" name="motacongviec[]" rows="3"></textarea></div></div></div>'
                    )
                } else {
                    alert('Vượt quá giới hạn cho phép');
                }
            });
            $('#work-experience').on("click", ".deleteKinhNghiem", function(e) {
                e.preventDefault();
                $(this).closest('div.box_exp').remove();
                z--;
            });

            $('.add-thtich').click(function() {
                let sam = $(".thanhtich");
                $(sam).append(
                    '<div class="form-group row align-items-center"><div class="col-md-9"><input type="text" name="achievements" id="achievements" class="form-control" /></div><a href="javascript:void(0)" class="col-md-3 text-center deletethtich"><i class="fa fa-times" aria-hidden="true"></i></a></div>'
                );
            })


            $(document).on('click', '.deletethtich', function() {
                $(this).closest('div.form-group').remove();
            });


            $('.add-kynang').click(function() {
                let sam = $(".boxkynang");
                $('.add-kynang').css('display', 'none');
                $(sam).append(
                    '<div class="form-group row"><div class="col-md-9" style="padding:0;margin-top:20px"><input type="text" name="so_thich" id="so_thich" class="form-control" placeholder="Thêm kỹ năng"/></div><a href="javascript:void(0)" class="col-md-3 text-center deletekynang" style="padding:0;margin-top:20px"><i class="fa fa-times" aria-hidden="true"></i></a></div>'
                );
            })
            $(document).on('click', '.deletekynang', function() {
                $(this).closest('div.form-group').remove();
                $('.add-kynang').css('display', '');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "-- Chọn --",
            });
        });
    </script>

</body>

<script type="text/javascript" src="{{ asset('js/api.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/user.js') }}"></script>

<script>
    profile();
</script>

</html>
