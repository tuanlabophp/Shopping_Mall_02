@php
    $productDetail = json_decode($product['profile_full'], true);

    unset($productDetail['technicals']);
    unset($productDetail['image_list']);
@endphp      
<div id="single-product">
    <div class="container">
         <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">
                <div id="owl-single-product">
                @foreach ($product->productImages as $image)
                    @if ($image['is_main'] == 1)
                    <div class="single-product-gallery-item" id="slide1">
                        <a data-rel="prettyphoto" href="">
                            <img class="img-responsive" alt="" src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" />
                        </a>
                    </div><!-- /.single-product-gallery-item -->
                    @endif
                @endforeach
                </div><!-- /.single-product-slider -->


                <div class="single-product-gallery-thumbs gallery-thumbs">

                    <div id="owl-single-product-thumbnails">
                    @foreach ($product->productImages as $image)
                        @if ($image['is_main'] != 1)
                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide1">
                            <img class="img-responsive" alt="" src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" />
                        </a>
                        @endif
                    @endforeach
                        
                    </div><!-- /#owl-single-product-thumbnails -->

                    <div class="nav-holder left hidden-xs">
                        <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                    </div><!-- /.nav-holder -->
                    
                    <div class="nav-holder right hidden-xs">
                        <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                    </div><!-- /.nav-holder -->

                </div><!-- /.gallery-thumbs -->

            </div><!-- /.single-product-gallery -->
        </div><!-- /.gallery-holder -->        
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
            <div class="body">
                <div class="star-holder inline">
                    <div class="star" data-score="4"></div>
                </div>
                <div class="availability"><label>{{ trans('sites.availability') }}</label><span class="available">  in stock</span></div>

                <div class="title"><a href="#">{{ $product['name'] }}</a></div>
                <div class="brand">sony</div>

                <div class="buttons-holder">
                    <a class="btn-add-to-wishlist" href="#">{{ trans('sites.add_to_wishlist') }}</a>
                    <a class="btn-add-to-compare" href="#">{{ trans('sites.add_to_compare_list') }}</a>
                </div>

                <div class="excerpt">
                    <p>{{ $product['description'] }}</p>
                </div>
                
                <div class="prices">
                @if ($product['sale_percent'] !=0)
                    <div class="price-current">{{ $product['price']*$product['sale_percent']/100 }}</div>
                    <div class="price-prev">{{ $product['price'] }}</div>
                </div>
                @else
                    <div class="price-current">{{ $product['price'] }}</div>
                     <div class="price-pev"></div>
                @endif
                <div class="qnt-holder">
                    <div class="le-quantity">
                        <form>
                            <a class="minus" href="#reduce"></a>
                            <input name="quantity" readonly="readonly" type="text" value="1" />
                            <a class="plus" href="#add"></a>
                        </form>
                    </div>
                    <a id="addto-cart" href="cart.html" class="le-button huge">{{ trans('sites.add_to_cart') }}</a>
                </div><!-- /.qnt-holder -->
            </div><!-- /.body -->

        </div><!-- /.body-holder -->
    </div><!-- /.container -->
</div><!-- /.single-product -->

<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
<section id="single-product-tab">
    <div class="container">
        <div class="tab-holder">
            
            <ul class="nav nav-tabs simple" >
                <li class="active"><a href="#description" data-toggle="tab">{{ trans('sites.description') }}</a></li>
                <li><a href="#additional-info" data-toggle="tab">{{ trans('sites.additional_information') }}</a></li>
                <li><a href="#reviews" data-toggle="tab">{{ trans('sites.reviews') }} (3)</a></li>
                <li><a href="#comments" data-toggle="tab">{{ trans('sites.comments') }} (3)</a></li>
            </ul><!-- /.nav-tabs -->

            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <p>{{ $product['description'] }}</p>

                    <p>more des</p>

                </div><!-- /.tab-pane #description -->

                <div class="tab-pane" id="additional-info">
                    <table class="table table-sm table-hover ">
                        <thead>
                            <th>atributtue</th>
                            <th>detail</th>
                        </thead>
                    @foreach ($productDetail as  $key => $value)
                        <tbody>
                            <tr>
                                <th class="row">{{ $key }}</th>
                                <td>{{ $value }}</td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table><!-- /.tabled-data -->
                </div><!-- /.tab-pane #additional-info -->
                <div class="tab-pane" id="reviews">
                    <div class="reviews">
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Smith</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="4"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            review content
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->
                    </div><!-- /.comments -->

                    <div class="add-review row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="new-review-form">
                                <h2>{{ trans('sites.add_review') }}</h2>
                                <form id="contact-form" class="contact-form" method="post">                                 
                                    <div class="field-row star-row">
                                        <label>{{ trans('sites.your_rating') }}</label>
                                        <div class="star-holder">
                                            <div class="star big" data-score="0"></div>
                                        </div>
                                    </div><!-- /.field-row -->

                                    <div class="field-row">
                                        <label>{{ trans('sites.your_review') }}</label>
                                        <textarea rows="8" class="le-input"></textarea>
                                    </div><!-- /.field-row -->

                                    <div class="buttons-holder">
                                        <button type="submit" class="le-button huge">{{ trans('sites.submit') }}</button>
                                    </div><!-- /.buttons-holder -->
                                </form><!-- /.contact-form -->
                            </div><!-- /.new-review-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-review -->
                </div><!-- /.tab-pane #reviews -->

                <div class="tab-pane" id="comments">
                    <div class="comments">
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Smith</a>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            comment content
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                    <div>
                                        <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                            <div class="avatar">
                                                <img alt="avatar" src="assets/images/default-avatar.jpg">
                                            </div><!-- /.avatar -->
                                        </div><!-- /.col -->
                                        <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                            <div class="comment-body">
                                                <div class="meta-info">
                                                    <div class="author inline">
                                                        <a href="#" class="bold">John Sdit</a>
                                                    </div>
                                                    <div class="date inline pull-right">
                                                        12.07.2013
                                                    </div>
                                                </div><!-- /.meta-info -->
                                                <p class="comment-text">
                                                    reply comment content
                                                </p><!-- /.comment-text -->
                                            </div><!-- /.comment-body -->
                                        </div>
                                    </div>

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Smith</a>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            comment content
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                    <div>
                                        <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                            <div class="avatar">
                                                <img alt="avatar" src="assets/images/default-avatar.jpg">
                                            </div><!-- /.avatar -->
                                        </div><!-- /.col -->
                                        <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                            <div class="comment-body">
                                                <div class="meta-info">
                                                    <div class="author inline">
                                                        <a href="#" class="bold">John Sdit</a>
                                                    </div>
                                                    <div class="date inline pull-right">
                                                        12.07.2013
                                                    </div>
                                                </div><!-- /.meta-info -->
                                                <p class="comment-text">
                                                    reply comment content
                                                </p><!-- /.comment-text -->
                                            </div><!-- /.comment-body -->
                                        </div>
                                    </div>

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->

                    </div><!-- /.comments -->

                    <div class="add-review row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="new-review-form">
                                <h2>{{ trans('sites.add_comment') }}</h2>
                                <form id="contact-form" class="contact-form" method="post" >                                    
                                    <div class="field-row">
                                        <label>{{ trans('sites.your_comment') }}</label>
                                        <textarea rows="8" class="le-input"></textarea>
                                    </div><!-- /.field-row -->

                                    <div class="buttons-holder">
                                        <button type="submit" class="le-button huge">{{ trans('sites.submit') }}</button>
                                    </div><!-- /.buttons-holder -->
                                </form><!-- /.contact-form -->
                            </div><!-- /.new-review-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-review -->
                </div><!-- /.tab-pane #reviews -->
            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
<!-- ========================================= SINGLE PRODUCT TAB : END =========================================