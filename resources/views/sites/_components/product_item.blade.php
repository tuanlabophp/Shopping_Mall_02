<div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
    <div class="product-item">
        @if ($product['status'] == 1)
            <div class="ribbon blue"><span>{{trans('sites.new') }}</span></div> 
        @endif
        <div class="image">
        @foreach ($product->productImages as $image)
            @if ($image['is_main'] == 1)
                <a href="{{ asset('product' . '/' . $product['id']) }}">
                    <img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" alt="" width="246px" height="186px">
                </a>
                @break;
            @endif
        @endforeach
        </div>
        @if ($product['sale_percent'] != 0)
            <div class="ribbon red"><span>{{trans('sites.sale') }}</span></div>
            <div class="body">
                
                <div class="label-discount green">{{ $product['sale_percent'] }}% {{ trans('sites.sale') }}</div>
                
                <div class="title">
                    <a href="{{ asset('product' . '/' . $product['id']) }}">{{ $product['name'] }}</a>
                </div>
            </div>
            <div class="prices">
                <div class="price-prev">{{ number_format($product['price']) . 'đ' }}</div>
                <div class="price-current pull-right">{{ number_format(App\Helpers\Helpers::priceProduct($product)) . 'đ'}}</div>
            </div>
        @else
            <div class="body">
                <div class="title">
                    <a href="{{ asset('product' . '/' . $product['id']) }}">{{ $product['name'] }}</a>
                </div>
            </div>
            <div class="prices">
                <div class="price-current pull-right">{{ number_format($product['price']) . 'đ' }}</div>
            </div>
        @endif
        <div class="hover-area">
            
            @if (session()->has('cart'))
                @if (in_array($product['id'], array_keys(session()->get('cart'))))
                    <div>
                        <a class="btn btn-warning" href="javascript:void(0)">{{ trans('sites.in_your_cart') }}</a>
                    </div>
                @else
                    <div class="add-cart-button" product="{{ $product['id'] }}">
                        <a class="le-button" href="javascript:void(0)">{{ trans('sites.add_cart') }}</a>
                    </div> 
                @endif
            @else
                <div class="add-cart-button" product="{{ $product['id'] }}">
                    <a class="le-button" href="javascript:void(0)">{{ trans('sites.add_cart') }}</a>
                    </div>  
            @endif
            
            <div class="wish-compare">
            @if (isset($wishlists) && in_array($product['id'], $wishlists))
                <a class="btn-delete-to-wishlist" href="javascript:void(0)" product ="{{ $product['id'] }}">{{ trans('sites.delete_to_wishlist') }}</a>
            @else
                <a class="btn-add-to-wishlist" href="javascript:void(0)" product ="{{ $product['id'] }}">{{ trans('sites.add_to_wishlist') }}</a>
            @endif
                <a class="btn-add-to-compare addToCompare" href="javascript:void(0)"  product ="{{ $product['id'] }}">{{ trans('sites.compare') }}</a>
            </div>
        </div>
    </div>
</div>
