<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">

        <title>Mobile Phone Stores | @yield('title') </title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('client_template/assets/css/bootstrap.min.css')}}">
        
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="{{asset('client_template/assets/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('client_template/assets/css/green.css')}}">
        <link rel="stylesheet" href="{{asset('client_template/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('client_template/assets/css/owl.transitions.css')}}">
        <link rel="stylesheet" href="{{asset('client_template/assets/css/animate.min.css')}}">

        <!-- Demo Purpose Only. Should be removed in production -->
        <link rel="stylesheet" href="{{asset('client_template/assets/css/config.css')}}">

        <link href="{{asset('client_template/assets/css/green.css')}}" rel="alternate stylesheet" title="Green color">
        <link href="{{asset('client_template/assets/css/blue.css')}}" rel="alternate stylesheet" title="Blue color">
        <link href="{{asset('client_template/assets/css/red.css')}}" rel="alternate stylesheet" title="Red color">
        <link href="{{asset('client_template/assets/css/orange.css')}}" rel="alternate stylesheet" title="Orange color">
        <link href="{{asset('client_template/assets/css/navy.css')}}" rel="alternate stylesheet" title="Navy color">
        <link href="{{asset('client_template/assets/css/dark-green.css')}}" rel="alternate stylesheet" title="Darkgreen color">
        <!-- Demo Purpose Only. Should be removed in production : END -->

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
        
        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="{{asset('client_template/assets/css/font-awesome.min.css')}}">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->

 
    </head>
    <body>
        <div class="wrapper">
                @include('sites._sections.navbar')

                <div class="content">
                    @yield('content')
                </div>

                @include('sites._sections.footer')
        </div>
        
        <script src="{{asset('client_template/assets/js/jquery-1.10.2.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/jquery-migrate-1.2.1.js')}}"></script>
        <script src="{{asset('client_template/assets/js/bootstrap.min.js')}}"></script>
        <!-- <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> -->
        <script src="{{asset('client_template/assets/js/gmap3.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/css_browser_selector.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/echo.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/jquery.easing-1.3.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/bootstrap-slider.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/jquery.raty.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/jquery.prettyPhoto.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/jquery.customSelect.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('client_template/assets/js/scripts.js')}}"></script>
        <script src="http://w.sharethis.com/button/buttons.js"></script>

    </body>
</html>