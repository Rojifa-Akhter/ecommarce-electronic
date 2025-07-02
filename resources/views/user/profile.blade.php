@extends('layouts.user')

@section('title', 'My Profile')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ url()->previous() }}" class="text-white me-3">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h2 class="mb-0">My Profile</h2>
        </div>
        <p class="text-white-50 mb-4">Here you can see your profile & your product order list also give review.</p>

        <!-- Profile Card -->
        <div class="text-center mb-5" style="max-width: 320px; margin: auto; position: relative;">
            <!-- Profile Image with Edit Icon on Bottom Right -->
            <div class="position-relative d-inline-block" style="width: 120px; height: 120px;">
                <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('images/user-placeholder.png') }}"
                    class="rounded-circle border border-warning" width="120" height="120" style="object-fit: cover;">

                <!-- ✏️ Edit Icon positioned at bottom-right -->
                <a href="{{ url('/auth/edit-profile') }}"
                    class="position-absolute bottom-0 end-0 translate-middle p-1 bg-dark text-warning rounded-circle"
                    style="transform: translate(50%, 50%);" title="Edit Profile">
                    <i class="bi bi-pencil-fill"></i>
                </a>
            </div>

            <!-- User Info -->
            <h5 class="mt-3 mb-0">{{ auth()->user()->name ?? 'Your Name' }}</h5>
            <p class="text-white-50 small">{{ auth()->user()->email ?? 'you@example.com' }}</p>
        </div>



        <!-- Orders Table -->
        <div class="bg-dark p-4 rounded shadow">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="text-white mb-0">Your order list</h5>
                <a href="#" class="text-warning small text-decoration-none">See all</a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-borderless align-middle mb-0">
                    <thead class="border-bottom border-secondary">
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 8; $i++)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <img src="{{ asset('images/product-placeholder.png') }}" class="me-2"
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    <span>Radiant Rose Cocktail Dress</span>
                                </td>
                                <td>$3500.00</td>
                                <td>
                                    @if ($i % 2 === 0)
                                        <span class="badge bg-success">Delivered</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($i % 2 === 0)
                                        <span class="text-warning">★★★★★</span>
                                    @else
                                        <a href="#" class="text-warning text-decoration-none">Give review</a>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
