@extends("sites.master")
@section("title")

    {{ trans('sites.view.users_login') }}

@endsection
@section('content')
    <!-- Main content -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="section register inner-left-xs">
                    @if(session()->has('success'))
                        <h3 class="alert alert-danger">{{ session()->get('fail') }}</h3>
                    @endif
                        <h2 class="bordered">{{ trans('sites.create_new_account') }}</h2>
                        <p>{{ trans('sites.create_your_own_mobile_phone_store_account') }}</p>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li> 
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['route' => 'register', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'register-form cf-style-1']) !!}
                            <div class="field-row">
                                <label>{{ trans('sites.email') }}</label>
                                {!!Form::email('email', $value = '', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.f_name') }}</label>
                                {!!Form::text('f_name', $value = '', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.l_name') }}</label>
                                {!!Form::text('l_name', $value = '', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.password') }}</label>
                                {!!Form::password('password_register', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.re_password') }}</label>
                                {!!Form::password('password_confirm', ['class' => 'le-input'])!!}
                            </div>
                            
                            {!!Form::submit(trans('sites.sign_up'), ['class' => 'le-button huge'])!!}
                        {!!Form::close()!!}
                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>

@endsection
