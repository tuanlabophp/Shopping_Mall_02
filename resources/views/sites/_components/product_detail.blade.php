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
                <li><a href="#reviews" data-toggle="tab">{{ trans('sites.reviews') }} ({{ $product->rates->count() }})</a></li>
                <li><a href="#comments" data-toggle="tab">{{ trans('sites.comments') }} ({{ $product->comments->count() }})</a></li>
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
                    @login
                        @include('sites._components.rates', ['product_id' => $product->id, 'rates' => $product->rates])
                    @endlogin
                </div><!-- /.tab-pane #reviews -->

                <div class="tab-pane" id="comments">
                    @login
                        @include('sites._components.comments', ['product_id' => $product->id, 'comments' => $product->comments])
                    @endlogin
                </div>

            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
<!-- ========================================= SINGLE PRODUCT TAB : END =========================================