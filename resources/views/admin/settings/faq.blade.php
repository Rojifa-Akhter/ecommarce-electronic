@extends('layouts.admin')

@section('title', 'FAQ')

@section('content')
<div class="container" style="max-width: 950px;">
    <div class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
        <h6 class="mb-4 fw-semibold fs-6">FAQ questions & answers</h6>

        @for ($i = 1; $i <= 4; $i++)
        <div class="mb-4">
            <div class="mb-2 fw-semibold">
                {{ $i }}. Question:
            </div>
            <input type="text" class="form-control bg-black text-white border-secondary rounded-0 mb-2"
                   placeholder="Lorem ipsum dolor sit amet consectetur?">

            <div class="fw-semibold mb-1">Answer:</div>
            <textarea rows="4" class="form-control bg-black text-white border-secondary rounded-0"
                      placeholder="Lorem ipsum dolor sit amet consectetur...">Lorem ipsum dolor sit amet consectetur. Vivamus adipiscing scelerisque lacus accumsan nunc feugiat pharetra pellentesque. Lobortis quis ultrices amet senectus et. Net...</textarea>
        </div>
        @endfor

        <div class="text-end">
            <button type="button" class="btn fw-semibold text-black px-4" style="background-color: #d4af37;">
                Add another question
            </button>
        </div>
    </div>
</div>
@endsection
