<section id="checkout-page">
    <div class="container">
    @if(isset($products))
    {!! Form::open(['route' => 'order.store', 'method' => 'post']) !!}
        <div class="col-xs-12 no-margin">
            <div class="billing-address">
                <h2 class="border h1">{{ trans('sites.billing_info') }}</h2>
                
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::label('f_name', trans('sites.f_name')) !!}
                            {!! Form::text('f_name', $value = Auth::user()->f_name, $attributes= ['class' => 'le-input']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::label('l_name', trans('sites.l_name')) !!}
                            {!! Form::text('l_name', $value = Auth::user()->l_name, $attributes= ['class' => 'le-input']) !!}
                        </div>
                    </div><!-- /.field-row -->
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::label('address', trans('sites.address')) !!}
                            {!! Form::text('address', Auth::user()->address, $attributes= ['class' => 'le-input']) !!}
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            {!! Form::label('email', trans('sites.email')) !!}
                            {!! Form::text('email', Auth::user()->email, $attributes= ['class' => 'le-input']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            {!! Form::label('phone', trans('sites.phone_number')) !!}
                            {!! Form::text('phone', Auth::user()->address, $attributes= ['class' => 'le-input']) !!}
                        </div>
                    </div><!-- /.field-row -->
                
            </div><!-- /.billing-address -->
            <section id="your-order">
                <h2 class="border h1">{{ trans('sites.your_order') }}</h2>
                @foreach ($products as $product)
                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty">{{ session()->get('cart')[$product['id']] }} x</a>
                        </div>
                        <div class="col-xs-12 col-sm-9 ">
                            <div class="title"><a href="#">{{ $product['name'] }}</a></div>
                        </div>

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">
                                {{ number_format(App\Helpers\Helpers::priceProduct($product)*session()->get('cart')[$product['id']]) }}
                            </div>
                        </div>
                    </div><!-- /.order-item -->
                @endforeach
            </section><!-- /#your-order -->

            <div id="total-area" class="row no-margin">
                <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    <div id="subtotal-holder">
                        <ul class="tabled-data inverse-bold no-border">
                            <li>
                                <label>{{ trans('sites.subtotal_cart') }}</label>
                                <div class="value">{{ number_format($total) . 'đ' }}</div>
                            </li>
                            <li>
                                <label>{{ trans('sites.shipping') }}</label>
                                <div class="value">
                                    <div class="radio-group">
                                        <div class="radio-label bold">{{ trans('sites.free_ship') }}</div>
                                    </div>
                                </div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <ul id="total-field" class="tabled-data inverse-bold ">
                            <li>
                                <label>{{ trans('sites.order_total') }}</label>
                                <div class="value">{{ number_format($total) . 'đ'}}</div>
                            </li>
                        </ul><!-- /.tabled-data -->

                    </div><!-- /#subtotal-holder -->
                </div><!-- /.col -->
            </div><!-- /#total-area -->

            <div id="payment-method-options">
                    <div class="payment-method-option">
                        {{-- <input class="le-radio" type="radio" name="group2" value="cheque"> --}}
                        {!! Form::radio('payment', 'delivery', true, ['class' => 'le-radio']) !!}
                        <div class="radio-label bold ">{{ trans('sites.payment_upon_delivery') }}</div>
                    </div><!-- /.payment-method-option -->
                    
                    <div class="payment-method-option">
                        {!! Form::radio('payment', 'paypal', false, ['class' => 'le-radio']) !!}
                        <div class="radio-label bold ">{{ trans('sites.paypal') }}</div>
                    </div><!-- /.payment-method-option -->
            </div><!-- /#payment-method-options -->
            
            <div class="place-order-button">
                {!! Form::submit(trans('sites.place_order'), ['class' => 'le-button big']) !!}
                {!! Form::close() !!}
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    @else
        <h1>{{ trans('sites.cart_empty') }}</h1>
    @endif 
    </div><!-- /.container -->

</section>
