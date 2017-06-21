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
                    <div class="star" data-score="{{ $product->rates->avg('point') }}"></div>
                    <span class="availability">{{ trans('sites.point') }} {{ round($product->rates->avg('point'), 2) }}</span>
                </div>
                <div class="availability">
                    <label>{{ trans('sites.availability') }}</label>
                    <span class="available">{{ $product->quantity }}</span>
                </div>

                <div class="title"><a href="#">{{ $product['name'] }}</a></div>
                <div class="brand"></div>

                <div class="buttons-holder">
                    <a class="btn-add-to-wishlist btn-add-to-wishlist" product="{{ $product['id'] }}" href="javascript:void(0)">{{ trans('sites.add_to_wishlist') }}</a>
                    <a class="btn-add-to-compare addToCompare" product="{{ $product['id'] }}" href="javascript:void(0)">{{ trans('sites.add_to_compare_list') }}</a>
                </div>

                <div class="excerpt">
                    <p>{{ $product['description'] }}</p>
                </div>
                
                <div class="prices">
                    <div class="price-current">{{ number_format(App\Helpers\Helpers::priceProduct($product)) . 'đ'}}</div>
                    <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                </div>
                <div class="qnt-holder">
                <form action="{{ asset('cart/add') }}" method="get">
                @if (!empty(session()->get('cart')))
                    @if (in_array($product['id'], array_keys(session()->get('cart'))))
                        <h1 type="text" class="btn btn-warning huge">{{ trans('sites.in_your_cart') }}</h1>
                    @else
                        <div class="le-quantity">
                            <input name="quantity" type="number" value="1" min="1" />
                            <input name="product" type="text" hidden="true" value="{{ $product['id'] }}" />
                            {{-- <a class="plus" href="#add"></a> --}}
                        </div>
                         <button type="submit" class="le-button huge">{{ trans('sites.buy') }}</button>
                    @endif
                @else
                    <div class="le-quantity">
                        <input name="quantity" type="number" value="1" min="1" />
                        <input name="product" type="text" hidden="true" value="{{ $product['id'] }}" />
                        {{-- <a class="plus" href="#add"></a> --}}
                    </div>
                    <button type="submit" class="le-button huge">{{ trans('sites.buy') }}</button>
                @endif
                </form>
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
                </div><!-- /.tab-pane #description -->
                @php
                    $profiles = App\Helpers\Helpers::getProfileFull($product);
                @endphp
                <div class="tab-pane" id="additional-info">
                    <table class="table table-sm table-hover ">
                        <thead class="dark-green">
                            <th>{{ trans('sites.atributte') }}</th>
                            <th>{{ trans('sites.detail') }}</th>
                        </thead>
                    @foreach ($profiles as  $key => $value)
                        <tbody>
                            <tr>
                                <th class="row">{{ trans('sites.' . $key) }}</th>
                                <td>{{ $value? $value : trans('sites.none') }}</td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table><!-- /.tabled-data -->
                </div><!-- /.tab-pane #additional-info -->
                <div class="tab-pane" id="reviews">
                        @include('sites._components.rates', ['product_id' => $product->id, 'rates' => $product->rates])
                </div><!-- /.tab-pane #reviews -->

                <div class="tab-pane" id="comments">
                        @include('sites._components.comments', ['product_id' => $product->id, 'comments' => $product->comments])
                </div>

            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
<!-- ========================================= SINGLE PRODUCT TAB : END =========================================
