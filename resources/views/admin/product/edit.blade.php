@extends("admin.master")
@section("title")

{{ trans('view.edit_product') }}

@endsection
@section('content')
<section class="content-header">

    @php
        $profile = json_decode($product['profile_full'], true);
    @endphp

    <h1>{{ trans('view.categories_management') }}</h1>
    <div class="box box-primary">
        @if (count($errors))      
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach   
                </ul>
            </div>    
        @endif
        {!! Form::open(['route' => ['admin.product.update',  $product['id']], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
        <ul>
            <li>
                {!! Form::label('name', trans('view.Name'), ['class' => 'label']) !!}
                {!! Form::text('name', $value = $product['name'], $attributes = ['placeholder' => trans('view.name'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!!Form::label('name', trans('view.description'), ['class' => 'label'])!!}
                {!!Form::text('description', $value = $product['description'], $attributes = ['placeholder' => trans('view.description'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!! Form::label('category', trans('view.category'), ['class' => 'label']) !!}
                {!! Form::select('category_id', $categories, $product['category_id']) !!}
            </li>
            {!! Form::label('sale', trans('view.sale'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('price', trans('view.price'), ['class' => 'label']) !!}
                {!! Form::text('price', $value = $product['price'], $attributes = ['placeholder' => trans('view.price'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('quantity', trans('view.quantity'), ['class' => 'label']) !!}
                {!! Form::text('quantity', $value = $product['quantity'], $attributes = ['placeholder' => trans('view.quantity'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('sale_percent', trans('view.sale_percent'), ['class' => 'label']) !!}
                {!! Form::text('sale_percent', $value = $product['sale_percent'], $attributes = ['placeholder' => trans('view.sale_percent'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('status', trans('view.status'), ['class' => 'label']) !!}
                {!! Form::text('status', $value = $product['status'], $attributes = ['placeholder' => trans('view.status'), 'class' => 'form-control']) !!}
            </li>

            {!! Form::label('display', trans('view.display'), ['class' => 'label head']) !!}

            <li>
                {!! Form::label('display_size', trans('view.size'), ['class' => 'label']) !!}
                {!! Form::text('display_size', $value = $product['display_size'], $attributes = ['placeholder' => trans('view.size'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('display_type', trans('view.type'), ['class' => 'label']) !!}
                {!! Form::text('display_type', $value = $profile['display_type'], $attributes = ['placeholder' => trans('view.type'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('display_resolution', trans('view.resolution'), ['class' => 'label']) !!}
                {!! Form::text('display_resolution', $value = $profile['display_resolution'], $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('display_protection', trans('view.protection'), ['class' => 'label']) !!}
                {!! Form::text('display_protection', $value = $profile['display_protection'], $attributes = ['placeholder' => trans('view.protection'), 'class' => 'form-control']) !!}
            </li>

            <li>
            {!! Form::label('back_camera', trans('view.back_camera'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('back_camera_resolution', trans('view.resolution'), ['class' => 'label']) !!}
                {!! Form::text('back_camera_resolution', $value = $profile['back_camera_resolution'], $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('back_camera_record', trans('view.record'), ['class' => 'label']) !!}
                {!! Form::text('back_camera_record', $value = $profile['back_camera_record'], $attributes = ['placeholder' => trans('view.video'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('back_camera_flash', trans('view.flash'), ['class' => 'label']) !!}
                {!! Form::text('back_camera_flash', $value = $profile['back_camera_flash'], $attributes = ['placeholder' => trans('view.flash'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('back_camera_features', trans('view.features'), ['class' => 'label']) !!}
                {!! Form::text('back_camera_features', $value = $profile['back_camera_features'], $attributes = ['placeholder' => trans('view.features'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('front_camera', trans('view.front_camera'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('front_camera_resolution', trans('view.resolution'), ['class' => 'label']) !!}
                {!! Form::text('front_camera_resolution', $value = $profile['front_camera_resolution'], $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('front_camera_record', trans('view.record'), ['class' => 'label']) !!}
                {!! Form::text('front_camera_record', $value = $profile['front_camera_record'], $attributes = ['placeholder' => trans('view.video'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('front_camera_flash', trans('view.flash'), ['class' => 'label']) !!}
                {!! Form::text('front_camera_flash', $value = $profile['front_camera_flash'], $attributes = ['placeholder' => trans('view.flash'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('front_camera_features', trans('view.features'), ['class' => 'label']) !!}
                {!! Form::text('front_camera_features', $value = $profile['front_camera_features'], $attributes = ['placeholder' => trans('view.features'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('profile', trans('view.os_cpu'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('profile_os', trans('view.os'), ['class' => 'label']) !!}
                {!! Form::text('profile_os', $value = $profile['profile_os'], $attributes = ['placeholder' => trans('view.os'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('profile_cpu', trans('view.cpu'), ['class' => 'label']) !!}
                {!! Form::text('profile_cpu', $value = $profile['profile_cpu'], $attributes = ['placeholder' => trans('view.chipset'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('profile_speed', trans('view.speed'), ['class' => 'label']) !!}
                {!! Form::text('profile_speed', $value = $profile['profile_speed'], $attributes = ['placeholder' => trans('view.speed'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('profile_gpu', trans('view.gpu'), ['class' => 'label']) !!}
                {!! Form::text('profile_gpu', $value = $profile['profile_gpu'], $attributes = ['placeholder' => trans('view.gpu'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('memory', trans('view.memory'), ['class' => 'label head']) !!}        
            <li>
                {!! Form::label('memory_ram', trans('view.ram'), ['class' => 'label']) !!}
                {!! Form::text('memory_ram', $value = $profile['memory_ram'], $attributes = ['placeholder' => trans('view.ram'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('memory_rom', trans('view.rom'), ['class' => 'label']) !!}
                {!! Form::text('memory_rom', $value = $profile['memory_rom'], $attributes = ['placeholder' => trans('view.rom'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('memorycard', trans('view.card'), ['class' => 'label']) !!}
                {!! Form::text('memorycard', $value = $profile['memorycard'], $attributes = ['placeholder' => trans('view.card'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('connect', trans('view.connect'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('connect_network', trans('view.network'), ['class' => 'label']) !!}
                {!! Form::text('connect_network', $value = $profile['connect_network'], $attributes = ['placeholder' => trans('view.network'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_sim', trans('view.sim'), ['class' => 'label']) !!}
                {!! Form::text('connect_sim', $value = $profile['connect_sim'], $attributes = ['placeholder' => trans('view.sim'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_wifi', trans('view.wifi'), ['class' => 'label']) !!}
                {!! Form::text('connect_wifi', $value = $profile['connect_wifi'], $attributes = ['placeholder' => trans('view.wifi'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_gps', trans('view.gps'), ['class' => 'label']) !!}
                {!! Form::text('connect_gps', $value = $profile['connect_gps'], $attributes = ['placeholder' => trans('view.gps'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_bluetooth', trans('view.bluetooth'), ['class' => 'label']) !!}
                {!! Form::text('connect_bluetooth', $value = $profile['connect_bluetooth'], $attributes = ['placeholder' => trans('view.bluetooth'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_usb', trans('view.usb'), ['class' => 'label']) !!}
                {!! Form::text('connect_usb', $value = $profile['connect_usb'], $attributes = ['placeholder' => trans('view.usb'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('connect_more', trans('view.more'), ['class' => 'label']) !!}
                {!! Form::text('connect_more', $value = $profile['connect_more'], $attributes = ['placeholder' => trans('view.more_connect'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('design', trans('view.design'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('design_type', trans('view.type'), ['class' => 'label']) !!}
                {!! Form::text('design_type', $value = $profile['design_type'], $attributes = ['placeholder' => trans('view.design_type'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('design_material', trans('view.material'), ['class' => 'label']) !!}
                {!! Form::text('design_material', $value = $profile['design_material'], $attributes = ['placeholder' => trans('view.material'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('design_size', trans('view.size'), ['class' => 'label']) !!}
                {!! Form::text('design_size', $value = $profile['design_size'], $attributes = ['placeholder' => trans('view.size'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('design_weight', trans('view.wieght'), ['class' => 'label']) !!}
                {!! Form::text('design_weight', $value = $profile['design_weight'], $attributes = ['placeholder' => trans('view.wieght'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('pin', trans('view.pin'), ['class' => 'label head']) !!}
            <li>
                {!! Form::label('pin_capacity', trans('view.capacity'), ['class' => 'label']) !!}
                {!! Form::text('pin_capacity', $value = $profile['pin_capacity'], $attributes = ['placeholder' => trans('view.capacity'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('pin_type', trans('view.type'), ['class' => 'label']) !!}
                {!! Form::text('pin_type', $value = $profile['pin_type'], $attributes = ['placeholder' => trans('view.type'), 'class' => 'form-control']) !!}
            </li>
            <li>
                {!! Form::label('pin_technology', trans('view.technology'), ['class' => 'label']) !!}
                {!! Form::text('pin_technology', $value = $profile['pin_technology'], $attributes = ['placeholder' => trans('view.technology'), 'class' => 'form-control']) !!}
            </li>
            {!! Form::label('technicals', trans('view.technicals'), ['class' => 'label head']) !!}
            <li>
                <div class="well col-xs-6 list-tech" style="max-height: 100px;overflow: auto;">
                    <ul class="list-group checked-list-box">
                        @foreach ($technicals as $technical)
                            <li class="list-group-item">
                            @if (in_array($technical['id'], $productTechnical))
                                {!! Form::checkbox('technicals[]', $technical['id'], true) !!}
                            @else
                                {!! Form::checkbox('technicals[]', $technical['id']) !!}
                            @endif
                                {{ $technical['name'] }}
                            </li> 
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                {!! Form::label('image', trans('view.avatar'), ['class' => 'label head']) !!}
                <img id="blah" src="{{ asset(config('setup.product_image_path') . $image['path_origin']) }}" alt="your image" width="70px" />
                {!! Form::file('image', ['id' => 'imgInp']) !!}   
            </li>
            <li>
                {!! Form::label('image_list', trans('view.image_list'), ['class' => 'label head']) !!}
                @if($image_list)
                    @foreach($image_list as $value)
                        <img src="{{ asset(config('setup.product_image_path') . $value['path_origin']) }}" alt="your image" width="70px" />
                    @endforeach
                @endif
                {!! Form::file('image_list[]', ['multiple']) !!}     
            </li>
            <li>{!! Form::submit(trans('view.update'), ['class' => 'btn btn-warning']) !!}</li>
        </ul>
        {!! Form::close() !!}
    </div>

@endsection
