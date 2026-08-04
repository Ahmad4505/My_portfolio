<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    {{-- Sidebar Toggle --}}
    <button id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3"
        type="button">

        <i class="fa fa-bars"></i>

    </button>

    <ul class="navbar-nav ml-auto">

        {{-- View Website --}}
        <li class="nav-item mx-1">

            <a class="nav-link"
                href="{{ route('home') }}"
                target="_blank"
                title="View Website">

                <i class="fas fa-external-link-alt fa-fw"></i>

            </a>

        </li>

        {{-- Messages Placeholder --}}
        <li class="nav-item dropdown no-arrow mx-1">

    <a class="nav-link"
        href="{{ route('Admin.messages.index') }}"
        role="button"
        aria-label="Messages">

        <i class="fas fa-envelope fa-fw"></i>

        @if (($unreadMessagesCount ?? 0) > 0)

            <span class="badge badge-danger badge-counter">
                {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }}
            </span>

        @endif

    </a>

</li>

        <div class="topbar-divider d-none d-sm-block"></div>

        {{-- User Information --}}
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name }}
                </span>

                <img class="img-profile rounded-circle"
                    src="{{ asset('assets/img/bg/2.png') }}"
                    alt="{{ Auth::user()->name }}">

            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <a class="dropdown-item"
                    href="{{ route('profile.edit') }}">

                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile

                </a>

                <div class="dropdown-divider"></div>

                <form method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                        class="dropdown-item text-left w-100">

                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                        Logout

                    </button>

                </form>

            </div>

        </li>

    </ul>

</nav>
