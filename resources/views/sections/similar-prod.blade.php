@if($similarProducts)
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Other Products from {{ $seller['name'] }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($similarProducts as $similarProduct)
                <div class="bg-white dark:bg-gray-800 rounded-md shadow-md p-2">
                    <a href="{{ route('product', ['slug' => $similarProduct['slug'], 'id' => $similarProduct['id']]) }}">
                        <img src="{{ $similarProduct['image_url'] ?? asset('bg/default-product.png') }}" alt="{{ $similarProduct['title'] }}" class="w-full h-32 object-cover rounded-md mb-2">
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $similarProduct['title'] }}</p>
                        <p class="text-sm text-teal-500">{{ number_format($similarProduct['price'], 2) }} TL</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-gray-600 dark:text-gray-400">No other products from this seller.</p>
@endif
