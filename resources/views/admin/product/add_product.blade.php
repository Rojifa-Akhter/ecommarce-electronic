@extends('layouts.admin')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
    <div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 950px; margin: auto; border: 1px solid #2a2a2a;">
        <h6 class="mb-4 text-secondary fw-semibold fs-6">
            {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
        </h6>

        <form action="{{ isset($product) ? url('admin/update-product/' . $product->id) : url('admin/add-product') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <!-- Upload Area -->
            <div class="mb-3 border border-warning rounded text-center py-5" style="border-style: dashed;" required>
                <i class="bi bi-cloud-upload fs-3 text-warning mb-2 d-block"></i>
                <p class="small text-white-50 mb-0">Drop your image here or
                    <label for="image-upload" class="text-warning text-decoration-none fw-semibold"
                        style="cursor: pointer;">BROWSE</label>
                    <input type="file" name="image[]" id="image-upload" class="d-none" multiple>

                </p>
            </div>

            <!-- Preview Images (Static for now) -->
            <div id="preview-images" class="d-flex gap-2 mb-4">
                @if (isset($product) && is_array($product->image) && count($product->image) > 0)
                    @foreach ($product->image as $img)
                        <img src="{{ $img }}" class="rounded" width="65" height="65"
                            style="object-fit: cover;">
                    @endforeach
                @else
                    <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65"
                        style="object-fit: cover;">
                @endif
            </div>


            <!-- Product Title -->
            <div class="mb-3">
                <label class="form-label text-white">Product Title</label>
                <input type="text" name="title" value="{{ old('title', $product->title ?? '') }}"
                    class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Product title">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category & Price -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Category</label>
                    <select name="category_id" class="form-select bg-black border-secondary text-white rounded-0 py-2">
                        <option selected disabled>Choose category</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">Product Price</label>
                    <input type="text" name="price" value="{{ old('price', $product->price ?? '') }}"
                        class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="$ Price">

                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
            </div>

            <!-- SKU & Stock -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}"
                        class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="Enter SKU">

                    @error('sku')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
                <div class="col-md-6">
                    <label class="form-label text-white">Stock</label>
                    <select name="stock" class="form-select bg-black border-secondary text-white rounded-0 py-2">
                        <option disabled>Choose...</option>
                        <option value="In stock" {{ old('stock', $product->stock ?? '') == 'In stock' ? 'selected' : '' }}>
                            In stock</option>
                        <option value="Out of stock"
                            {{ old('stock', $product->stock ?? '') == 'Out of stock' ? 'selected' : '' }}>Out of stock
                        </option>
                    </select>

                    @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="form-label text-white">Product Description</label>
                <textarea name="description" rows="5" class="form-control bg-black border-secondary text-white rounded-0"
                    placeholder="Short description about your product...">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ url('admin/product-list') }}" class="btn btn-outline-secondary rounded-0 px-4">Cancel</a>
                <button type="submit" class="btn fw-semibold text-black rounded-0 px-4" style="background-color: #d4af37;">
                    {{ isset($product) ? 'UPDATE' : 'ADD' }}
                </button>

            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const imageInput = document.getElementById('image-upload');
        const previewDiv = document.getElementById('preview-images');

        imageInput.addEventListener('change', function() {
            // age preview clear kore dibo
            previewDiv.innerHTML = '';

            const files = Array.from(this.files);

            if (files.length === 0) {
                // jodi kichu select na kore, tahole abar default image dekhabo
                previewDiv.innerHTML = `
                <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
                <img src="{{ asset('images/1.jpg') }}" class="rounded" width="65" height="65" style="object-fit: cover;">
            `;
            }

            files.forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'rounded';
                    img.width = 65;
                    img.height = 65;
                    img.style.objectFit = 'cover';
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
