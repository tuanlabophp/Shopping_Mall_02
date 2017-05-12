@extends('admin.master')
@section('title')
    {{ trans('view.profile') }}
@endsection
@section('content')
    <table class="table">
        <thead>
            <td>{{ trans('view.name') }}</td>
            <td>{{ trans('view.email') }}</td>
            <td>{{ trans('view.sex') }}</td>
            <td>{{ trans('view.address') }}</td>
            <td>{{ trans('view.rule') }}</td>
        </thead>
        <tbody>
            <tr>
                <td>{{ Auth::user()->l_name }} {{ Auth::user()->f_name }}</td>
                <td>{{ Auth::user()->email }}</td>
                <td>{{ Auth::user()->sex }}</td>
                <td>{{ Auth::user()->address }}</td>
                <td>{{ Auth::user()->rule }}</td>
            </tr>
        </tbody>
    </table>
    
@endsection