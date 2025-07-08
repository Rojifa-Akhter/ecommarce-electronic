@extends('layouts.admin')

@section('title', 'Category_list')

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
            <span class="text-white">on page</span>
        </div>

        <!-- Search -->
        <div class="d-flex gap-2 align-items-center">
            <input class="form-control bg-dark text-white border-0" style="min-width: 300px;" type="search" placeholder="Search categories by name...">
            <button class="btn btn-dark border border-secondary"><i class="bi bi-filter text-white"></i></button>
        </div>

        <!-- Add Category Button -->
        <a href="{{ url('/add-category') }}" class="btn text-warning border border-warning fw-semibold px-4">
            Add Category +
        </a>
    </div>

    <!-- Category Table -->
    <div class="table-responsive">
        <table class="table table-borderless align-middle text-white mb-0">
            <thead class="text-uppercase small" style="color: #aaa; border-bottom: 1px solid #333;">
                <tr>
                    <th>Sr. no.</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1, 10) as $i)
                <tr style="background-color: #1c1c1c;">
                    <td>{{ $i }}</td>
                    <td>Category {{ $i }}</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>{{ now()->subDays($i)->format('d M Y') }}</td>
                    <td>
                        <span class="{{ $i % 2 == 0 ? 'text-success' : 'text-danger' }}">
                            {{ $i % 2 == 0 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="#" class="text-success me-2"><i class="bi bi-eye-fill"></i></a>
                        <a href="#" class="text-warning me-2"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="text-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <tr style="height: 8px;"></tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-secondary">
        <small class="text-secondary">Showing 10 categories</small>

        <!-- Pagination -->
        <ul class="pagination pagination-sm mb-0">
            <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li class="page-item"><a class="page-link bg-warning text-black border-0" href="#">1</a></li>
            <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">2</a></li>
            <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">3</a></li>
            <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
    </div>
</div>
@endsection
