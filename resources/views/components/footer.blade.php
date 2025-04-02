<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <!-- Logo & About -->
            <div class="col-md-4">
                <h5 class="fw-bold">Your Brand</h5>
                <p class="small">We provide the best services in the industry. Contact us for more details.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-md-4">
                <h5 class="fw-bold">Follow Us</h5>
                <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <hr class="my-3 border-light">

        <div class="text-center small">
            &copy; {{ date('Y') }} Your Brand. All rights reserved.
        </div>
    </div>
</footer>