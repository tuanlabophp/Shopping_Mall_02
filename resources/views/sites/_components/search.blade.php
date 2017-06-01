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
                        @include('sites._components.product_item')
                    @endforeach  
                    </div>
                </div>
            </div>
        </div>
        {{-- <div>{{ $products->links() }}</div> --}}
    </div>
</div>
