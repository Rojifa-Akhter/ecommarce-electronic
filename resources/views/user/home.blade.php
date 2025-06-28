@extends('layouts.user')

@section('title', 'Home')

@section('content')

{{-- === HERO SECTION (Optional above) === --}}
@include('components.user.hero')

{{-- === CURATED EXCLUSIVE PRODUCTS === --}}
<section class="py-5 bg-black text-white">
    <div class="container">
        <h2 class="fw-bold mb-5">Curated Exclusive</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

            {{-- Static Product 1 --}}
            <div class="col">
                <div class="card h-100 text-white bg-dark border-0 shadow-sm">
                    <img src="{{ asset('images/products/1.jpeg') }}" class="card-img-top" alt="Leather Bag">
                    <div class="card-body">
                        <h5 class="card-title">Leather Bag</h5>
                        <p class="text-warning fw-bold">$149.99</p>
                        <p class="card-text text-light small">
                            Premium black leather handbag with gold zip finish.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-dark text-light d-flex align-items-center">
                        <span class="me-2 text-warning">★</span>
                        <small>4.5 (1.2k Reviews)</small>
                    </div>
                </div>
            </div>

            {{-- Static Product 2 --}}
            <div class="col">
                <div class="card h-100 text-white bg-dark border-0 shadow-sm">
                    <img src="{{ asset('images/products/2.jpg') }}" class="card-img-top" alt="Luxury Watch">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Watch</h5>
                        <p class="text-warning fw-bold">$249.00</p>
                        <p class="card-text text-light small">
                            Elegant wristwatch with black leather strap and gold dial.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-dark text-light d-flex align-items-center">
                        <span class="me-2 text-warning">★</span>
                        <small>4.7 (980 Reviews)</small>
                    </div>
                </div>
            </div>

            {{-- Static Product 3 --}}
            <div class="col">
                <div class="card h-100 text-white bg-dark border-0 shadow-sm">
                    <img src="{{ asset('images/products/3.jpeg') }}" class="card-img-top" alt="Designer Shoes">
                    <div class="card-body">
                        <h5 class="card-title">Designer Shoes</h5>
                        <p class="text-warning fw-bold">$199.50</p>
                        <p class="card-text text-light small">
                            Limited edition black leather shoes with perfect craftsmanship.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-dark text-light d-flex align-items-center">
                        <span class="me-2 text-warning">★</span>
                        <small>4.8 (1.8k Reviews)</small>
                    </div>
                </div>
            </div>

            {{-- Static Product 4 --}}
            <div class="col">
                <div class="card h-100 text-white bg-dark border-0 shadow-sm">
                    <img src="{{ asset('images/products/4.png') }}" class="card-img-top" alt="Sunglasses">
                    <div class="card-body">
                        <h5 class="card-title">Sunglasses</h5>
                        <p class="text-warning fw-bold">$89.00</p>
                        <p class="card-text text-light small">
                            Sleek gold-rimmed sunglasses with UV protection.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-dark text-light d-flex align-items-center">
                        <span class="me-2 text-warning">★</span>
                        <small>4.6 (740 Reviews)</small>
                    </div>
                </div>
            </div>

            {{-- Static Product 5 --}}
            <div class="col">
                <div class="card h-100 text-white bg-dark border-0 shadow-sm">
                    <img src="{{ asset('images/products/5.jpeg') }}" class="card-img-top" alt="Gold Earrings">
                    <div class="card-body">
                        <h5 class="card-title">Datalogic Gryphon I GD4500 </h5>
                        <p class="text-warning fw-bold">$129.75</p>
                        <p class="card-text text-light small">
                            Elegant 18k gold-plated earrings for luxury occasions.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-dark text-light d-flex align-items-center">
                        <span class="me-2 text-warning">★</span>
                        <small>4.9 (520 Reviews)</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- === blog SECTION  === --}}
@include('user.blog')
{{-- === about SECTION  === --}}
@include('user.about')
@endsection
