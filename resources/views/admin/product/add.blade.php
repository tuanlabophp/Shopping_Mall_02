@extends("admin.master")
@section("title")

    {{ trans('view.add_product') }}

@endsection
@section('scrip')
</script>
@endsection
@section('content')
<section class="content-header">
    <h1>{{ trans('view.products_management') }}</h1>
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
        {!!Form::open(['route' => ['admin.product.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <ul>
            <li>
                {!!Form::label('name', trans('view.name'), ['class' => 'label'])!!}
                {!!Form::text('name', $value = '', $attributes = ['placeholder' => trans('view.name'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('name', trans('view.description'), ['class' => 'label'])!!}
                {!!Form::text('description', $value = '', $attributes = ['placeholder' => trans('view.description'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('category_id', trans('view.category'), ['class' => 'label'])!!}
                {!!Form::select('category_id', $categories)!!}
            </li>
            {!!Form::label('sale', trans('view.sale'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('price', trans('view.price'), ['class' => 'label'])!!}
                {!!Form::text('price', $value = '', $attributes = ['placeholder' => trans('view.price'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('quantity', trans('view.quantity'), ['class' => 'label'])!!}
                {!!Form::text('quantity', $value = '', $attributes = ['placeholder' => trans('view.quantity'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('sale_percent', trans('view.sale_percent'), ['class' => 'label'])!!}
                {!!Form::text('sale_percent', '', $attributes = ['placeholder' => trans('view.sale_percent'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('status', trans('view.status'), ['class' => 'label'])!!}
                {!!Form::text('status', $value = '', $attributes = ['placeholder' => trans('view.status'), 'class' => 'form-control'])!!}
            </li>

            {!!Form::label('display', trans('view.display'), ['class' => 'label head'])!!}

            <li>
                {!!Form::label('display_size', trans('view.size'), ['class' => 'label'])!!}
                {!!Form::text('display_size', $value = '', $attributes = ['placeholder' => trans('view.size'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('display_type', trans('view.type'), ['class' => 'label'])!!}
                {!!Form::text('display_type', $value = '', $attributes = ['placeholder' => trans('view.type'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('display_resolution', trans('view.resolution'), ['class' => 'label'])!!}
                {!!Form::text('display_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('display_protection', trans('view.protection'), ['class' => 'label'])!!}
                {!!Form::text('display_protection', $value = '', $attributes = ['placeholder' => trans('view.protection'), 'class' => 'form-control'])!!}
            </li>

            <li>
                {!!Form::label('back_camera', trans('view.back_camera'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('back_camera_resolution', trans('view.resolution'), ['class' => 'label'])!!}
                {!!Form::text('back_camera_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('back_camera_record', trans('view.record'), ['class' => 'label'])!!}
                {!!Form::text('back_camera_record', $value = '', $attributes = ['placeholder' => trans('view.video'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('back_camera_flash', trans('view.flash'), ['class' => 'label'])!!}
                {!!Form::text('back_camera_flash', $value = '', $attributes = ['placeholder' => trans('view.flash'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('back_camera_features', trans('view.features'), ['class' => 'label'])!!}
                {!!Form::text('back_camera_features', $value = '', $attributes = ['placeholder' => trans('view.features'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('front_camera', trans('view.front_camera'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('front_camera_resolution', trans('view.resolution'), ['class' => 'label'])!!}
                {!!Form::text('front_camera_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('front_camera_record', trans('view.record'), ['class' => 'label'])!!}
                {!!Form::text('front_camera_record', $value = '', $attributes = ['placeholder' => trans('view.video'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('front_camera_flash', trans('view.flash'), ['class' => 'label'])!!}
                {!!Form::text('front_camera_flash', $value = '', $attributes = ['placeholder' => trans('view.flash'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('front_camera_features', trans('view.features'), ['class' => 'label'])!!}
                {!!Form::text('front_camera_features', $value = '', $attributes = ['placeholder' => trans('view.features'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('profile', trans('view.os_cpu'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('profile_os', trans('view.os'), ['class' => 'label'])!!}
                {!!Form::text('profile_os', $value = '', $attributes = ['placeholder' => trans('view.os'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('profile_cpu', trans('view.cpu'), ['class' => 'label'])!!}
                {!!Form::text('profile_cpu', $value = '', $attributes = ['placeholder' => trans('view.chipset'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('profile_speed', trans('view.speed'), ['class' => 'label'])!!}
                {!!Form::text('profile_speed', $value = '', $attributes = ['placeholder' => trans('view.speed'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('profile_gpu', trans('view.gpu'), ['class' => 'label'])!!}
                {!!Form::text('profile_gpu', $value = '', $attributes = ['placeholder' => trans('view.gpu'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('memory', trans('view.memory'), ['class' => 'label head'])!!}        
            <li>
                {!!Form::label('memory_ram', trans('view.ram'), ['class' => 'label'])!!}
                {!!Form::text('memory_ram', $value = '', $attributes = ['placeholder' => trans('view.ram'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('memory_rom', trans('view.rom'), ['class' => 'label'])!!}
                {!!Form::text('memory_rom', $value = '', $attributes = ['placeholder' => trans('view.rom'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('memorycard', trans('view.card'), ['class' => 'label'])!!}
                {!!Form::text('memorycard', $value = '', $attributes = ['placeholder' => trans('view.card'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('connect', trans('view.connect'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('connect_networkt', trans('view.network'), ['class' => 'label'])!!}
                {!!Form::text('connect_network', $value = '', $attributes = ['placeholder' => trans('view.network'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_sim', trans('view.sim'), ['class' => 'label'])!!}
                {!!Form::text('connect_sim', $value = '', $attributes = ['placeholder' => trans('view.sim'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_wifi', trans('view.wifi'), ['class' => 'label'])!!}
                {!!Form::text('connect_wifi', $value = '', $attributes = ['placeholder' => trans('view.wifi'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_gps', trans('view.gps'), ['class' => 'label'])!!}
                {!!Form::text('connect_gps', $value = '', $attributes = ['placeholder' => trans('view.gps'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_bluetooth', trans('view.bluetooth'), ['class' => 'label'])!!}
                {!!Form::text('connect_bluetooth', $value = '', $attributes = ['placeholder' => trans('view.bluetooth'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_usb', trans('view.usb'), ['class' => 'label'])!!}
                {!!Form::text('connect_usb', $value = '', $attributes = ['placeholder' => trans('view.usb'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('connect_more', trans('view.more'), ['class' => 'label'])!!}
                {!!Form::text('connect_more', $value = '', $attributes = ['placeholder' => trans('view.more_connect'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('design', trans('view.design'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('design_type', trans('view.type'), ['class' => 'label'])!!}
                {!!Form::text('design_type', $value = '', $attributes = ['placeholder' => trans('view.design_type'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('design_material', trans('view.material'), ['class' => 'label'])!!}
                {!!Form::text('design_material', $value = '', $attributes = ['placeholder' => trans('view.material'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('design_size', trans('view.size'), ['class' => 'label'])!!}
                {!!Form::text('design_size', $value = '', $attributes = ['placeholder' => trans('view.size'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('design_weight', trans('view.wieght'), ['class' => 'label'])!!}
                {!!Form::text('design_weight', $value = '', $attributes = ['placeholder' => trans('view.wieght'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('pin', trans('view.pin'), ['class' => 'label head'])!!}
            <li>
                {!!Form::label('pin_capacity', trans('view.capacity'), ['class' => 'label'])!!}
                {!!Form::text('pin_capacity', $value = '', $attributes = ['placeholder' => trans('view.capacity'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('pin_type', trans('view.type'), ['class' => 'label'])!!}
                {!!Form::text('pin_type', $value = '', $attributes = ['placeholder' => trans('view.type'), 'class' => 'form-control'])!!}
            </li>
            <li>
                {!!Form::label('pin_technology', trans('view.technology'), ['class' => 'label'])!!}
                {!!Form::text('pin_technology', $value = '', $attributes = ['placeholder' => trans('view.technology'), 'class' => 'form-control'])!!}
            </li>
            {!!Form::label('technicals', trans('view.technicals'), ['class' => 'label head'])!!}
            <li>
                <div class="well col-xs-6 list-tech" style="max-height: 100px;overflow: auto;">
                    <ul class="list-group checked-list-box">
                        @foreach($technicals as $technical)

                        <li class="list-group-item">
                            {!! Form::checkbox('technicals[]', $technical['id']) !!}
                            {{ $technical['name'] }} 
                        </li> 
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                {!!Form::label('image', trans('view.avatar'), ['class' => 'label head'])!!}
                <img id="blah" src="" alt="your image" width="70px" />
                {!!Form::file('image', ['id' => 'imgInp'])!!}   
            </li>
            <li>
                {!!Form::label('image_list', trans('view.image_list'), ['class' => 'label head'])!!}
                {!!Form::file('image_list[]', ['multiple'])!!}

            </li>
            <li>{!!Form::submit(trans('view.update'), ['class' => 'btn btn-warning'])!!}</li>
        </ul>
        {!!Form::close()!!}
    </div>
@endsection
