<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center mb-8">
            <a href="{{ route('reservations.hotel', $room->hotel->id) }}" class="text-blue-600 hover:text-blue-800 mr-3 flex items-center group transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Back to {{ $room->hotel->name }}</span>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Make a Reservation</h1>
        </div>
        
        @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded shadow-md mb-8" role="alert">
            <div class="flex">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <div class="bg-white shadow-lg rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800 pb-3 border-b">Reservation Details</h2>
                    
                    <form id="reservationForm" action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="price" id="finalPrice" value="{{ $room->price }}">
                        <input type="hidden" name="coupon_id" id="couponId">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="check_in" class="block text-gray-700 font-medium mb-2">Check-in Date *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-2 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="check_in" name="check_in" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('check_in') border-red-500 @enderror" required placeholder="Select Check-in Date" value="{{ old('check_in') }}">
                                </div>
                                @error('check_in')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="check_out" class="block text-gray-700 font-medium mb-2">Check-out Date *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-2 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="check_out" name="check_out" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('check_out') border-red-500 @enderror" required placeholder="Select Check-out Date" value="{{ old('check_out') }}">
                                </div>
                                @error('check_out')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div id="availabilityMessage" class="hidden mb-8 p-5 rounded-lg transition-all duration-300"></div>
                        
                        <div class="mb-8">
                            <label for="coupon_code" class="block text-gray-700 font-medium mb-2">Coupon Code (Optional)</label>
                            <div class="flex">
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 right-2 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="coupon_code" class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="Enter coupon code">
                                </div>
                                <button type="button" id="applyCoupon" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium px-6 py-3 rounded-r-lg border border-gray-300 border-l-0 transition-colors">
                                    Apply
                                </button>
                            </div>
                            <div id="couponMessage" class="mt-2 hidden transition-all duration-300"></div>
                        </div>
                        
                        <div id="pricingDetails" class="hidden bg-gray-50 p-6 rounded-lg mb-8 shadow-inner">
                            <h3 class="font-semibold text-lg mb-4 text-gray-800">Pricing Details</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between text-gray-600">
                                    <span>Room price:</span>
                                    <span class="font-medium">${{ number_format($room->price, 2) }}/night</span>
                                </div>
                                
                                <div class="flex justify-between text-gray-600">
                                    <span>Number of nights:</span>
                                    <span id="nightCount" class="font-medium">0</span>
                                </div>
                                
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal:</span>
                                    <span id="subtotal" class="font-medium">$0.00</span>
                                </div>
                                
                                <div id="discountRow" class="flex justify-between text-gray-600 hidden">
                                    <span>Discount:</span>
                                    <span id="discount" class="font-medium text-green-600">-$0.00</span>
                                </div>
                                
                                <div class="flex justify-between text-gray-800 font-bold text-lg pt-3 border-t">
                                    <span>Total:</span>
                                    <span id="total">$0.00</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-base font-medium transition-all disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-blue-600 shadow-md hover:shadow-lg" disabled style="background-color: #3182ce; padding: 10px">
                                Complete Reservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div>
                <div class="bg-white shadow-lg rounded-xl p-6 sticky top-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800 pb-3 border-b">Room Summary</h2>
                    
                    <div class="mb-4">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $room->hotel->name }}</h3>
                        <p class="text-gray-600 flex items-center mt-1">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $room->hotel->address }}
                        </p>
                    </div>
                    
                    <div class="border-t border-b py-5 my-4">
                        <h4 class="font-semibold text-gray-800 mb-3">{{ $room->room_type }}</h4>
                        <p class="text-gray-600 mb-3 flex items-center">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Capacity: {{ $room->capacity }} people
                        </p>
                        <p class="text-green-600 font-bold text-lg">${{ number_format($room->price, 2) }}/night</p>
                    </div>
                    
                    <div class="mt-5 p-4 bg-blue-50 rounded-lg text-sm text-gray-600">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 mr-2 text-blue-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>Reservation can be cancelled without charge up to 24 hours before check-in.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const tomorrow = new Date();
            tomorrow.setDate(today.getDate() + 1);
            
            // Initialize date pickers
            const checkInPicker = flatpickr("#check_in", {
                minDate: "today",
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr) {
                    // Update check-out min date
                    const nextDay = new Date(selectedDates[0]);
                    nextDay.setDate(nextDay.getDate() + 1);
                    
                    checkOutPicker.set('minDate', nextDay);
                    
                    // If check-out date is earlier than new min date, update it
                    if (checkOutPicker.selectedDates[0] && checkOutPicker.selectedDates[0] < nextDay) {
                        checkOutPicker.setDate(nextDay);
                    }
                    
                    checkAvailability();
                }
            });
            
            const checkOutPicker = flatpickr("#check_out", {
                minDate: tomorrow,
                dateFormat: "Y-m-d",
                onChange: function() {
                    checkAvailability();
                }
            });
            
            // Check room availability
            function checkAvailability() {
                const checkIn = document.getElementById('check_in').value;
                const checkOut = document.getElementById('check_out').value;
                
                if (!checkIn || !checkOut) return;
                
                const availabilityMessage = document.getElementById('availabilityMessage');
                const pricingDetails = document.getElementById('pricingDetails');
                const submitBtn = document.getElementById('submitBtn');
                
                fetch('{{ route('reservations.check-availability') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        room_id: {{ $room->id }},
                        check_in: checkIn,
                        check_out: checkOut
                    })
                })
                .then(response => response.json())
                .then(data => {
                    availabilityMessage.classList.remove('hidden');
                    
                    if (data.status === 'success') {
                        // Room is available
                        availabilityMessage.classList.remove('bg-red-100', 'text-red-700', 'border-red-400');
                        availabilityMessage.classList.add('bg-green-50', 'text-green-700', 'border-l-4', 'border-green-500');
                        availabilityMessage.innerHTML = '<div class="flex"><svg class="h-6 w-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><div><strong class="font-medium">Available!</strong> <span class="block sm:inline">This room is available for your selected dates.</span></div></div>';
                        
                        // Show pricing details
                        pricingDetails.classList.remove('hidden');
                        document.getElementById('nightCount').textContent = data.data.days;
                        document.getElementById('subtotal').textContent = `$${data.data.price.toFixed(2)}`;
                        document.getElementById('total').textContent = `$${data.data.price.toFixed(2)}`;
                        
                        // Update hidden price field
                        document.getElementById('finalPrice').value = data.data.price;
                        
                        // Enable submit button
                        submitBtn.disabled = false;
                        
                        // Reset coupon if dates change
                        resetCoupon();
                    } else {
                        // Room is not available
                        availabilityMessage.classList.remove('bg-green-50', 'text-green-700', 'border-green-500');
                        availabilityMessage.classList.add('bg-red-50', 'text-red-700', 'border-l-4', 'border-red-500');
                        availabilityMessage.innerHTML = `<div class="flex"><svg class="h-6 w-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><div><strong class="font-medium">Not Available!</strong> <span class="block sm:inline">${data.message}</span></div></div>`;
                        
                        // Hide pricing details
                        pricingDetails.classList.add('hidden');
                        
                        // Disable submit button
                        submitBtn.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error checking availability:', error);
                });
            }
            
            // Apply coupon code
            document.getElementById('applyCoupon').addEventListener('click', function() {
                const couponCode = document.getElementById('coupon_code').value.trim();
                const couponMessage = document.getElementById('couponMessage');
                
                if (!couponCode) {
                    couponMessage.classList.remove('hidden', 'text-green-600');
                    couponMessage.classList.add('text-red-600');
                    couponMessage.textContent = 'Please enter a coupon code.';
                    return;
                }
                
                fetch('{{ route('reservations.validate-coupon') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        code: couponCode
                    })
                })
                .then(response => response.json())
                .then(data => {
                    couponMessage.classList.remove('hidden');
                    
                    if (data.status === 'success') {
                        // Coupon is valid
                        couponMessage.classList.remove('text-red-600');
                        couponMessage.classList.add('text-green-600');
                        couponMessage.innerHTML = `<div class="flex items-center"><svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Coupon applied! You got $${data.data.discount} discount.</div>`;
                        
                        // Update hidden coupon ID field
                        document.getElementById('couponId').value = data.data.coupon_id;
                        
                        // Update pricing
                        const subtotalElement = document.getElementById('subtotal');
                        const subtotal = parseFloat(subtotalElement.textContent.replace('$', ''));
                        const discount = parseFloat(data.data.discount);
                        
                        // Show discount row
                        document.getElementById('discountRow').classList.remove('hidden');
                        document.getElementById('discount').textContent = `-$${discount.toFixed(2)}`;
                        
                        // Calculate new total
                        const newTotal = Math.max(subtotal - discount, 0);
                        document.getElementById('total').textContent = `$${newTotal.toFixed(2)}`;
                        
                        // Update hidden price field
                        document.getElementById('finalPrice').value = newTotal;
                    } else {
                        // Coupon is invalid
                        couponMessage.classList.remove('text-green-600');
                        couponMessage.classList.add('text-red-600');
                        couponMessage.innerHTML = `<div class="flex items-center"><svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>${data.message}</div>`;
                        
                        // Reset coupon
                        resetCoupon();
                    }
                })
                .catch(error => {
                    console.error('Error validating coupon:', error);
                });
            });
            // Reset coupon
            function resetCoupon() {
                document.getElementById('couponId').value = '';
                document.getElementById('discountRow').classList.add('hidden');
                
                // Restore original total
                const subtotalElement = document.getElementById('subtotal');
                const subtotal = parseFloat(subtotalElement.textContent.replace('$', ''));
                document.getElementById('total').textContent = `$${subtotal.toFixed(2)}`;
                document.getElementById('finalPrice').value = subtotal;
                
                // Clear coupon message
                const couponMessage = document.getElementById('couponMessage');
                couponMessage.classList.add('hidden');
            }
        });
    </script>
    </x-app-layout>