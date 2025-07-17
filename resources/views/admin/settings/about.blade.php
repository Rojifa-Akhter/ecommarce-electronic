@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="container" style="max-width: 950px;">
    <form method="POST" action="/add-about" enctype="multipart/form-data" class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
        @csrf

        <!-- Add Title -->
        <div class="mb-3">
            <label class="form-label text-white">Add title</label>
            <input type="text" name="title"
            class="form-control bg-black text-white border-secondary rounded-0"
            placeholder="This is about page." required>
        </div>

        <!-- Add Description -->
        <div class="mb-3">
            <label class="form-label text-white">Add description</label>
            <textarea rows="5" name="description" class="form-control bg-black text-white border-secondary rounded-0" required></textarea>
        </div>

        <!-- Upload Image -->
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <label class="form-label text-white">Upload Images (Max 3)</label>

                <input type="file" name="images[]" id="imageInput" class="d-none" multiple accept="image/*">

                <div class="border border-warning rounded text-center py-5 upload-box" style="border-style: dashed; cursor: pointer;">
                    <i class="bi bi-cloud-upload text-warning fs-2 d-block mb-2"></i>
                    <p class="text-muted mb-0 small">Drop your image here or <span class="text-warning fw-semibold text-decoration-underline">BROWSE</span></p>
                    <div id="preview" class="mt-2 text-white small"></div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="col-md-6 text-end mt-4">
                <button type="submit" class="btn fw-semibold text-black px-4" style="background-color: #d4af37;">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.querySelector('.upload-box').addEventListener('click', function() {
        document.getElementById('imageInput').click();
    });

    document.getElementById('imageInput').addEventListener('change', function() {
        let preview = document.getElementById('preview');
        preview.innerHTML = '';
        for (let file of this.files) {
            preview.innerHTML += `<div>${file.name}</div>`;
        }
    });
</script>
@endsection
