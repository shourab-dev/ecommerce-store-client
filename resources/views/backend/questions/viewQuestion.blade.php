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
    <form enctype="multipart/form-data" action="{{ route("admin.questions.update",$question->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-around">
            <div class="card border-0 shadow p-3 bg-light col-lg-7">
                <div class="form-group my-2">
                    <label for="name">Question Title <span class="text-danger">*</span></label>
                    <input name="name" value="{{ $question->question_name }}" type="text" placeholder="Example: BCS Exam Question | Scholl Entrance Exam"
                        class="form-control mb-1" id="name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>




                <div class="form-group my-2">
                    <label for="question">Question Content</label>
                    <textarea id="editor" name="question" id="question">{{ $question->question }}</textarea>
                </div>


                <button class="my-2  ms-auto btn btn-primary">Update Question</button>
            </div>

            <div class="card border-0 shadow p-3 bg-light col-lg-4 align-self-start">
                <div class="row">
                    <div class="form-group my-2 ">
                        <div class="row mb-3">
                            @foreach ($question->pdfs as $key=>$pdf)
                                <p class="d-flex " style="width: fit-content">
                                    <a target="_blank" href="{{ route('frontend.questions.single', $question->slug) }}" class="btn rounded-0 btn-outline-dark">({{ ++$key }}) Ques</a>
                                    <a href="{{ route('admin.questions.remove.pdf', ["id"=>$pdf->id,"questionId"=>$question->id]) }}" class="btn btn-dark rounded-0" class="ovedrlay">x</a>
                                </p>
                            @endforeach
                        </div>
                        <label for="file">PDF Files</label>
                        <input type="file" name="pdfs[]" id="file" class="form-control" multiple
                            accept=".pdf,.jpg,.png,.jpeg,.webp">
                    </div>
                    <div class="form-group my-2 ">
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

                    <div class="form-group my-2 ">
                        <label for="class">Class <span class="text-danger">*</span></label>
                        <select name="classRoom" id="class" class="form-control">

                            <option value="{{ $question->classRoom->id }}">{{ $question->classRoom->name }}</option>
                        </select>
                        @error('classRoom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2 ">
                        <label for="subject">Subject <span class="text-danger">*</span></label>
                        <select name="subject" id="subject" class="form-control">

                            <option value="{{ $question->subject->id }}">{{ $question->subject->name }}</option>
                        </select>
                        @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group my-2 ">
                        <label for="type" class="d-block">Type <span class="text-danger">*</span></label>
                        <select name="type[]" id="type" multiple>


                            @foreach ($types as $type)
                            
                            <option {{ array_search($type->id, $selectedTypes) !== false ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>

                            @endforeach
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2 ">
                        <label for="date">Question Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $question->date }}">
                    </div>


                </div>
            </div>
        </div>
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
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(function(){
    $('select[name="country"]').change(function(e){
        
        let selectCountry = $(this).val()

        $.ajax({
            url: "{{ route('admin.questions.classes') }}",
            method: 'GET',
            data: {
                country: selectCountry
            },

            success: function(data){
                $('select[name="classRoom"]').empty()
                let res = JSON.parse(data)
                res.map(option => {
                    $('select[name="classRoom"]').append(`<option value="${option.id}">${option.name}</option>`)
                })
            },
            error: function(err){
                
                $('select[name="classRoom"]').empty()
                $('select[name="classRoom"]').append(`<option value="">${err.responseText}</option>`)
            }
        })

    })


    $('select[name="classRoom"]').change(function(e){
        let selectClass = $(this).val()
        
        $.ajax({
        url: "{{ route('admin.questions.subjects') }}",
        method: 'GET',
        data: {
        class: selectClass
        },
        
        success: function(data){
        $('select[name="subject"]').empty()
        let res = JSON.parse(data)
        res.map(option => {
        $('select[name="subject"]').append(`<option value="${option.id}">${option.name}</option>`)
        })
        },
        error: function(err){
        
        $('select[name="subject"]').empty()
        $('select[name="subject"]').append(`<option value="">${err.responseText}</option>`)
        }
        })
    })


 })
</script>
@endpush

@endsection