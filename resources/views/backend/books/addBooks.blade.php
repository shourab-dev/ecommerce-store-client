@extends('layouts.app')
@section('content')
@push('customCss')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2 .selection,
    .select2 {
        width: 100% !important;

    }
</style>
@endpush
<div class="container  py-3">
    <form action="" method="POST">
        @csrf



        <div class="row justify-content-between">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="name">Book Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="detail">Book Details</label>
                    <textarea name="detail" id="detail" class="form-control"></textarea>
                </div>

                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="type">Book Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">Free</option>
                            <option value="">Paid</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="price">Book Price</label>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Example: 240 tk">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="sellPrice">Sell Price Book Price</label>
                        <input type="number" id="sellPrice" name="sellPrice" class="form-control"
                            placeholder="Example: 90 tk">
                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label for="lang">Book Language</label>
                    <input type="text" id="lang" name="lang" class="form-control"
                        placeholder="Bangla | English">
                </div>
                <div class="form-group">
                    <label for="author">Author </label>
                    <select name="author" id="author">
                        <option value="">Hellow 1</option>
                        <option value="">Hellow 2</option>
                        <option value="">Hellow 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="country">Country <span class="text-danger">*</span></label>
                    <select name="country" id="country" class="form-control">
                        <option value="1">Bangladesh</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="classRoom">Class <span class="text-danger">*</span></label>
                    <select name="classRoom" id="classRoom" class="form-control">
                        <option value="1">Bangladesh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject">Subject <span class="text-danger">*</span></label>
                    <select name="subject" id="subject" class="form-control">
                        <option value="1">Bangladesh</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="thubnail">Thumbnail Image <span class="text-danger">*</span></label>
                    <input type="file" name="thumbnail" id="thubnail" class="form-control">
                </div>

                <div class="form-group">
                    <label for="demoPdf">Demo PDF </label>
                    <input type="file" name="demoPdf" id="demoPdf" class="form-control">
                </div>
                <div class="form-group">
                    <label for="book">Main PDF </label>
                    <input type="file" name="book" id="book" class="form-control">
                </div>


            </div>
        </div>




    </form>
</div>
@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#author').select2();
        });
</script>
@endpush
@endsection