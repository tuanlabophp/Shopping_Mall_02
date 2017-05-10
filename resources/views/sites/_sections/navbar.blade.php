<!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="#">{{ trans('sites.home') }}</a></li>
                <li><a href="#">{{ trans('sites.register') }}</a></li>
                <li><a href="#">{{ trans('sites.login') }}</a></li>
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
                        <i class="fa fa-phone"></i> 0123456789
                    </a>
                </div>
                <div class="contact inline">
                    <a href="mailto:contact@oursupport.com">
                        <i class="fa fa-envelope"></i> contact@<span class="le-color">oursupport.com</span>
                    </a>
                </div>
            </div><!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
                <form>
                    <div class="control-group">
                        <input class="search-field" placeholder="Search for item" />

                        <ul class="categories-filter animate-dropdown">
                            <li class="dropdown">

                                <a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">{{ trans('sites.allcategory') }}</a>

                                <ul class="dropdown-menu" role="menu" >
                                    <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">laptops</a></li> -->
                                </ul>
                            </li>
                        </ul>

                        <a class="search-button" href="#" ></a>    

                    </div>
                </form>
            </div><!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->      
        </div><!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                <div class="wishlist-compare-holder">
                    <div class="wishlist ">
                        <a href="#"><i class="fa fa-heart"></i>{{ trans('sites.wishlist') }}<span class="value">(21)</span> </a>
                    </div>
                    <div class="compare">
                        <a href="#"><i class="fa fa-exchange"></i>{{ trans('sites.compare') }}<span class="value">(2)</span> </a>
                    </div>
                </div>

                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="top-cart-holder dropdown animate-dropdown">
                    <div class="basket">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <div class="basket-item-count">
                                <span class="count">3</span>
                                <img src="assets/images/icon-cart.png" alt="" />
                            </div>

                            <div class="total-price-basket"> 
                                <span class="lbl">{{ trans('sites.yourcart') }}</span>
                                <span class="total-price">
                                    <span class="sign">$</span><span class="value">3219,00</span>
                                </span>
                            </div>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <div class="basket-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                                            <div class="thumb">
                                                <img alt="" src="assets/images/products/product-small-01.jpg" />
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 no-margin">
                                            <div class="title">Blueberry</div>
                                            <div class="price">$270.00</div>
                                        </div>
                                    </div>
                                    <a class="close-btn" href="#"></a>
                                </div>
                            </li>
                            
                            <li class="checkout">
                                <div class="basket-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <a href="cart.html" class="le-button inverse">{{ trans('sites.viewcart') }}</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <a href="checkout.html" class="le-button">{{ trans('sites.checkout') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div><!-- /.basket -->
                </div><!-- /.top-cart-holder -->
            </div><!-- /.top-cart-row-container -->
            <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->       
        </div><!-- /.top-cart-row -->

    </div><!-- /.container -->
</header>
<!-- ============================================================= HEADER : END ============================================================= -->       