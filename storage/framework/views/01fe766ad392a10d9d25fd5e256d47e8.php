<section class="relative mx-auto my-10 rounded-lg overflow-hidden   bg-gradient-to-b from-gray-200 to-transparent dark:from-gray-900 dark:to-transparent">
    <!-- Gradient Overlay -->
    <div class="product-section-gradient"></div>
    <!-- Product Grid -->
        <div class="relative z-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        <!-- Product Card -->
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($product['user_id'] == $user['id']): ?>
                <?php echo $__env->make('product.single-product', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section><?php /**PATH /var/www/resources/views/product/user-products.blade.php ENDPATH**/ ?>