@extends('layouts.admin')

@section('title', 'FAQ')

@section('content')
    <div class="container" style="max-width: 950px;">
        <div class="bg-black text-white p-4 rounded shadow-sm border border-secondary">
            <h6 class="mb-4 fw-semibold fs-6">FAQ questions & answers</h6>

            @foreach ($faq as $index => $item)
                <div class="mb-4">
                    <div class="mb-2 fw-semibold">
                        {{ $index + 1 }}. Question:
                    </div>
                    <input type="text" class="form-control bg-black text-white border-secondary rounded-0 mb-2"
                        value="{{ $item->question }}" readonly>

                    <div class="fw-semibold mb-1">Answer:</div>
                    <textarea rows="4" class="form-control bg-black text-white border-secondary rounded-0" readonly>{{ $item->answer }}</textarea>
                </div>
            @endforeach
            <!-- Pagination -->
            <div class="mt-4 ">
                {{ $faq->links('pagination::bootstrap-5') }}
            </div>


            <div class="text-end">
                <a href="{{ url('/add-faq') }}" class="btn text-warning border border-warning fw-semibold px-4">
                    Add another question +
                </a>
            </div>

        </div>
    </div>
@endsection
