@extends('layouts.customerAuthUi')
@section('customerUi')

<div class="p-4">
    <h2 class="mb-4">
        My Orders
    </h2>

    <div class="row">
        @forelse ($orderBooks as $orderBook)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-img">
                    <img width="100%" src="{{ $orderBook->thumbnail }}" alt="{{ $orderBook->title }}">
                </div>
                <div class="card-body">
                    <h4 class="mb-3">{{ $orderBook->title}}</h4>
                    <span class="mb-3">Class 1</span> <span>ICT</span>
                    @if ($orderBook->is_ebook)
                    <a href="{{ route('user.myorder.book.view',$orderBook->id) }}" class="btn btn-primary w-100">View Book</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <h4 class="p-3 bg-light">No Books Found</h4>
        @endforelse

    </div>
</div>

@endsection