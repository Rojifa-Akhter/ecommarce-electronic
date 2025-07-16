@extends('layouts.admin')

@section('title', 'blogs')

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

        <!-- Search + filter -->
        <div class="d-flex gap-2 align-items-center">
            <input class="form-control bg-dark text-white border-0" style="min-width: 300px;" type="search" placeholder="Search products by name or SKU...">
            <button class="btn btn-dark border border-secondary"><i class="bi bi-filter text-white"></i></button>
        </div>

        <!-- Add Button -->
        <a href="{{ url('/add-product') }}" class="btn text-warning border border-warning fw-semibold px-4">
            Add new +
        </a>
    </div>

    <!-- Product Table -->
    <div class="table-responsive">
        <table class="table table-borderless align-middle text-white mb-0">
            <thead class="text-uppercase small" style="color: #aaa; border-bottom: 1px solid #333;">
                <tr>
                    <th>Sr. no.</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sale</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1, 10) as $i)
                <tr style="background-color: #1c1c1c;" class="rounded-3 mb-3">
                    <td>{{ $i }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('images/products/2.jpg') }}" alt="Product" width="40" height="40" class="rounded">
                            <span>Celestial Charm Dress</span>
                        </div>
                    </td>
                    <td style="color: #f5c542;">$560.00</td>
                    <td>1500</td>
                    <td>188</td>
                    <td>
                        <span class="{{ in_array($i, [3, 8]) ? 'text-danger' : 'text-success' }}">
                            {{ in_array($i, [3, 8]) ? 'Out of stock' : 'In stock' }}
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
        <small class="text-secondary">Showing 10 products</small>

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
