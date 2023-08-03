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
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center ">
                    <h2 class="">{{ $todaysOrder }}</h2>
                    <h6 class="mt-2 ">Todays Order</h6>
                </div>
            </div>
         
         
            <div class="col-lg-4">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $monthlyOrder }}</h2>
                    <h6 class="mt-2 ">This Month Order</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $orders }}</h2>
                    <h6 class="mt-2 ">All Orders</h6>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $orders - $unPaid }}</h2>
                    <h6 class="mt-2 "> Paid Order</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $unPaid }}</h2>
                    <h6 class="mt-2 "> Un-Paid Order</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $todaysUnPaid }}</h2>
                    <h6 class="mt-2 "> Todays Un-paid Order</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $deliveryDue }}</h2>
                    <h6 class="mt-2 ">Delivery Due </h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $todaysSell }} tk</h2>
                    <h6 class="mt-2 ">Todays Sell</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $todaysDue }} tk</h2>
                    <h6 class="mt-2 ">Todays Due</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $monthlySell }} tk</h2>
                    <h6 class="mt-2 ">{{ Carbon\Carbon::now()->format("F") }} Sell</h6>
                </div>
            </div>
           <div class="col-lg-3">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $monthlyDue }} tk</h2>
                    <h6 class="mt-2 ">{{ Carbon\Carbon::now()->format("F") }} Due</h6>
                </div>
            </div>
           <div class="col-lg-6">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $totalRevenue }} tk</h2>
                    <h6 class="mt-2 "> Total Revenue</h6>
                </div>
            </div>
           <div class="col-lg-6">
                <div class="card mb-3 border-0 shadow rounded-lg  px-2 py-4 text-center">
                    <h2 class="">{{ $totalDue }} tk</h2>
                    <h6 class="mt-2 "> Total Due</h6>
                </div>
            </div>



           
        </div>
    </div>


</section>
<!-- ========== section end ========== -->
@endsection