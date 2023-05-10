<nav class="sidebar-nav">
    <ul>
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
        <li class="nav-item nav-item-has-children {{ request()->routeIs('role.*') ? 'active' : '' }}">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <i class="lni lni-users"></i>
                </span>
                <span class="text">User Manage </span>
            </a>
            <ul id="ddmenu_2" class="collapse ">
                <li>
                    <a href="">
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

        <li class="nav-item  {{ request()->routeIs('admin.country.*') ? 'active' : '' }}">
            <a href="{{ route('admin.country.add') }}">
                <span class="icon">
                    <i class="lni lni-users"></i>
                </span>
                <span class="text">Countries</span>
            </a>

        </li>


        <li class="nav-item nav-item-has-children {{ request()->routeIs('admin.questions.*') ? 'active' : '' }}">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#questions"
                aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <i class="lni lni-users"></i>
                </span>
                <span class="text">Questions Manage </span>
            </a>
            <ul id="questions" class="collapse ">
                <li>
                    <a href="">
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

    </ul>
</nav>