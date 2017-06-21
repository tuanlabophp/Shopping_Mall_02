<div class="container">
    <div class=" col-md-12 col-xs-12 col-sm-12 filter">
        <ul>
            <li class="color">{{ trans('sites.search_by') }}</li>
            <li>
                <span>{{ trans('sites.brand') }}</span>
                <i class="fa fa-sort-desc" aria-hidden="true"></i>
                <ul>
                @foreach ($categories as $category)
                    <li  class="category" category-id = "{{ $category['id'] }}">{{ $category['name'] }}</li>
                @endforeach
                </ul>
            </li>
            <li>
                <span>{{ trans('sites.price') }}</span>
                <i class="fa fa-sort-desc" aria-hidden="true"></i>
                <ul>    
                    <li class="price" price-range = '<1'>{{ trans('sites.price_under_1m') }}</li>
                    <li class="price" price-range = '1-5'>{{ trans('sites.price_1m_5m') }}</li>
                    <li class="price" price-range = '5-10'>{{ trans('sites.price_5m_10m') }}</li>
                    <li class="price" price-range = '>10'>{{ trans('sites.price_under_10m') }}</li>
                </ul>
            </li>
            <li>
                <span>{{ trans('sites.display_size') }}</span>
                <i class="fa fa-sort-desc" aria-hidden="true"></i>
                <ul>
                    <li class="size" size = '<4'>{{ trans('sites.size_under_4i') }}</li>
                    <li class="size" size = '4-5.5'>{{ trans('sites.size_4i_5dot5i') }}</li>
                    <li class="size" size = '>5.5'>{{ trans('sites.size_over_5dot5i') }}</li>
                </ul>
            </li>
            <li>
                <span>{{ trans('sites.technical') }}</span>
                <i class="fa fa-sort-desc" aria-hidden="true"></i>
                <ul>
                @foreach ($technicals as $technical)
                    <li class="technical" technical-id = "{{ $technical['id'] }}">{{ $technical['name'] }}</li>
                @endforeach
                </ul>
            </li>
        </ul>
    </div>    
</div>
<div id="products-tab" class="wow fadeInUp"></div>
