<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot> --}}
    <!-- Hero Carousel with standard CSS instead of relying only on Tailwind -->
<div class="hero-carousel-container">
    <!-- Carousel Container -->
    <div id="heroCarousel" class="hero-carousel">
        <!-- Carousel Items -->
        <div class="carousel-items">
            <!-- Slide 1 -->
            <div class="carousel-slide">
                <div class="slide-inner">
                    <!-- Background Image -->
                    <img src="{{ asset('https://i.pinimg.com/736x/97/c8/81/97c881cbbd4a27f0da64f9c454e1b2fe.jpg') }}" alt="Hero Image 1" class="slide-image">
                    <!-- Overlay -->
                    <div class="slide-overlay" style="background-color: rgba(30, 64, 175, 0.6);"></div>
                    <!-- Content -->
                    <div class="slide-content">
                        <h1 class="slide-title">Welcome to Our Platform</h1>
                        <p class="slide-description">Discover amazing features and services tailored just for you</p>
                        <a href="{{ route('hotels.index') }}" class="slide-button">Get Started</a>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-slide">
                <div class="slide-inner">
                    <!-- Background Image -->
                    <img src="{{ asset('https://i.pinimg.com/736x/fd/24/f7/fd24f7618315267be4c3c1f137b07ba5.jpg') }}" alt="Hero Image 2" class="slide-image">
                    <!-- Overlay -->
                    <div class="slide-overlay" style="background-color: rgba(126, 34, 206, 0.6);"></div>
                    <!-- Content -->
                    <div class="slide-content">
                        <h1 class="slide-title">Powerful Solutions</h1>
                        <p class="slide-description">Streamline your workflow with our innovative tools</p>
                        <a href="{{ route('hotels.index') }}" class="slide-button">Get Started</a>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-slide">
                <div class="slide-inner">
                    <!-- Background Image -->
                    <img src="{{ asset('https://i.pinimg.com/736x/c9/c6/12/c9c612fe195293fb3339c5c781eae860.jpg') }}" alt="Hero Image 3" class="slide-image">
                    <!-- Overlay -->
                    <div class="slide-overlay" style="background-color: rgba(22, 163, 74, 0.6);"></div>
                    <!-- Content -->
                    <div class="slide-content">
                        <h1 class="slide-title">Join Our Community</h1>
                        <p class="slide-description">Connect with thousands of users and grow together</p>
                        <a href="{{ route('hotels.index') }}" class="slide-button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Arrows -->
        <button id="prevSlide" class="nav-button prev-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15.75 19.5L8.25 12l7.5-7.5"></path>
            </svg>
        </button>
        
        <button id="nextSlide" class="nav-button next-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
            </svg>
        </button>
        
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button class="carousel-indicator active" data-slide="0"></button>
            <button class="carousel-indicator" data-slide="1"></button>
            <button class="carousel-indicator" data-slide="2"></button>
        </div>
    </div>
</div>

<!-- CSS for the carousel -->
<style>
    .hero-carousel-container {
        position: relative;
        overflow: hidden;
        background-color: #fff;
    }
    
    .hero-carousel {
        position: relative;
    }
    
    .carousel-items {
        display: flex;
        transition: transform 0.7s ease-in-out;
    }
    
    .carousel-slide {
        width: 100%;
        flex-shrink: 0;
    }
    
    .slide-inner {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .slide-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .slide-overlay {
        position: absolute;
        inset: 0;
    }
    
    .slide-content {
        position: relative;
        z-index: 10;
        max-width: 1024px;
        margin: 0 auto;
        text-align: center;
        color: white;
        padding: 0 16px;
    }
    
    .slide-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    @media (min-width: 768px) {
        .slide-title {
            font-size: 3rem;
        }
    }
    
    .slide-description {
        font-size: 1.125rem;
        margin-bottom: 2rem;
    }
    
    @media (min-width: 768px) {
        .slide-description {
            font-size: 1.25rem;
        }
    }
    
    .slide-button {
        background-color: white;
        color: #1d4ed8;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: background-color 0.3s;
        border: none;
        cursor: pointer;
    }
    
    .slide-button:hover {
        background-color: #f8fafc;
    }
    
    .nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 9999px;
        padding: 0.5rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        z-index: 20;
    }
    
    .nav-button:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }
    
    .prev-button {
        left: 1rem;
    }
    
    .next-button {
        right: 1rem;
    }
    
    .carousel-indicators {
        position: absolute;
        bottom: 1.25rem;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        z-index: 20;
    }
    
    .carousel-indicator {
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 9999px;
        background-color: white;
        opacity: 0.5;
        border: none;
        cursor: pointer;
        transition: opacity 0.3s;
    }
    
    .carousel-indicator:hover,
    .carousel-indicator.active {
        opacity: 1;
    }
</style>

<!-- JavaScript for Carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('heroCarousel');
        const slides = carousel.querySelectorAll('.carousel-slide');
        const carouselItems = carousel.querySelector('.carousel-items');
        const indicators = carousel.querySelectorAll('.carousel-indicator');
        const prevButton = document.getElementById('prevSlide');
        const nextButton = document.getElementById('nextSlide');
        
        let currentSlide = 0;
        const slideCount = slides.length;
        let autoplayInterval;
        
        // Initialize
        updateCarousel();
        startAutoplay();
        
        // Set active slide
        function updateCarousel() {
            carouselItems.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update indicators
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }
        
        // Go to previous slide
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slideCount) % slideCount;
            updateCarousel();
        }
        
        // Go to next slide
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slideCount;
            updateCarousel();
        }
        
        // Start autoplay
        function startAutoplay() {
            stopAutoplay();
            autoplayInterval = setInterval(nextSlide, 5000);
        }
        
        // Stop autoplay
        function stopAutoplay() {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
            }
        }
        
        // Event listeners
        prevButton.addEventListener('click', () => {
            prevSlide();
            startAutoplay(); // Reset autoplay timer
        });
        
        nextButton.addEventListener('click', () => {
            nextSlide();
            startAutoplay(); // Reset autoplay timer
        });
        
        // Indicator clicks
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
                startAutoplay(); // Reset autoplay timer
            });
        });
        
        // Pause autoplay on hover
        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
    });
</script>

<h3 class="mb-3">Featured Hotels</h3>
<div class="hotels-horizontal">
    @foreach($featuredHotels as $hotel)
    <div class="hotel-card-horizontal">
        <img src="{{ asset($hotel->image) }}" class="card-img-top" alt="{{ $hotel->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $hotel->name }}</h5>
            <p class="card-text">
                <i class="fas fa-map-marker-alt text-danger"></i> {{ $hotel->region->name }}
            </p>
            <p class="card-text">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $hotel->stars)
                    <i class="fas fa-star text-warning"></i>
                    @else
                    <i class="far fa-star text-warning"></i>
                    @endif
                @endfor
            </p>
           
            <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-outline-primary">View Details</a>
        </div>
    </div>
    @endforeach
</div>

<!-- CSS for Featured Hotels Section -->
<style>
/* Main Colors */
:root {
  --primary: #4a6fa5;
  --secondary: #6c98d1;
  --accent: #ffc145;
  --light: #eaf2ff;
  --primary-hover: #3b5a89;
  --white: #ffffff;
  --black: #333333;
  --light-gray: #f8f9fa;
  --border-color: #e9ecef;
}

/* Section Headings */
h3.mb-3, h3.my-4 {
  color: var(--primary);
  font-weight: 700;
  position: relative;
  padding-left: 15px;
  margin-top: 30px;
}

h3.mb-3:before, h3.my-4:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 5px;
  height: 25px;
  background-color: var(--accent);
  border-radius: 3px;
}

/* Horizontal Card Layout */
.hotels-horizontal {
  display: flex;
  overflow-x: auto;
  gap: 20px;
  padding: 15px 5px;
  margin-bottom: 30px;
  scrollbar-width: thin;
  scrollbar-color: var(--secondary) var(--light);
}

.hotels-horizontal::-webkit-scrollbar {
  height: 8px;
}

.hotels-horizontal::-webkit-scrollbar-thumb {
  background-color: var(--secondary);
  border-radius: 10px;
}

.hotels-horizontal::-webkit-scrollbar-track {
  background-color: var(--light);
  border-radius: 10px;
}

.hotel-card-horizontal {
  flex: 0 0 280px;
  max-width: 280px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
  background-color: var(--white);
  border: none;
  position: relative;
}

.hotel-card-horizontal:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 30px rgba(74, 111, 165, 0.2);
}

.hotel-card-horizontal .card-img-top {
  height: 160px;
  object-fit: cover;
  transition: transform 0.5s;
}

.hotel-card-horizontal:hover .card-img-top {
  transform: scale(1.1);
}

.hotel-card-horizontal .card-body {
  padding: 15px;
}

.hotel-card-horizontal .card-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 10px;
  color: var(--primary);
}

.hotel-card-horizontal .card-text {
  font-size: 0.9rem;
  margin-bottom: 8px;
  color: #666;
}

.hotel-card-horizontal .text-primary {
  color: var(--primary) !important;
}

.hotel-card-horizontal .btn {
  width: 100%;
  padding: 8px;
  font-size: 0.9rem;
  margin-top: 10px;
  font-weight: 600;
}

/* Stars styling */
.text-warning {
  color: var(--accent) !important;
}

/* Buttons */
.btn-outline-primary {
  color: var(--primary);
  border-color: var(--primary);
  background-color: transparent;
  transition: all 0.3s;
  border-radius: 8px;
  padding: 8px 15px;
  font-weight: 600;
}

.btn-outline-primary:hover {
  background-color: var(--primary);
  color: var(--white);
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .hotels-horizontal {
    overflow-x: scroll;
    -webkit-overflow-scrolling: touch;
  }
}
</style>



<!-- Why Choose Us Section -->
<section class="why-choose-us">
    <div class="container">
        <h3 class="mb-3">Why Choose Us</h3>
        
        <div class="choose-us-wrapper">
            <!-- Left side image -->
            <div class="choose-us-image">
                <img src="{{ asset('https://i.pinimg.com/736x/00/5f/2c/005f2c72ec3f919cbc56de03c339718c.jpg') }}" alt="Why Choose Us" class="main-image">
                <div class="experience-badge">
                    <span class="years">10+</span>
                    <span class="text">Years of<br>Experience</span>
                </div>
            </div>
            
            <!-- Right side content -->
            <div class="choose-us-content">
                <p class="lead-text">We pride ourselves on offering exceptional service and unforgettable experiences that make your travels truly special.</p>
                
                <div class="benefits-grid">
                    <!-- Benefit Item 1 -->
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg>
                        </div>
                        <div class="benefit-text">
                            <h4>Personalized Service</h4>
                            <p>Tailored experiences designed around your unique preferences and needs.</p>
                        </div>
                    </div>
                    
                    <!-- Benefit Item 2 -->
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                <path d="M2 17l10 5 10-5"></path>
                                <path d="M2 12l10 5 10-5"></path>
                            </svg>
                        </div>
                        <div class="benefit-text">
                            <h4>Exclusive Destinations</h4>
                            <p>Access to handpicked accommodations in the most sought-after locations.</p>
                        </div>
                    </div>
                    
                    <!-- Benefit Item 3 -->
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="benefit-text">
                            <h4>Best Price Guarantee</h4>
                            <p>We match any comparable price and offer exclusive online discounts.</p>
                        </div>
                    </div>
                    
                    <!-- Benefit Item 4 -->
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                                <line x1="16" y1="8" x2="2" y2="22"></line>
                                <line x1="17.5" y1="15" x2="9" y2="15"></line>
                            </svg>
                        </div>
                        <div class="benefit-text">
                            <h4>Instant Confirmation</h4>
                            <p>Book your stay with immediate confirmation and peace of mind.</p>
                        </div>
                    </div>
                </div>
                
                <div class="cta-container">
                    {{-- <a href="{{ route('about.us') }}" class="btn btn-outline-primary">Learn More About Us</a> --}}
                    <a href="{{ route('hotels.index') }}" class="btn btn-primary">Hotels</a>
                </div>
            </div>
        </div>
        
        <!-- Testimonial slider - optional addition -->
        {{-- <div class="testimonial-slider">
            <h4 class="testimonial-heading">What Our Customers Say</h4>
            <div class="testimonial-container" id="testimonialContainer">
                <div class="testimonial-items">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"Our experience was absolutely flawless. The staff went above and beyond to make our stay special. We'll definitely be coming back!"</p>
                            <div class="testimonial-author">
                                <div class="author-avatar"></div>
                                <div class="author-info">
                                    <h5>Sarah Johnson</h5>
                                    <span>New York, USA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"The best booking experience I've ever had. The exclusive rates and the quality of hotels available are unmatched anywhere else."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar"></div>
                                <div class="author-info">
                                    <h5>Michael Chen</h5>
                                    <span>Toronto, Canada</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="testimonial-text">"We found the perfect family vacation spot through this platform. The customer service team was incredibly helpful and responsive."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar"></div>
                                <div class="author-info">
                                    <h5>Emma Garcia</h5>
                                    <span>Madrid, Spain</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial Navigation -->
                <div class="testimonial-nav">
                    <button id="prevTestimonial" class="testimonial-nav-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                        </svg>
                    </button>
                    <div class="testimonial-dots">
                        <button class="testimonial-dot active" data-slide="0"></button>
                        <button class="testimonial-dot" data-slide="1"></button>
                        <button class="testimonial-dot" data-slide="2"></button>
                    </div>
                    <button id="nextTestimonial" class="testimonial-nav-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<!-- CSS for Why Choose Us Section -->
<style>
    /* Why Choose Us Section */
    .why-choose-us {
        padding: 60px 0;
        background-color: var(--light-gray);
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    
    .choose-us-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-top: 30px;
    }
    
    .choose-us-image {
        flex: 1;
        min-width: 300px;
        position: relative;
    }
    
    .main-image {
        width: 100%;
        height: 100%;
        min-height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .experience-badge {
        position: absolute;
        bottom: 30px;
        right: -20px;
        background-color: var(--accent);
        color: var(--black);
        width: 120px;
        height: 120px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 5px 15px rgba(255, 193, 69, 0.3);
        padding: 10px;
    }
    
    .experience-badge .years {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }
    
    .experience-badge .text {
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .choose-us-content {
        flex: 1;
        min-width: 300px;
    }
    
    .lead-text {
        font-size: 1.2rem;
        color: var(--black);
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .benefit-item {
        display: flex;
        gap: 15px;
        align-items: flex-start;
    }
    
    .benefit-icon {
        background-color: var(--light);
        color: var(--primary);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s, background-color 0.3s;
    }
    
    .benefit-item:hover .benefit-icon {
        background-color: var(--primary);
        color: var(--white);
        transform: translateY(-5px);
    }
    
    .benefit-text h4 {
        color: var(--primary);
        font-size: 1.1rem;
        margin-bottom: 8px;
        font-weight: 600;
    }
    
    .benefit-text p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .cta-container {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 30px;
    }
    
    .btn-primary {
        background-color: var(--primary);
        color: var(--white);
        border: none;
        transition: all 0.3s;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
    }
    
    .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
    }
    
    /* Testimonial Slider */
    .testimonial-slider {
        margin-top: 60px;
    }
    
    .testimonial-heading {
        color: var(--primary);
        text-align: center;
        margin-bottom: 30px;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .testimonial-container {
        position: relative;
        overflow: hidden;
    }
    
    .testimonial-items {
        display: flex;
        transition: transform 0.5s ease;
    }
    
    .testimonial-item {
        min-width: 100%;
        padding: 0 15px;
    }
    
    .testimonial-content {
        background-color: var(--white);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }
    
    .testimonial-stars {
        color: var(--accent);
        margin-bottom: 15px;
    }
    
    .testimonial-text {
        font-size: 1.1rem;
        font-style: italic;
        line-height: 1.6;
        margin-bottom: 20px;
        color: #555;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .author-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ddd;
    }
    
    .author-info h5 {
        margin: 0;
        font-size: 1rem;
        color: var(--primary);
    }
    
    .author-info span {
        font-size: 0.9rem;
        color: #777;
    }
    
    .testimonial-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        gap: 20px;
    }
    
    .testimonial-nav-btn {
        background: none;
        border: none;
        color: var(--primary);
        cursor: pointer;
        padding: 5px;
    }
    
    .testimonial-dots {
        display: flex;
        gap: 8px;
    }
    
    .testimonial-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ccc;
        border: none;
        padding: 0;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .testimonial-dot.active {
        background-color: var(--primary);
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .cta-container {
            flex-direction: column;
        }
        
        .cta-container .btn {
            width: 100%;
            text-align: center;
        }
        
        .experience-badge {
            width: 100px;
            height: 100px;
            right: 10px;
            bottom: -20px;
        }
    }
</style>

<!-- JavaScript for Testimonial Slider -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const testimonialContainer = document.getElementById('testimonialContainer');
        if (!testimonialContainer) return;
        
        const items = testimonialContainer.querySelector('.testimonial-items');
        const dots = testimonialContainer.querySelectorAll('.testimonial-dot');
        const prevBtn = document.getElementById('prevTestimonial');
        const nextBtn = document.getElementById('nextTestimonial');
        
        let currentSlide = 0;
        const slideCount = dots.length;
        let autoplayInterval;
        
        // Initialize
        updateTestimonial();
        startAutoplay();
        
        // Set active slide
        function updateTestimonial() {
            items.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        // Go to previous slide
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slideCount) % slideCount;
            updateTestimonial();
        }
        
        // Go to next slide
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slideCount;
            updateTestimonial();
        }
        
        // Start autoplay
        function startAutoplay() {
            stopAutoplay();
            autoplayInterval = setInterval(nextSlide, 5000);
        }
        
        // Stop autoplay
        function stopAutoplay() {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
            }
        }
        
        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                startAutoplay();
            });
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                startAutoplay();
            });
        }
        
        // Dot clicks
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                updateTestimonial();
                startAutoplay();
            });
        });
        
        // Pause autoplay on hover
        testimonialContainer.addEventListener('mouseenter', stopAutoplay);
        testimonialContainer.addEventListener('mouseleave', startAutoplay);
    });
</script>



<!-- About Us Section -->
<section class="about-us-section">
    <div class="container">
        <h3 class="mb-3">About Us</h3>
        
        <div class="about-us-wrapper">
            <!-- Content area -->
            <div class="about-us-content">
                <h4 class="about-us-subtitle">Your Premier Travel Partner Since 2015</h4>
                <p class="about-us-text">
                    We are a passionate team of travel enthusiasts dedicated to creating unforgettable experiences for our clients. Our journey began with a simple mission: to transform ordinary trips into extraordinary adventures.
                </p>
                <p class="about-us-text">
                    With over a decade in the hospitality industry, we've built strong relationships with premium hotels and resorts worldwide, allowing us to offer you exclusive rates and special packages you won't find anywhere else.
                </p>
                
                <!-- Stats -->
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Partner Hotels</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Countries</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
                
                <!-- Team members -->
                {{-- <h5 class="team-heading">Our Leadership Team</h5>
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-photo"></div>
                        <h6 class="member-name">Ahmad Abdelghani</h6>
                        <p class="member-position">CEO & Founder</p>
                    </div>
                    <div class="team-member">
                        <div class="member-photo"></div>
                        <h6 class="member-name">Michael Chen</h6>
                        <p class="member-position">Operations Director</p>
                    </div>
                    <div class="team-member">
                        <div class="member-photo"></div>
                        <h6 class="member-name">Emma Garcia</h6>
                        <p class="member-position">Customer Experience</p>
                    </div>
                </div>
            </div> --}}
            
            <!-- Image side -->
            {{-- <div class="about-us-images">
                <div class="main-image-container">
                    <img src="{{ asset('https://i.pinimg.com/736x/36/ee/b7/36eeb7c56baff69a4618571cc2b6dbd8.jpg') }}" alt="Our Team" class="about-main-image">
                </div>
                <div class="image-grid">
                    <img src="{{ asset('https://i.pinimg.com/736x/68/f8/e8/68f8e86be7d2200df3d4582a0ebe57b3.jpg') }}" alt="Office" class="about-small-image">
                    <img src="{{ asset('https://i.pinimg.com/736x/d2/86/c6/d286c6654eafb681cb8b9500994a8ebb.jpg') }}" alt="Services" class="about-small-image">
                </div>
            </div> --}}
        </div>
        
        <!-- Mission and Values -->
        <div class="mission-values-container">
            <div class="mission-block">
                <h4>Our Mission</h4>
                <p>To transform travel experiences through personalized service, exceptional accommodations, and unmatched value, helping our customers create lasting memories.</p>
            </div>
            <div class="values-block">
                <h4>Our Values</h4>
                <ul class="values-list">
                    <li>
                        <span class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </span>
                        <span class="value-text">Excellence in service</span>
                    </li>
                    <li>
                        <span class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </span>
                        <span class="value-text">Integrity and transparency</span>
                    </li>
                    <li>
                        <span class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </span>
                        <span class="value-text">Innovation in hospitality</span>
                    </li>
                    <li>
                        <span class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </span>
                        <span class="value-text">Sustainability and community</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- CTA -->
        <div class="about-cta">
            <h4>Ready to experience the difference?</h4>
            <p>Start your journey with us today and discover why thousands of travelers choose us year after year.</p>
            <div class="cta-buttons">
                <a href="{{ route('hotels.index') }}" class="btn btn-primary">Hotels</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- CSS for About Us Section -->
<style>
    /* About Us Section */
    .about-us-section {
        padding: 70px 0;
        background-color: var(--white);
    }
    
    .about-us-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-top: 30px;
    }
    
    .about-us-content {
        flex: 1;
        min-width: 300px;
    }
    
    .about-us-subtitle {
        color: var(--primary);
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: 600;
    }
    
    .about-us-text {
        color: #555;
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 15px;
    }
    
    /* Stats */
    .stats-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 30px 0;
    }
    
    .stat-item {
        flex: 1;
        min-width: 120px;
        background-color: var(--light);
        padding: 20px 15px;
        border-radius: 12px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .stat-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(74, 111, 165, 0.15);
    }
    
    .stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: #666;
    }
    
    /* Team */
    .team-heading {
        color: var(--primary);
        font-size: 1.3rem;
        margin: 30px 0 20px;
        font-weight: 600;
    }
    
    .team-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .team-member {
        flex: 1;
        min-width: 150px;
        text-align: center;
    }
    
    .member-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #ddd;
        margin: 0 auto 15px;
        border: 4px solid var(--light);
    }
    
    .member-name {
        color: var(--primary);
        margin-bottom: 5px;
        font-weight: 600;
    }
    
    .member-position {
        color: #777;
        font-size: 0.9rem;
    }
    
    /* Images */
    .about-us-images {
        flex: 1;
        min-width: 300px;
    }
    
    .main-image-container {
        margin-bottom: 20px;
    }
    
    .about-main-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .image-grid {
        display: flex;
        gap: 20px;
    }
    
    .about-small-image {
        width: calc(50% - 10px);
        height: 150px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s;
    }
    
    .about-small-image:hover {
        transform: scale(1.05);
    }
    
    /* Mission and Values */
    .mission-values-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin: 50px 0;
        background-color: var(--light);
        padding: 40px;
        border-radius: 16px;
    }
    
    .mission-block, .values-block {
        flex: 1;
        min-width: 300px;
    }
    
    .mission-block h4, .values-block h4 {
        color: var(--primary);
        font-size: 1.3rem;
        margin-bottom: 20px;
        font-weight: 600;
        position: relative;
        padding-bottom: 10px;
    }
    
    .mission-block h4:after, .values-block h4:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 60px;
        height: 3px;
        background-color: var(--accent);
    }
    
    .mission-block p {
        color: #555;
        font-size: 1.05rem;
        line-height: 1.7;
    }
    
    .values-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .values-list li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        color: #555;
        font-size: 1.05rem;
    }
    
    .value-icon {
        color: var(--primary);
        margin-right: 10px;
        display: flex;
        align-items: center;
    }
    
    /* CTA Section */
    .about-cta {
        width: 100%;
        background-color: var(--primary);
        color: white;
        padding: 40px;
        border-radius: 16px;
        text-align: center;
        margin-top: 50px;
    }
    
    .about-cta h4 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .about-cta p {
        font-size: 1.1rem;
        margin-bottom: 25px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .about-cta .btn-primary {
        background-color: white;
        color: var(--primary);
    }
    
    .about-cta .btn-primary:hover {
        background-color: var(--light);
    }
    
    .about-cta .btn-outline-primary {
        border-color: white;
        color: white;
    }
    
    .about-cta .btn-outline-primary:hover {
        background-color: white;
        color: var(--primary);
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .about-us-wrapper {
            flex-direction: column-reverse;
        }
        
        .stats-container {
            justify-content: center;
        }
        
        .mission-values-container {
            padding: 25px;
        }
    }
</style>
</x-app-layout>