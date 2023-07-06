<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>Order Invoice - {{ env('APP_NAME') }}</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    {{--
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'> --}}

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('email/invoice.css') }}" />
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                    <img id="logo" width="80" src="{{ asset('frontend/logo.png') }}" title="{{ config('app.name') }}"
                        alt="{{ config('app.name') }}" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> {{
                    Carbon\Carbon::parse($order->created_at)->format("d-m-y") ?? today()->format('d-m-y') }}</div>
                <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> {{ $order->ordersId ??
                    Carbon\Carbon::parse($order->created_at)->format("Y").$order->id }}</div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                    <address>
                        {{ config('app.name') }}<br />
                        2705 N. Enterprise St<br />
                        Orange, CA 92865<br />
                        contact@koiceinc.com
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                    <address>
                        {{ str($order->name)->headline() }}<br />
                        {{ $order->address }}<br />

                        {{ "Bangladesh" }}
                    </address>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-3"><strong>Book</strong></td>
                                    <td class="col-2 text-center"><strong>Rate</strong></td>
                                    <td class="col-1 text-center"><strong>QTY</strong></td>
                                    <td class="col-2 text-end"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td class="col-3">{{ $orderItem['book']['title'] }}</td>
                                    <td class="col-4 text-center">{{ $orderItem->sold_price }} tk</td>
                                    <td class="col-2 text-center">{{ $orderItem->total_orders }} </td>
                                    <td class="col-2 text-end">{{ $orderItem->sold_price * $orderItem->total_orders }}
                                        tk</td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="3" class="text-end border-bottom-0"><strong>Total:</strong></td>
                                    <td class="text-end border-bottom-0">{{ $order->amount }} tk</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> If you have any question please contact with us. Thank you.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none">Print</a> <a href=""
                    class="btn btn-light border text-black-50 shadow-none">
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>