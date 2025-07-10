@extends('layouts.admin')

@section('title', 'User List')

@section('content')
<div class="p-4 rounded shadow-sm" style="background-color: #000;">

    <!-- Top Control Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <!-- Show per page -->
        <div class="d-flex align-items-center gap-2">
            <label for="entries" class="text-white">Showing</label>
            <select id="entries" class="form-select bg-dark text-white border-0" style="width: 80px;">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>
            <span class="text-white">users per page</span>
        </div>

        <!-- Search + filter -->
        <div class="d-flex gap-2 align-items-center">
            <input class="form-control bg-dark text-white border-0" style="min-width: 300px;" type="search" placeholder="Search users by name or email...">
            <button class="btn btn-dark border border-secondary"><i class="bi bi-filter text-white"></i></button>
        </div>

    </div>

    <!-- User Table -->
    <div class="table-responsive">
        <table class="table table-borderless align-middle text-white mb-0">
            <thead class="text-uppercase small" style="color: #aaa; border-bottom: 1px solid #333;">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr style="background-color: #1c1c1c;" class="rounded-3 mb-3">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="text-success me-2"><i class="bi bi-eye-fill"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-warning me-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-0"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                <tr style="height: 8px;"></tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-secondary">
        <small class="text-secondary">Showing {{ $users->count() }} users</small>
        <div>
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
