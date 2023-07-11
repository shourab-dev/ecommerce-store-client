@extends('layouts.frontendLayouts')
@section('frontendContent')
@push('customCss')
<style>
    .spacer {
        margin: 60px auto;
    }

    .bgGradient {
        background: linear-gradient(to right, #86fde719, #ace5c913);
    }

    .orderId:hover {
        color: white;
    }
</style>
@endpush

<div class="container spacer">
    <div class="col-lg-5 mx-auto text-center shadow-sm rounded-lg py-5  bgGradient">
        <img src="{{ asset('frontend/successIcon.png') }}" alt="" style="width: 80px">
        <h3 class="my-2">Payment Successfully Done</h3>
        <h5 class="my-2 btn btn-outline-success orderId"><b>Order ID: {{ $customerOrderId }}</b></h5>
        <p>We are processing your order and you will be notified via email. If you have any questions please contact us.
        </p>

        <a href="{{ route('send.invoice', $customerOrderId) }}" class="btn btn-dark text-light">Download Invoice <span
                class="ml-2 d-inline-block"><i class="fas fa-angle-double-down"></i></span></a>

    </div>
</div>



@push('customJs')
<script>
    $(function(){

            
            $('.orderId').click(function(){
                var orderId = $(this).text().split(':')[1].trim();
                navigator.clipboard.writeText(orderId);
                const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                
                })
                
                Toast.fire({
                icon: 'success',
                title: 'Order Id Copied'
                })
            })
            })
</script>
@endpush()

@endsection