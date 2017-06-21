@extends("admin.master")
@section("title")

    {{ trans('view.orders_management') }}

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
                        
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('view.username') }}</th>
                                    <th>{{ trans('view.email') }}</th>
                                    <th>{{ trans('view.address') }}</th>
                                    <th>{{ trans('view.phone') }}</th>
                                    <th>{{ trans('view.note') }}</th>
                                    <th>{{ trans('view.created_at') }}</th>
                                    <th>{{ trans('view.updated_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($order) > 0)
                                    @foreach($order as $orders)
                                    <tr>
                                        <td>{{ $orders->name}}</td>
                                        <td>{{ $orders->email }}</td>
                                        <td>{{ $orders->address }}</td>
                                        <td>{{ $orders->phone }}</td>
                                        <td>{{ $orders->note }}</td>
                                        <td>{{ $orders->created_at }}</td>
                                        <td>{{ $orders->updated_at }}</td>
                                        <td>
                                            <button class="btn btn-warning"><a href="{{ asset('admin/order' . '/' . $orders['id'] . '/edit') }}">{{ trans('view.edit') }}</a></button>
                                            {!! Form::open(['route' => ['admin.order.destroy', $orders['id']], 'method' => 'delete', 'id' => 'form-delete']) !!}
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
                                    <td colspan="5" class="text-center">{{ $order->links() }}</td>
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
