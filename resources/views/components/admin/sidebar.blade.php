<aside class="d-flex flex-column justify-content-between p-4"
    style="width: 220px; min-height: 100vh; background-color: #111; ">
    {{-- Top: Logo + Menu --}}
    <div>
        {{-- Menu Items --}}
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link d-flex align-items-center gap-2 active"
                    style="background-color: #d4af37; color: #000;">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/products') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-box-seam"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/users') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-people"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/categories') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-tags"></i>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#settingsSubmenu" role="button" aria-expanded="false"
                    aria-controls="settingsSubmenu"
                    class="nav-link text-white d-flex align-items-center justify-content-between gap-2">
                    <div>
                        <i class="bi bi-gear"></i>
                        Settings
                    </div>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse ps-4" id="settingsSubmenu">
                    <ul class="nav flex-column mt-2">
                        <li class="nav-item">
                            <a href="{{ url('/about') }}" class="nav-link text-white small">
                                <i class="bi bi-info-circle"></i>
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link text-white small">
                                <i class="bi bi-question-circle"></i>
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

    {{-- Bottom: Logout --}}
    <div>
        <a href="{{ url('/logout') }}" class="nav-link text-danger d-flex align-items-center gap-2">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>
    </div>
</aside>
