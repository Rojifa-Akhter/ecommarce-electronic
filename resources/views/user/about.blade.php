<section class="py-5 bg-black text-white">
    <div class="container">
        <h2 class="fw-bold mb-4">About Us</h2>
        <div class="row align-items-center">
            <!-- Left Side: Text -->
            <div class="col-md-6 mb-4 mb-md-0">
                <p class="mb-4">
                    {{ Str::limit($about->description ?? 'No about information available.', 250) }}
                </p>
                <a href="{{ url('/about') }}" class="btn px-4 py-2 text-dark fw-semibold"
                    style="background-color: #e7c78c;">
                    Read more
                </a>

            </div>

            <!-- Right Side: Images Grid -->
            <div class="col-md-6">
                <div class="row g-3">
                    @if (!empty($about) && is_array($about->images))
                        @foreach ($about->images as $image)
                            <div class="col-6">
                                <div style="border-radius: 15px; overflow: hidden;">
                                    <img src="{{ asset('uploads/abouts/' . $image) }}" alt="About Image"
                                        style="width: 100%; height: auto;">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center text-muted">
                            No Images Found
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</section>
