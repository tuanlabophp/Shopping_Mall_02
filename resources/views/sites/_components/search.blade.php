<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">{{ trans('sites.filter') }}</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                    @foreach ($products as $product)
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                @if ($product['status'] == 1)
                                    <div class="ribbon blue"><span>{{trans('sites.new') }}</span></div> 
                                @endif
                                <div class="image">
                                @foreach ($product->productImages as $image)
                                    @if ($image['is_main'] == 1)
                                        <img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" alt="" width="246px" height="186px">
                                        @break;
                                    @endif
                                @endforeach   
                                </div>
                                @if ($product['sale_percent'] != 0)
                                    <div class="ribbon red"><span>{{trans('sites.sale') }}</span></div>
                                    <div class="body">
                                    
                                        <div class="label-discount green">{{ $product['sale_percent'] }}% {{ trans('sites.sale') }}</div>
                                    
                                        <div class="title">
                                            <a href="single-product.html">{{ $product['name'] }}</a>
                                        </div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                                        <div class="price-current pull-right">{{ number_format($product['price']*$product['sale_percent']/100 ) . 'đ'}}</div>
                                    </div>
                                @else
                                <div class="body">
                                    <div class="title">
                                        <a href="single-product.html">{{ $product['name'] }}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-current pull-right">{{ number_format($product['price']) . 'đ' }}</div>
                                </div>
                                @endif
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">{{ trans('sites.add_to_cart') }}</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">{{ trans('sites.add_to_wishlist') }}</a>
                                        <a class="btn-add-to-compare" href="#">{{ trans('sites.compare') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
