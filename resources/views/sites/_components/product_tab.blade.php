<div id="products" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">{{ trans('sites.featured') }}</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">{{ trans('sites.new_arrivals') }}</a></li>
                <li><a href="#top-sales" data-toggle="tab">{{ trans('sites.top_sales') }}</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured"    >
                    <div class="product-grid-holder">
                    @foreach ($products['featured'] as $product)
                        @include('sites._components.product_item')
                    @endforeach  
                    </div>  
                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">
                    @foreach ($products['new'] as $product)
                        @include('sites._components.product_item')
                    @endforeach  
                    </div>
                </div>
                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">
                    @foreach ($products['sale'] as $product)
                         @include('sites._components.product_item')
                    @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
