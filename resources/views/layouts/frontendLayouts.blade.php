<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title', $headerSetting->title)</title>
    <meta name="description" content="@yield('detail', $headerSetting->detail)">
    <meta name="title" content="@yield('title', $headerSetting->title)">
    <link rel="canonical" href="@yield('canonical', $headerSetting->canonical)" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ $headerSetting->favicon }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate.css/animate.css') }}">
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @stack('customCss')
</head>

<body>

    <header id="site-header" class="site-header__v1">
        <div class="topbar border-bottom d-none d-md-block">
            <div class="container-fluid px-2 px-md-5 px-xl-8d75">
                <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                    <ul class="topbar__nav--left nav ml-md-n3">

                        @if (isset($headerSetting->phone))
                        @foreach (json_decode($headerSetting->phone) as $phone)

                        <li class="nav-item"><a href="tel:{{ $phone }}" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-phone mr-2"></i>{{
                                $phone }}</a></li>
                        @endforeach
                        @endif
                        @if (isset($headerSetting->email) && $headerSetting->email != null)

                        @foreach (json_decode($headerSetting->email) as $email)
                        <li class="nav-item"><a href="mailto:{{ $email }}" class="nav-link link-black-100">
                                <i class="fa fa-envelope mr-2"></i>{{
                                $email }}</a></li>
                        @endforeach
                        @endif

                    </ul>
                    <ul class="topbar__nav--right nav mr-md-n3">
                        {{-- * SELECT COUNTRY OPTION FOR USER --}}
                        {{-- <li class="nav-item"><a href="index.html#" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-pin"></i></a></li> --}}
                        {{-- * SELECT COUNTRY OPTION FOR USER --}}


                        @guest('user')
                        <li class="nav-item">

                            <a id="sidebarNavToggler" href="javascript:;" role="button" class="nav-link link-black-100"
                                aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                                data-unfold-overlay="{
                                                                &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                                                &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                                                &quot;animationSpeed&quot;: 500
                                                            }" data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i> Login
                            </a>

                        </li>
                        @endguest
                        @auth('user')
                        <li class="nav-item">

                            <a target="__blank" href="{{ route('user.dashboard') }}" class="nav-link link-black-100">
                                <i class="glph-icon flaticon-user"></i> {{
                                str(auth()->guard('user')->user()->name)->headline() }}
                            </a>
                        </li>
                        @endauth
                        @auth('user')
                        <li class="nav-item">

                            <a id="sidebarNavToggler1" href="javascript:;" role="button"
                                class="nav-link link-black-100 position-relative cartTogglerBtn"
                                aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                                data-unfold-overlay="{
                                    &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                    &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                    &quot;animationSpeed&quot;: 250
                                }" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="250">
                                <span
                                    class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">{{
                                    $cartTotalCount }}</span>
                                <i class="glph-icon flaticon-icon-126515"></i>
                            </a>

                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <div class="masthead border-bottom position-relative" style="margin-bottom: -1px;">
            <div class="container-fluid px-3 px-md-5 px-xl-8d75 py-2 py-md-0">
                <div class="d-flex align-items-center position-relative flex-wrap">
                    <div class="offcanvas-toggler mr-4 mr-lg-8">
                        <a id="sidebarNavToggler2" href="javascript:;" role="button" class="cat-menu"
                            aria-controls="sidebarContent2" aria-haspopup="true" aria-expanded="false"
                            data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent2" data-unfold-type="css-animation" data-unfold-overlay="{
                            &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                            &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                            &quot;animationSpeed&quot;: 100
                        }" data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                            data-unfold-duration="100">
                            <svg width="20px" height="18px">
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z" />
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="site-branding pr-md-4">
                        <a href="{{ url('/') }}" class="d-flex align-items-center mb-1">
                            <img src="{{ $headerSetting->logo }}" alt="" height="60">
                            <h2 class="ml-2 text-dark">{{ env('APP_NAME') }}</h2>
                        </a>
                    </div>
                    <div class="site-navigation m-auto d-none d-xl-block">
                        @include('layouts.common.FrontendLgMenu')
                    </div>
                    <ul class="d-md-none nav mr-md-n3 ml-auto">
                        <li class="nav-item">

                            @guest('user')
                            <a id="sidebarNavToggler9" href="javascript:;" role="button"
                                class="px-2 nav-link link-black-100" aria-controls="sidebarContent9"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9"
                                data-unfold-type="css-animation" data-unfold-overlay="{
                                    &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                    &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                    &quot;animationSpeed&quot;: 500
                                }" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i>
                            </a>
                            @endguest
                            <a id="sidebarNavToggler1" href="javascript:;" role="button"
                                class="nav-link link-black-100 position-relative cartTogglerBtn"
                                aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                                data-unfold-overlay="{
                                                                &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                                                &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                                                &quot;animationSpeed&quot;: 250
                                                            }" data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight" data-unfold-duration="250">
                                <span
                                    class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">{{
                                    $cartTotalCount }}</span>
                                <i class="glph-icon flaticon-icon-126515"></i>
                            </a>
                        </li>
                        @auth('user')

                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" target="__blank" class="nav-link">{{
                                str(auth()->guard('user')->user()->name)->headline() }}</a>
                        </li>
                        @endauth
                    </ul>
                    <div class="site-search ml-xl-0 ml-md-auto w-r-100 my-2 my-xl-0">
                        <form class="form-inline">
                            <div class="input-group position-relative">
                                <div class="input-group-prepend">
                                    <i
                                        class="glph-icon flaticon-loupe input-group-text py-2d75 bg-white-100 border-white-100"></i>
                                </div>
                                <input id="searchBook"
                                    class="form-control bg-white-100 min-width-380 py-2d75 height-4 border-white-100"
                                    type="search" placeholder="Search for Books" aria-label="Search">


                                <div class="search_result">
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @guest('user')
    {{-- * FRONTEND SM USER LOGIN --}}
    <aside id="sidebarContent9" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler9">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent9" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent9" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                        </button>
                    </div>


                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">
                            <form action="{{ route('user.login.check') }}" method="POST">
                                @csrf
                                <div id="login1" data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account </h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel9" class="form-label"
                                                    for="signinEmail9">Email *</label>
                                                <input name="email" type="email"
                                                    class="form-control rounded-0 height-4 px-4" id="signinEmail9"
                                                    placeholder="Email Address" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel9" class="form-label"
                                                    for="signinPassword9">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword9" placeholder="Password"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input" id="remember"
                                                        name="remember">
                                                    <label class="custom-control-label" for="remember">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                                href="{{ route('password.request') }}" data-animation-in="fadeIn">Forgot
                                                Password?</a>
                                        </div>
                                        <div class="mb-4d75">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                                In</button>
                                        </div>
                                        <div class="mb-2">
                                            <a href="javascript:;"
                                                class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium">Create
                                                Account</a>
                                        </div>
                                    </div>
                                </div>



                            </form>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>
    {{-- *FRONTEND SM USER LOGIN END --}}
    {{-- *FRONTEND LOGIN LG --}}

    <aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                        </button>
                    </div>


                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">
                            <form action="{{ route('user.login.check') }}" method="POST">
                                @csrf
                                <div id="login" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel" class="form-label" for="signinEmail">Email
                                                    *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail" placeholder="Email Address" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel" class="form-label"
                                                    for="signinPassword">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword" placeholder="Password" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input" id="remember"
                                                        name="remember">
                                                    <label class="custom-control-label" for="remember">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                                href="javascript:;" data-target="#forgotPassword"
                                                data-link-group="idForm" data-animation-in="fadeIn">Forgot Password?</a>
                                        </div>
                                        <div class="mb-4d75">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                                In</button>
                                        </div>
                                        <div class="mb-2">
                                            <a href="{{ route('user.register') }}"
                                                class=" btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium">Create
                                                Account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>
    {{-- *FRONTEND LOGIN LG ENDS --}}
    @endguest

    @auth('user')
    {{-- * CART --}}
    <aside id="sidebarContent1" class="u-sidebar u-sidebar__xl u-unfold--css-animation fadeInRight"
        aria-labelledby="sidebarNavToggler1" style="animation-duration: 250ms; right: 0px;">
        <div class="u-sidebar__scroller js-scrollbar mCustomScrollbar _mCS_3 mCS-autoHide"
            style="position: relative; overflow: visible;">
            <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside"
                style="max-height: none;" tabindex="0">
                <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                    <div class="u-sidebar__container">
                        <div class="u-header-sidebar__footer-offset">

                            <div
                                class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                                <button type="button" class="close ml-auto target-of-invoker-has-unfolds active"
                                    aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="true"
                                    data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                    data-unfold-duration="500">
                                    <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                                </button>
                            </div>


                            <div class="u-sidebar__body">
                                <div class="u-sidebar__content u-header-sidebar__content">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-icon-126515 mr-3 font-size-5"></i>Your shopping bag
                                            (<span>3</span>)
                                        </h2>
                                    </header>

                                    <div class="itemContainer">

                                    </div>

                                    <div
                                        class="px-4 py-5 px-md-6 d-flex justify-content-between align-items-center font-size-3">
                                        <h4 class="mb-0 font-size-3">Subtotal:</h4>
                                        <div id="subtotalCartPrice" class="font-weight-medium"></div>
                                    </div>
                                    <div class="px-4 mb-8 px-md-6">
                                        <a href="{{ route('cart.all.items') }}"
                                            class="btn btn-block py-4 rounded-0 btn-outline-dark mb-4">View Cart</a>
                                        <a href="{{ route('cart.all.items') }}"
                                            class="btn btn-block py-4 rounded-0 btn-dark">Checkout</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="mCSB_3_scrollbar_vertical"
                class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical"
                style="display: block;">
                <div class="mCSB_draggerContainer">
                    <div id="mCSB_3_dragger_vertical" class="mCSB_dragger"
                        style="position: absolute; min-height: 50px; top: 0px; display: block; height: 351px; max-height: 609px;">
                        <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                    </div>
                    <div class="mCSB_draggerRail"></div>
                </div>
            </div>
        </div>
    </aside>
    {{-- * CART ENDS --}}
    @endauth

    {{-- * FRONTEND MENU SIDEBAR --}}

    <aside id="sidebarContent2" class="u-sidebar u-sidebar__md u-sidebar--left" aria-labelledby="sidebarNavToggler2">
        <div class="u-sidebar__scroller js-scrollbar">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">

                            <header
                                class="border-bottom px-4 px-md-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="d-flex align-items-center mb-0"><img src="{{ asset('frontend/logo.png') }}"
                                        alt="{{ env('APP_NAME') }}" height="50"><span class="ml-2">{{ env('APP_NAME')
                                        }}</span></h2>

                                <div class="d-flex align-items-center">
                                    <button type="button" class="close ml-auto" aria-controls="sidebarContent2"
                                        aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent2"
                                        data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                        <span aria-hidden="true"><i class="fas fa-times ml-2"></i></span>
                                    </button>
                                </div>

                            </header>

                            <div class="border-bottom">
                                <div class="u-sidebar__navigation">
                                </div>
                            </div>


                            {{-- sidebar menu --}}
                            <div class="border-bottom">
                                <div class="zeynep pt-4" style="transform: translateX(0px); width: 295px;">
                                    <ul>

                                        <li class="has-submenu">
                                            <a href="#" data-submenu="art-photo"> Category</a>
                                            <div id="art-photo" class="submenu">
                                                <div class="submenu-header" data-submenu-close="art-photo">
                                                    <a href="#"> Category</a>
                                                </div>
                                                <ul>
                                                    @foreach ($classRooms as $classRoom)
                                                    <li>

                                                        <a
                                                            href="{{ route('frontend.product.class',$classRoom->slug) }}">{{
                                                            $classRoom->name
                                                            }}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#" data-submenu="accessories"> Accessories</a>
                                            <div id="accessories" class="submenu">
                                                <div class="submenu-header" data-submenu-close="accessories">
                                                    <a href="#"> Accessories</a>
                                                </div>
                                                <ul>
                                                    @foreach ($subjects as $subject)
                                                    <li>
                                        
                                                        <a href="{{ route('frontend.product.class',$subject->slug) }}">{{
                                                            str($subject->name)->headline()
                                                            }}</a>
                                                    </li>
                                                    @endforeach
                                        
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            
                            {{-- sidebar menu end --}}



                            <div class="px-4 px-md-5 pt-5 pb-4 border-bottom">
                                <h2 class="font-size-3 mb-3">HELP & SETTINGS </h2>
                                <ul class="list-group list-group-flush list-group-borderless">
                                    @auth('user')
                                    <li class="list-group-item px-0 py-2 border-0"><a
                                            href="{{ route('user.dashboard') }}" class="h-primary">Your Account</a></li>
                                    @endauth
                                    <li class="list-group-item px-0 py-2 border-0"><a href="index.html#"
                                            class="h-primary">Help</a></li>


                                </ul>
                            </div>
                            <div class="px-4 px-md-5 py-5">
                                <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                    <option selected>Bangladesh</option>
                                    <option value="1" disabled readonly>Australia</option>
                                    <option value="2" disabled readonly>India</option>
                                    <option value="3" disabled readonly>China</option>
                                </select>
                                <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                    <option selected>৳ Taka</option>
                                    <option disabled>$ USD</option>
                                </select>

                                <ul class="list-inline mb-0">

                                    @if (isset($socials))
                                    @foreach ($socials as $social)
                                    <li class="list-inline-item">
                                        <a target="_blank" class="h-primary pr-2 font-size-2" href="{{ $social->link }}"
                                            title="{{ str()->headline($social->name) }}">
                                            <span class="{{ $social->icon }} mr-2"></span>
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>
    {{-- * FRONTEND MENU SIDEBAR END --}}


    {{-- main --}}
    @yield('frontendContent')
    {{-- main end --}}

    {{-- * WHATSAPP INTEGRATION --}}
    <div class="whatsapp">

        <a title="Contact Us on Whatsapp" href="https://wa.me/{{ $headerSetting->whatsapp }}" target="_blank">
            <lottie-player src="https://lottie.host/072162f0-f204-4113-bc58-46691dc0c65a/JamgHUQtKt.json"
                background="transparent" speed="1" style="width: 80px; height: 80px" loop autoplay direction="1"
                mode="normal"></lottie-player>
        </a>
    </div>
    {{-- * WHATSAPP INTEGRATION END --}}

    <footer>
        <div class="border-top space-top-3">
            <div class="border-bottom pb-5 space-bottom-lg-3">
                <div class="container">

                    <div class="space-bottom-2 space-bottom-md-3">
                        <div class="text-center mb-5">
                            <h5 class="font-size-7 font-weight-medium">Join Our Newsletter</h5>
                            <p class="text-gray-700">Signup to be the first to hear about exclusive deals, special
                                offers and upcoming collections</p>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-5 mb-3 mb-md-2">
                                <div class="js-form-message">
                                    <div class="input-group">
                                        <input type="text" class="form-control px-5 height-60 border-dark" name="name"
                                            id="signupSrName" placeholder="Enter email for weekly newsletter."
                                            aria-label="Your name" required data-msg="Name must contain only letters."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 ml-md-2">
                                <button type="submit"
                                    class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">Subscribe
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-6 mb-lg-0">
                            <div class="pb-6">
                                <a href="index.html" class="d-inline-block mb-5">

                                    <img src="{{ $headerSetting->footer_logo ?? $headerSetting->logo }}" alt=""
                                        height="60">

                                </a>
                                <address class="font-size-2 mb-5">
                                    <span class="mb-2 font-weight-normal text-dark">
                                        {{ $headerSetting->address ?? "-----" }}
                                    </span>
                                </address>
                                <div class="mb-4">

                                    @if (isset($headerSetting->email))
                                    @foreach (json_decode($headerSetting->email) as $email)
                                    <a href="mailto:{{ $email }}" class="font-size-2 d-block link-black-100 mb-1">{{
                                        $email }}</a>
                                    @endforeach
                                    @endif


                                    @if (isset($headerSetting->phone))
                                    @foreach (json_decode($headerSetting->phone) as $phone)

                                    <a href="tel:{{ $phone }}" class="font-size-2 d-block link-black-100">{{ $phone
                                        }}</a>
                                    @endforeach
                                    @endif

                                </div>
                                <ul class="list-unstyled mb-0 d-flex">
                                    @if (isset($socials))
                                    @foreach ($socials as $key=>$social)
                                    <li class="btn {{ $key == 0 ? " pl-0" : '' }}">
                                        <a target="_blank" class="link-black-100" href="{{ $social->link }}"
                                            title="{{ str($social->name)->headline() }}">
                                            <span class="{{ $social->icon }}"></span>
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif


                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Explore</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">About as</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Sitemap</a>
                                </li>

                            </ul>
                        </div>

                        <div class="col-lg-3 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Policy</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Return Policy</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Terms Of Use</a>
                                </li>

                                <li class="pt-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Privacy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Categories</h4>
                            <ul class="list-unstyled mb-0">
                                @foreach ($classRooms as $classRoom)
                                <li class="pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="{{ route('frontend.product.class',$classRoom->slug) }}">{{
                                        str($classRoom->name)->headline()
                                        }}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-1">
                <div class="container">
                    <div class="d-lg-flex text-center  text-lg-left justify-content-center align-items-center">

                        <p class="mb-3 mb-lg-0 font-size-2">©{{ Carbon\Carbon::today()->format("Y") }} {{
                            env('APP_NAME') }}. All rights reserved</p>


                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('frontend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js') }}"></script>
    <script
        src="{{ asset('frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>
    <script src="{{ asset('frontend/assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.unfold.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.malihu-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.selectpicker.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/components/hs.show-animation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).on('ready', function () {
                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
    
                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
    
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));
    
                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
    
                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');
    
                // init zeynepjs
                var zeynep = $('.zeynep').zeynep({
                    onClosed: function () {
                        // enable main wrapper element clicks on any its children element
                        $("body main").attr("style", "");
    
                        console.log('the side menu is closed.');
                    },
                    onOpened: function () {
                        // disable main wrapper element clicks on any its children element
                        $("body main").attr("style", "pointer-events: none;");
    
                        console.log('the side menu is opened.');
                    }
                });
    
                // handle zeynep overlay click
                $(".zeynep-overlay").click(function () {
                    zeynep.close();
                });
    
                // open side menu if the button is clicked
                $(".cat-menu").click(function () {
                    if ($("html").hasClass("zeynep-opened")) {
                        zeynep.close();
                    } else {
                        zeynep.open();
                    }
                });
            });
    </script>
    {{-- * GET ALL CART ITEMS --}}
    <script>
        function getCartItemsAjax() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.all') }}",
                success: function(res){

                    res = JSON.parse(res)
                    console.log(res);
                   $('#sidebarContent1 header span').html(res.carts.length)
                   //* RESPONSE TO DYNAMIC - HTML 
                   let cartLists = []
                   res.carts.map(cart=> {
                    let url = '{{ route("cart.remove",":id") }}'
                    url = url.replace(":id", cart.id)
                    let cartItem = `
                        <div class="px-4 py-5 px-md-6 border-bottom">
                            <div class="media">
                                <a href="#" class="d-block">
                                    <img src="${cart.books.thumbnail}" class="img-fluid mCS_img_loaded" alt="${cart.books.title}" width="100" ></a>
                                <div class="media-body ml-4d875">
                                   
                                    <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                        <a href="#" class="text-dark">${cart.books.title} (${cart.amount} pieces)</a>
                                    </h2>
                                    <div class="font-size-2 mb-1 text-truncate">
                                        <a href="#" class="text-gray-700">${cart.books.author ? cart.books.author.name : ""}</a>
                                        </div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <span class="woocommerce-Price-amount amount"> 
                                            <span class="woocommerce-Price-currencySymbol">tk</span> ${(cart.books.selling_price ? cart.books.selling_price : cart.books.price)* cart.amount} </span>
                                    </div>
                                </div>
                                <div class="mt-3 ml-3">
                                    <a href="${url}" class="text-dark"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    `;
                    cartLists.push(cartItem)
                   })
                   $('#sidebarContent1 .itemContainer').html(cartLists)
                   $('#subtotalCartPrice').html(res.totalPrice+" tk")
                
                }
            })

        }
        $('.cartTogglerBtn').click(getCartItemsAjax)
    </script>
    {{-- * GET ALL CART ITEMS ENDS --}}

    @stack('customJs')
    {{-- * ADD TO CART --}}
    <script>
        $(document).on('ready', function () {
                let cartAmount = 1
                
    
                //* SWEET ALERT
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                //* ADD TO CART AJAX
                
                function addToCartAjax(e){
                    e.preventDefault()
                    if($('#cartAmount').length > 0){
                    cartAmount = $('#cartAmount').val()
                    }
                    console.log(cartAmount);
                    $.ajax({
                        method:'GET',
                        url: $(this).attr('href'),
                        data: {amount: cartAmount},
                        success: function(res){
                            res = JSON.parse(res)
                            //* UPDATE CART NUMBER
                            $('.cartTogglerBtn > span').html(res.cartCount)
                            //* UPDATE CART NUMBER
                            //* SUCCESS MSG
                            if(res.msg){
                                Toast.fire({
                                icon: 'success',
                                title: `${res['msg']} ${res['title']}`
                                })
                            } else{
                                Toast.fire({
                                icon: 'success',
                                title: `${res['title']} has been added to your Cart`
                                })
                            }
                           
                            //* SUCCESS MSG                 
                        },
                        error: function(error){
                            console.log(error);
                        }
                    })
                }
                $(document).on('click', '.addToCart', addToCartAjax)
            })
    </script>
    {{-- * ADD TO CART ENDS--}}
    {{-- * LIVE SEARCH --}}
    <script>
        let searchResult = $('.search_result ul')
        $(document).ready(function(){
             function liveSearchViaAjax(){
                let value = $(this).val()
                
                if(value.length <= 4 ){
                    searchResult.html('')
                    $('.search_result').hide()
                }
                else{
                    $('.search_result').slideDown()
                //* SEND AJAX REQ TO THE SERVER
                $.ajax({
                    method: 'GET',
                    url: "{{ route('frontend.product.search') }}",
                    data: {
                        search: value,
                    },
                    
                    success: function(data){
                        let res = JSON.parse(data)
                        
                        if(res.length == 0 ){
                            searchResult.html('No Result Found')
                            return false;
                        }
                        let lists = [];
                        
                        res.map(book => {
                        let bookSlugUrl = "{{ route('frontend.product.show', '::slug') }}"
                        bookSlugUrl = bookSlugUrl.replace('::slug', book.slug)
                            let li = `<li>
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <a href="${bookSlugUrl}"><img style="height:95px;object-fit:cover;" width="80" src="${book.thumbnail}" alt="${book.title}"></a>
                                    </div>
                                    <div class="col-8">
                                        <a href="${bookSlugUrl}">
                                            <h4>${book.title}</h4>
                                        </a>
                                        <span>${book.class ? book.class.name : ''}</span>
                                        <span>${book.subject ? book.subject.name : ''}</span>
                                        
                                    </div>
                                </div>
                            </li>`;
                            lists.push(li)
                        })
                        searchResult.html()
                        searchResult.html(lists)
                    }
                })
                }

             }
            $('#searchBook').keyup(liveSearchViaAjax)
        })
    </script>
    {{-- * LIVE SEARCH ENDS--}}
</body>

</html>