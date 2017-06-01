<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('sites.bill_of_shop') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    {{ Html::style('sites_custom/css/bill.css') }}
    {{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext') }}

</head>

<body>
    <header class="clearfix">
        <div class="container">
            <figure>
                
            </figure>
            <div class="company-address">
                <h2 class="title">{{ trans('sites.app_name') }}</h2>
                <p>{{ trans('sites.address') }}</p>
            </div>
            <div class="company-contact">
                <div class="phone left">
                    
                    <span class="helper"></span>
                </div>
                <div class="email right">
                    <a href="mailto:">{{ trans('sites.contact_email') }}</a>
                    <span class="helper"></span>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="details clearfix">
                <div class="client left">
                    <p>{{ trans('sites.invoice_to') }}</p>
                <p class="name">{{ $orders->name }}</p>
                <p>{{ $orders->address }}</p>
                <a href="mailto:{{ $orders->address }}">{{ $orders->address }}</a>
            </div>
            <div class="">
                <div class="title">{{ trans('sites.invoice_id') }}:{{ $orders->id }}</div>
                <div class="date">
                    {{ trans('sites.date_of_invoice') }} {{ $orders->created_at }}<br>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="desc">{{ trans('sites.description') }}</th>
                    <th class="qty">{{ trans('sites.quantity') }}</th>
                    <th class="unit">{{ trans('sites.unit_price') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders->orderDetails as $products)
                <tr>
                    <td class="desc"><h3>{{ $products->product[0]->name }}</h3></td>
                    <td class="qty">{{ $products->quantity }}</td>
                    <td class="unit">{{ $products->price }}d</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="no-break">
            <table class="grand-total">
                <tbody>
                    <tr>
                        <td class="desc"></td>
                        <td class="qty"></td>
                        <td class="unit">{{ trans('sites.subtotal_cart') }}</td>
                        <td class="total">{{ $orderTotal }}d</td>
                    </tr>
                    <tr>
                        <td class="desc"></td>
                        <td class="qty"></td>
                        <td class="unit">{{ trans('sites.shipping') }}</td>
                        <td class="total">{{ trans('sites.free_ship') }}</td>
                    </tr>
                    <tr>
                        <td class="desc"></td>
                        <td class="unit" colspan="2">{{ trans('sites.order_total') }}</td>
                        <td class="total">{{ $orderTotal }}d</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="thanks">{{ trans('sites.thank_you') }}</div>
        <div class="notice">
            <div>{{ trans('sites.notice') }}</div>
            <div>{{ trans('sites.notice_text') }}</div>
        </div>
        <div class="end">{{ trans('sites.notice_text') }}</div>
    </div>
</footer>

</body>

</html>
