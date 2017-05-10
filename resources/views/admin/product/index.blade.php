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
                <div class="box-header"><h3 class="box-title"></h3></div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('view.id') }}</th>
                                <th>{{ trans('view.image') }}</th>
                                <th>{{ trans('view.name') }}</th>
                                <th>{{ trans('view.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet Explorer 4.0</td>
                                <td>Internet Explorer 4.0</td>
                                <td>
                                    <button class="btn btn-warning"><a href="">Edit</a></button>
                                    <button class="btn btn-danger">Delete</button>
                                    <button class="btn btn-primary">Add</button>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection
