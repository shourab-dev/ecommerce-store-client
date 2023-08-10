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
                        <h6 class="mb-15">Sign In Form only for Admins</h6>
                       
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Email" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                            <!-- end row -->
                        </form>

                    </div>
                </div>
            </div>
           
        </div>
        <!-- end row -->
    </div>
</section>




{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection