<a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <div class="basket-item-count">
            <span class="count" id="cart-number">{{ !empty(session()->get('cart')) ? array_sum(session()->get('cart')) : '0' }}</span>
            <img src="{{ asset('sites_custom/image/icon-cart.png') }}" alt="" />
        </div>

        <div class="total-price-basket"> 
            <span class="lbl">{{ trans('sites.yourcart') }}</span>
            <span class="total-price">
                <span class="value">{{ !empty($total)? number_format($total) : '0' . 'đ' }}</span>
            </span>
        </div>
    </a>
    <ul class="dropdown-menu" id="sub-cart">
        @if (isset($productsCart))
        @foreach ($productsCart as $cart)
        <li>
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                        <div class="thumb">
                            @if (!empty($cart->productImages[0]))
                            <img alt="" src="{{ asset(config('setup.product_image_path') . '/' . $cart->productImages[0]['path_origin']) }}" />
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <div class="title"><a href="{{ asset('product' . '/' . $cart['id']) }}">{{ $cart['name'] }}</a></div>
                        <div class="price">{{ number_format(App\Helpers\Helpers::priceProduct($cart)) }}</div>
                    </div>
                </div>
                <a class="close-btn" href="javascript:void(0)" product="{{ $cart['id'] }}"></a>
            </div>
        </li>
        @endforeach
        @endif
        <li class="checkout">
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <a href="{{ asset('cart') }}" class="le-button inverse">{{ trans('sites.view_cart') }}</a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="{{ asset('checkout') }}" class="le-button">{{ trans('sites.checkout') }}</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
