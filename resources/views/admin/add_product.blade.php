@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 950px; margin: auto; border: 1px solid #2a2a2a;">
    <h6 class="mb-4 text-secondary fw-semibold fs-6">Add product</h6>

    <!-- Upload Area -->
    <div class="mb-3 border border-warning rounded text-center py-5" style="border-style: dashed;">
        <i class="bi bi-cloud-upload fs-3 text-warning mb-2 d-block"></i>
        <p class="small text-white-50 mb-0">Drop your image here or <a href="#" class="text-warning text-decoration-none fw-semibold">BROWSE</a></p>
    </div>

    <!-- Preview Images -->
    <div class="d-flex gap-2 mb-4">
        <img src="{{ asset('images/sample1.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
        <img src="{{ asset('images/sample2.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
    </div>

    <form>
        <!-- Product Title -->
        <div class="mb-3">
            <label class="form-label text-white">Product Title</label>
            <input type="text" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Product title">
        </div>

        <!-- Category & Brand -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-white">Category</label>
                <select class="form-select bg-black border-secondary text-white rounded-0 py-2">
                    <option selected disabled>Choose category</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label text-white">Brand</label>
                <select class="form-select bg-black border-secondary text-white rounded-0 py-2">
                    <option selected disabled>Choose brand</option>
                </select>
            </div>
        </div>

        <!-- Price & Sale Price -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-white">Product Price</label>
                <input type="text" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="$ Price">
            </div>
            <div class="col-md-6">
                <label class="form-label text-white">Sale Price</label>
                <input type="text" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="$ Sale price">
            </div>
        </div>

        <!-- SKU, Stock, Tags -->
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label text-white">SKU</label>
                <input type="text" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Enter SKU">
            </div>
            <div class="col-md-4">
                <label class="form-label text-white">Stock</label>
                <select class="form-select bg-black border-secondary text-white rounded-0 py-2">
                    <option selected disabled>Choose...</option>
                    <option>In stock</option>
                    <option>Out of stock</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label text-white">Tag</label>
                <input type="text" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Tags">
            </div>
        </div>

        <!-- Colors -->
        <div class="mb-3">
            <label class="form-label text-white">Color</label>
            <div class="d-flex gap-2">
                @foreach(['#a8413a', '#403c3d', '#1976d2', '#00bcd4', '#ffffff'] as $color)
                    <div class="rounded-circle border border-secondary" style="width: 22px; height: 22px; background-color: {{ $color }};"></div>
                @endforeach
            </div>
        </div>

        <!-- Size Buttons -->
        <div class="mb-4">
            <label class="form-label text-white">Size</label>
            <div class="d-flex gap-2">
                @foreach(['S', 'M', 'L', 'XL'] as $size)
                    <button type="button"
                        class="btn border text-white px-3 py-1 {{ $size === 'L' ? 'bg-warning text-black' : 'btn-outline-light' }}">
                        {{ $size }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="form-label text-white">Product description</label>
            <textarea rows="5" class="form-control bg-black border-secondary text-white rounded-0"
                      placeholder="Short description about your product..."></textarea>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2">
            <a href="#" class="btn btn-outline-secondary rounded-0 px-4">Cancel</a>
            <button type="submit" class="btn fw-semibold text-black rounded-0 px-4" style="background-color: #d4af37;">ADD</button>
        </div>
    </form>
</div>
@endsection
