@extends('layouts.adminAuthUi')

@section('authUi')

<!-- ========== signin-section start ========== -->
<section class="signin-section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">

        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row justify-content-center">

            <div class="col-lg-6">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                       <div class="text-center mb-5">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/logo.png') }}" alt=""
                                    style="width: 50px;margin-bottom:20px"></a>
                            <h6 class="mb-15">User Login</h6>
                        
                        </div>
                        
                        <form action="{{ route('user.login.check') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div class="form-check checkbox-style mb-30">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox-remember"
                                            name="remember" />
                                        <label class="form-check-label" for="checkbox-remember">
                                            Remember me next time</label>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div class="
                            text-start text-md-end text-lg-start text-xxl-end
                            mb-30
                          ">
                                        <a href="{{ route('password.request') }}" class="hover-underline">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                                        <button class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            ">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('user.register') }}" class="text-center d-block mt-2">Return To Register </a>
                            <!-- end row -->
                        </form>

                    </div>
                </div>
            </div>
           
        </div>
        <!-- end row -->
    </div>
</section>



@endsection