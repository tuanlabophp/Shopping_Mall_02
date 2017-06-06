 <section id="gaming" class="container">
    <div class="grid-list-products">
        <h2>{{ count($category) ? $category['name'] : trans('sites.not_found') }}</h2>
        
        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane in active">
                
                <div class="product-grid-holder">
                    <div class="row no-margin">
                @if (count($products))
                    @foreach ($products as $product)
                        @include('sites._components.product_item')
                    @endforeach
                @endif
                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->
                
                <div class="pagination-holder">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6 text-left">
                            {{ $products->links() }}
                        </div>

                        <div class="col-xs-12 col-sm-6">
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->
            </div><!-- /.products-grid #grid-view -->
        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!--
