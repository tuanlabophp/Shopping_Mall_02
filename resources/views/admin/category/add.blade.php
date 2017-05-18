@extends("admin.master")
@section("title")
	{{ trans('view.add_category') }}
@endsection
@section('content')

<div class="container">
    <div class=""><h3>{{ trans('view.add_category') }}</h3></div>
        @if (count($errors))      
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach   
                </ul>
            </div>   
        @endif
    {!! Form::open(['route' => 'admin.category.store', 'method' => 'post']) !!}
    {!! Form::label('name', trans('view.name')) !!}
    {!! Form::text('name', $value = '', $attributes = ['placeholder' => trans('view.name')]) !!}
    {!! Form::label('parent_id', trans('view.parent_category')) !!}
    {!! Form::select('parent_id', $categories, null, ['placeholder' => 'none']) !!}
    {!! Form::submit(trans('view.add'), ['class' => 'btn btn-primary'] ) !!}
    {!! Form::close() !!}
</div>

@endsection
