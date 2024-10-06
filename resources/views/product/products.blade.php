<section class="product-section">
    <div class="product-section-gradient"></div>

    <div class="product-grid">
        @foreach($products as $product)
            @include('product.single-product', ['product' => $product])
        @endforeach
    </div>
</section>
