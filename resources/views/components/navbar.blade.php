<header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="light">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!--<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="."> Capstone Project </a>
        </h1>-->
        <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                <div class="d-none d-xl-block ps-2">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="mt-1 small text-muted">
                        @if(Auth::user()->role === 0)
                            Admin
                        @elseif(Auth::user()->role === 1)
                            Sub-admin
                        @else
                            Unknown
                        @endif
                    </div>
                 
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="{{ route('account-settings') }}" class="dropdown-item">Account settings</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
            </div>
        </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            <ul class="navbar-nav">
            @if(Auth::user()->role === 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 4h6v8h-6z"></path>
                    <path d="M4 16h6v4h-6z"></path>
                    <path d="M14 12h6v8h-6z"></path>
                    <path d="M14 4h6v4h-6z"></path>
                    </svg>
                </span>
                <span class="nav-link-title"> Dashboard </span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('records') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                    <path d="M10 12l4 0"></path>
                    </svg>
                </span>
                <span class="nav-link-title"> Records </span>
                </a>
            </li>
            @if(Auth::user()->role === 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reports') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M9 17l0 -5"></path>
                    <path d="M12 17l0 -1"></path>
                    <path d="M15 17l0 -3"></path>
                    </svg>
                </span>
                <span class="nav-link-title"> Reports </span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user-management') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                </span>
                <span class="nav-link-title"> User management </span>
                </a>
            </li>
            @endif
            </ul>
        </div>
        </div>
    </div>
</header>