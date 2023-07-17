@extends('layouts.app')
@section('content')
<div class="p-4">
    <h2>All Books</h2>

    <div class="card border-0 mt-5">
        <div class="table-responsive table-wrapper">
            <table class="table text-center">
                <tr class="bg-light">
                    <th>#</th>
                    
                    <th colspan="2" >Book Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Selling Price</th>
                    <th>Type</th>
                    <th></th>
                </tr>
                @forelse ($books as $key=>$book)
                <tr>
                    <td>{{ $books->firstItem() + $key }}</td>
                    <td class="col">
                        <img src="{{ $book->thumbnail }}" alt="" style="width: 50px;height:50px;object-fit:cover;margin:auto;">
                    </td>
                    <td class="text-start">{{ $book->title }}</td>
                    <td>{{ $book->class->name }}</td>
                    <td>
                        @if ($book->selling_price)
                        <span style="text-decoration: line-through">{{ $book->price }} tk</span> 
                       
                        @endif    
                    </td>
                    <td>
                        @if ($book->selling_price)
                         <span class="status-btn success-btn">{{ $book->selling_price }} tk</span>
                       
                        @endif
                    </td>
                    <td>
                        <span class="status-btn active-btn">{{ $book->is_ebook == 1 ?  "Ebook" : "Physical" }}</span>
                    </td>
                    <td class="col-1">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-primary"><i class="lni lni-pencil"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No Books Found!</td>
                </tr>
                @endforelse
               

            </table>
        </div>
    </div>
    <div class="mt-4">{{ $books->links() }}</div>

</div>
@endsection