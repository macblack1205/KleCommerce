@if(isset($product['reviews']) && count($product['reviews']) > 0)
    @foreach($product['reviews'] as $review)
        <div class="mb-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <div class="flex items-center mb-4">
                <img src="{{ asset('bg/default-user.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                <div>
                    <p class="font-bold text-gray-800 dark:text-gray-200">User {{ $review['user_id'] }}</p>
                    @include('parts.rating-calc', ['average_rating' => $review['rating']])
                </div>
            </div>
            <p class="text-gray-700 dark:text-gray-300">{{ $review['review'] }}</p>
        </div>
    @endforeach
@else
    <p class="text-gray-600 dark:text-gray-400">No reviews yet. Be the first to review this product!</p>
@endif
