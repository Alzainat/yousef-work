{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <div class="container mx-auto py-10 px-4">
        <div class="flex items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $hotel->name }}</h1>
        </div>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-10">
            <div class="md:flex">
                <div class="md:w-1/2">
                    @if($hotel->image)
                        <img src="{{ asset($hotel->image) }}" alt="{{ $hotel->name }}" class="w-full h-full object-cover max-h-96">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image available</span>
                        </div>
                    @endif
                </div>
                <div class="p-8 md:w-1/2">
                    <div class="mb-4">
                        <p class="text-gray-600 flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>{{ $hotel->address }}</p>
                    </div>
                    
                    <h2 class="text-xl font-semibold mb-4">About this hotel</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">{{ $hotel->description }}</p>
                    
                    <div class="flex items-center mb-6">
                        <div class="text-yellow-500 mr-2">
                            @php
                                $avgRating = $hotel->stars;
                                $roundedRating = round($avgRating);
                            @endphp
                            
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $roundedRating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600 font-medium">
                            {{ number_format($avgRating, 1) }} 
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Available Rooms</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($hotel->rooms as $room)
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $room->room_type }}</h3>
                            <span class="text-green-600 font-bold text-lg">${{ number_format($room->price, 2) }}/night</span>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-user-friends mr-2"></i>Capacity: {{ $room->capacity }} people
                            </p>
                        </div>
                        
                        <p class="text-gray-700 mb-6 leading-relaxed">{{ $room->description }}</p>
                        
                        <a href="{{ route('reservations.create', $room->id) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center px-4 py-3 rounded-lg font-medium transition-colors">
                            Book Now
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-10">
                    <p class="text-gray-500 text-lg">No rooms available for this hotel.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    </x-app-layout>
    {{-- @endsection --}}