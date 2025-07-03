@extends('layouts.user')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Left: Forgot Password Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
                <div class="w-100" style="max-width: 400px;">
                    <h2 class="fw-bold mb-3">Forgot Password?</h2>
                    <p class="mb-4 text-white-50">
                        Enter your email address below and we’ll send you a link to reset your password.
                    </p>

                    <form method="POST" action="{{ url('/auth/forgot-pass') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3 position-relative">
                            <i class="bi bi-envelope form-icon"></i>
                            <input type="email" name="email" class="form-control ps-5"
                                placeholder="yourname@example.com" required autofocus>
                        </div>

                        <button type="submit" class="btn w-100 py-2"
                            style="background-color: #dcb76c; color: #000; font-weight: 600;">
                            Send OTP
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
                    @if (session('status'))
                        <div class="mt-3 text-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-4 text-center">
                        <p class="text-white-50 small">
                            Remember your password? <a href="{{ url('/auth/login') }}" class="text-warning">Log in</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="{{ asset('images/sign.png') }}" alt="Forgot Password Image"
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
