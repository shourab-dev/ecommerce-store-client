@extends('layouts.app')
@section('content')
@push('customCss')
<link rel="stylesheet" href="{{ asset('backend/assets/css/nice-select2.css') }}">
<style>
    .nice-select {
        width: 100%;
        padding-top: 0;
    }
    #country,
    #type {
        display: none;
    }
</style>
@endpush

<div class="container px-2 py-3">
    <form enctype="multipart/form-data" action="{{ route('admin.questions.store') }}" method="POST"
        class="card border-0 shadow p-3 bg-light">
        @csrf
        <div class="form-group my-2">
            <label for="name">Question Title <span class="text-danger">*</span></label>
            <input name="name" type="text" placeholder="Example: BCS Exam Question | Scholl Entrance Exam"
                class="form-control mb-1" id="name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="row">
            <div class="form-group my-2 col-md-3">
                <label for="file">PDF Files</label>
                <input type="file" name="pdfs[]" id="file" class="form-control" multiple
                    accept=".pdf,.jpg,.png,.jpeg,.webp">
            </div>
            <div class="form-group my-2 col-md-3">
                <label for="country">Country <span class="text-danger">*</span></label>
                <select name="country" id="country" class="form-control">
                    
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>

                    @endforeach
                </select>
                @error('country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group my-2 col-md-3">
                <label for="type" class="d-block">Type <span class="text-danger">*</span></label>
                <select name="type[]" id="type" multiple>


                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>

                    @endforeach
                </select>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group my-2 col-md-3">
                <label for="date">Question Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>


        </div>

        <div class="form-group my-2">
            <label for="question">Question Content</label>
            <textarea id="editor" name="question" id="question"></textarea>
        </div>


        <button class="my-2  ms-auto btn btn-primary">Upload Question</button>

    </form>
</div>


@push('customJs')
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script src="{{ asset('backend/assets/js/nice-select2.js') }}"></script>
<script>
    //* CLASSIC EDITOR
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
        console.error( error );
        } );



    //* INIT NICE SELECT 2 FOR TYPES
    let input = document.querySelector('#country')
    NiceSelect.bind(input, {searchable: true, placeholder: 'Select a Country'});

    //* INIT NICE SELECT 2 FOR TYPES
    let input2 = document.querySelector('#type')
    NiceSelect.bind(input2, {searchable: true, placeholder: 'Select Question Type'});
    
</script>
@endpush

@endsection