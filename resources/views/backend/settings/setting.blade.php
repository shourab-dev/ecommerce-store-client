@extends('layouts.app')
@section('content')
<div class="p-4">
    <form action="{{ route('admin.setting') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3 border-0">
            <div class="row">
                <div class="col-lg-6">
                    <label for="logo" class="w-100">
                        <b>Header Logo</b> <br>
                        <input type="file" class="form-control" id="logo" name="logo">
                    </label>
                </div>
                <div class="col-lg-6">
                    <label for="footerLogo" class="w-100">
                        <b>Footer Logo</b> <br>
                        <input type="file" class="form-control" id="footerLogo" name="footer_logo">
                    </label>
                </div>
                <div class="col-lg-4 my-3">
                    <label for="address" class="w-100">
                        <b>Address</b> <br>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $header->address }}">
                    </label>
                </div>
                <div class="col-lg-4 my-3">
                    <label for="email" class="w-100">
                        <b>Email</b> <br>
                        <input type="text" class="form-control" id="email" name="email" value="@php 
                        if(isset($header->email)){
                            foreach(json_decode($header->email) as $key=>$email) {
                                if($key+1 == count(json_decode($header->email))){
                                    echo trim($email);
                                }else{
                                    echo trim($email).', ';
                                }
                            }
                        }
                         @endphp">
                    </label>
                </div>
                <div class="col-lg-4 my-3">
                    <label for="Phones" class="w-100">
                        <b>Phones</b> <br>
                        <input type="text" class="form-control" id="Phones" name="phone" value="@php 
                        if(isset($header->phone)){
                            foreach(json_decode($header->phone) as $key=>$phone) {
                                if($key+1 == count(json_decode($header->phone))){
                                    echo trim($phone);
                                }else{
                                    echo trim($phone).', ';
                                }
                            }
                        }
                         @endphp
                        ">
                    </label>
                </div>

                <div class="col-lg-4 my-3">
                    <label for="question" class="w-100 d-flex align-items-center  ">
                        <div class="form-check form-switch toggle-switch d-flex justify-content-center"
                            style="transform: scale(0.7)">
                            <input class="form-check-input" name="is_question" id="question" type="checkbox"
                                value="{{ true }}" {{ $header->is_question ? "checked" : "" }}>
                        </div>
                        <b>Enable Questions</b>
                    </label>
                </div>


                <hr>
                <h5 class="my-3">Website Seo</h5>
                <div class="col-lg-6 my-3">
                    <label for="title" class="w-100">
                        <b>Site Title</b> <br>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $header->title }}">
                    </label>
                </div>
                <div class="col-lg-6 my-3">
                    <label for="canonical" class="w-100">
                        <b>Site Canonical</b> <br>
                        <input type="text" class="form-control" id="canonical" name="canonical"
                            value="{{ $header->canonical }}">
                    </label>
                </div>
                <div class="col-lg-6 my-3">
                    <label for="favicon" class="w-100">
                        <b>Site FavIcon</b> <br>
                        <input type="file" class="form-control" id="favicon" name="favicon">
                    </label>
                </div>
                <div class="col-lg-6 my-3">
                    <label for="apple-touch-icon" class="w-100">
                        <b>Apple Device Icon</b> <br>
                        <input type="file" class="form-control" id="apple-touch-icon" name="apple_site_icon">
                    </label>
                </div>
                <div class="col-lg-12 my-3">
                    <label for="detail" class="w-100">
                        <b>Description</b> <br>
                        <textarea style="height: 150px;resize:none;" name="detail" id="detail"
                            class="form-control">{{ $header->detail }}</textarea>
                    </label>
                </div>
                <hr>
                <br>

                <div class="w-100">
                    <button class="btn btn-outline-primary w-50 m-auto d-block">Update Setting</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection