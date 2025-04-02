@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">My Reviews</h1>
    
    @if ($reviews->count() > 0)
        <div class="space-y-6">
            @foreach ($reviews as $review)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                                    <a href="{{ route('hotels.show', $review->hotel) }}" class="hover:text-blue-600">
                                        {{ $review->hotel->name }}
                                    </a>
                                </h2>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-gray-300" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500">{{ $review->created_at->format('F j, Y') }}</p>
                            </div>
                            
                            <div class="flex space-x-4">
                                <a href="{{ route('hotels.reviews.index', $review->hotel) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                    All Reviews
                                </a>
                                <form action="{{ route('hotels.reviews.destroy', [$review->hotel, $review]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Are you sure you want to delete this review?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700">{{ $review->review }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 text-center">
                <p class="text-gray-600">You haven't submitted any reviews yet.</p>
                <!-- <a href="{{ route('hotels.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                    Browse hotels to review
                </a> -->
            </div>
        </div>
    @endif
</div>
@endsection