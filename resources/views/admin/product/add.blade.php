@extends("admin.master")
@section("title")

    {{ trans('view.add_product') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>{{ trans('view.products_management') }}</h1>
        
        {!!Form::open(['url' => asset('admin/product'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <table class="table">
            <tr>
                <td>{!!Form::label('name', trans('view.Name'))!!}</td>
                <td>{!!Form::text('name', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('category', trans('view.category'))!!}</td>
                <td>{!!Form::select('animal', ['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']
                    ])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('display', trans('view.display'))!!}</td>
                <td>
                    {!!Form::text('display_size', $value = '', $attributes = ['placeholder' => trans('view.size')])!!}
                    {!!Form::text('display_type', $value = '', $attributes = ['placeholder' => trans('view.type')])!!}
                    {!!Form::text('display_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution')])!!}
                    {!!Form::text('display_protection', $value = '', $attributes = ['placeholder' => trans('view.protection')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('back_camera', trans('view.back_camera'))!!}</td>
                <td>
                    {!!Form::text('back_camera_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution')])!!}
                    {!!Form::text('back_camera_record', $value = '', $attributes = ['placeholder' => trans('view.video')])!!}
                    {!!Form::text('back_camera_flash', $value = '', $attributes = ['placeholder' => trans('view.flash')])!!}
                    {!!Form::text('back_camera_features', $value = '', $attributes = ['placeholder' => trans('view.features')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('front_camera', trans('view.front_camera'))!!}</td>
                <td>
                    {!!Form::text('front_camera_resolution', $value = '', $attributes = ['placeholder' => trans('view.resolution')])!!}
                    {!!Form::text('front_camera_record', $value = '', $attributes = ['placeholder' => trans('view.video')])!!}
                    {!!Form::text('front_camera_flash', $value = '', $attributes = ['placeholder' => trans('view.flash')])!!}
                    {!!Form::text('front_camera_features', $value = '', $attributes = ['placeholder' => trans('view.features')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('profile', trans('view.os_cpu'))!!}</td>
                <td>
                    {!!Form::text('profile_os', $value = '', $attributes = ['placeholder' => trans('view.os')])!!}
                    {!!Form::text('profile_cpu', $value = '', $attributes = ['placeholder' => trans('view.chipset')])!!} 
                    {!!Form::text('profile_speed', $value = '', $attributes = ['placeholder' => trans('view.speed')])!!} 
                    {!!Form::text('profile_gpu', $value = '', $attributes = ['placeholder' => trans('view.gpu')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('memory', trans('view.memory'))!!}</td>
                <td>
                    {!!Form::text('memory_ram', $value = '', $attributes = ['placeholder' => trans('view.ram')])!!}
                    {!!Form::text('memory_rom', $value = '', $attributes = ['placeholder' => trans('view.rom')])!!}
                    {!!Form::text('memorycard', $value = '', $attributes = ['placeholder' => trans('view.card')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('connect', trans('view.connect'))!!}</td>
                <td>
                    {!!Form::text('connect_network', $value = '', $attributes = ['placeholder' => trans('view.network')])!!}
                    {!!Form::text('connect_sim', $value = '', $attributes = ['placeholder' => trans('view.sim')])!!}
                    {!!Form::text('connect_wifi', $value = '', $attributes = ['placeholder' => trans('view.wifi')])!!}
                    {!!Form::text('connect_gps', $value = '', $attributes = ['placeholder' => trans('view.gps')])!!}
                    {!!Form::text('connect_bluetooth', $value = '', $attributes = ['placeholder' => trans('view.bluetooth')])!!}
                    {!!Form::text('connect_usb', $value = '', $attributes = ['placeholder' => trans('view.usb')])!!}
                    {!!Form::text('connect_more', $value = '', $attributes = ['placeholder' => trans('view.more_connect')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('design', trans('view.design'))!!}</td>
                <td>
                    {!!Form::text('design_type', $value = '', $attributes = ['placeholder' => trans('view.design_type')])!!}
                    {!!Form::text('design_material', $value = '', $attributes = ['placeholder' => trans('view.material')])!!}
                    {!!Form::text('design_size', $value = '', $attributes = ['placeholder' => trans('view.size')])!!}
                    {!!Form::text('design_weight', $value = '', $attributes = ['placeholder' => trans('view.wieght')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('pin', trans('view.pin'))!!}</td>
                <td>
                    {!!Form::text('pin_capacity', $value = '', $attributes = ['placeholder' => trans('view.capacity')])!!}
                    {!!Form::text('pin_type', $value = '', $attributes = ['placeholder' => trans('view.type')])!!}
                    {!!Form::text('pin_technology', $value = '', $attributes = ['placeholder' => trans('view.technology')])!!}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('technicals', trans('view.technicals'))!!}</td>
                <td>
                    {{-- {!!Form::checkbox('name', 'value', true)!!}         --}}
                </td>
            </tr>
            <tr>
                <td>{!!Form::label('image', trans('view.image'))!!}</td>
                <td>{!!Form::file('image')!!}</td>
            </tr>

        </table>
        {!!Form::submit(trans('view.add'))!!}
        {!!Form::close()!!}
    </section>
@endsection
