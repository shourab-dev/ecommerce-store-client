@extends('layouts.customerAuthUi')


@section('customerUi')

    <div class="container py-4">
        <h2>Welcome to {{ env('APP_NAME') }} {{ auth()->guard('user')->user()->name }}</h2>


        <br>
        <br>
        <br>
        <br>


        <h3>What's New</h3>
        <br>
        
        <div class="row gy-4">
            @forelse ($newBooks as $newBook)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-img">
                        <img width="100%" src="{{ $newBook->thumbnail }}" alt="{{ $newBook->title }}">
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">{{ $newBook->title}}</h4>
                        <span class="mb-3">{{ $newBook->class->name }}</span> 
                        
                        <a target="_blank" href="{{ route('frontend.product.show', $newBook->slug) }}" class="btn btn-outline-primary rounded-0 w-100">View
                            Book</a>
                        
                    </div>
                </div>
            </div>
            @empty
            <h4 class="p-3 bg-light">No Books Found</h4>
            @endforelse
        
        </div>
    </div>

@endsection