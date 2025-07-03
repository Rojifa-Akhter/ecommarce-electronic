@extends('layouts.user')

@section('title', 'Change Password')

@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Left: Change Password Form -->
            <div class="col-md-12 d-flex align-items-center justify-content-center p-5">
                <div class="w-100" style="max-width: 400px;">
                    <h2 class="fw-bold mb-3">Change Password</h2>
                    <p class="mb-4 text-white-50">
                        Update your current password below.
                    </p>

                    <form method="POST" action="{{ url('/auth/change-pass') }}">
                        @csrf

                        <!-- Current Password -->
                        <div class="mb-3 position-relative">
                            <i class="bi bi-lock form-icon"></i>
                            <input type="password" name="current_password" class="form-control ps-5"
                                placeholder="Current Password" required>
                        </div>

                        <!-- New Password -->
                        <div class="mb-3 position-relative">
                            <i class="bi bi-lock-fill form-icon"></i>
                            <input type="password" name="new_password" class="form-control ps-5" placeholder="New Password"
                                required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4 position-relative">
                            <i class="bi bi-lock-fill form-icon"></i>
                            <input type="password" name="new_password_confirmation" class="form-control ps-5"
                                placeholder="Confirm New Password" required>
                        </div>

                        <button type="submit" class="btn w-100 py-2"
                            style="background-color: #dcb76c; color: #000; font-weight: 600;">
                            Change Password
                        </button>
                    </form>

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="mt-3 text-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('success') && !$errors->any())
                        <div class="mt-3 text-success">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </div>


        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-control {
            background-color: #1a1a1a;
            color: white;
            border: none;
            border-radius: 8px;
        }

        .form-control::placeholder {
            color: #999;
        }
    </style>
@endpush
