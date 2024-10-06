<section class="product-section">
    <!-- Gradient Overlay -->
    <div class="product-section-gradient"></div>

    <!-- Product Grid -->
        <div class="product-grid">

        <!-- Sample Product Card -->
       <?php echo $__env->make('product.single-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Repeat Product Card for other products -->
    </div>
</section>

<?php /**PATH /home/macblack/projs/newfe/resources/views/product/products.blade.php ENDPATH**/ ?>