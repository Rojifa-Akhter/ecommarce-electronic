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
                </select>
                <span class="text-white">users per page</span>
            </div>

            <!-- Search by name or email -->
            <form method="GET" class="d-flex gap-2 mb-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="form-control bg-dark text-white border-0" placeholder="Search by name or email...">

                <button type="submit" class="btn btn-warning">Filter</button>
                <a href="{{ url('user-list') }}" class="btn btn-secondary">Reset</a>
            </form>


        </div>

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-borderless align-middle text-white mb-0">
                <thead class="text-uppercase small" style="color: #aaa; border-bottom: 1px solid #333;">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Image</th>
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
                            <td>
                                @if ($user->image)
                                    <img src="{{ $user->image }}" alt="User Image" width="50" height="50"
                                        style="object-fit: cover;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <a href="{{ url('/admin/show-user/' . $user->id) }}" class="text-success me-2"><i
                                        class="bi bi-eye-fill"></i></a>
                                <form action="{{ url('delete-user/' . $user->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        style="border: none; background: none;">
                                        <i class="bi bi-trash-fill text-danger"></i>
                                    </button>
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
            <small class="text-secondary">Showing 10 users</small>

            <!-- Pagination -->
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i
                            class="bi bi-chevron-left"></i></a></li>
                <li class="page-item"><a class="page-link bg-warning text-black border-0" href="#">1</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">2</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">3</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i
                            class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

@endsection
@section('scripts')
    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
        }, 300);
    </script>
@endsection
