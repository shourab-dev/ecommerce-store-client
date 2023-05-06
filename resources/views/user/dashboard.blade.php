@extends('layouts.customerAuthUi')


@section('customerUi')

    <h2>Hi this is customer panel {{ auth()->guard('user')->user()->hasRole('user') }}</h2>

@endsection