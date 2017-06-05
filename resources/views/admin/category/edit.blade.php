@extends("admin.master")
@section("title")
    {{ trans('view.edit_category') }}
@endsection
@section('content')

<div class="container">
    <div class=""><h3>{{ trans('view.edit_category') }}</h3></div>
        @if (count($errors))      
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach   
                </ul>
            </div>   
        @endif
    {!! Form::open(['route' => ['admin.category.update', $category['id']], 'method' => 'put']) !!}
    {!! Form::label('name', trans('view.name')) !!}
    {!! Form::text('name', $value = $category['name'], $attributes = ['placeholder' => trans('view.name')]) !!}
    {!! Form::submit(trans('view.update'), ['class' => 'btn btn-primary'] ) !!}
    {!! Form::close() !!}
</div>

@endsection
