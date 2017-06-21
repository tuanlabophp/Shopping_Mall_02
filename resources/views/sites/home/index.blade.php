@extends('sites.master')
@section('title')

    {{ trans('sites.app_name') }}

@endsection
@section('content')
    @include('sites._components.top_banner')
    @include('sites._components.filter')
    @include('sites._components.product_tab')
@endsection
