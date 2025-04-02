{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <div class="container mx-auto py-12">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <!-- Header with gradient background -->
                <div class="bg-gradient-to-r from-green-600 to-green-500 p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold">Reservation Confirmed!</h1>
                            <p class="mt-2 text-green-100">Your booking has been successfully created.</p>
                        </div>
                        {{-- <div class="bg-white bg-opacity-20 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div> --}}
                    </div>
                </div>
                
                <div class="p-8">
                    <!-- Booking Details Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6 flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Booking Details
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Booking ID</p>
                                <p class="font-medium text-gray-800">{{ $booking->id }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Booking Status</p>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                    @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Check-in Date</p>
                                <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($booking->check_in)->format('F d, Y') }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Check-out Date</p>
                                <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($booking->check_out)->format('F d, Y') }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Duration</p>
                                <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }} nights</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Total Price</p>
                                <p class="font-medium text-gray-800 text-lg">${{ number_format($booking->price, 2) }}</p>
                            </div>
                            @if($booking->coupon)
                            <div class="md:col-span-2 bg-blue-50 p-4 rounded-lg border border-blue-100">
                                <p class="text-gray-500 text-sm">Coupon Applied</p>
                                <p class="font-medium text-gray-800">{{ $booking->coupon->code }} (Discount: ${{ number_format($booking->coupon->discount, 2) }})</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Hotel & Room Information Section -->
                    <div class="mb-8 border-t pt-8">
                        <h2 class="text-xl font-semibold mb-6 flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Hotel & Room Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Hotel</p>
                                <p class="font-medium text-gray-800">{{ $booking->room->hotel->name }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Location</p>
                                <p class="font-medium text-gray-800">{{ $booking->room->hotel->address }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Room Type</p>
                                <p class="font-medium text-gray-800">{{ $booking->room->room_type }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Room Capacity</p>
                                <p class="font-medium text-gray-800">{{ $booking->room->capacity }} people</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Guest Information Section -->
                    <div class="mb-8 border-t pt-8">
                        <h2 class="text-xl font-semibold mb-6 flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Guest Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Name</p>
                                <p class="font-medium text-gray-800">{{ $booking->user->name }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-500 text-sm">Email</p>
                                <p class="font-medium text-gray-800">{{ $booking->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cancellation Policy Notice -->
                    <div class="bg-amber-50 p-5 rounded-lg mb-8 border border-amber-100">
                        <div class="flex items-center text-amber-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="font-medium">You can cancel your reservation without charge up to 24 hours before check-in.</p>
                        </div>
                    </div>
                    
                    <!-- Footer Actions -->
                    <div class="flex flex-col md:flex-row justify-between items-center pt-6 border-t gap-4">
                        <a href="{{ route('reservations.my-reservations') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            View All My Reservations
                        </a>
                        <a href="{{ url('/') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-sm font-medium transition-colors w-full md:w-auto text-center">
                            Return to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    {{-- @endsection --}}