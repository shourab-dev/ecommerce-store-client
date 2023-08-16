@extends('layouts.customerAuthUi')
@section('customerUi')

<div class="p-4">
    <h2 class="mb-4">
        My Orders
    </h2>


    @forelse ($orders as $order)
    <div class="my-3">
        <div class="card p-3">

            <div class="row justify-content-between align-items-center">
                <div class="row align-items-center col-lg-5">
                    <h4 class="col-md-6">Order No <span>#{{ $order->id }}</span></h4>
                    @if ($order->status == 'Complete')
                    <span class="col-md-4 col-5 ms-2 my-2 my-lg-0 btn ms-lg-3"
                        style="background:rgba(247, 200, 0, 0.12);">
                        Processing
                    </span>
                    @elseif ($order->status == 'delivered')
                    <span class="col-md-4 col-5 ms-2 my-2 my-lg-0 btn ms-lg-3"
                        style="background:rgba(33, 150, 83, 0.12);color: #219653;">
                        Delivered
                    </span>
                    @endif
                </div>
                <p class="col-lg-7 text-lg-end">Transaction Id: {{ $order->transaction_id }}</p>
            </div>
            <hr>
            <div>
                <h5>Customer Name: {{ str($order->name)->headline() }}</h5>
                <p>Phone: {{ $order->phone }}</p>
                <p>Delivery Address: {{ $order->address }}</p>
                <p>Total Amount: {{ $order->amount }}tk</p>
                <p>Order Placed on: {{ Carbon\Carbon::parse($order->created_at)->format('d M - Y') }} </p>
            </div>
            <hr>
            @foreach ($order->orderItems as $item)

            <div>
                <div class="row align-items-center">
                    <div class="col-lg-2 col-5">
                        <img src="{{ $item->book->thumbnail }}" alt="" style="width: 100%;max-width:120px">
                    </div>
                    <div class="col p-0">
                        <p>{{ $item->book->title }}</p>
                        <p><strong>{{ $item->sold_price }} tk</strong></p>
                        <p>* {{ $item->total_orders }}</p>
                        <h5>Sub Total: {{ $item->sold_price * $item->total_orders }} tk</h5>
                    </div>
                </div>
                <hr>
            </div>
            @endforeach


        </div>
    </div>

    @empty
    <h4 class="p-3 bg-light">No Books Found</h4>
    @endforelse


    <span>
        {{ $orders->links() }}
    </span>


</div>

@endsection