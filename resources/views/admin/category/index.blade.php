@extends("admin.master")
@section("title")
    {{ trans('view.manage_categories') }}
@endsection
@section('content')

<section class="content-header">
    <h1>{{ trans('view.manage_categories') }}</h1>
</section> 
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
            <a href="{{ asset(config('setup.category_path') . '/create') }}" class="btn btn-primary">{{ trans('view.create') }}</a> 
                <thead>
                    <tr>
                        <th>{{ trans('view.id') }}</th>
                        <th>{{ trans('view.name') }}</th>
                        <th>{{ trans('view.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td><a  class = "btn btn-warning" href="{{ asset(config('setup.category_path') . '/' . $category['id'] . '/edit')}}">{{ trans('view.edit') }}</a>
                            {!! Form::open(['route' => ['admin.category.destroy', $category['id']], 'method' => 'delete', 'id' => 'form-delete']) !!}
                            {!! Form::submit(trans('view.delete'), ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
