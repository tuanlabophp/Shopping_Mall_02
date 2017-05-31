@extends('sites.master')
@section('title')

    {{ trans('view.app_name') }}

@endsection
@section('content')
    @include('sites._components.navigation')
    @include('sites._components.wishlist')       
    @include('sites._components.viewed')
@endsection
