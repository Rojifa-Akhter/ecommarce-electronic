<footer class="bg-white text-dark pt-5 border-top">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Logo and Contact -->
            <div class="col-md-3 mb-4">
                <img src="{{ asset('images/logo2.jpg') }}" alt="Logo" style="height: 40px;">
                <p class="mt-3 small">Street name, Area<br>address goes here</p>
                <p class="mb-1"><i class="bi bi-telephone"></i> 01-00254545122</p>
                <p><i class="bi bi-envelope"></i> ar1235@gmail.com</p>
            </div>

            <!-- Programs -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Programs</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/products') }}" class="text-decoration-none text-dark">Product</a></li>
                    <li><a href="{{ url('/about') }}" class="text-decoration-none text-dark">About us</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-decoration-none text-dark">Contact us</a></li>
                </ul>
            </div>

            <!-- Help & Support -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Help & Support</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/faq') }}" class="text-decoration-none text-dark">FAQ</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-decoration-none text-dark">Contact us</a></li>
                    <li><a href="{{ url('/terms') }}" class="text-decoration-none text-dark">Terms & conditions</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Social media</h6>
                <div class="d-flex gap-2 justify-content-center justify-content-md-start">
                    <a href="#" class="text-dark fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-dark fs-5"><i class="bi bi-google"></i></a>
                    <a href="#" class="text-dark fs-5"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <hr class="my-3">
        <p class="text-center small mb-0">&copy; Rojifa {{ date('Y') }} | All Rights Reserved</p>
    </div>
</footer>
