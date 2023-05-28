@extends('layouts.app')
@section('content')
@push('customCss')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .selection,
    .select2-container {
        position: relative;
        z-index: 2;
        float: left;
        width: 100% !important;
        margin-bottom: 0;
        display: table;
        table-layout: fixed;
    }
</style>
@endpush
<div class="container  py-3">
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf



        <div class="row justify-content-between">
            <div class="col-lg-8">
                <div class="form-group my-2">
                    <label for="name">Book Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="detail">Book Details</label>
                    <textarea name="detail" id="detail" style="min-height: 250px" class="form-control"></textarea>
                    @error('detail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group my-2 col-lg-4">
                        <label for="type">Book Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="{{ true }}">Paid</option>
                            <option value="{{ false }}">Free</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2 col-lg-4">
                        <label for="price">Book Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Example: 240 tk">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2 col-lg-4">
                        <label for="sellPrice">Sell Price Book Price</label>
                        <input type="number" id="sellPrice" name="sellPrice" class="form-control"
                            placeholder="Example: 90 tk">
                            @error('sellPrice')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>

                <button class="btn btn-primary w-100 rounded-0 mt-3">Add Book</button>
            </div>
            <div class="col-lg-4">
                <div class="form-group my-2 ">
                    <label for="lang">Book Language</label>
                    <input type="text" id="lang" name="lang" class="form-control" placeholder="Bangla | English">
                </div>
                <div class="form-group my-2">
                    <label for="author">Author </label>
                    <select name="author" style="width: 100%" id="author">

                    </select>
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group my-2">
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
                <div class="form-group my-2">
                    <label for="classRoom">Class <span class="text-danger">*</span></label>
                    <select name="classRoom" id="classRoom" class="form-control">
                        <option disabled selected>Select Class</option>
                    </select>
                    @error('classRoom')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="subject">Subject <span class="text-danger">*</span></label>
                    <select name="subject" id="subject" class="form-control">
                       <option disabled selected>Select Subjects</option>
                    </select>
                    @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group my-2">
                    <label for="thubnail">Thumbnail Image <span class="text-danger">*</span></label>
                    <input type="file" name="thumbnail" id="thubnail" class="form-control">
                    @error('thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="demoPdf">Demo PDF </label>
                    <input type="file" name="demoPdf" id="demoPdf" class="form-control">
                    @error('demoPdf')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="book">Main PDF <span class="text-danger">*</span></label>
                    <input type="file" name="book" id="book" class="form-control">
                    @error('book')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>
        </div>




    </form>
</div>
@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#author').select2({
           width: 'element',
           placeholder: "Search Here...",

            ajax: {
                url: '{{ route("role.authors") }}',
                method: 'get',
                dataType: 'json',
                data: function (params) {
                var query = params.term
                
                // Query parameters will be ?search=[term]&type=public
                return {name:query};
            },
            processResults: function (data) {
               
            
                
                return {
                  results: $.map(data, function (item) {
                    return {
                    text: item.name,
                    id: item.id,
                    
                    }
                })
                    
                };
            }

    }});
    const price = $('input[name="price"]')
    const sellPrice = $('input[name="sellPrice"]')
    $('#type').change(function(){
        const value = $(this).val()
        if(value == 1){   
            price.prop("disabled", false);
            sellPrice.prop("disabled", false);
        }else{
            price.prop("disabled", true);
            sellPrice.prop("disabled", true);
        }
    })
</script>
<script>
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
    $('select[name="subject"]').empty()
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
</script>
@endpush
@endsection