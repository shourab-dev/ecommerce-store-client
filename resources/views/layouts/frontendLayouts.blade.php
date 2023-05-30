<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tally</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('frontend/logo.png') }}">

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
</head>

<body>

    <header id="site-header" class="site-header__v1">
        <div class="topbar border-bottom d-none d-md-block">
            <div class="container-fluid px-2 px-md-5 px-xl-8d75">
                <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                    <ul class="topbar__nav--left nav ml-md-n3">
                        <li class="nav-item"><a href="index.html#" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-question mr-2"></i>Can we help you?</a></li>
                        <li class="nav-item"><a href="tel:+1246-345-0695" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-phone mr-2"></i>+1 246-345-0695</a></li>
                    </ul>
                    <ul class="topbar__nav--right nav mr-md-n3">
                        {{-- * SELECT COUNTRY OPTION FOR USER --}}
                        {{-- <li class="nav-item"><a href="index.html#" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-pin"></i></a></li> --}}
                        {{-- * SELECT COUNTRY OPTION FOR USER --}}


                        <li class="nav-item">

                            <a id="sidebarNavToggler" href="javascript:;" role="button" class="nav-link link-black-100"
                                aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                                data-unfold-overlay="{
                                    &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                    &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                    &quot;animationSpeed&quot;: 500
                                }" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i> Login
                            </a>

                        </li>
                        @auth
                        <li class="nav-item">

                            <a id="sidebarNavToggler1" href="javascript:;" role="button"
                                class="nav-link link-black-100 position-relative" aria-controls="sidebarContent1"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation" data-unfold-overlay="{
                                    &quot;className&quot;: &quot;u-sidebar-bg-overlay&quot;,
                                    &quot;background&quot;: &quot;rgba(0, 0, 0, .7)&quot;,
                                    &quot;animationSpeed&quot;: 500
                                }" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <span
                                    class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">3</span>
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
                        <a href="index.html" class="d-flex align-items-center mb-1">
                            <img src="{{ asset('frontend/logo.png') }}" alt="" height="60">
                            <h2 class="ml-2 text-dark">Tally</h2>
                        </a>
                    </div>
                    <div class="site-navigation m-auto d-none d-xl-block">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a id="homeDropdownInvoker" href="index.html#"
                                    class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
                                    aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                    data-unfold-target="#homeDropdownMenu" data-unfold-type="css-animation"
                                    data-unfold-duration="200" data-unfold-delay="50" data-unfold-hide-on-scroll="true"
                                    data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    Home
                                </a>
                                <ul id="homeDropdownMenu"
                                    class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
                                    aria-labelledby="homeDropdownInvoker">
                                    <li><a href="index.html" class="dropdown-item link-black-100">Home v1</a></li>

                                </ul>
                            </li>
                            <li class="nav-item"><a href="index.html#" class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium  ">Shops</a>
                            </li>
                            <li class="nav-item"><a href="index.html#"
                                    class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium active border-bottom border-primary border-width-2">Classes</a>
                            </li>
                            <li class="nav-item"><a href="index.html#"
                                    class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium  ">Subjects</a>
                            </li>

                            <li class="nav-item"><a href="index.html#"
                                    class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium  ">Questions Paper</a>
                            </li>


                        </ul>
                    </div>
                    <ul class="d-md-none nav mr-md-n3 ml-auto">
                        <li class="nav-item">

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

                        </li>
                    </ul>
                    <div class="site-search ml-xl-0 ml-md-auto w-r-100 my-2 my-xl-0">
                        <form class="form-inline">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i
                                        class="glph-icon flaticon-loupe input-group-text py-2d75 bg-white-100 border-white-100"></i>
                                </div>
                                <input class="form-control bg-white-100 min-width-380 py-2d75 height-4 border-white-100"
                                    type="search" placeholder="Search for Books by Keyword ..." aria-label="Search">
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
                            <form class>

                                <div id="login1" data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel9" class="form-label"
                                                    for="signinEmail9">Username or email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail9"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel9" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel9" class="form-label"
                                                    for="signinPassword9">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword9" placeholder aria-label
                                                    aria-describedby="signinPasswordLabel9" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="termsCheckbox1" name="termsCheckbox1" required>
                                                    <label class="custom-control-label" for="termsCheckbox1">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                                href="javascript:;" data-target="#forgotPassword1"
                                                data-link-group="idForm1" data-animation-in="fadeIn">Forgot
                                                Password?</a>
                                        </div>
                                        <div class="mb-4d75">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                                In</button>
                                        </div>
                                        <div class="mb-2">
                                            <a href="javascript:;"
                                                class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                                data-target="#signup1" data-link-group="idForm1"
                                                data-animation-in="fadeIn">Create Account</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="signup1" style="display: none; opacity: 0;" data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel11" class="form-label"
                                                    for="signinEmail11">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail11"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel11" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel11" class="form-label"
                                                    for="signinPassword11">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword11" placeholder aria-label
                                                    aria-describedby="signinPasswordLabel11" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signupConfirmPasswordLabel9" class="form-label"
                                                    for="signupConfirmPassword9">Confirm Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="confirmPassword" id="signupConfirmPassword9" placeholder
                                                    aria-label aria-describedby="signupConfirmPasswordLabel9" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Create
                                                Account</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;" data-target="#login1"
                                                data-link-group="idForm1" data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div id="forgotPassword1" style="display: none; opacity: 0;"
                                    data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-question mr-3 font-size-5"></i>Forgot Password?</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel33" class="form-label"
                                                    for="signinEmail33">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail33"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel33" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Recover
                                                Password</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;" data-target="#login1"
                                                data-link-group="idForm1" data-animation-in="fadeIn">Login
                                            </a>
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
                            <form class>

                                <div id="login" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel" class="form-label"
                                                    for="signinEmail">Username or email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel" class="form-label"
                                                    for="signinPassword">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword" placeholder aria-label
                                                    aria-describedby="signinPasswordLabel" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="termsCheckbox" name="termsCheckbox" required>
                                                    <label class="custom-control-label" for="termsCheckbox">
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
                                            <a href="javascript:;"
                                                class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                                data-target="#signup" data-link-group="idForm"
                                                data-animation-in="fadeIn">Create Account</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel1" class="form-label"
                                                    for="signinEmail1">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail1"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel1" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel1" class="form-label"
                                                    for="signinPassword1">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword1" placeholder aria-label
                                                    aria-describedby="signinPasswordLabel1" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signupConfirmPasswordLabel" class="form-label"
                                                    for="signupConfirmPassword">Confirm Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="confirmPassword" id="signupConfirmPassword" placeholder
                                                    aria-label aria-describedby="signupConfirmPasswordLabel" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Create
                                                Account</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                                data-link-group="idForm" data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-question mr-3 font-size-5"></i>Forgot Password?</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel3" class="form-label"
                                                    for="signinEmail3">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail3"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel3" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Recover
                                                Password</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;" data-target="#login"
                                                data-link-group="idForm" data-animation-in="fadeIn">Login
                                            </a>
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


    <aside id="sidebarContent1" class="u-sidebar u-sidebar__xl" aria-labelledby="sidebarNavToggler1">
        <div class="u-sidebar__scroller js-scrollbar">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent1" aria-haspopup="true"
                            aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
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
                                        class="flaticon-icon-126515 mr-3 font-size-5"></i>Your shopping bag (3)</h2>
                            </header>

                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="index.html#" class="d-block"><img src="assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="index.html#">Hard Cover</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="index.html#" class="text-dark">The Ride of a Lifetime: Lessons
                                                Learned from 15 Years as CEO</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="index.html#"
                                                class="text-gray-700">Robert Iger</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">1 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>125.30</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="index.html#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="index.html#" class="d-block"><img src="assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="index.html#">Hard Cover</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="index.html#" class="text-dark">The Rural Diaries: Love, Livestock,
                                                and Big Life Lessons Down</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="index.html#"
                                                class="text-gray-700">Hillary Burton</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">2 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>200</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="index.html#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="index.html#" class="d-block"><img src="assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="index.html#">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="index.html#" class="text-dark">Russians Among Us: Sleeper Cells,
                                                Ghost Stories, and the Hunt.</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="index.html#"
                                                class="text-gray-700">Gordon Corera</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">6 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>100</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="index.html#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-5 px-md-6 d-flex justify-content-between align-items-center font-size-3">
                                <h4 class="mb-0 font-size-3">Subtotal:</h4>
                                <div class="font-weight-medium">$750.00</div>
                            </div>
                            <div class="px-4 mb-8 px-md-6">
                                <a href="../shop/cart.html"
                                    class="btn btn-block py-4 rounded-0 btn-outline-dark mb-4">View Cart</a>
                                <a href="../shop/checkout.html"
                                    class="btn btn-block py-4 rounded-0 btn-dark">Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>


    <aside id="sidebarContent2" class="u-sidebar u-sidebar__md u-sidebar--left" aria-labelledby="sidebarNavToggler2">
        <div class="u-sidebar__scroller js-scrollbar">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">

                            <header
                                class="border-bottom px-4 px-md-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="font-size-3 mb-0">SHOP BY CATEGORY</h2>

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
                                <div class="zeynep pt-4">
                                    <ul>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="off-pages">Pages</a>
                                            <div id="off-pages" class="submenu">
                                                <div class="submenu-header" data-submenu-close="off-pages">
                                                    <a href="index.html#">Pages</a>
                                                </div>
                                                <ul>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-home">Home Pages</a>
                                                        <div id="off-home" class="submenu js-scrollbar">
                                                            <div class="submenu-header" data-submenu-close="off-home">
                                                                <a href="index.html#">Home Pages</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="index.html">Home v1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v2.html">Home v2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v3.html">Home v2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v3.html">Home v3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v4.html">Home v4</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v5.html">Home v5</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v6.html">Home v6</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v7.html">Home v7</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v8.html">Home v8</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v9.html">Home v9</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v10.html">Home v10</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v11.html">Home v11</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v12.html">Home v12</a>
                                                                </li>
                                                                <li>
                                                                    <a href="home-v13.html">Home v13</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-single-product">Single
                                                            Product</a>
                                                        <div id="off-single-product" class="submenu js-scrollbar">
                                                            <div class="submenu-header"
                                                                data-submenu-close="off-single-product">
                                                                <a href="index.html#">Single Product</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="../shop/single-product-v1.html">Single
                                                                        Product v1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v2.html">Single
                                                                        Product v2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v3.html">Single
                                                                        Product v3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v4.html">Single
                                                                        Product v4</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v5.html">Single
                                                                        Product v5</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v6.html">Single
                                                                        Product v6</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/single-product-v7.html">Single
                                                                        Product v7</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-shop-pages">Shop
                                                            Pages</a>
                                                        <div id="off-shop-pages" class="submenu js-scrollbar">
                                                            <div class="submenu-header"
                                                                data-submenu-close="off-shop-pages">
                                                                <a href="index.html#">Shop Pages</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="../shop/cart.html">Shop cart</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/checkout.html">Shop checkout</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/my-account.html">Shop My
                                                                        Account</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/order-received.html">Shop Order
                                                                        Received</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/order-tracking.html">Shop Order
                                                                        Tracking</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/store-location.html">Shop Store
                                                                        Location</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-shop-list">Shop List</a>
                                                        <div id="off-shop-list" class="submenu js-scrollbar">
                                                            <div class="submenu-header"
                                                                data-submenu-close="off-shop-list">
                                                                <a href="index.html#">Shop List</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="../shop/v1.html">Shop List v1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v2.html">Shop List v2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v3.html">Shop List v3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v4.html">Shop List v4</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v5.html">Shop List v5</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v6.html">Shop List v6</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v7.html">Shop List v7</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v8.html">Shop List v8</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../shop/v9.html">Shop List v9</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-blog">Blog</a>
                                                        <div id="off-blog" class="submenu js-scrollbar">
                                                            <div class="submenu-header" data-submenu-close="off-blog">
                                                                <a href="index.html#">Blog</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="../blog/blog-v1.html">Blog v1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../blog/blog-v2.html">Blog v2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../blog/blog-v3.html">Blog v3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../blog/blog-single.html">Blog Single</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="off-others">Others</a>
                                                        <div id="off-others" class="submenu js-scrollbar">
                                                            <div class="submenu-header" data-submenu-close="off-others">
                                                                <a href="index.html#">Others</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="../others/404.html">404</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/about.html">About Us</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/authors-list.html">Authors
                                                                        List</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/authors-single.html">Authors
                                                                        Single</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/coming-soon.html">Coming Soon</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/contact.html">Contact Us</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/faq.html">FAQ</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/pricing-table.html">Pricing
                                                                        Table</a>
                                                                </li>
                                                                <li>
                                                                    <a href="../others/terms-conditions.html">Terms
                                                                        Conditions</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="px-5">
                                                        <a href="documentation/index.html"
                                                            class="btn btn-primary mb-3 mb-md-0 mb-xl-3 mt-4 font-size-2 btn-block">Documentation</a>
                                                    </li>
                                                    <li class="px-5 mb-4">
                                                        <a href="starter/index.html"
                                                            class="btn btn-secondary font-size-2 btn-block mb-2">Starter</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="art-photo">Arts & Photography</a>
                                            <div id="art-photo" class="submenu">
                                                <div class="submenu-header" data-submenu-close="art-photo">
                                                    <a href="index.html#">Arts & Photography</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Architecture</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Business of Art</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Collections, Catalogs & Exhibitions</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Decorative Arts & Design</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Drawing</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Fashion</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Graphic Design</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="biography">Biographies & Memoirs</a>
                                            <div id="biography" class="submenu">
                                                <div class="submenu-header" data-submenu-close="biography">
                                                    <a href="index.html#">Biographies & Memoirs</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="children">Children's Books</a>
                                            <div id="children" class="submenu">
                                                <div class="submenu-header" data-submenu-close="children">
                                                    <a href="index.html#">Children's Books</a>
                                                </div>
                                                <ul>
                                                    <li class="has-submenu">
                                                        <a href="index.html#" data-submenu="electronics">Electronics</a>
                                                        <div id="electronics" class="submenu js-scrollbar">
                                                            <div class="submenu-header"
                                                                data-submenu-close="electronics">
                                                                <a href="index.html#">Electronics</a>
                                                            </div>
                                                            <ul class>
                                                                <li>
                                                                    <a href="index.html#">Camera & Photo</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Home Audio</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Tv & Video</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Computers & Accessories</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Car & Vehicle Electronics</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Portable Audio & Video</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Headphones</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Accessories & Supplies</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Video Projectors</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Office Electronics</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Wearable Technology</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.html#">Service Plans</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Books</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Video Games</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Computers</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="computers">Computers & Technology</a>
                                            <div id="computers" class="submenu">
                                                <div class="submenu-header" data-submenu-close="computers">
                                                    <a href="index.html#">Computers & Technology</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="cookbook">Cookbooks, Food & Wine</a>
                                            <div id="cookbook" class="submenu">
                                                <div class="submenu-header" data-submenu-close="cookbook">
                                                    <a href="index.html#">Cookbooks, Food & Wine</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="sciencemath">Education & Teaching</a>
                                            <div id="sciencemath" class="submenu">
                                                <div class="submenu-header" data-submenu-close="sciencemath">
                                                    <a href="index.html#">Education & Teaching</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="health">Health, Fitness & Dieting</a>
                                            <div id="health" class="submenu">
                                                <div class="submenu-header" data-submenu-close="health">
                                                    <a href="index.html#">Health, Fitness & Dieting</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="history">History</a>
                                            <div id="history" class="submenu">
                                                <div class="submenu-header" data-submenu-close="history">
                                                    <a href="index.html#">History</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="romance">Romance</a>
                                            <div id="romance" class="submenu">
                                                <div class="submenu-header" data-submenu-close="romance">
                                                    <a href="index.html#">Romance</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="sports">Sports & Outdoors</a>
                                            <div id="sports" class="submenu">
                                                <div class="submenu-header" data-submenu-close="sports">
                                                    <a href="index.html#">Sports & Outdoors</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="index.html#" data-submenu="travel">Travel</a>
                                            <div id="travel" class="submenu">
                                                <div class="submenu-header" data-submenu-close="travel">
                                                    <a href="index.html#">Travel</a>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="index.html#">Istanbul</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Mardin</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html#">Amed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="px-4 px-md-5 pt-5 pb-4 border-bottom">
                                <h2 class="font-size-3 mb-3">HELP & SETTINGS </h2>
                                <ul class="list-group list-group-flush list-group-borderless">
                                    <li class="list-group-item px-0 py-2 border-0"><a href="index.html#"
                                            class="h-primary">Your Account</a></li>
                                    <li class="list-group-item px-0 py-2 border-0"><a href="index.html#"
                                            class="h-primary">Help</a></li>
                                    <li class="list-group-item px-0 py-2 border-0"><a href="index.html#"
                                            class="h-primary">Sign In</a></li>
                                </ul>
                            </div>
                            <div class="px-4 px-md-5 py-5">
                                <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                    <option selected>English (United States)</option>
                                    <option value="1">English (UK)</option>
                                    <option value="2">Arabic (Saudi Arabia)</option>
                                    <option value="3">Deutsch</option>
                                </select>
                                <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                    <option selected>$ USD</option>
                                    <option value="1">د.إ AED</option>
                                    <option value="2">¥ CNY</option>
                                    <option value="3">€ EUR</option>
                                </select>

                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="index.html#">
                                            <span class="fab fa-facebook-f btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="index.html#">
                                            <span class="fab fa-google btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="index.html#">
                                            <span class="fab fa-twitter btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="index.html#">
                                            <span class="fab fa-github btn-icon__inner"></span>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>



    {{-- main --}}
    @yield('frontendContent')
    {{-- main end --}}


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
                                    <img src="{{ asset('frontend/logo.png') }}" alt="">
                                </a>
                                <address class="font-size-2 mb-5">
                                    <span class="mb-2 font-weight-normal text-dark">
                                        1418 River Drive, Suite 35 Cottonhall, CA 9622 <br> United States
                                    </span>
                                </address>
                                <div class="mb-4">
                                    <a href="mailto:sale@bookworm.com"
                                        class="font-size-2 d-block link-black-100 mb-1">sale@bookworm.com</a>
                                    <a href="tel:+1246-345-0695" class="font-size-2 d-block link-black-100">+1
                                        246-345-0695</a>
                                </div>
                                <ul class="list-unstyled mb-0 d-flex">
                                    <li class="btn pl-0">
                                        <a class="link-black-100" href="index.html#">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </li>
                                    <li class="btn">
                                        <a class="link-black-100" href="index.html#">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                    </li>
                                    <li class="btn">
                                        <a class="link-black-100" href="index.html#">
                                            <span class="fab fa-youtube"></span>
                                        </a>
                                    </li>
                                    <li class="btn">
                                        <a class="link-black-100" href="index.html#">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li class="btn">
                                        <a class="link-black-100" href="index.html#">
                                            <span class="fab fa-pinterest"></span>
                                        </a>
                                    </li>
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
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Bookmarks</a>
                                </li>
                                <li class="pt-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Sign in/Join</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Customer Service</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Help Center</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Returns</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Product Recalls</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Accessibility</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Contact Us</a>
                                </li>
                                <li class="pt-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Store Pickup</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
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
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Security</a>
                                </li>
                                <li class="pt-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Privacy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 mb-6 mb-lg-0">
                            <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Categories</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="pb-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Action</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Comedy</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Drama</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Horror</a>
                                </li>
                                <li class="py-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Kids</a>
                                </li>
                                <li class="pt-2">
                                    <a class="widgets-hover transition-3d-hover font-size-2 link-black-100"
                                        href="index.html#">Romantic Comedy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-1">
                <div class="container">
                    <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center">

                        <p class="mb-3 mb-lg-0 font-size-2">©2020 Book Worm. All rights reserved</p>

                        <div class="ml-auto d-lg-flex align-items-center">
                            <div class="mb-4 mb-lg-0 mr-5">
                                <img class="img-fluid" src="assets/img/324x38/img1.png" alt="Image-Description">
                            </div>

                            <select class="js-select selectpicker dropdown-select mb-3 mb-lg-0"
                                data-style="border px-4 py-2 rounded-0 height-5 outline-none shadow-none form-control font-size-2"
                                data-dropdown-align-right="true">
                                <option value="one" selected>English (United States)</option>
                                <option value="two">Deutsch</option>
                                <option value="three">Français</option>
                                <option value="four">Español</option>
                            </select>


                            <select class="js-select selectpicker dropdown-select ml-md-3"
                                data-style="border px-4 py-2 rounded-0 height-5 outline-none shadow-none form-control font-size-2"
                                data-dropdown-align-right="true" data-width="fit">
                                <option value="one" selected>$ USD</option>
                                <option value="two">€ EUR</option>
                                <option value="three">₺ TL</option>
                                <option value="four">₽ RUB</option>
                            </select>
                        </div>
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
</body>

</html>