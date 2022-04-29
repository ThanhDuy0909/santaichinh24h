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

        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 

        <link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/typicons.min.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/superweb-custom.css') }}" rel="stylesheet">

        <!-- <link href="{{ asset('css/flatsome.css') }}" rel="stylesheet"> -->

        <link href="{{ asset('css/mnd_laivay_cp.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('js/cute-alert-master/style.css')}}" />

        <script src="{{asset('js/cute-alert-master/cute-alert.js')}}"></script>
        <!--Fonts-->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
            rel="stylesheet" type="text/css">

        <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

        <link rel="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  

        <script src="{{asset('js/jquery.min.js')}}"></script>

        <script src="{{asset('js/jquery-1.12.4.js')}}"></script>

        <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />

        <script src="{{asset('js/select2.min.js')}}"></script>
        
    </head>
    <body>
    @include('.user.layout.header')
    @include('.user.layout.slider')
    @yield('content')
    @include('.user.layout.footer')
    </body>
    <script  type="text/javascript" src="{{ asset('js/api.js') }}"></script>

    <script  type="text/javascript" src="{{ asset('js/user.js') }}"></script>
    
    <script>
        profile();
    </script>
</html>