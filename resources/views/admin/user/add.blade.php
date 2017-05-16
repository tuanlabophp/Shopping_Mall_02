@extends("admin.master")
@section("title")

    {{ trans('view.add_product') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>{{ trans('view.users_management') }}</h1>
        
        {!!Form::open(['url' => asset('admin/user'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <table class="table">
            <tr>
                <td>{!!Form::label('l_name', trans('view.l_name'))!!}</td>
                <td>{!!Form::text('l_name', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('f_name', trans('view.f_name'))!!}</td>
                <td>{!!Form::text('f_name', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('email', trans('view.email'))!!}</td>
                <td>{!!Form::text('email', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('address', trans('view.address'))!!}</td>
                <td>{!!Form::text('address', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('phone', trans('view.phone'))!!}</td>
                <td>{!!Form::text('phone', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('avatar', trans('view.avatar'))!!}</td>
                <td>{!!Form::file('avatar', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('sex', trans('view.sex'))!!}</td>
                <td>{!!Form::text('sex', $value = '')!!}</td>
            </tr>
            <tr>
                <td>{!!Form::label('rule', trans('view.rule'))!!}</td>
                <td>{!!Form::text('rule', $value = '')!!}</td>
            </tr>
        </table>
        {!!Form::submit(trans('view.add'))!!}
        {!!Form::close()!!}
    </section>
@endsection
