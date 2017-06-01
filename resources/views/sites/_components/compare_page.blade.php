@php
    $profiles = App\Helpers\Helpers::getProfileFull($products[0]);
@endphp
<div class="w3-container">
    <a onclick="document.getElementById('id01').style.display='none'" class="whiteFont w3-padding w3-closebtn closeBtn">&times;</a>
</div>
<div class="w3-row contentPop w3-margin-top">
    <h1>{{ trans('sites.product_compare') }}</h1>
    <div class="w3-col s3 m3 l3 compareItemParent relPos">
        <ul class="product">
            <li class=" relPos compHeader">
                <p class="w3-display-middle">{{ trans('sites.features') }}</p>
            </li>
            @foreach ($profiles as $key => $profile)
                <li class="{{ 'compare ' . $key }}">{{ trans('sites.' . $key) }}</li>
            @endforeach
            <li>{{ trans('sites.technicals') }}</li>
        </ul>
    </div>
    @foreach ($products as $product)
    <div class="w3-col s3 m3 l3 compareItemParent relPos">
        <ul class="product">
            <li class="compHeader">
                @foreach ($product->productImages as $image)
                    <img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" class="compareThumb">
                @endforeach
            </li>
            @php
                $profileProduct =  App\Helpers\Helpers::getProfileFull($product);
            @endphp
            @foreach ($profiles as $key => $profile)
                @if ($key == 'price')
                    <li class=" {{ 'compare ' . $key }}">{{ $profileProduct[$key]? number_format($profileProduct[$key]) . 'đ' : trans('sites.none')  }}</li>
                @else
                    <li class="{{ 'compare ' . $key }}">{{ $profileProduct[$key]? $profileProduct[$key] : trans('sites.none')  }}</li>
                @endif
            @endforeach
            <li>
                @foreach ($product->technicals as $technical)
                    <span class="btn btn-warning inline">{{ $technical['name'] . ', ' }}</span>
                @endforeach
            </li> 
        </ul>
    </div>
    @endforeach
</div>
