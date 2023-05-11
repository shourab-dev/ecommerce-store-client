@extends('layouts.app')
@section('content')

<div class="container px-2 py-3">
    <form action="" class="card border-0 shadow p-3 bg-light">
        @csrf
        <div class="form-group my-2">
            <label for="name">Question Title</label>
            <input name="name" type="text" placeholder="Example: BCS Exam Question | Scholl Entrance Exam" class="form-control mb-1" id="name" >
        </div>
        <div class="form-group my-2">
            <label for="question">Question Content</label>
            <textarea id="editor" name="question" id="question" ></textarea>
        </div>
    </form>
</div>


@push('customJs')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
        console.error( error );
        } );
    </script>
@endpush

@endsection