@extends('layouts.admin')

@section('title', 'View Product')

@section('content')
    <div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 950px; margin: auto; border: 1px solid #2a2a2a;">
        <h6 class="mb-4 text-secondary fw-semibold fs-6">Product Details</h6>

        <!-- Image Preview -->
        <div class="mb-4 d-flex gap-2 flex-wrap">
            @if ($product->image && is_array($product->image))
                @foreach ($product->image as $img)
                    <img src="{{ $img }}" class="rounded" width="65" height="65" style="object-fit: cover;">
                @endforeach
            @else
                <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65"
                    style="object-fit: cover;">
            @endif

        </div>

        <!-- Product Title -->
        <div class="mb-3">
            <label class="form-label text-secondary">Title</label>
            <div class="form-control bg-black border-secondary text-white rounded-0 py-2">{{ $product->title }}</div>
        </div>

        <!-- Category & Price -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">Category</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    {{ $product->category->name ?? 'N/A' }}</div>
            </div>

            <div class="col-md-6">
                <label class="form-label text-secondary">Price</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">
                    ${{ number_format($product->price, 2) }}</div>
            </div>
        </div>

        <!-- SKU & Stock -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">SKU</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">{{ $product->sku }}</div>
            </div>

            <div class="col-md-6">
                <label class="form-label text-secondary">Stock</label>
                <div class="form-control bg-black border-secondary text-white rounded-0 py-2">{{ $product->stock }}</div>
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="form-label text-secondary">Description</label>
            <div class="form-control bg-black border-secondary text-white rounded-0 py-2" style="white-space: pre-wrap;">
                {{ $product->description }}
            </div>
        </div>

        <!-- Back Button -->
        <div class="d-flex justify-content-end">
            <a href="{{ url('admin/product-list') }}" class="btn btn-outline-secondary rounded-0 px-4">Back</a>
        </div>
    </div>
@endsection
