@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <div class="container" style="max-width: 950px;">
        <form method="POST" action="add-faq" class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
            @csrf
            <!-- Add Title -->
            <div class="mb-3">
                <label class="form-label text-white">Add Question</label>
                <input type="text" name="question" class="form-control bg-black text-white border-secondary rounded-0"
                    placeholder="What is your company about?" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Add Answer</label>
                <textarea rows="5" name="answer" class="form-control bg-black text-white border-secondary rounded-0"
                placeholder="It’s always good to hear a bit about the client’s company and its whereabouts..." required></textarea>
            </div>

            <!-- Save Button -->
            <div class="text-end mt-4">
                <button type="submit" class="btn fw-semibold text-black px-4"
                    style="background-color: #d4af37;">Save</button>
            </div>

        </form>
    </div>
@endsection
