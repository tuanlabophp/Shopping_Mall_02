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
                        <a href="#" class="btn btn-primary">{{ trans('view.add_order') }}</a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('view.name') }}</th>
                                    <th>{{ trans('view.email') }}</th>
                                    <th>{{ trans('view.address') }}</th>
                                    <th>{{ trans('view.phone') }}</th>
                                    <th>{{ trans('view.status') }}</th>
                                    <th>{{ trans('view.payment') }}</th>
                                    <th>{{ trans('view.shipper_id') }}</th>
                                    <th>{{ trans('view.deliver_id') }}</th>
                                    <th>{{ trans('view.note') }}</th>
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
                                        <td>{{ $orders->payment }}</td>
                                        <td>{{ $orders->shipper_id }}</td>
                                        <td>{{ $orders->deliver_id }}</td>
                                        <td>{{ $orders->note }}</td>
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
