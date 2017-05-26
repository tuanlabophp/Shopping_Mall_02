@extends('sites.master')
@section('title')

    {{ trans('view.app_name') }}

@endsection
@section('content')
    @include('sites._components.top_banner')
    @include('sites._components.filter')
    @include('sites._components.product_tab')
    @include('sites._components.viewed')
    @include('sites._components.top_brands')
    {{-- @include('sites._components.compare') --}}
    <div class="w3-container  w3-center comparePanle"></div>
    <div id="id01" class="w3-animate-zoom w3-white w3-modal modPos"></div>
    {{-- @include('sites._components.compare_page') --}}
@endsection
