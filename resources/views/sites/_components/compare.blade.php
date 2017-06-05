<div class="w3-row w3-card-4 w3-white w3-round-large w3-border w3-margin-top">
    <div class="w3-row">
        <div class="w3-col l9 m8 s6 w3-margin-top">
        @if(session()->has('limit'))
            <h4 class="btn btn-danger">{{ session()->get('limit') }}</h4>
        @endif
        </div>
        <div class="w3-col l3 m4 s6 w3-margin-top">
            &nbsp;
        @if (count($products) <=1 )
            <button class="w3-btn w3-round-small w3-white w3-border notActive cmprBtn" disabled="disabled">
            {{ trans('sites.compare') }}</button>
        @else 
            <button class="btn btn-warning notActive cmprBtn active">
            {{ trans('sites.compare') }}</button>
        @endif
            <button class="btn btn-danger closeCompare">x</button>
        </div>
    </div>
    <div class=" titleMargin w3-container comparePan">
        @if (!empty($products))
            @foreach ($products as $product)
                <div class="relPos titleMargin w3-col l3 m4 s4">
                    <div class="w3-white titleMargin">
                        <a class="selectedItemCloseBtn w3-closebtn cursor" product="{{ $product['id'] }}">×</a>
                    @foreach ($product->productImages as $image)
                        @if ($image['is_main'] == 1)
                            <img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" alt="" height="120px">
                            @break;
                        @endif
                    @endforeach 
                        <p id="Nexus6" class="titleMargin1">{{ $product['name'] }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
