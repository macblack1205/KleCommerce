@include('header')

@php     
    $coupons = session('coupons'); 
    $user = session('user'); 
    $address = session('address'); 
@endphp
<div class="w-[90%] mx-auto my-10">
    <!-- Upper Main Section -->
    <div class="flex flex-col lg:flex-row gap-6">

        <!-- Left Column: Product Image -->
        <div class="flex w-full lg:w-2/6 bg-white dark:bg-gray-800 rounded-lg p-0">
            <img src="{{ $product['image_url'] }}" alt="{{ $product['title'] }}" title="View Product" class="w-full h-[400px] object-cover rounded-md mb-4">
        </div>

        <!-- Middle Column: Product Details and Actions -->
        <div class="flex flex-col w-full lg:w-2/5 bg-white dark:bg-gray-800 rounded-lg space-y-3 p-6">
            <!-- Product Title -->
            <h1 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-2">{{ $product['title'] }}</h1>
            
            <!-- Rating and Number of Reviews -->
            @include('parts.rating-calc', ['average_rating' => $product['average_rating']])

            <!-- Price -->
            <h1 class="text-2xl font-medium text-teal-700">{{ number_format($product['price'], 2) }} TL</h1>

            <!-- Available Addresses -->
            @include('parts.available-address')

            <!-- Add to Cart Button -->
            @include('parts.add-to-cart')

            <!-- Use Coupons -->
            @include('parts.available-coupons')

            <!-- Full Description -->
            <p class="text-gray-700 dark:text-gray-300 mb-6 text-left">{{ $product['description'] }}</p>
        </div>

        <!-- Right Column: Seller Info and Top Review -->
        <div class="w-full lg:w-1/4 bg-white dark:bg-gray-800 rounded-lg p-4">
            <!-- Seller Info -->
            @include('parts.seller-info')

            <!-- Top Selling Product -->
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Top Selling Product</h2>
            <div class="flex flex-col w-full border-2 border-gray-300 dark:border-gray-700 rounded-lg space-y-4 mb-4 p-2">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('bg/jacket.jpg') }}" alt="Top Product" class="w-24 h-24 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $topRatedProduct['title'] }}</p>
                        <p class="text-base font-medium text-teal-700">{{ $topRatedProduct['price'] }} TL</p>
                        @include('parts.rating-calc', ['average_rating' => $topRatedProduct['average_rating']])
                        <form id="add-to-cart-form-{{ $topRatedProduct['id'] }}" action="{{ route('cart.add', ['id' => $topRatedProduct['id']]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <button class="button-sm" onclick="document.getElementById('add-to-cart-form-{{ $topRatedProduct['id'] }}').submit();">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                @php
                    $reviews = $topRatedProduct['reviews'];
                    $topReview = collect($reviews)->sortByDesc('rating')->first();
                @endphp

                @if($topReview)
                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600 dark:text-gray-300 font-bold">User {{ $topReview['user_id'] }}</p>
                            @include('parts.rating-calc', ['average_rating' => $topReview['rating']])
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-400">{{ $topReview['review'] }}</p>
                    </div>
                @else
                    <p class="text-sm text-gray-600 dark:text-gray-300">No reviews available.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Lower Section: Similar Products and Reviews -->
    <div class="mt-10">
        <!-- Similar Products -->
        @include('sections.similar-prod')

        <!-- Reviews Section -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Reviews</h2>

            <!-- Add Review -->
            @include('sections.add-review')

            <!-- Review Listing -->
            @include('sections.review-listing')
        </div>
    </div>
</div>