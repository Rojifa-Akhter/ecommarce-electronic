<header class="navbar navbar-expand-lg navbar-dark bg-black px-4 py-2">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        {{-- Left: Logo --}}
        <a class="navbar-brand d-flex align-items-center gap-2 text-warning fw-bold" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
        </a>

        {{-- Right: Notification + User --}}
        <div class="d-flex align-items-center gap-3">

            {{-- Notification Bell --}}
            <a href="#" class="position-relative">
                <i class="bi bi-bell-fill text-warning fs-5"></i>
                {{-- Optional: Badge --}}
                <span
                    class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle d-none">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>

            {{-- User Info --}}
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                    id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->check() && auth()->user()->image ? asset(auth()->user()->image) : asset('uploads/profile_images/default_user.png') }}"
                        alt="Profile" class="rounded-circle me-2" width="32" height="32"
                        style="object-fit: cover;">

                    <span class="text-white small">{{ auth()->check() ? auth()->user()->name : 'Jhon Doe' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                    <li><a class="dropdown-item" href="{{ url('/auth/profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ url('/auth/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
