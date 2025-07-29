@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 950px; margin: auto; border: 1px solid #2a2a2a;">
        <h6 class="mb-4 text-secondary fw-semibold fs-6">Add Product</h6>

        <!-- Upload Area -->
        <div class="mb-3 border border-warning rounded text-center py-5" style="border-style: dashed;">
            <i class="bi bi-cloud-upload fs-3 text-warning mb-2 d-block"></i>
            <p class="small text-white-50 mb-0">Drop your image here or
                <label for="image-upload" class="text-warning text-decoration-none fw-semibold"
                    style="cursor: pointer;">BROWSE</label>
                <input type="file" name="image[]" id="image-upload" class="d-none" multiple>
            </p>
        </div>

        <!-- Preview Images (Static for now) -->
        <div class="d-flex gap-2 mb-4">
            <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
            <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
        </div>

        <form action="{{ url('add-product') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Title -->
            <div class="mb-3">
                <label class="form-label text-white">Product Title</label>
                <input type="text" name="title"
                    class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Product title">
            </div>

            <!-- Category & Price -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Category</label>
                    <select name="category_id" class="form-select bg-black border-secondary text-white rounded-0 py-2">
                        <option selected disabled>Choose category</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">Product Price</label>
                    <input type="text" name="price"
                        class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="$ Price">
                </div>
            </div>

            <!-- SKU & Stock -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">SKU</label>
                    <input type="text" name="sku"
                        class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Enter SKU">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-white">Stock</label>
                    <select name="stock" class="form-select bg-black border-secondary text-white rounded-0 py-2">
                        <option selected disabled>Choose...</option>
                        <option value="In stock">In stock</option>
                        <option value="Out of stock">Out of stock</option>
                    </select>
                </div>
            </div>

            <!-- Colors -->
            <div class="mb-3">
                <label class="form-label text-white">Color</label>
                <div class="d-flex gap-2">
                    @foreach (['#a8413a', '#403c3d', '#1976d2', '#00bcd4', '#ffffff'] as $color)
                        <label>
                            <input type="checkbox" name="color[]" value="{{ $color }}" class="form-check-input me-1">
                            <span class="rounded-circle d-inline-block"
                                style="width: 22px; height: 22px; background-color: {{ $color }}; border: 1px solid #888;"></span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Size Buttons -->
            <div class="mb-4">
                <label class="form-label text-white">Size</label>
                <div class="d-flex gap-2">
                    @foreach (['S', 'M', 'L', 'XL'] as $size)
                        <label>
                            <input type="checkbox" name="size[]" value="{{ $size }}" class="btn-check"
                                id="size-{{ $size }}">
                            <label class="btn border text-white px-3 py-1 btn-outline-light"
                                for="size-{{ $size }}">{{ $size }}</label>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="form-label text-white">Product Description</label>
                <textarea name="description" rows="5" class="form-control bg-black border-secondary text-white rounded-0"
                    placeholder="Short description about your product..."></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ url('product-list') }}" class="btn btn-outline-secondary rounded-0 px-4">Cancel</a>
                <button type="submit" class="btn fw-semibold text-black rounded-0 px-4"
                    style="background-color: #d4af37;">ADD</button>
            </div>
        </form>
    </div>
@endsection
