@extends('layouts.admin')

@section('title', 'View User')

@section('content')
    <div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 750px; margin: auto; border: 1px solid #2a2a2a;">
        <h6 class="mb-4 text-secondary fw-semibold fs-6">User Details</h6>

        <!-- Profile Image -->
        <div class="text-center mb-4">
            <img src="{{ $user->image }}" class="rounded-circle shadow" width="100" height="100"
                style="object-fit: cover;">
        </div>


        <!-- Name & Email -->
        <div class="mb-3">
            <label class="form-label text-secondary">Name</label>
            <div class="form-control bg-black border-secondary text-white rounded-0 py-2">{{ $user->name }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label text-secondary">Email</label>
            <div class="form-control bg-black border-secondary text-white rounded-0 py-2">{{ $user->email }}</div>
        </div>

        <!-- Phone & Address -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">Phone</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    {{ $user->phone ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label text-secondary">Address</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    {{ $user->address ?? 'N/A' }}
                </div>
            </div>
        </div>

        <!-- Role, Status -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">Role</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    {{ ucfirst($user->role) }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label text-secondary">Status</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    {{ ucfirst($user->status) }}
                </div>
            </div>
        </div>

        <!-- Created At -->
        <div class="mb-4">
            <label class="form-label text-secondary">Registered On</label>
            <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                {{ $user->created_at->format('d M, Y') }}
            </div>
        </div>

        <!-- Back Button -->
        <div class="d-flex justify-content-end">
            <a href="{{ url('user-list') }}" class="btn btn-outline-secondary rounded-0 px-4">Back</a>
        </div>
    </div>
@endsection
