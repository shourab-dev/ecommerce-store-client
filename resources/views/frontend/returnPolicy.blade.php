@extends('layouts.frontendLayouts')
@section('frontendContent')




<div class="container">
    <div class="space-bottom-1 space-bottom-lg-2 space-bottom-xl-3">
        <div class="pb-lg-4">
            <div class="py-4 py-lg-5 py-xl-8">
                <h6 class="font-weight-medium font-size-7 font-size-xs-25 text-center">{{  str($type)->headline() }}</h6>
            </div>
            <div class="mb-5 mb-lg-8">
                {!! $pages->detail ?? '' !!}
            </div>

        </div>
    </div>
</div>




@endsection