<?php if($similarProducts): ?>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Other Products from <?php echo e($seller['name']); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php $__currentLoopData = $similarProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similarProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white dark:bg-gray-800 rounded-md shadow-md p-2">
                    <a href="<?php echo e(route('product', ['slug' => $similarProduct['slug'], 'id' => $similarProduct['id']])); ?>">
                        <img src="<?php echo e($similarProduct['image_url'] ?? asset('bg/default-product.png')); ?>" alt="<?php echo e($similarProduct['title']); ?>" class="w-full h-32 object-cover rounded-md mb-2">
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-200"><?php echo e($similarProduct['title']); ?></p>
                        <p class="text-sm text-teal-500"><?php echo e(number_format($similarProduct['price'], 2)); ?> TL</p>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <p class="text-gray-600 dark:text-gray-400">No other products from this seller.</p>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/sections/similar-prod.blade.php ENDPATH**/ ?>