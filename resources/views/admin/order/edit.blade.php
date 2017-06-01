@extends("admin.master")
@section("title")

    {{ trans('view.edit_order') }}

@endsection
@section('content')
    <section class="content-header">
        <h1>{{ trans('view.orders_management') }}</h1>
        <div class="box box-primary">

            @if (count($errors))      
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach   
                    </ul>
                </div>    
            @endif
            
            {!!Form::open(['route' => ['admin.order.update', $order['id']], 'method' => 'put', 'enctype' => 'multipart/form-data'], ['class' => 'form-group']) !!}
            <table class="table">
                <tr>
                    <td>{!!Form::label('user_id', trans('view.user_id'))!!}</td>
                    <td>{!!Form::text('user_id', $value = $order['user_id'], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('email', trans('view.email'))!!}</td>
                    <td>{!!Form::text('email', $value = $order['email'], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('address', trans('view.address'))!!}</td>
                    <td>{!!Form::text('address', $value = $order['address'], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('phone', trans('view.phone'))!!}</td>
                    <td>{!!Form::text('phone', $value = $order['phone'], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('status', trans('view.status'))!!}</td>
                    <td>{!!Form::select('status', [
                            '0' => trans('view.pending'),
                            '1' => trans('view.shipped'),
                            '2' => trans('view.canceled'),
                            '3' => trans('view.expired'),
                        ],
                        null, ['placeholder' => trans('view.status')], ['class' => 'form-control'])!!}</td>
                </tr>
                <tr>
                    <td>{!!Form::label('payment', trans('view.payment'))!!}</td>
                    <td>{!!Form::select('payment', [
                            '0' => trans('view.cash'),
                            '1' => trans('view.credit_card'),
                        ],
                        null, ['placeholder' => trans('view.order_payment')], ['class' => 'form-control'])!!}</td>
                </tr>

                <tr>
                    <td>{!!Form::label('note', trans('view.note'))!!}</td>
                    <td>{!!Form::text('note', $value = $order['note'], ['class' => 'form-control'])!!}</td>
                </tr>
            </table>
            {!!Form::submit(trans('view.update'), ['class' => 'btn btn-success'])!!}
            {!!Form::close()!!}
        </div>
    </section>
@endsection
