@extends('layouts.user')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left: Login Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">

                <h2 class="fw-bold mb-3">Welcome back!</h2>
                <p class="mb-4 text-muted">Please fill in the below information to log in.</p>

                <form method="POST" action="">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope form-icon"></i>
                        <input type="email" name="email" class="form-control ps-5" placeholder="ivan123@gmail.com" required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-lock form-icon"></i>
                        <input type="password" name="password" class="form-control ps-5" placeholder="********" required>
                    </div>

                    <!-- Remember and Forgot -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-muted" for="remember">
                                Remember me
                            </label>
                        </div>
                        <a href="" class="text-warning small">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn w-100 py-2" style="background-color: #dcb76c; color: #000; font-weight: 600;">
                        Log in
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-muted small">Don’t have an account?
                        <a href="" class="text-warning">Sign up</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right: Image -->
        <div class="col-md-6 d-none d-md-block p-0">
            <img src="{{ asset('images/hero.png') }}" alt="Login Image" class="img-fluid h-100 w-100 object-fit-cover">
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
