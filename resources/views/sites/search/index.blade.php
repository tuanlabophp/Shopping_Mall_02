@extends('sites.master')
@section('title')

    {{ trans('view.app_search') }}

@endsection
@section('content')
    @include('sites._components.navigation')
    <h2 class="container">
        {{ trans('sites.found') }} :
        {{ $products->count() }}
    </h2>
    @include('sites._components.search')
@endsection
