<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="color-bg">

    <div class="container">
        <div class="row no-margin widgets-row">
            <div class="col-xs-12  col-sm-4 no-margin-left">
                <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>{{ trans('sites.featureproducts') }}</h2>
                    <div class="body">
                        <ul>
                            @foreach ($topFiveProduct['featured'] as $product)
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="{{ asset('product') . '/' . $product['id'] }}">{{ $product['name'] }}</a>
                                        <div class="price">
                                            <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                                            <div class="price-current">{{ number_format(App\Helpers\Helpers::priceProduct($product)) . 'đ'}}</div>
                                        </div>
                                    </div>  

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                        @if (!empty($product->productImages[0]))
                                            <img alt="" src="{{ asset(config('setup.product_image_path') . '/' . $product->productImages[0]['path_origin']) }}" />
                                        @endif
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> <!-- /.widget -->
                <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->            
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>{{ trans('sites.onsaleproducts') }}</h2>
                    <div class="body">
                        <ul>
                            @foreach ($topFiveProduct['new'] as $product)
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="{{ asset('product') . '/' . $product['id'] }}">{{ $product['name'] }}</a>
                                        <div class="price">
                                            <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                                            <div class="price-current">{{ number_format(App\Helpers\Helpers::priceProduct($product)) . 'đ'}}</div>
                                        </div>
                                    </div>  

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                        @if (!empty($product->productImages[0]))
                                            <img alt="" src="{{ asset(config('setup.product_image_path') . '/' . $product->productImages[0]['path_origin']) }}" />
                                        @endif
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> <!-- /.widget -->
                <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->            
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                <div class="widget">
                    <h2>{{ trans('sites.topratedproducts') }}</h2>
                    <div class="body">
                        <ul>
                            @foreach ($topFiveProduct['sale'] as $product)
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 no-margin">
                                        <a href="{{ asset('product') . '/' . $product['id'] }}">{{ $product['name'] }}</a>
                                        <div class="price">
                                            <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                                            <div class="price-current">{{ number_format(App\Helpers\Helpers::priceProduct($product)) . 'đ'}}</div>
                                        </div>
                                    </div>  

                                    <div class="col-xs-12 col-sm-3 no-margin">
                                        <a href="#" class="thumb-holder">
                                        @if (!empty($product->productImages[0]))
                                            <img alt="" src="{{ asset(config('setup.product_image_path') . '/' . $product->productImages[0]['path_origin']) }}" />
                                        @endif
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- /.widget -->
                <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->            
            </div><!-- /.col -->

        </div><!-- /.widgets-row-->
    </div><!-- /.container -->

    <div class="sub-form-row">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                <form role="form">
                    <input placeholder="{{ trans('sites.placeholder.subscribe') }}">
                    <button class="le-button">{{ trans('sites.subscribe') }}</button>
                </form>
            </div>
        </div><!-- /.container -->
    </div><!-- /.sub-form-row -->

    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
                <div class="contact-info">

                    <p class="regular-bold"> {{ trans('sites.contact') }}</p>    
                    <p>{{ trans('sites.address') }}</p>
                    <div class="social-icons">
                        <h3>{{ trans('sites.getintouch') }}</h3>
                        <ul>
                            <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-stumbleupon"></a></li>
                            <li><a href="#" class="fa fa-dribbble"></a></li>
                            <li><a href="#" class="fa fa-vk"></a></li>
                        </ul>
                    </div><!-- /.social-icons -->

                </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->            
            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                <!-- ============================================================= LINKS FOOTER ============================================================= -->
                <div class="link-widget">
                    <div class="widget">
                        <h3>{{ trans('sites.finditfast') }}</h3>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->

                <div class="link-widget">
                    <div class="widget">
                        <h3>{{ trans('sites.infomation') }}</h3>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->

                <div class="link-widget">
                    <div class="widget">
                        <h3>{{ trans('sites.infomation') }}</h3>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->
                <!-- ============================================================= LINKS FOOTER : END ============================================================= -->            
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; <a href="index.html">{{ trans('view.app_name') }}</a> {{ trans('sites.allrightsreserved') }}
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods "></div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->
