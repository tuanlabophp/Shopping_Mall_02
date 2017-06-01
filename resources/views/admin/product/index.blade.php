@extends("admin.master")
@section("title")

    {{ trans('view.products_management') }}

@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
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
                        <a href="{{ asset(config('setup.product_path') . '/create') }}" class="btn btn-primary">{{ trans('view.create') }}</a>
                        <thead>
                            <tr>
                                <th>{{ trans('view.id') }}</th>
                                <th>{{ trans('view.image') }}</th>
                                <th>{{ trans('view.name') }}</th>
                                <th>{{ trans('view.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>
                                @foreach ($product->productImages as $image)
                                    @if ($image['is_main'] == 1)
                                        <img src="{{ asset(config('setup.product_image_path') . '/' . $image['path_origin']) }}" alt="" width="30px">
                                        @break;
                                    @endif
                                @endforeach
                                <td>{{ $product['name'] }}</td>
                                <td>
                                    <a class= 'btn btn-warning' href="{{ asset('admin/product' . '/' . $product['id'] . '/edit') }} " >{{ trans('view.edit') }}</a>
                                    {!! Form::open(['route' => ['admin.product.destroy', $product['id']], 'method' => 'delete', 'id' => 'form-delete']) !!}
                                    {!! Form::submit(trans('view.delete'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection
