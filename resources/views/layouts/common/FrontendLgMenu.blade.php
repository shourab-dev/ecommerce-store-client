<ul class="nav">
    <li class="nav-item"><a href="index.html#"
            class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium active border-bottom border-primary border-width-2">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a id="homeDropdownInvoker" href="index.html#"
            class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
            aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#classes"
            data-unfold-type="css-animation" data-unfold-duration="200" data-unfold-delay="50"
            data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
            Classes

        </a>
        <ul id="classes" class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
            aria-labelledby="homeDropdownInvoker">
            @foreach ($classRooms as $classRoom)

            <li><a href="index.html" class="dropdown-item link-black-100">{{ $classRoom->name
                    }}</a></li>
            @endforeach

        </ul>
    </li>
    <li class="nav-item dropdown">
        <a id="homeDropdownInvoker" href="index.html#"
            class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
            aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#subjects"
            data-unfold-type="css-animation" data-unfold-duration="200" data-unfold-delay="50"
            data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
            Subjects

        </a>
        <ul id="subjects" class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
            aria-labelledby="homeDropdownInvoker">
            @foreach ($subjects as $subject)

            <li><a href="index.html" class="dropdown-item link-black-100">{{ $subject->name
                    }}</a></li>
            @endforeach

        </ul>
    </li>




    <li class="nav-item"><a href="index.html#"
            class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium  ">Questions
            Paper</a>
    </li>


</ul>