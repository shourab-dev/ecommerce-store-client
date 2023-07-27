@extends('layouts.app')
@section('content')
<div class="p-4">
    <h2>All Books</h2>

    <div class="card border-0 mt-5">
        <div class="table-responsive table-wrapper">
            <table class="table text-center">
                <tr class="bg-light">
                    <th>#</th>

                    <th colspan="2">Book Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Selling Price</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Featured</th>

                    <th></th>
                </tr>
                @forelse ($books as $key=>$book)
                <tr>
                    <td>{{ $books->firstItem() + $key }}</td>
                    <td class="col">
                        <img src="{{ $book->thumbnail }}" alt=""
                            style="width: 50px;height:50px;object-fit:cover;margin:auto;">
                    </td>
                    <td class="text-start">{{ $book->title }}</td>
                    <td>{{ $book->class->name ?? '' }}
                        {{ $book->subject->name ?? '' }}
                    </td>
                    <td>
                        @if ($book->selling_price)
                        <span style="text-decoration: line-through">{{ $book->price }} tk</span>
                        @elseif ($book->price != null)
                        <span class="status-btn success-btn">{{ $book->price }} tk</span>
                        @else 
                        
                        <span >{{ "Free" }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($book->selling_price)
                        <span class="status-btn success-btn">{{ $book->selling_price }} tk</span>
                        @else
                        --
                        @endif
                    </td>
                    <td>
                        <span class="status-btn active-btn">{{ $book->is_ebook == 1 ? "Ebook" : "Physical" }}</span>
                    </td>
                    <td style="width: 50px">

                        <div class="form-check form-switch toggle-switch d-flex justify-content-center">
                            <input class="form-check-input bookStatusBtn" data-id="{{ $book->id }}" type="checkbox"
                                value="{{ true }}" id="toggleSwitch2" {{ $book->status == 1 ? "checked" : '' }} >
                        </div>
                    </td>
                    <td style="width: 150px">
                        <a href="{{ route('admin.books.featured',$book->id) }}" class="featuredBtn">
                            <i style="font-size: 1.5rem;" class="lni lni-star-{{ $book->is_featured == 0 ? "empty" : "fill" }} text-warning"></i>
                        </a>
                    </td>
                    <td style="width:50px">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-primary"><i
                                class="lni lni-pencil"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No Books Found!</td>
                </tr>
                @endforelse


            </table>
        </div>
    </div>
    <div class="mt-4">{{ $books->links() }}</div>

</div>


@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){

            //* AJAX STATUS BUTTON
            $('.bookStatusBtn').change(function(){
                let id = $(this).attr('data-id')
                let url = `{{ route("admin.books.status","::id") }}`;
                url = url.replace('::id', id);
                
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(res){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 1000,
                        })
                        
                        Toast.fire({
                            icon: 'success',
                            title: res,
                        })
                    },
                });

            })

        })
</script>
@endpush
@endsection