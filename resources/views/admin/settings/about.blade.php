@extends('layouts.admin')

@section('title', 'Manage About')

@section('content')
<div class="container" style="max-width: 950px;">
    <form method="POST" action="{{ url('add-about') }}" enctype="multipart/form-data" class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
        @csrf

        {{-- Show Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label text-white">Add Title</label>
            <input type="text" name="title"
                   class="form-control bg-black text-white border-secondary rounded-0"
                   placeholder="This is about page."
                   required
                   value="{{ old('title', $about->title ?? '') }}">
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label text-white">Add Description</label>
            <textarea rows="5" name="description" class="form-control bg-black text-white border-secondary rounded-0" required>{{ old('description', $about->description ?? '') }}</textarea>
        </div>

        {{-- Existing Images Preview --}}
        @if (!empty($about) && !empty($about->images))
            <div class="mb-3">
                <label class="form-label text-white">Existing Images</label>
                <div class="d-flex gap-2">
                    @foreach (json_decode($about->images, true) as $image)
                        <div>
                            <img src="{{ asset('uploads/abouts/' . $image) }}" width="100" class="rounded mb-2">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Upload Images --}}
        <div class="mb-3">
            <label class="form-label text-white">Upload New Images (Max 3)</label>
            <input type="file" name="images[]" multiple accept="image/*" class="form-control bg-black text-white border-secondary rounded-0">
            <small class="text-muted">Uploading new images will merge with existing (max 3 total).</small>
        </div>

        {{-- Submit --}}
        <div class="text-end">
            <button type="submit" class="btn fw-semibold text-black px-4" style="background-color: #d4af37;">{{ $about ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
