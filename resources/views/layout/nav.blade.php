<div class="menu-bar container-fluid">
    <a class="logo-link navbar-brand" href="/">
        <img src="{{ asset('assets/images/bookmebus.png') }}" alt="BookMeBus" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="menu-contents collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav nav-pills me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">
                    <span class="iconify" data-icon="fa-solid:home"></span>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="dropdown-btn btn btn-link">
                        <span class="iconify" data-icon="bxs:contact"></span>
                        Contact
                        <i class="bi-arrow-down-square" style="font-size:11px;"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#"> Hotline +855 10 318 316 | +855 12 318 316 - Available from 8AM to 5PM
                        </a>
                        <a href="#">
                            Live support - Available from 8AM to 11PM
                        </a>
                        <a href="#"> Email - support@bookmebus.com</a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="right-nav" style="color: white;">
            <ul class="navbar-nav nav nav-pills me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="/newPage">
                            <span class="iconify" data-icon="uil:user"></span>
                            Hello, {{ Auth::user()->name }}
                        </a>
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ url('login') }}">
                            <span class="iconify" data-icon="oi:account-login"></span>
                            Login
                        </a>
                    @endguest
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('logout') }}">
                            <span class="iconify" data-icon="ic:baseline-logout" data-rotate="180deg"></span>
                            Logout
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                    @guest
                        <a class="nav-link" href="/register">
                            <span class="iconify" data-icon="mdi:register"></span>
                            Register
                        </a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</div>
