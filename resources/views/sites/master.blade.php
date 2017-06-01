<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>{{ trans('sites.app_name') }} | @yield('title') </title>

        {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('sites_custom/css/main.css') }}
        {{ Html::style('sites_custom/css/filter.css') }}
        {{ Html::style('sites_custom/css/js-image-slider.css') }}
        {{ Html::style('sites_custom/css/dark-green.css') }}
        {{ Html::style('sites_custom/css/compare.css') }}
        {{ Html::style('sites_custom/css/style.css') }}
        {{ Html::style('sites_custom/css/w3.css') }}
        {{ Html::style('bower/owl.carousel/dist/assets/owl.carousel.css') }}
        {{ Html::style('bower/animate.css/animate.min.css') }}
        {{ Html::style('bower/components-font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800') }}
        
    </head>
    <body>
        <div class="wrapper">
            @include('sites._sections.navbar')
            <div class="content">
                @yield('content')
                <div class="w3-container  w3-center comparePanle"></div>
                <div id="id01" class="w3-animate-zoom w3-white w3-modal modPos"></div>
            </div>
            @include('sites._sections.footer')
        </div>

        {{ Html::script('bower/jquery/dist/jquery.min.js') }}
        {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('bower/jquery-migrate/jquery-migrate.min.js') }}
        {{ Html::script('sites_custom/js/js-image-slider.js') }}
        {{ Html::script('sites_custom/js/owl.carousel.min.js') }}
        {{ Html::script('sites_custom/js/jquery.customSelect.min.js') }}
        {{ Html::script('bower/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
        {{ Html::script('bower/css-browser-selector/css_browser_selector.js') }}
        {{ Html::script('bower/echojs/dist/echo.min.js') }}
        {{ Html::script('bower/jquery.easing/js/jquery.easing.min.js') }}
        {{ Html::script('bower/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js') }}
        {{ Html::script('bower/raty/lib/jquery.raty.js') }}
        {{ Html::script('bower/jquery-prettyPhoto/js/jquery.prettyPhoto.js') }}
        {{ Html::script('bower/wow/dist/wow.min.js') }}
        {{ Html::script('sites_custom/js/scripts.js') }}
        {{ Html::script('sites_custom/js/gmap3.js') }}
        {{ Html::script('sites_custom/js/respond.min.js') }}
        {{ Html::script('sites_custom/js/cart.js') }}
        {{ Html::script('sites_custom/js/search.js') }}
        {{ Html::script('sites_custom/js/compare.js') }}
        {{ Html::script('sites_custom/js/wishlist.js') }}
        {{ Html::script('sites_custom/js/comment.js') }}
        {{ Html::script('https://ws.sharethis.com/button/buttons.js') }}
    </body>
</html>
