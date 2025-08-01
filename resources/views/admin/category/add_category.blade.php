@extends('layouts.admin')

@section('title', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')
    <div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 650px; margin: auto; border: 1px solid #2a2a2a;">
        <h6 class="mb-4 text-secondary fw-semibold fs-6">
            {{ isset($category) ? 'Edit Category' : 'Add New Category' }}
        </h6>

        <form action="{{ isset($category) ? url('update-category', $category->id) : url('add-category') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <!-- Category Name -->
            <div class="mb-3">
                <label class="form-label text-white">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
                    class="form-control bg-black border-secondary text-white rounded-0 py-2" required>
            </div>

            <!-- Category Image -->
            <div class="mb-3">
                <label class="form-label text-white">Category Image</label>
                <input type="file" name="image"
                    class="form-control bg-black text-white border-secondary rounded-0 py-2">
                @if (isset($category) && $category->image)
                    <div class="mt-2">
                        <img src="{{ $category->image }}" width="100" height="100" style="object-fit:cover;">
                    </div>
                @endif

            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label text-white">Description</label>
                <textarea name="description" rows="4" class="form-control bg-black border-secondary text-white rounded-0"
                    required>{{ old('description', $category->description ?? '') }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ url('categories') }}" class="btn btn-outline-secondary rounded-0 px-4">Cancel</a>
                <button type="submit" class="btn fw-semibold text-black rounded-0 px-4" style="background-color: #d4af37;">
                    {{ isset($category) ? 'Update' : 'Add' }}
                </button>
            </div>
        </form>
    </div>
@endsection
