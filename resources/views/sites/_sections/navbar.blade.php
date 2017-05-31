<!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="{{ route('/') }}">{{ trans('sites.home') }}</a></li>
                @if(Auth::check())
                <li><a href="#">{{ Auth::user()->f_name }}</a></li>
                <li><a href="{{ route('logout') }}">{{ trans('sites.logout') }}</a></li>
                @else         
                <li><a href="{{ route('login') }}">{{ trans('sites.login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ trans('sites.register') }}</a></li>
                @endif
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->       <!-- ============================================================= HEADER ============================================================= -->
<header>
    <div class="container no-padding">

        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->

            <!-- ============================================================= LOGO : END ============================================================= -->     
        </div><!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
            <div class="contact-row">
                <div class="phone inline">
                    <a href="tel:0123456789">
                        <i class="fa fa-phone"></i> {{ trans('sites.phone') }}
                    </a>
                </div>
                <div class="contact inline">
                    <a href="mailto:contact@oursupport.com">
                        <i class="fa fa-envelope"></i> {{ trans('sites.contact_email') }}
                    </a>
                </div>
            </div><!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
                {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="control-group">
                    {!!Form::text('name', $value = '', $attributes = ['class' => 'search-field', 'placeholder' => trans('sites.search_for_item')])!!}
                    {!!Form::submit('Search', $attributes = ['class' => 'search-button'])!!}
                </div>
                {!! Form::close() !!}
            </div><!-- /.search-area -->
        </div><!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                <div class="wishlist-compare-holder">
                    <div class="wishlist ">
                        <a href="{{ asset('wishlist') }}"><i class="fa fa-heart"></i>{{ trans('sites.wishlist') }}(<span class="value wishlist-count">{{ isset($wishlists) ? $wishlists :'' }}</span>)</a>
                    </div>
                    <div class="compare">
                        <a href="javascript:void(0)" class="showCompare"><i class="fa fa-exchange showCompare"></i>{{ trans('sites.compare') }}<span class="value"></span> </a>
                    </div>
                </div>
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="top-cart-holder dropdown animate-dropdown">
                    <div class="basket">
                        @include('sites._components.sub_cart')
                    </div>
                </div><!-- /.top-cart-holder -->
            </div><!-- /.top-cart-row-container -->
            <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->       
        </div><!-- /.top-cart-row -->

    </div><!-- /.container -->
</header>
