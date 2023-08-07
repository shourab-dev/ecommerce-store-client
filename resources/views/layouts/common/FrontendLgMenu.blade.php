<ul class="nav">
    <li class="nav-item"><a href="{{ url('/') }}"
            class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ request()->routeIs('frontend.home') ? 'active border-bottom' : '' }}  border-primary border-width-2">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a id="homeDropdownInvoker" href="#"
            class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
            aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#classes"
            data-unfold-type="css-animation" data-unfold-duration="200" data-unfold-delay="50"
            data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
            Category

        </a>
        <ul id="classes" class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
            aria-labelledby="homeDropdownInvoker">

            @foreach ($classRooms as $classRoom)

            <li><a href="{{ route('frontend.product.class',$classRoom->slug) }}" class="dropdown-item link-black-100">{{
                    $classRoom->name
                    }}</a></li>
            @endforeach

        </ul>
    </li>
    {{-- ! SUBJECT IS DEDUCTED FROM PRODUCTION --}}
    <li class="nav-item dropdown">
        <a id="homeDropdownInvoker" href="#"
            class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
            aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#subjects"
            data-unfold-type="css-animation" data-unfold-duration="200" data-unfold-delay="50"
            data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
            Accessories
        </a>
        <ul id="subjects" class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
            aria-labelledby="homeDropdownInvoker">
            @foreach ($subjects as $subject)

            <li><a href="{{ route('frontend.product.subject',$subject->slug) }}" class="dropdown-item link-black-100">{{
                    str($subject->name)->headline()
                    }}</a></li>
            @endforeach

        </ul>
    </li>
    {{-- ! SUBJECT IS DEDUCTED FROM PRODUCTION --}}



    <li class="nav-item">
        <a href="{{ route('frontend.product.show') }}"
            class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ request()->routeIs('frontend.product.*') ? 'active border-bottom' : '' }} border-primary border-width-2">Shop</a>
    </li>

    {{-- ! QUESTION PAPER IS DEDUCTED --}}
    @if (isset($headerSetting) && $headerSetting->is_question == true)

    <li class="nav-item"><a href="{{ route('frontend.questions.all') }}"
            class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium  ">Questions
            Paper</a>
    </li>
    @endif
    {{-- ! QUESTION PAPER IS DEDUCTED --}}


</ul>