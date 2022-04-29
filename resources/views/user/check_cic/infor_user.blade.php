<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Người Sử Dụng</title>

</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form id="signup-form" class="signup-form" action="{{ route('create_infor') }}" method="post">
                        @csrf
                        <h2 class="form-title">Thông tin cá nhân</h2>
                        <div class="form-group" style="display:none;">
                            <h5>Thông tin FaceBook<span class="req">*</span></h5>
                            <select type="text" class="form-control" id="jobProvince2" name="facebook_id" style="height:20px; width:150px;">
                                <option selected="selected">{{auth()->user()->facebook_id}}</option>
                            </select>
                            <select type="text" class="form-control" id="jobProvince2" name="id" style="height:20px; width:20px;">
                                <option selected="selected">{{auth()->user()->id}}</option>
                            </select> 
                           
                           
                        </div>
                        <div class="form-group">
                            <h5>Họ Và Tên<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="name" require value="{{auth()->user()->name}}" class="input form-control-lgin">
                        </div>
                        <div class="form-group">
                            <h5>Email<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="email" require value="{{auth()->user()->email}}" class="input form-control-lgin">
                        </div>
                        <div class="form-group">
                            <h5>Số Điện Thoại<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="phone" require value="{{auth()->user()->phone}}"class="input form-control-lgin">
                        </div>
                        {{-- <div class="form-group">
                            <h5>Công Ty Tài Chính Đang Làm Việc<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="congty" class="input form-control-lgin">
                        </div> --}}
                        <div class="form-group">
                            <h5>Nơi Ở Hiện Tại<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="address" require value="{{auth()->user()->address}}"class="input form-control-lgin">
                        </div>
                        {{-- <div class="form-group">
                            <h5>Người Giới Thiệu<span class="req">*</span></h5>
                            <input class="form-input" type="text" name="nguoigioithieu"
                                class="input form-control-lgin">
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit"
                                value="Lưu Thông Tin" />
                        </div>
                        {{-- <div class="form-group">
                            <a href="{{route('success')}}">Không lỗi</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script> --}}
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
{{-- <script>
    $(document).on('click', '#save', function(e) {
        swal(
            'Lưu thông tin thành công',
            'Vui lòng liên hệ Admin  qua số điện thoại 0123456789 hoặc zalo santaichinh24h để kích hoạt gói check cic'
            
        )
    });
</script> --}}
<style>
    /* body {
  background-color: aliceblue;
  font-family: sans-serif;
  text-align: center;
}
button {
  background-color: cadetblue;
  color: whitesmoke;
  border: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 7px;
  padding: 15px 35px;
  cursor: pointer;
  white-space: nowrap;
  margin: 10px;
}
img {
  width: 200px;
}
input[type="text"] {
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}
h1 {
  border-bottom: solid 2px grey;
}
#success {
  background: green;
} */
    body {
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }

    button {
        background-color: cadetblue;
        color: whitesmoke;
        border: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        font-size: 18px;
        font-weight: 500;
        border-radius: 7px;
        padding: 15px 35px;
        cursor: pointer;
        white-space: nowrap;
        margin: 10px;
    }

    /* @extend display-flex; */
    display-flex,
    .display-flex,
    .display-flex-center {
        display: flex;
        display: -webkit-flex;
    }

    /* @extend list-type-ulli; */
    list-type-ulli {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    /* Montserrat-300 - latin */
    @font-face {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 300;
        /* src: url("../fonts/montserrat/Montserrat-Light.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 400;
        /* src: url("../fonts/montserrat/Montserrat-Regular.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: italic;
        font-weight: 400;
        /* src: url("../fonts/montserrat/Montserrat-Italic.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        /* src: url("../fonts/montserrat/Montserrat-Medium.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 600;
        /* src: url("../fonts/montserrat/Montserrat-SemiBold.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 700;
        /* src: url("../fonts/montserrat/Montserrat-Bold.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: italic;
        font-weight: 700;
        /* src: url("../fonts/montserrat/Montserrat-BoldItalic.ttf"); */
        /* IE9 Compat Modes */
    }

    @font-face {
        font-family: 'Montserrat';
        font-style: italic;
        font-weight: 900;
        /* src: url("../fonts/montserrat/montserrat-v12-latin-900.ttf"),
  url("../fonts/montserrat/montserrat-v12-latin-900.eot") format("embedded-opentype"),
  url("../fonts/montserrat/montserrat-v12-latin-900.svg") format("woff2"),
  url("../fonts/montserrat/montserrat-v12-latin-900.woff") format("woff"),
  url("../fonts/montserrat/montserrat-v12-latin-900.woff2") format("truetype"); */
    }

    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
        transition: all 300ms ease 0s;
        -moz-transition: all 300ms ease 0s;
        -webkit-transition: all 300ms ease 0s;
        -o-transition: all 300ms ease 0s;
        -ms-transition: all 300ms ease 0s;
    }

    input,
    select,
    textarea {
        outline: none;
        appearance: unset !important;
        -moz-appearance: unset !important;
        -webkit-appearance: unset !important;
        -o-appearance: unset !important;
        -ms-appearance: unset !important;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        appearance: none !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        -o-appearance: none !important;
        -ms-appearance: none !important;
        margin: 0;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        box-shadow: none !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        -o-box-shadow: none !important;
        -ms-box-shadow: none !important;
    }

    input[type=checkbox] {
        appearance: checkbox !important;
        -moz-appearance: checkbox !important;
        -webkit-appearance: checkbox !important;
        -o-appearance: checkbox !important;
        -ms-appearance: checkbox !important;
    }

    input[type=radio] {
        appearance: radio !important;
        -moz-appearance: radio !important;
        -webkit-appearance: radio !important;
        -o-appearance: radio !important;
        -ms-appearance: radio !important;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    figure {
        margin: 0;
    }

    p {
        margin-bottom: 0px;
        font-size: 15px;
        color: #777;
    }

    h2 {
        line-height: 1.66;
        margin: 0;
        padding: 0;
        font-weight: 900;
        color: #222;
        font-family: 'Montserrat';
        font-size: 24px;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 40px;
    }

    .clear {
        clear: both;
    }

    body {
        font-size: 14px;
        line-height: 1.8;
        color: #222;
        font-weight: 400;
        font-family: 'Montserrat';
        /* background-image: url("../images/signup-bg.jpg"); */
        background-repeat: no-repeat;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        -ms-background-size: cover;
        background-position: center center;
        padding: 115px 0;
    }

    .container {
        width: 660px;
        position: relative;
        margin: 0 auto;
    }

    .display-flex {
        justify-content: space-between;
        -moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -o-justify-content: space-between;
        -ms-justify-content: space-between;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
    }

    .display-flex-center {
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
    }

    .position-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }

    .signup-content {
        background: #fff;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        -o-border-radius: 10px;
        -ms-border-radius: 10px;
        padding: 50px 85px;
    }

    .form-group {
        overflow: hidden;
        margin-bottom: 20px;
    }

    .form-input {
        width: 100%;
        border: 1px solid #ebebeb;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        padding: 17px 20px;
        box-sizing: border-box;
        font-size: 14px;
        font-weight: 500;
        color: #222;
    }

    .form-input::-webkit-input-placeholder {
        color: #999;
    }

    .form-input::-moz-placeholder {
        color: #999;
    }

    .form-input:-ms-input-placeholder {
        color: #999;
    }

    .form-input:-moz-placeholder {
        color: #999;
    }

    .form-input::-webkit-input-placeholder {
        font-weight: 500;
    }

    .form-input::-moz-placeholder {
        font-weight: 500;
    }

    .form-input:-ms-input-placeholder {
        font-weight: 500;
    }

    .form-input:-moz-placeholder {
        font-weight: 500;
    }

    .form-input:focus {
        border: 1px solid transparent;
        -webkit-border-image-source: -webkit-linear-gradient(to right, #9face6, #74ebd5);
        -moz-border-image-source: -moz-linear-gradient(to right, #9face6, #74ebd5);
        -o-border-image-source: -o-linear-gradient(to right, #9face6, #74ebd5);
        border-image-source: linear-gradient(to right, #9face6, #74ebd5);
        -webkit-border-image-slice: 1;
        border-image-slice: 1;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        background-origin: border-box;
        background-clip: content-box, border-box;
    }

    .form-input:focus::-webkit-input-placeholder {
        color: #222;
    }

    .form-input:focus::-moz-placeholder {
        color: #222;
    }

    .form-input:focus:-ms-input-placeholder {
        color: #222;
    }

    .form-input:focus:-moz-placeholder {
        color: #222;
    }

    .form-submit {
        width: 100%;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        padding: 17px 20px;
        box-sizing: border-box;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        border: none;
        background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
        background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
        background-image: linear-gradient(to left, #74ebd5, #9face6);
    }

    input[type=checkbox]:not(old) {
        width: 2em;
        margin: 0;
        padding: 0;
        font-size: 1em;
        display: none;
    }

    input[type=checkbox]:not(old)+label {
        display: inline-block;
        margin-top: 7px;
        margin-bottom: 25px;
    }

    input[type=checkbox]:not(old)+label>span {
        display: inline-block;
        width: 13px;
        height: 13px;
        margin-right: 15px;
        margin-bottom: 3px;
        border: 1px solid #ebebeb;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -o-border-radius: 2px;
        -ms-border-radius: 2px;
        background: white;
        background-image: -moz-linear-gradient(white, white);
        background-image: -ms-linear-gradient(white, white);
        background-image: -o-linear-gradient(white, white);
        background-image: -webkit-linear-gradient(white, white);
        background-image: linear-gradient(white, white);
        vertical-align: bottom;
    }

    input[type=checkbox]:not(old):checked+label>span {
        background-image: -moz-linear-gradient(white, white);
        background-image: -ms-linear-gradient(white, white);
        background-image: -o-linear-gradient(white, white);
        background-image: -webkit-linear-gradient(white, white);
        background-image: linear-gradient(white, white);
    }

    input[type=checkbox]:not(old):checked+label>span:before {
        content: '\f26b';
        display: block;
        color: #222;
        font-size: 11px;
        line-height: 1.2;
        text-align: center;
        font-family: 'Material-Design-Iconic-Font';
        font-weight: bold;
    }

    .label-agree-term {
        font-size: 12px;
        font-weight: 600;
        color: #555;
    }

    .term-service {
        color: #555;
    }

    .loginhere {
        color: #555;
        font-weight: 500;
        text-align: center;
        margin-top: 91px;
        margin-bottom: 5px;
    }

    .loginhere-link {
        font-weight: 700;
        color: #222;
    }

    .field-icon {
        float: right;
        margin-right: 17px;
        margin-top: -32px;
        position: relative;
        z-index: 2;
        color: #555;
    }

    @media screen and (max-width: 768px) {
        .container {
            width: calc(100% - 40px);
            max-width: 100%;
        }
    }

    @media screen and (max-width: 480px) {
        .signup-content {
            padding: 50px 25px;
        }
    }

    /*# sourceMappingURL=style.css.map */

</style>
