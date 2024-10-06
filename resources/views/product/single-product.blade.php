<div class="product bg-white dark:bg-gray-800 rounded-md shadow-md overflow-hidden p-2">
    <a href="{{ route('product', ['slug' => $product['slug'], 'id' => $product['id']]) }}">
        <img src="{{ $product['image_url'] }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover rounded-md p-2 bg-white dark:bg-gray-700">
    </a>
    
    <div class="p-4">
        <a href="{{ route('product', ['slug' => $product['slug'], 'id' => $product['id']]) }}">
            <h2 class="text-sm font-bold text-gray-800 dark:text-gray-200 truncate">{{ $product['title'] }}</h2>
        </a>
        <a href="{{ route('user', ['name' => $product['user']['name'], 'id' => $product['user']['id']]) }}">
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">{{ $product['user']['name'] }} {{ $product['user']['surname'] }}</p>
        </a>
        @include('parts.rating-calc', ['average_rating' => $product['average_rating']])

        <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ number_format($product['price'], 2) }} TL</span>

            @if($product['user_id'] == session('user_id'))
                <button class="button-sm" onclick="location.href='{{ route('product', ['slug' => $product['slug'], 'id' => $product['id']]) }}'">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>
            @else
                <form id="add-to-cart-form-{{ $product['id'] }}" action="{{ route('cart.add', ['id' => $product['id']]) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="button-sm" onclick="document.getElementById('add-to-cart-form-{{ $product['id'] }}').submit();">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            @endif
        </div>
    </div>
</div>
