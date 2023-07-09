@extends('layouts.customerAuthUi')
@section('customerUi')
@push('customerCss')
<style>
    .bgImage {
        background-image:
            linear-gradient(90deg,
                #fff 12px, 0,
                #99c9f8 15px, 0,
                #f1f5f9 20px, 0,
                #fff 100%);
        background-size: 32px 8px, 32px 16px, 32px 16px;
        background-repeat: space no-repeat;
        background-position: center top, center 6px, center 6px;

    }
</style>
@endpush
<div class="container mt-5">
    <div class="row justify-content-between">
        @forelse ($orders as $order)


        <div class="col-lg-6">
            <div class="rounded shadow py-3 px-4 bg-light my-3  bgImage">
                <div class="row justify-between pt-3 align-items-center">

                    <h4 class="col-sm-6">Order No: #{{ $order->id }}</h4>
                    <p class="text-sm-end col-sm-6">Transaction ID: {{ $order->transaction_id }}</p>
                </div>
                <hr>
                <p>Customer Name: <strong>{{ str($order->name)->headline() }}</strong></p>
                <p>Customer Email: <strong>{{ $order->email}}</strong></p>
                <p>Customer Phone: <strong>{{ $order->phone}}</strong></p>
                <p>Customer Post-Code: <strong>{{ $order->post_code}}</strong></p>
                <p>Customer Address: <strong>{{ $order->address}}</strong></p>
                <p>Number of Items: {{ $order->totalItems }} {{ $order->totalItems == 1 ? "piece" : "pieces" }}</p>
                <hr>
                <h5 class="float-end btn btn-outline-primary">Total Price: {{ $order->amount }} tk</h5>
                <a href="{{ route('send.invoice', $order->id) }}" class="btn btn-primary float-start">Donwload
                    Invoice</a>
                <br>
                <br>
            </div>
        </div>
        @empty
    </div>
    <h3>No Invoices found!</h3>
    @endforelse
    @if (count($orders)> 0)

    <div class="container">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection