<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice {{ env('APP_NAME') }}</title>
    <style>
        .orderItems>tr>th,
        .orderItems>tr>td {
            border: 1px solid #eee;
        }
    </style>
</head>

<body>


    <table width="100%" style="font-family: Arial, Helvetica, sans-serif;">
        <tr>
            <td style="border-bottom:1px solid #ddd;">
                <table width="100%" style="margin: 15px 0">
                    <tr>
                        <td width="50%">
                            <a href="{{ url('/') }}"><img width="80px" src="{{ public_path(" frontend/logo.png") }}"
                                    alt=""></a>
                        </td>
                        <td width="50%" align="right" style="font-family: Arial, Helvetica, sans-serif">
                            <p style="font-size: 25px;">Invoice</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #ddd;">
                <table width="100%">
                    <tr>
                        <td width="50%" style="font-family: Arial, Helvetica, sans-serif">
                            <p>Date: {{ Carbon\Carbon::parse($order->created_at)->format("d-m-y") ??
                                today()->format('d-m-y') }}</p>
                        </td>
                        <td width="50%" align="right" style="font-family: Arial, Helvetica, sans-serif">
                            <p>Invoice No: {{ $order->id }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" style="margin: 15px 0">
                    <tr>
                        <td width="50%" style="font-family: Arial, Helvetica, sans-serif">
                            <strong>Invoice To: </strong>
                            <address style="font-style: normal;color:#888">
                                {{ str($order->name)->headline() }}
                                <br>
                                {{ $order->address }}
                                <br>
                                Bangladesh
                            </address>
                        </td>
                        <td width="50%" align="right" style="font-family: Arial, Helvetica, sans-serif">
                            <strong>Pay To:</strong>
                            <address style="font-style: normal;color:#888">
                                {{ config('app.name') }}<br />
                                2705 N. Enterprise St<br />
                                Orange, CA 92865<br />
                                contact@koiceinc.com
                            </address>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr>

            <td>


                <table width="100%" style="margin:20px 0;" class="orderItems" cellspacing="0" cellpadding="15">
                    <tr style="background: #ececec;">
                        <th>Book</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>

                    @foreach ($order->orderItems as $orderItem)
                    <tr style="text-align: center">
                        <td class="col-3">{{ $orderItem['book']['title'] }}</td>
                        <td class="col-4 text-center">{{ $orderItem->sold_price }} tk</td>
                        <td class="col-2 text-center">{{ $orderItem->total_orders }} </td>
                        <td class="col-2 text-end">{{ $orderItem->sold_price * $orderItem->total_orders }} tk</td>
                    </tr>
                    @endforeach
                    <tfoot style="background: #ececec;">
                        <tr>
                            <td align="right" colspan="3" class="text-end border-bottom-0"><strong>Total:</strong></td>
                            <td align="center" class="text-end border-bottom-0">{{ $order->amount }} tk</td>
                        </tr>
                    </tfoot>
                </table>


            </td>

        </tr>

        <tr>
            <td>
                <p style="color: #888;font-size: 14px; text-align:center;">NOTE : If you have any question please
                    contact with us. Thank you.</p>
            </td>
        </tr>


    </table>

</body>

</html>