@extends('layouts.app')
@section('content')
<div class="mt-4 px-4">
    <div class="card shadow rounded p-3">
        <form action="{{ route('admin.orders.all') }}" method="get">

            <div class="row align-items-center">
                <div class="form-group col-lg-4">
                    <label for="orderId">Order Id</label>
                    <input id="orderId" type="text" class="form-control" placeholder="Order Id"
                        value="{{ request()->order_id }}" name="order_id">
                </div>
                <div class="form-group col-lg-4">
                    <label for="from">From Date</label>
                    <input type="date" id="from" class="form-control" name="from" value="{{ request()->from }}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="to">To Date</label>
                    <input type="date" class="form-control" name="to" id="to" value="{{ request()->to }}">
                </div>
                <div class="form-group col-lg-4 mt-2">
                    <label for="transaction">Transaction ID</label>
                    <input id="transaction" type="text" class="form-control" placeholder="Transaction Id"
                        name="transaction" value="{{ request()->transaction }}">
                </div>
                <div class="form-group col-lg-3 mt-2">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option {{ request()->status == "Complete" ? 'selected' : '' }} value="Complete">Paid
                        </option>
                        <option {{ request()->status == "Processing" ? 'selected' : '' }} value="delivered">Delivered
                        </option>
                        <option {{ request()->status == "Processing" ? 'selected' : '' }} value="Processing">Processing
                        </option>
                        <option {{ request()->status == "Processing" ? 'selected' : '' }} value="Pending">Pending
                        </option>
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-2">
                    <label for="type">Book Type</label>
                    <select id="type" name="type" class="form-control">
                        <option value="{{ null }}">All</option>
                        <option {{ request()->type == 1 ? "selected" : '' }} value="1">Ebook</option>
                        <option {{ request()->type === "0" ? "selected" : '' }} value="0">Physical</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <br>
                    <button class="btn btn-outline-primary rounded-0 w-100">Filter</button>
                </div>


            </div>
        </form>
    </div>


    {{-- * ALL ORDERS --}}
    <div class="card shadow border-0 rounded my-5">
        <div class="row">
            @foreach ($orders as $order)
            <div class="col-xxl-6">
                <div class="rounded shadow py-3 px-4 bg-light my-3  bgImage">
                    <div class="row justify-between pt-3 align-items-center">

                        <div class="col-sm-6 d-flex align-items-center">
                            <h4 class="me-3">Order No: #{{ $order->id }} </h4>
                            @if ($order->status == "Complete" || $order->status == "delivered")
                            <span class="rounded-0 btn btn-success">Paid</span>
                            @else
                            <span class="rounded-0 btn btn-danger">Un-Paid</span>

                            @endif
                        </div>
                        <p class="text-sm-end col-sm-6">Transaction ID: {{ $order->transaction_id }}</p>
                    </div>
                    <hr>
                    <strong>Date : {{ Carbon\Carbon::parse($order->created_at)->format("d / M / y") }}</strong>
                    <p>Customer Name: <strong>{{ str($order->name)->headline() }}</strong></p>
                    <p>Customer Email: <strong>{{ $order->email}}</strong></p>
                    <p>Customer Phone: <strong>{{ $order->phone}}</strong></p>
                    <p>Customer Post-Code: <strong>{{ $order->post_code}}</strong></p>
                    <p>Customer Address: <strong>{{ $order->address}}</strong></p>
                    <p>Number of Items: {{ $order->totalItems }} {{ $order->totalItems == 1 ? "piece" : "pieces" }}</p>
                    <hr>
                    <br>
                    <h5 class="float-end btn btn-outline-primary">Total Price: {{ $order->amount }} tk</h5>

                    <div class="btn-group">
                        <a target="__blank" href="{{ route('admin.orders.view', $order->id) }}"
                            class="btn text-light d-flex align-items-center" style="background:#4A6CF7;">View
                            Invoice <i class="lni lni-eye ms-2"></i></a>
                        @if ($order->status == 'Processing' || $order->status == 'Pending')

                        <a href="{{ route('admin.orders.paid', $order->id) }}" class="btn d-flex align-items-center"
                            style="background: rgb(134, 255, 134)">Mark as Paid <i class="lni lni-coin ms-2"></i></a>
                        @endif
                        @if ($order->status == 'Complete')

                        <a href="{{ route('admin.orders.deliver', $order->id) }}"
                            class="btn btn-warning d-flex align-items-center">Mark as Delivered <i
                                class="lni lni-delivery ms-2"></i></a>
                        @endif
                        <a href="#" class="btn btn-danger deleteOrderBtn" style="border-radius: 0 5px 5px 0">
                            Delete Order
                        </a>
                        <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                    <br>
                    <br>
                </div>
            </div>
            @endforeach
        </div>

    </div>



</div>
@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.deleteOrderBtn').click(function(){

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                 $(this).next('form').submit()
                
            }
        })

        })
</script>
@endpush
@endsection