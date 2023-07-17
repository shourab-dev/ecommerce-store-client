<nav class="sidebar-nav">
    <ul>
        {{-- * DASHBAORD --}}
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="collapsed">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22">
                        <path
                            d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                    </svg>
                </span>
                <span class="text">Dashboard</span>
            </a>

        </li>
        {{-- * DASHBAORD END--}}
        {{-- * ORDERS --}}
       <li class="nav-item nav-item-has-children {{ request()->routeIs('admin.order.*') ? 'active' : '' }}">
        <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#orderMenu" aria-controls="ddmenu_2"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
                <i class="lni lni-inbox"></i>
            </span>
            <span class="text"> Orders </span>
        </a>
        <ul id="orderMenu" class="collapse ">
        
            <li>
                <a href="{{ route('admin.orders.all') }}">
                   All Orders
                </a>
            </li>
    
        </ul>
    </li>
        {{-- * ORDERS END--}}

        {{-- * MANAGE USERS --}}
        <li class="nav-item nav-item-has-children {{ request()->routeIs('role.*') ? 'active' : '' }}">
            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <i class="lni lni-users"></i>
                </span>
                <span class="text"> Manage User </span>
            </a>
            <ul id="ddmenu_2" class="collapse ">
                <li>
                    <a href="{{ route('role.user.all') }}">
                        Users List
                    </a>
                </li>
                <li>
                    <a href="{{ route('role.all') }}">
                        Roles List
                    </a>
                </li>

            </ul>
        </li>
        {{-- * MANAGE USERS END--}}

        {{-- ! MANAGE COUTRY [UNDER GOING DEVELOPMENT]--}}
        {{-- <li class="nav-item  {{ request()->routeIs('admin.country.*') ? 'active' : '' }}">
            <a href="{{ route('admin.country.add') }}">
                <span class="icon">
                    <i class="lni lni-money-location"></i>
                </span>
                <span class="text">Countries</span>
            </a>

        </li> --}}
        {{-- ! MANAGE COUTRY END--}}

        {{-- * MANAGE CLASS --}}
        <li class="nav-item  {{ request()->routeIs('admin.class.*') ? 'active' : '' }}">
            <a href="{{ route('admin.class.add') }}">
                <span class="icon">
                    <i class="lni lni-enter"></i>
                </span>
                <span class="text">Manage Categories</span>
            </a>

        </li>
        {{-- * MANAGE CLASS END--}}

        {{-- ! [DEDUCTED FROM PRODUCTTION] MANAGE SUBJECT--}}
        {{-- <li class="nav-item  {{ request()->routeIs('admin.subject.*') ? 'active' : '' }}">
            <a href="{{ route('admin.subject.add') }}">
                <span class="icon">
                    <i class="lni lni-write"></i>
                </span>
                <span class="text">Manage Sub-Categories</span>
            </a>

        </li> --}}
        {{-- ! [DEDUCTED FROM PRODUCTTION] MANAGE SUBJECT END--}}

       
        {{-- * MANAGE QUESTION --}}
        <li class="nav-item nav-item-has-children {{ request()->routeIs('admin.questions.*') ? 'active' : '' }}">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#questions"
                aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <i class="lni lni-files"></i>
                </span>
                <span class="text">Questions Manage </span>
            </a>
            <ul id="questions" class="collapse ">
                <li>
                    <a href="{{ route('admin.questions.create') }}">
                        Add Questions
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.questions.all') }}">
                        Questions List
                    </a>
                </li>

            </ul>
        </li>
        {{-- * MANAGE QUESTION END--}}

        {{-- * MANAGE BOOKS --}}
        <li class="nav-item nav-item-has-children {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#books" aria-controls="ddmenu_2"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <i class="lni lni-book"></i>
                </span>
                <span class="text">Manage Books</span>
            </a>
            <ul id="books" class="collapse ">
                <li>
                    <a href="{{ route('admin.books.create') }}">
                        Add Book
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.books.all') }}">
                        Books List
                    </a>
                </li>

            </ul>
        </li>
        {{-- * MANAGE BOOKS ENDS --}}

    </ul>
</nav>