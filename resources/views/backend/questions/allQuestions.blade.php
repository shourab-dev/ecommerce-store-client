@extends('layouts.app')
@section('content')

<div class="container px-2 py-3">

    <form action="">
        <div class="row">


            <div class="form-group col-lg-3">
                <select name="country" id="country" class="form-control">
                    <option disabled selected> Select Country</option>
                </select>
            </div>
            <div class="form-group col-lg-3">
                <input type="date" name="from" id="fromDate" class="form-control">
            </div>
            <div class="form-group col-lg-3">
                <input type="date" name="to" id="toDate" class="form-control">
            </div>


        </div>
    </form>
</div>

@endsection