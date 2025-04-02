<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Hotels') }}
      </h2>
  </x-slot>

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

/* General Styling */
body {
  font-family: 'Poppins', 'Roboto', sans-serif;
  direction: ltr;
  text-align: left;
  background-color: #f9f9f9;
  color: var(--black);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Header with Filters */
.header-section {
  display: flex;
  flex-direction: column;
  margin-bottom: 30px;
  padding: 25px;
  background-color: var(--white);
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.header-section h1 {
  margin: 0 0 20px 0;
  color: var(--primary);
  font-size: 2.2rem;
  font-weight: 700;
  text-align: center;
}

.filters-inline {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  align-items: center;
  justify-content: center;
  padding: 15px;
  background-color: var(--light);
  border-radius: 10px;
}

.filter-item {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  min-width: 150px;
}

.filter-item label {
  margin-bottom: 8px;
  font-weight: 600;
  color: var(--primary);
  font-size: 0.9rem;
}

.filter-item select {
  border-radius: 8px;
  border: 2px solid var(--secondary);
  padding: 10px 15px;
  font-size: 0.9rem;
  width: 100%;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
  transition: all 0.3s;
}

.filter-item select:focus {
  border-color: var(--primary);
  box-shadow: 0 4px 12px rgba(74, 111, 165, 0.25);
  outline: none;
}

.filter-action {
  align-self: flex-end;
  margin-top: 23px;
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

/* Main Hotel Grid */
.hotels-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 25px;
  margin-top: 20px;
}

.hotel-card {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s, box-shadow 0.3s;
  background-color: var(--white);
  border: none;
}

.hotel-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 30px rgba(74, 111, 165, 0.2);
}

.hotel-card .card-img-top {
  height: 200px;
  object-fit: cover;
  transition: transform 0.5s;
}

.hotel-card:hover .card-img-top {
  transform: scale(1.1);
}

.hotel-card .card-body {
  padding: 20px;
}

.hotel-details-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.hotel-location {
  display: flex;
  align-items: center;
  font-size: 0.9rem;
  color: #666;
}

.hotel-location i {
  margin-right: 5px;
}

.hotel-stars {
  display: inline-block;
  font-size: 0.9rem;
}

.hotel-price {
  font-weight: bold;
  color: var(--primary);
  font-size: 1.1rem;
  margin: 15px 0;
}

/* Buttons */
.btn-primary {
  background-color: var(--primary);
  border-color: var(--primary);
  color: var(--white);
  transition: all 0.3s;
  border-radius: 8px;
  padding: 10px 20px;
  font-weight: 600;
}

.btn-primary:hover {
  background-color: var(--primary-hover);
  border-color: var(--primary-hover);
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
}

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

/* Alert for no results */
.alert-info {
  background-color: var(--light);
  color: var(--primary);
  border: none;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  font-weight: 600;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

/* Stars styling */
.text-warning {
  color: var(--accent) !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .header-section {
    padding: 15px;
  }
  
  .header-section h1 {
    font-size: 1.8rem;
  }
  
  .filters-inline {
    flex-direction: column;
    align-items: stretch;
  }
  
  .filter-item {
    width: 100%;
  }
  
  .filter-action {
    align-self: center;
    margin-top: 15px;
    width: 100%;
  }
  
  .filter-action .btn {
    width: 100%;
  }
  
  .hotels-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<div class="container">
    <!-- Header section with filters -->
    <div class="header-section">
        <h1>Explore Hotels</h1>
        
        <form action="{{ route('hotels.index') }}" method="GET" class="filters-inline">
            {{-- <div class="filter-item">
                <label>Price Range</label>
                <select name="price_range" class="form-select">
                    <option value="">All Prices</option>
                    <option value="0-100" {{ request('price_range') == '0-100' ? 'selected' : '' }}>Less than 100</option>
                    <option value="100-300" {{ request('price_range') == '100-300' ? 'selected' : '' }}>100 - 300</option>
                    <option value="300-500" {{ request('price_range') == '300-500' ? 'selected' : '' }}>300 - 500</option>
                    <option value="500-1000" {{ request('price_range') == '500-1000' ? 'selected' : '' }}>500 - 1000</option>
                    <option value="1000-10000" {{ request('price_range') == '1000-10000' ? 'selected' : '' }}>More than 1000</option>
                </select>
            </div> --}}

            <div class="filter-item">
                <label>Region</label>
                <select name="region_id" class="form-select">
                    <option value="">All Regions</option>
                    @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ request('region_id') == $region->id ? 'selected' : '' }}>
                        {{ $region->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="filter-item">
                <label>Star Rating</label>
                <select name="stars" class="form-select">
                    <option value="">Any Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ request('stars') == $i ? 'selected' : '' }}>
                        {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="filter-action">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Horizontal display of hotels (cards next to each other) -->
    <h3 class="mb-3">Featured Hotels</h3>
    <div class="hotels-horizontal">
        @foreach($hotels->take(6) as $hotel)
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

    <!-- Grid display of hotels -->
    <h3 class="my-4">All Hotels</h3>
    <div class="hotels-grid">
        @forelse($hotels as $hotel)
        <div class="hotel-card">
            <img src="{{ asset($hotel->image) }}" class="card-img-top" alt="{{ $hotel->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $hotel->name }}</h5>
                <div class="hotel-details-top">
                    <div class="hotel-location">
                        <i class="fas fa-map-marker-alt text-danger"></i> {{ $hotel->region->name }}
                    </div>
                    <div class="hotel-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $hotel->stars)
                            <i class="fas fa-star text-warning"></i>
                            @else
                            <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                
                <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-outline-primary w-100">View Details</a>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                No hotels match your search criteria
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $hotels->appends(request()->query())->links() }}
    </div>
</div>

<style>
/* Map Section Styles */
.map-section {
  margin-top: 50px;
  margin-bottom: 50px;
  background-color: white;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.map-section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.map-section-title {
  color: var(--primary);
  font-weight: 700;
  position: relative;
  padding-left: 15px;
  margin: 0;
}

.map-section-title:before {
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

.search-container {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
}

.search-input-group {
  flex: 1;
  display: flex;
  position: relative;
}

.search-input {
  flex: 1;
  padding: 12px 15px;
  border: 2px solid var(--secondary);
  border-radius: 8px;
  font-size: 1rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
  transition: all 0.3s;
}

.search-input:focus {
  border-color: var(--primary);
  box-shadow: 0 4px 12px rgba(74, 111, 165, 0.25);
  outline: none;
}

.search-button {
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  background-color: var(--primary);
  color: white;
  border: none;
  border-radius: 6px;
  padding: 8px 15px;
  cursor: pointer;
  transition: all 0.3s;
}

.search-button:hover {
  background-color: var(--primary-hover);
}

.search-tabs {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.search-tab {
  padding: 10px 20px;
  background-color: var(--light);
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s;
  font-weight: 600;
  color: var(--primary);
}

.search-tab.active {
  background-color: var(--primary);
  color: white;
}

.map-container {
  width: 100%;
  height: 650px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Custom marker cluster styles */
.marker-cluster {
  background-color: rgba(74, 111, 165, 0.6);
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: bold;
}

/* Custom tooltip styles */
.custom-tooltip {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  padding: 0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 3px 14px rgba(0, 0, 0, 0.2);
  max-width: 300px;
}

.tooltip-header {
  background-color: #4a6fa5;
  color: white;
  padding: 10px 15px;
  font-weight: bold;
  text-align: center;
}

.tooltip-content {
  padding: 15px;
  line-height: 1.5;
}

.tooltip-stars {
  color: #ffc107;
  text-align: center;
  margin-bottom: 8px;
}

.tooltip-footer {
  text-align: center;
  padding: 10px;
  background-color: #f8f9fa;
  border-top: 1px solid #eee;
}

.tooltip-footer a {
  color: #4a6fa5;
  font-weight: bold;
  text-decoration: none;
}

.tooltip-footer a:hover {
  text-decoration: underline;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .map-container {
    height: 500px;
  }
}

.map-controls {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.map-legend {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.legend-item {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 0.9rem;
}

.legend-color {
  width: 12px;
  height: 12px;
  border-radius: 50%;
}
</style>
<!-- Add Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- Add Leaflet MarkerCluster -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

<!-- Map Section -->
<div class="map-section">
    <div class="map-section-header">
        <h3 class="map-section-title">Jordan Hotels Map</h3>
    </div>
    
    <div class="map-controls">
        <div class="search-tabs">
            <button class="search-tab active" id="hotel-search-tab">Search by Hotel Name</button>
            <button class="search-tab" id="region-search-tab">Search by Region</button>
            <button class="search-tab" id="all-hotels-tab">Show All Hotels</button>
        </div>
        
        <div class="map-legend">
            <div class="legend-item">
                <div class="legend-color" style="background-color: #1e3799;"></div>
                <span>5-star Hotels</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background-color: #4a69bd;"></div>
                <span>4-star Hotels</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background-color: #6a89cc;"></div>
                <span>3-star Hotels</span>
            </div>
        </div>
    </div>
    
    <div class="search-container">
        <div class="search-input-group">
            <input type="text" id="hotel-search" class="search-input" placeholder="Enter hotel name..." autocomplete="off">
            <button class="search-button">
                <i class="fas fa-search"></i> Search
            </button>
        </div>
    </div>
    
    <div class="map-container" id="jordan-map">
        <!-- Map will be loaded here -->
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize map focused on Jordan
    const map = L.map('jordan-map', {
        zoomControl: false, // We'll add custom zoom control
        attributionControl: false // We'll add attribution control separately
    }).setView([31.2, 36.5], 7);
    
    // Add custom zoom control to the top right
    L.control.zoom({
        position: 'topright'
    }).addTo(map);
    
    // Add attribution control to the bottom right
    L.control.attribution({
        position: 'bottomright',
        prefix: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Add beautiful base layer from Stadia Maps (Free tier)
    L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
        maxZoom: 20
    }).addTo(map);
    
    // Jordan hotels data (expanded list)
    const hotels = [
        {
            id: 1,
            name: "Grand Hyatt Amman",
            region: "Amman",
            lat: 31.9539,
            lng: 35.9106,
            stars: 5,
            image: "https://lh5.googleusercontent.com/proxy/pz1NeNjilPXpwv00-ibd-Xo2l-bAcz34eMSGZZ6HedA__okYm0aF9qHf72SLaoNJILdhXWy89Ypu4uEj4zHos3byw5uSaJzvu4t8q7oRXo46xZgOxOpOQ1yylfrxbutcmBn_oGtYGFAJnsiRY1NmPrTglzgoLUU=w122-h64-n",
            description: "Luxury hotel in the heart of Amman with excellent services and stunning city views"
        },
        {
            id: 2,
            name: "Kempinski Aqaba",
            region: "Aqaba",
            lat: 29.5267,
            lng: 35.0078,
            stars: 5,
            description: "Luxury hotel on Aqaba beach with stunning views of the Red Sea"
        },
        {
            id: 3,
            name: "Marriott Petra",
            region: "Petra",
            lat: 30.3285,
            lng: 35.4444,
            stars: 4,
            description: "Comfortable hotel near the ancient city of Petra with amazing mountain views"
        },
        {
            id: 4,
            name: "Dead Sea Spa Hotel",
            region: "Dead Sea",
            lat: 31.5500,
            lng: 35.5800,
            stars: 4,
            description: "Distinguished health resort on the Dead Sea shore offering unique natural treatments"
        },
        {
            id: 5,
            name: "Crown Plaza Amman",
            region: "Amman",
            lat: 31.9445,
            lng: 35.9240,
            stars: 4,
            description: "Upscale business hotel in a central area of Amman with multiple conference facilities"
        },
        {
            id: 6,
            name: "Tala Bay Resort Aqaba",
            region: "Aqaba",
            lat: 29.5300,
            lng: 35.0120,
            stars: 5,
            description: "Elegant resort offering a unique diving and water sports experience in Aqaba"
        },
        {
            id: 7,
            name: "Andalusia Hotel Jerash",
            region: "Jerash",
            lat: 32.2806,
            lng: 35.8969,
            stars: 3,
            description: "Comfortable hotel near the famous Roman ruins in the historic city of Jerash"
        },
        {
            id: 8,
            name: "Al Manshieh Hotel Amman",
            region: "Amman",
            lat: 31.9550,
            lng: 35.9300,
            stars: 3,
            description: "Budget hotel in downtown Amman providing easy access to main tourist attractions"
        },
        {
            id: 9,
            name: "Rotana Amman",
            region: "Amman",
            lat: 31.9600,
            lng: 35.9150,
            stars: 5,
            description: "Modern hotel with panoramic views of Amman and various business and leisure facilities"
        },
        {
            id: 10,
            name: "Movenpick Dead Sea",
            region: "Dead Sea",
            lat: 31.5600,
            lng: 35.5700,
            stars: 5,
            description: "Luxury resort on the shores of the Dead Sea offering a unique healing experience and stunning views"
        },
        {
            id: 11,
            name: "Landmark Amman",
            region: "Amman",
            lat: 31.9650,
            lng: 35.9050,
            stars: 4,
            description: "Central hotel in Amman with elegant rooms and distinguished services for travelers"
        },
        {
            id: 12,
            name: "Kings Hotel Irbid",
            region: "Irbid",
            lat: 32.5500,
            lng: 35.8500,
            stars: 3,
            description: "Comfortable hotel in Irbid city offering various services for travelers and tourists"
        },
        {
            id: 13,
            name: "Bristol Amman",
            region: "Amman",
            lat: 31.9400,
            lng: 35.9280,
            stars: 4,
            description: "Historic hotel in Amman combining authenticity and luxury with modern services"
        },
        {
            id: 14,
            name: "Al Qasr Hotel Madaba",
            region: "Madaba",
            lat: 31.7200,
            lng: 35.7900,
            stars: 3,
            description: "Comfortable hotel near historical sites in Madaba city"
        },
        {
            id: 15,
            name: "InterContinental Aqaba",
            region: "Aqaba",
            lat: 29.5320,
            lng: 35.0060,
            stars: 5,
            description: "Luxury resort on Aqaba beach with comprehensive tourism and entertainment facilities"
        },
        {
            id: 16,
            name: "Taybet Zaman Wadi Musa",
            region: "Petra",
            lat: 30.3220,
            lng: 35.4480,
            stars: 4,
            description: "Heritage-style hotel near the ancient city of Petra offering an authentic experience"
        },
        {
            id: 17,
            name: "Amman International Hotel",
            region: "Amman",
            lat: 31.9700,
            lng: 35.9000,
            stars: 3,
            description: "Business-friendly hotel in the capital with a central location and various services"
        },
        {
            id: 18,
            name: "Aqaba Beach Resort",
            region: "Aqaba",
            lat: 29.5350,
            lng: 35.0030,
            stars: 4,
            description: "Coastal resort offering diverse activities for families and travelers on Aqaba beach"
        }
    ];
    
    // Create marker clusters group
    const markers = L.markerClusterGroup({
        iconCreateFunction: function(cluster) {
            const count = cluster.getChildCount();
            return L.divIcon({
                html: `<div class="marker-cluster">${count}</div>`,
                className: '',
                iconSize: L.point(40, 40)
            });
        },
        spiderfyOnMaxZoom: true,
        showCoverageOnHover: false,
        zoomToBoundsOnClick: true
    });
    
    // Store individual markers for easy access
    const hotelMarkers = {};
    
    // Function to get marker color based on hotel stars
    function getMarkerColor(stars) {
        if (stars === 5) return '#1e3799';  // Dark blue for 5-star
        if (stars === 4) return '#4a69bd';  // Medium blue for 4-star
        return '#6a89cc';                   // Light blue for 3-star and below
    }
    
    // Add markers for all hotels
    hotels.forEach(hotel => {
        const customIcon = L.divIcon({
            className: 'custom-marker',
            html: `<i class="fas fa-map-marker-alt" style="font-size: 24px; color: ${getMarkerColor(hotel.stars)};"></i>`,
            iconSize: [24, 24],
            iconAnchor: [12, 24],
            popupAnchor: [0, -20]
        });
        
        const marker = L.marker([hotel.lat, hotel.lng], {icon: customIcon})
            .bindPopup(function() {
                const popupContent = document.createElement('div');
                popupContent.className = 'custom-tooltip';
                
                popupContent.innerHTML = `
                    <div class="tooltip-header">${hotel.name}</div>
                    <div class="tooltip-content">
                        <div class="tooltip-stars">
                            ${'★'.repeat(hotel.stars)}${'☆'.repeat(5 - hotel.stars)}
                        </div>
                        <p><strong>Region:</strong> ${hotel.region}</p>
                        <p>${hotel.description}</p>
                    </div>
                    <div class="tooltip-footer">
                        <a href="/hotels/${hotel.id}">View Details</a>
                    </div>
                `;
                
                return popupContent;
            }, {
                minWidth: 250,
                maxWidth: 300
            });
        
        markers.addLayer(marker);
        hotelMarkers[hotel.id] = marker;
    });
    
    // Add marker clusters to map
    map.addLayer(markers);
    
    // Handle search
    const searchInput = document.getElementById('hotel-search');
    let searchMode = 'hotel'; // Default search mode
    
    // Perform search function
    function performSearch() {
        const query = searchInput.value.toLowerCase().trim();
        
        if (query.length < 1) {
            map.setView([31.2, 36.5], 7);
            return;
        }
        
        if (searchMode === 'hotel') {
            const filteredHotels = hotels.filter(hotel => 
                hotel.name.toLowerCase().includes(query)
            );
            
            if (filteredHotels.length === 1) {
                const hotel = filteredHotels[0];
                map.setView([hotel.lat, hotel.lng], 14);
                setTimeout(() => {
                    markers.zoomToShowLayer(hotelMarkers[hotel.id], () => {
                        hotelMarkers[hotel.id].openPopup();
                    });
                }, 500);
            } else if (filteredHotels.length > 1) {
                // Create bounds object and extend it for each matching hotel
                const bounds = L.latLngBounds();
                filteredHotels.forEach(hotel => {
                    bounds.extend([hotel.lat, hotel.lng]);
                });
                
                // Add padding to bounds
                map.fitBounds(bounds, {
                    padding: [100, 100],
                    maxZoom: 12
                });
            } else {
                alert(`No hotels found matching "${query}"`);
            }
        } else if (searchMode === 'region') {
            const filteredHotels = hotels.filter(hotel => 
                hotel.region.toLowerCase().includes(query)
            );
            
            if (filteredHotels.length > 0) {
                const bounds = L.latLngBounds();
                filteredHotels.forEach(hotel => {
                    bounds.extend([hotel.lat, hotel.lng]);
                });
                
                map.fitBounds(bounds, {
                    padding: [100, 100],
                    maxZoom: 12
                });
            } else {
                alert(`No regions found matching "${query}"`);
            }
        }
    }
    
    // Add search event listeners
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });
    
    document.querySelector('.search-button').addEventListener('click', performSearch);
    
    // Tab switching
    const hotelTab = document.getElementById('hotel-search-tab');
    const regionTab = document.getElementById('region-search-tab');
    const allHotelsTab = document.getElementById('all-hotels-tab');
    
    hotelTab.addEventListener('click', () => {
        hotelTab.classList.add('active');
        regionTab.classList.remove('active');
        allHotelsTab.classList.remove('active');
        searchMode = 'hotel';
        searchInput.placeholder = 'Enter hotel name...';
        searchInput.value = '';
        map.setView([31.2, 36.5], 7);
    });
    
    regionTab.addEventListener('click', () => {
        regionTab.classList.add('active');
        hotelTab.classList.remove('active');
        allHotelsTab.classList.remove('active');
        searchMode = 'region';
        searchInput.placeholder = 'Enter region name...';
        searchInput.value = '';
        map.setView([31.2, 36.5], 7);
    });
    
    allHotelsTab.addEventListener('click', () => {
        allHotelsTab.classList.add('active');
        hotelTab.classList.remove('active');
        regionTab.classList.remove('active');
        searchInput.value = '';
        map.setView([31.2, 36.5], 7);
    });
    
    // Add map scale control
    L.control.scale({
        imperial: false,
        position: 'bottomleft'
    }).addTo(map);
});
</script>
</x-app-layout>