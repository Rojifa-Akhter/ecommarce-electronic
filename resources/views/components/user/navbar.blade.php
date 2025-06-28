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
                    <a class="nav-link fw-bold" href="{{ url('/home') }}">Home</a>
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
        <div class="d-flex align-items-center gap-3">
            <a href="{{ url('/cart') }}" class="text-white">
                <i class="bi bi-cart" style="font-size: 1.2rem;"></i>
            </a>
            <a href="" class="btn btn-sm" style="background-color: #d4af37; color: black;">
                Login
            </a>
        </div>
    </div>
</nav>
