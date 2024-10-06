<div class="product">
    <!-- Product Image -->
    <a href=""><img src="path-to-your-product-image.jpg" alt="Product Image" title="View Product" class="w-full h-48 object-cover rounded-md p-2 bg-white"></a>

    <!-- Product Details -->
    <div class="p-4">
        <a href=""><h2 class="text-sm font-bold text-gray-800 truncate" title="View Product">Kiperin Collagen %100 Saf Ve Doğal Yüksek Biyoaktif Çift...</h2></a>
        <a href="#"><p class="text-xs text-gray-500 mt-2" title="See other products by this seller">by John Doe<i class="ml-2 fa-solid fa-arrow-up-right-from-square"></i></p></a>
        <?php echo $__env->make('parts.rating-calc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Price and Add to Cart -->
        <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-semibold text-gray-800">745,40 TL</span>
            <button class="button-sm">
                <i class="fa-solid fa-cart-plus"></i>
            </button>
        </div>
    </div>
</div><?php /**PATH /home/macblack/projs/newfe/resources/views/product/single-product.blade.php ENDPATH**/ ?>