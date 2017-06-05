<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
    @if (isset($products))
        <div class="col-xs-12 col-md-9 items-holder no-margin">
        @foreach ($products as $product)
            <div class="row no-margin cart-item">
            
                <div class="col-xs-12 col-sm-2 no-margin">
                @foreach ($product->productImages as $image)
                    @if ($image['is_main'] == 1)
                        <a href="" class="lazy"><img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" alt=""></a> 
                        @break;
                    @endif
                @endforeach        
                </div>

                <div class="col-xs-12 col-sm-5 ">
                    <div class="title">
                        <a href="{{ asset('product' . '/' . $product['id']) }}">{{ $product['name'] }}</a>
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-3 no-margin">
                    <div class="quantity">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="quantity" readonly="readonly" product="{{ $product['id']}}" type="number" value="{{ session()->get('cart')[$product['id']] }}"/>
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-2 no-margin">
                    <div class="price">
                    {{ number_format(App\Helpers\Helpers::priceProduct($product)*session()->get('cart')[$product['id']]) }}
                    </div>
                    <a class="close-btn" product="{{ $product['id'] }}" mainCart="1" href="javascript:void(0)"></a>
                </div>
            </div><!-- /.cart-item -->
            @endforeach
        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <div class="col-xs-12 col-md-3 no-margin sidebar ">
            <div class="widget cart-summary">
                <h1 class="border">{{ trans('sites.shopping_cart') }}</h1>
                <div class="body">
                    <ul class="tabled-data no-border inverse-bold">
                        <li>
                            <label>{{ trans('sites.cart_subtotal') }}</label>
                            <div class="value pull-right">{{ number_format($total) . 'd' }}</div>
                        </li>
                        <li>
                            <label>{{ trans('sites.shipping') }}</label>
                            <div class="value pull-right">{{ trans('sites.free_shipping') }}</div>
                        </li>
                    </ul>
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>{{ trans('sites.order_total') }}</label>
                            <div class="value pull-right">{{ number_format($total) . 'd' }}</div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
                        <a class="le-button big" href="{{ asset('checkout') }}" >{{ trans('sites.checkout') }}</a>
                        <a class="simple-link block" href="{{ asset('/') }}">{{ trans('sites.continue_shopping') }}</a>
                    </div>
                </div>
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
    @else
        <h1>{{ trans('sites.cart_empty') }}</h1>
    @endif
</section>
