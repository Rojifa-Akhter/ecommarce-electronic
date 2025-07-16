@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="container" style="max-width: 950px;">
    <form class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
        <!-- Add Title -->
        <div class="mb-3">
            <label class="form-label text-white">Add title</label>
            <input type="text" class="form-control bg-black text-white border-secondary rounded-0" placeholder="This is about page.">
        </div>

        <!-- Add Description -->
        <div class="mb-3">
            <label class="form-label text-white">Add description</label>
            <textarea rows="5" class="form-control bg-black text-white border-secondary rounded-0">Our product is the best product in the market...</textarea>
        </div>

        <!-- Upload Image -->
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <label class="form-label text-white">Upload image</label>
                <div class="border border-warning rounded text-center py-5" style="border-style: dashed;">
                    <i class="bi bi-cloud-upload text-warning fs-2 d-block mb-2"></i>
                    <p class="text-muted mb-0 small">Drop your image here or <a href="#" class="text-warning fw-semibold text-decoration-none">BROWSE</a></p>
                </div>
            </div>

            <!-- Save Button -->
            <div class="col-md-6 text-end mt-4">
                <button type="submit" class="btn fw-semibold text-black px-4" style="background-color: #d4af37;">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
