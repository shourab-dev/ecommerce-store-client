@extends('layouts.app')

@section('content')
<!-- ========== section start ========== -->
<section class="section">

    <div class="container-fluid mb-5">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="titlemb-30">
                        <h2>Dashboard </h2>
                    </div>
                </div>
           
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
    </div>
    <!-- end container -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $todaysOrder }}</h2>
                    <h6 class="mt-2 ">Todays Order</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $monthlyOrder }}</h2>
                    <h6 class="mt-2 ">This Month Order</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $orders }}</h2>
                    <h6 class="mt-2 ">All Orders</h6>
                </div>
            </div>
           
        </div>
    </div>


</section>
<!-- ========== section end ========== -->
@endsection