@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('hotels.reviews.index', $hotel) }}" class="text-blue-600 hover:underline">
            &larr; Back to Reviews
        </a>
    </div>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Write a Review for {{ $hotel->name }}</h1>
            
            @if ($errors->any())
                <div class="mb-4 bg-red-50 text-red-700 p-4 rounded-md">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('hotels.reviews.store', $hotel) }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <div class="flex items-center">
                        <div class="flex space-x-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required {{ old('rating') == $i ? 'checked' : '' }}>
                                <label for="star{{ $i }}" class="cursor-pointer peer-checked:text-yellow-400 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                    <textarea id="review" name="review" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Share your experience with this hotel..." required>{{ old('review') }}</textarea>
                </div>
                
                <div class="flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection