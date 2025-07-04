<aside class="d-flex flex-column justify-content-between p-4" style="width: 220px; min-height: 100vh; background-color: #111; ">
    {{-- Top: Logo + Menu --}}
    <div>
        {{-- Menu Items --}}
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link d-flex align-items-center gap-2 active" style="background-color: #d4af37; color: #000;">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/products') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-box-seam"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/users') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-people"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/categories') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-tags"></i>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/settings') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>
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
