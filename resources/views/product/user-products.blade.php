<section class="relative mx-auto my-10 rounded-lg overflow-hidden   bg-gradient-to-b from-gray-200 to-transparent dark:from-gray-900 dark:to-transparent">
    <!-- Gradient Overlay -->
    <div class="product-section-gradient"></div>
    <!-- Product Grid -->
        <div class="relative z-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        <!-- Product Card -->
        @foreach($products as $product)
            @if($product['user_id'] == $user['id'])
                @include('product.single-product', ['product' => $product])
            @endif
        @endforeach
    </div>
</section>