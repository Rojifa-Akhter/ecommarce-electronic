@extends('layouts.user')

@section('title', 'Sign Up')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left Column: Signup Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">

                <!-- Heading -->
                <h2 class="fw-bold mb-2">Welcome!</h2>
                <p class="mb-4 text-muted">Give us some information to create the account.</p>

                <!-- Form -->
                <form method="POST" action="signup">
                    @csrf
                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope form-icon"></i>
                        <input type="email" class="form-control ps-5" name="email" placeholder="ivan231@gmail.com" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" class="form-control ps-5" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <i class="bi bi-key form-icon"></i>
                        <input type="password" class="form-control ps-5" name="password" placeholder="Enter password" required>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" required checked>
                        <label class="form-check-label small text-muted" for="terms">
                            By creating an account, you agree to the
                            <a href="#" class="text-warning">terms of conditions</a> &
                            <a href="#" class="text-warning">privacy policy</a>.
                        </label>
                    </div>

                    <button type="submit" class="btn w-100 py-2" style="background-color: #dcb76c; color: #000; font-weight: 600;">Sign up</button>
                </form>
            </div>
        </div>

        <!-- Right Column: Image -->
        <div class="col-md-6 d-none d-md-block p-0">
            <img src="{{ asset('images/sign.png') }}" alt="Signup Visual" class="img-fluid h-100 w-100 object-fit-cover">
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
