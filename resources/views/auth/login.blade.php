@extends("sites.master")
@section("title")

    {{ trans('sites.users_login') }}

@endsection
@section('content')
    <!-- Main content -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">{{ trans('sites.sign_in') }}</h2>
                        <p>{{ trans('sites.hello_wellcome_to_your_account') }}</p>
                        {!! Form::open(['url' => asset('login'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'login-form cf-style-1']) !!}
                            <div class="field-row">
                                <label>{{ trans('sites.email') }}</label>
                                {!!Form::email('email', $value = '', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.password') }}</label>
                                {!!Form::password('password', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row clearfix">
                                <span class="pull-left">
                                    <label class="content-color">
                                        {!!Form::checkbox('remmember', $value = '', ['class' => 'le-checbox auto-width inline'])!!}
                                        <span class="bold">{{ trans('sites.remmember_me') }}</span>
                                    </label>
                                </span>
                                <span class="pull-right">
                                    <a href="#" class="content-color bold">{{ trans('sites.forgot_password') }}</a>
                                </span>
                            </div>
                            {!!Form::submit(trans('sites.sign_in'), ['class' => 'le-button huge'])!!}
                        {!!Form::close()!!}
                    </section>
                </div>

                <div class="col-md-6">
                    <section class="section register inner-left-xs">
                        <h2 class="bordered">{{ trans('sites.create_new_account') }}</h2>
                        <p>{{ trans('sites.create_your_own_mobile_phone_store_account') }}</p>

                        {!! Form::open(['url' => asset('register'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'register-form cf-style-1']) !!}
                            <div class="field-row">
                                <label>{{ trans('sites.email') }}</label>
                                {!!Form::email('email', $value = '', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.password') }}</label>
                                {!!Form::password('password', ['class' => 'le-input'])!!}
                            </div>
                            <div class="field-row">
                                <label>{{ trans('sites.re_password') }}</label>
                                {!!Form::password('password', ['class' => 'le-input'])!!}
                            </div>
                            
                            {!!Form::submit(trans('sites.sign_up'), ['class' => 'le-button huge'])!!}
                        {!!Form::close()!!}
                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>

@endsection
