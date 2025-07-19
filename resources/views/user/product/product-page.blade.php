@extends('layouts.user')

@section('title', 'Products')

@section('content')
<section class="py-5 bg-black text-white">
    <div class="container">
        <h2 class="fw-bold mb-3">Explore our wide range of products</h2>
        <p class="text-white-50">We’ve organized everything into easy-to-browse categories. Start browsing now!</p>

        <!-- Categories Card Grid -->
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 my-4">
            @foreach($categories as $category)
                <div class="col">
                    <div class="card bg-dark text-white border-secondary shadow-sm h-100">
                        <img src="{{ $category->image }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Single Category Title (Optional if you want static) -->
        <h3 class="fw-bold text-warning mt-4 mb-3">Anti Fashion</h3>

        <!-- Products Grid -->
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card bg-dark text-white border-secondary shadow-sm h-100">
                        <img src="{{ $product->image[0] }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">{{ $product->title }}</h5>
                            <small class="text-muted mb-2">{{ $product->category->name }}</small>
                            <p class="fw-semibold text-warning mb-0">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-4">
            <button class="btn btn-warning fw-semibold px-4">Load More</button>
        </div>

    </div>
</section>
@endsection
