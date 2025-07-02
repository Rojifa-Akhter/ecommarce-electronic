@extends('layouts.user')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Left: Reset Password Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
                <div class="w-100" style="max-width: 400px;">
                    <h2 class="fw-bold mb-3">Reset Password</h2>
                    <p class="mb-4 text-muted">
                        Enter your new password below.
                    </p>

                    <form method="POST" action="{{ url('/auth/reset-pass') }}">
                        @csrf

                        <!-- Email -->
                        <input type="hidden" name="email" value="{{ session('email') }}">

                        <!-- OTP -->
                        <div class="mb-3 position-relative">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" name="otp" class="form-control" placeholder="Enter the OTP from email"
                                required>
                        </div>

                        <!-- New Password -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="New Password" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3 position-relative">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="mt-3 text-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Success -->
                    @if (session('status'))
                        <div class="mt-3 text-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="{{ asset('images/sign.png') }}" alt="Reset Password Image"
                    class="img-fluid h-100 w-100 object-fit-cover">
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
