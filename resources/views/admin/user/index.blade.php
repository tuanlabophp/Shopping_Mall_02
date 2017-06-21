@extends("admin.master")
@section("title")

    {{ trans('view.users_management') }}

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header"><h3 class="box-title"></h3></div>
                    <div class="box-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('fail'))
                            <div class="alert alert-danger">
                            {{ session()->get('fail') }}
                            </div>
                        @endif
                    
                        <a href="{{ asset('admin/user/create')}}" class="btn btn-primary">{{ trans('view.create') }}</a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('view.full_name') }}</th>
                                    <th>{{ trans('view.email') }}</th>
                                    <th>{{ trans('view.address') }}</th>
                                    <th>{{ trans('view.avatar') }}</th>
                                    <th>{{ trans('view.sex') }}</th>
                                    <th>{{ trans('view.rule') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($user)
                                    @foreach($user as $users)
                                    <tr>
                                        <td>{{ $users->f_name}} {{ $users->l_name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->address }}</td>
                                        <td><img src="{{ asset(config('setup.user_avatar')) }}" alt="" width="30px"></td>
                                        <td>{{ $users->sex == 1 ? trans('view.male') : trans('view.female')}}</td>
                                        <td>{{ $users->rule == 1 ? trans('view.rule_admin') : trans('view.rule_user')}}</td>
                                        <td>
                                            <button class="btn btn-warning"><a href="{{ asset('admin/user' . '/' . $users['id'] . '/edit') }}">{{ trans('view.edit') }}</a></button>
                                            {!! Form::open(['route' => ['admin.user.destroy', $users['id']], 'method' => 'delete', 'id' => 'form-delete']) !!}
                                    {!! Form::submit(trans('view.delete'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ trans('view.can_not_find_record') }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="5" class="text-center">{{ $user->links() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
