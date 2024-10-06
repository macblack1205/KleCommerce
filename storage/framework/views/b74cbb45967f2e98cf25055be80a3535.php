<?php if(isset($product['reviews']) && count($product['reviews']) > 0): ?>
    <?php $__currentLoopData = $product['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <div class="flex items-center mb-4">
                <img src="<?php echo e(asset('bg/default-user.png')); ?>" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                <div>
                    <p class="font-bold text-gray-800 dark:text-gray-200">User <?php echo e($review['user_id']); ?></p>
                    <?php echo $__env->make('parts.rating-calc', ['average_rating' => $review['rating']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <p class="text-gray-700 dark:text-gray-300"><?php echo e($review['review']); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <p class="text-gray-600 dark:text-gray-400">No reviews yet. Be the first to review this product!</p>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/sections/review-listing.blade.php ENDPATH**/ ?>