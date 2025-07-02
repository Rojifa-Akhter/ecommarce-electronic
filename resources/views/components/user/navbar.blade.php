<nav class="navbar navbar-expand-lg navbar-dark bg-black py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand text-warning fw-bold" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="80">
            <!-- OR just use initials: -->
            <!-- <span class="text-warning">A&R</span> -->
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About us</a>
                </li>
            </ul>
        </div>

        <!-- Cart and Login -->
        <!-- Cart and Login/User -->
        <div class="d-flex align-items-center gap-3">
            <a href="{{ url('/cart') }}" class="text-white">
                <i class="bi bi-cart" style="font-size: 1.2rem;"></i>
            </a>

            @if (auth()->check())
                <!-- Show user name -->
                <div class="dropdown">
                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="background-color: #d4af37; color: black;">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ url('/auth/profile') }}">Profile</a></li>
                        <li>
                            <form action="{{ url('/auth/logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item bg-transparent border-0 w-100 text-start">Logout</button>
                            </form>
                        </li>

                    </ul>
                </div>
            @else
                <!-- Show login button -->
                <a href="{{ url('/auth/login') }}" class="btn btn-sm" style="background-color: #d4af37; color: black;">
                    Login
                </a>
            @endif
        </div>

    </div>
</nav>
