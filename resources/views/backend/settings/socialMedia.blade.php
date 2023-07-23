@extends('layouts.app')
@section('content')
@push('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
@endpush
<div class="p-4">
   <form action="{{ route('admin.setting.social.update') }}" method="POST">
    @csrf
    
    <div class="card border-0 p-3">
        <button class="btn btn-outline-primary ms-auto rounded-0 " style="width: fit-content;">Update</button>
        <table class="table table-responsive">

            <tr>
                <th style="width: 80px;text-align:center">#</th>
                <th class="ps-4">Social Media</th>
                <th width="60%">Links</th>
            </tr>
            @foreach ($socialMedias as $key=>$social)     
            <tr>
                <td style="text-align:center">{{ ++$key }}</td>
                <td class="ps-4"> <i class="{{ $social->icon }} me-2"></i> {{ $social->name }}</td>
                <td><input type="text" name="social[{{ $social->id }}]" class="form-control" value="{{ $social->link }}"></td>
            </tr>
            @endforeach

        </table>
    </div>


   </form>
</div>
@endsection