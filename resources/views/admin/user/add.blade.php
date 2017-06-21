@extends("admin.master")
@section("title")

    {{ trans('view.add_user') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>{{ trans('view.users_management') }}</h1>
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
            
            {!!Form::open(['route' => 'admin.user.store', 'method' => 'post', 'enctype' => 'multipart/form-data'], ['class' => 'form-group']) !!}
            <table class="table">
                <tr>
                    <td>{!!Form::label('l_name', trans('view.l_name'))!!}</td>
                    <td>{!!Form::text('l_name', $value = '', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('f_name', trans('view.f_name'))!!}</td>
                    <td>{!!Form::text('f_name', $value = '', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('email', trans('view.email'))!!}</td>
                    <td>{!!Form::text('email', $value = '', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('password', trans('view.password'))!!}</td>
                    <td>{!!Form::password('password', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('confirm_password', trans('view.confirm_password'))!!}</td>
                    <td>{!!Form::password('confirm_password',  ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('address', trans('view.address'))!!}</td>
                    <td>{!!Form::text('address', $value = '', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('phone', trans('view.phone'))!!}</td>
                    <td>{!!Form::text('phone', $value = '', ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('avatar', trans('view.avatar'))!!}</td>
                    <td>{!!Form::file('avatar', $value = '')!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('sex', trans('view.sex'))!!}</td>
                    <td>{!!Form::select('sex', [
                            '1' => trans('view.male'),
                            '2' => trans('view.female'),
                            '3' => trans('view.unknow'),
                        ],
                        null, ['placeholder' => trans('view.sex')], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('rule', trans('view.rule'))!!}</td>
                    <td>{!!Form::select('rule', [
                            '1' => trans('view.rule_admin'),
                            '0' => trans('view.rule_user'),
                        ],
                        null, ['placeholder' => trans('view.rule')], ['class' => 'form-control'])!!}</td>
                </tr>
            </table>
            {!!Form::submit(trans('view.add'), ['class' => 'btn btn-success'])!!}
            {!!Form::close()!!}
        </div>
    </section>
@endsection
