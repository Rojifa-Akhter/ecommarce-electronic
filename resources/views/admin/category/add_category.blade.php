@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="bg-black text-white p-4 rounded shadow-sm" style="max-width: 650px; margin: auto; border: 1px solid #2a2a2a;">
    <h6 class="mb-4 text-secondary fw-semibold fs-6">Add New Category</h6>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Category Name -->
        <div class="mb-3">
            <label class="form-label text-white">Category Name</label>
            <input type="text" name="name" class="form-control bg-black border-secondary text-white rounded-0 py-2" placeholder="e.g. Electronics" required>
        </div>


        <!-- Category Image -->
        <div class="mb-3">
            <label class="form-label text-white">Category Image</label>
            <input type="file" name="image" class="form-control bg-black text-white border-secondary rounded-0 py-2">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label text-white">Description</label>
            <textarea name="description" rows="4" class="form-control bg-black border-secondary text-white rounded-0" placeholder="Write a short description..."></textarea>
        </div>


        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2">
            <a href="" class="btn btn-outline-secondary rounded-0 px-4">Cancel</a>
            <button type="submit" class="btn fw-semibold text-black rounded-0 px-4" style="background-color: #d4af37;">ADD</button>
        </div>
    </form>
</div>
@endsection
