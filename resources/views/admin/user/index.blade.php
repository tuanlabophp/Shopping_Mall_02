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
                        <a href="#" class="btn btn-primary">{{ trans('view.add_user') }}</a>
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
                                @if(count($user) > 0)
                                    @foreach($user as $users)
                                    <tr>
                                        <td>{{ $users->f_name}} {{ $users->l_name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->address }}</td>
                                        <td><img src="{{ asset('images').'/'.$users->avatar }}" alt="" height="50px"></td>
                                        <td>{{ $users->sex == 1 ? 'Nam' : 'Nữ'}}</td>
                                        <td>{{ $users->rule }}</td>
                                        <td>
                                            <button class="btn btn-warning"><a href="">Edit</a></button>
                                            <button class="btn btn-danger">Delete</button>
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
                            <!-- <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
