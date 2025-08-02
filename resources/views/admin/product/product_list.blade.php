@extends('layouts.admin')

@section('title', 'Product_list')

@section('content')
    <div class="p-4 rounded shadow-sm" style="background-color: #000;">

        <!-- Top Control Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-center gap-2">
                <label for="entries" class="text-white">Showing</label>
                <select id="entries" name="entries" class="form-select bg-dark text-white border-0" style="width: 80px;">
                    <option {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                </select>
                <span class="text-white">on page</span>
            </div>

            <!-- Search + filter -->
            <form method="GET" class="d-flex gap-2 mb-3">
                <input type="text" name="name" value="{{ request('name') }}"
                    class="form-control bg-dark text-white border-0" placeholder="Search by name...">

                <input type="date" name="created_at" value="{{ request('created_at') }}"
                    class="form-control bg-dark text-white border-0">

                <button type="submit" class="btn btn-warning">Filter</button>
                <a href="{{ url('admin/product-list') }}" class="btn btn-secondary">Reset</a>
            </form>

            <!-- Add Button -->
            <a href="{{ url('admin/add-product') }}" class="btn text-warning border border-warning fw-semibold px-4">
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
                    @foreach ($products as $key => $product)
                        <tr style="background-color: #1c1c1c;" class="rounded-3 mb-3">
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $product->image[0] ?? asset('images/products/default_image.jpg') }}"
                                        alt="Product" width="40" height="40" class="rounded">
                                    <span>{{ $product->title }}</span>
                                </div>
                            </td>
                            <td style="color: #f5c542;">${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->sale ?? 0 }}</td>
                            <td>
                                <span class="{{ $product->quantity < 1 ? 'text-danger' : 'text-success' }}">
                                    {{ $product->quantity < 1 ? 'Out of stock' : 'In stock' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ url('admin/show-product/' . $product->id) }}" class="text-success me-2"><i
                                        class="bi bi-eye-fill"></i></a>
                                <a href="{{ url('admin/edit-product/' . $product->id) }}" class="text-warning me-2"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ url('admin/delete-product/' . $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        style="border:none; background:none;">
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
            <small class="text-secondary">Showing 10 products</small>

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
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
