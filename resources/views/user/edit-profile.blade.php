@extends('layouts.user')

@section('title', 'Edit Profile')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ url()->previous() }}" class="text-white me-3">
        <i class="bi bi-arrow-left fs-4"></i>
    </a>
    <h2 class="mb-0">Edit profile</h2>
</div>

<p class="text-white-50 mb-4">You can edit your profile picture & personal information</p>

<div class="d-flex justify-content-center">
    <form method="POST" action="{{ url('/auth/update-profile') }}" enctype="multipart/form-data" class="w-100" style="max-width: 400px;">
        @csrf

        <!-- Profile Image -->
        <div class="text-center mb-3">
            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center mx-auto mb-2" style="width: 100px; height: 100px;">
                <img id="profilePreview"  src="{{ auth()->user()->image }}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
            <label for="profileImage" class="btn btn-outline-warning btn-sm">
                <i class="bi bi-upload"></i> Add
            </label>
            <input type="file" name="image" id="profileImage" class="d-none" accept="image/*" onchange="previewImage(event)">
        </div>

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control bg-dark text-white border-0 rounded"
                   placeholder="Enter your full name"
                   value="{{ old('name', auth()->user()->name ?? '') }}">
        </div>

        <!-- Password with eye inside input -->
        <div class="mb-1 position-relative">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control bg-dark text-white border-0 rounded pe-5"
                   placeholder="********" id="passwordField"
                   value="{{ old('password', auth()->user()->password ?? '') }}"">

            <i class="bi bi-eye-slash position-absolute bottom-50 top-50 translate-middle-y" id="toggleIcon"
               style="right: 15px; cursor: pointer;" onclick="togglePassword()"></i>
        </div>
        <div class="text-end mb-3">
            <a href="{{ url('auth/change-pass') }}" class="text-decoration-none text-muted small">Change password</a>
        </div>
        <!-- Phone -->
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control bg-dark text-white border-0 rounded"
                   placeholder="Enter your phone number"
                   value="{{ old('phone', auth()->user()->phone ?? '') }}">
        </div>
        <!-- Address -->
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control bg-dark text-white border-0 rounded"
                   placeholder="Enter your address"
                   value="{{ old('address', auth()->user()->address ?? '') }}">
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn w-100 mt-2 my-4" style="background-color: #dcb76c; color: #000; font-weight: 600;">
            Save changes
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword() {
        const passwordField = document.getElementById('passwordField');
        const toggleIcon = document.getElementById('toggleIcon');
        const isHidden = passwordField.type === 'password';

        passwordField.type = isHidden ? 'text' : 'password';
        toggleIcon.classList.toggle('bi-eye');
        toggleIcon.classList.toggle('bi-eye-slash');
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('profilePreview').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
