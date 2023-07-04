<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Talley</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
    @stack('customerCss')
</head>

<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('frontend/logo.png') }}" target="__blank" alt="logo" width="50" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22">
                                <path
                                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                            </svg>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>



                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#order"
                        aria-controls="order" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <i class="lni lni-book"></i>
                        </span>
                        <span class="text">My Orders</span>
                    </a>
                    <ul id="order" class="collapse dropdown-nav">
                        <li>
                            <a href="{{ route('user.myorder.ebook') }}"> Ebooks </a>
                        </li>
                        <li>
                            <a href="{{ route('user.myorder.physical') }}"> Delivered Books </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="notification.html">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.16667 19.25H12.8333C12.8333 20.2584 12.0083 21.0834 11 21.0834C9.99167 21.0834 9.16667 20.2584 9.16667 19.25ZM19.25 17.4167V18.3334H2.75V17.4167L4.58333 15.5834V10.0834C4.58333 7.24171 6.41667 4.76671 9.16667 3.94171V3.66671C9.16667 2.65837 9.99167 1.83337 11 1.83337C12.0083 1.83337 12.8333 2.65837 12.8333 3.66671V3.94171C15.5833 4.76671 17.4167 7.24171 17.4167 10.0834V15.5834L19.25 17.4167ZM15.5833 10.0834C15.5833 7.51671 13.5667 5.50004 11 5.50004C8.43333 5.50004 6.41667 7.51671 6.41667 10.0834V16.5H15.5833V10.0834Z" />
                            </svg>
                        </span>
                        <span class="text">Notifications</span>
                    </a>
                </li>
            </ul>
        </nav>

    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">



                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ auth()->guard('user')->user()->name }}</h6>

                                            <div class="image">
                                                <img src="{{ auth()->guard('user')->user()->profile_url ?? env('AVATAR_API').auth()->guard('user')->user()->name }}"
                                                    alt="{{ auth()->guard('user')->user()->name }}" />
                                                <span class="status"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="{{ route('user.profile') }}">
                                            <i class="lni lni-user"></i> View Profile
                                        </a>
                                    </li>


                                   
                                    <li>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                             document.getElementById('logout-form').submit();">
                                            <i class="lni lni-exit"></i> Sign Out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== MAIN CONTENT STARTS HERE ========== -->
        @yield('customerUi')
        <!-- ========== MAIN CONTENT ENDS HERE ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Designed and Developed by
                                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                    PlainAdmin
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                ">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('backend/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    @stack('customerJs')
</body>

</html>