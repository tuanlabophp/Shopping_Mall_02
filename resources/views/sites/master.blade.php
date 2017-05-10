<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>Mobile Phone Stores | @yield('title') </title>

        {{ Html::style( asset('bower/bootstrap/dist/css/bootstrap.min.css') ) }}
        {{ Html::style( asset('client_template/assets/css/main.css') ) }}
        {{ Html::style( asset('client_template/assets/css/dark-green.css') ) }}
        {{ Html::style( asset('bower/owl.carousel/dist/assets/css/owl.carousel.css') ) }}
        {{ Html::style( asset('bower/animate.css/animate.min.css') ) }}
        {{ Html::style( asset('bower/components-font-awesome/css/font-awesome.min.css') ) }}
        {{ Html::style( 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' ) }}
        
    </head>
    <body>
        <div class="wrapper">
                @include('sites._sections.navbar')

                <div class="content">
                    @yield('content')
                </div>

                @include('sites._sections.footer')
        </div>
        {{ Html::script( asset('client_template/assets/js/jquery.customSelect.min.js') ) }}
        {{ Html::script( asset('bower/jquery/dist/jquery.min.js') ) }}
        {{ Html::script( asset('client_template/assets/js/jquery.customSelect.min.js') ) }}
        {{ Html::script( asset('bower/jquery-migrate/js/jquery-migrate.js') ) }}
        {{ Html::script( asset('bower/owl.carousel/dist/owl.carousel.min.js') ) }}
        {{ Html::script( asset('bower/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ) }}
        {{ Html::script( asset('bower/css_browser_selector/css_browser_selector.min.js') ) }}
        {{ Html::script( asset('bower/echojs/dist/js/echo.min.js') ) }}
        {{ Html::script( asset('bower/jquery.easing/js/jquery.easing-1.3.min.js') ) }}
        {{ Html::script( asset('bower/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.js') ) }}
        {{ Html::script( asset('bower/raty/lib/jquery.raty.js') ) }}
        {{ Html::script( asset('bower/jquery-prettyPhoto/js/jquery.prettyPhoto.min.js') ) }}
        {{ Html::script( asset('bower/wow/dist/wow.min.js') ) }}
        {{ Html::script( asset('bower/scriptjs/dist/scripts.js') ) }}
    </body>
</html>