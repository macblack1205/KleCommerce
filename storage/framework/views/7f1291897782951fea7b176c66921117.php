<div class="product bg-white dark:bg-gray-800 rounded-md shadow-md overflow-hidden p-2">
    <a href="<?php echo e(route('product', ['slug' => $product['slug'], 'id' => $product['id']])); ?>">
        <img src="<?php echo e($product['image_url']); ?>" alt="<?php echo e($product['title']); ?>" class="w-full h-48 object-cover rounded-md p-2 bg-white dark:bg-gray-700">
    </a>
    
    <div class="p-4">
        <a href="<?php echo e(route('product', ['slug' => $product['slug'], 'id' => $product['id']])); ?>">
            <h2 class="text-sm font-bold text-gray-800 dark:text-gray-200 truncate"><?php echo e($product['title']); ?></h2>
        </a>
        <a href="<?php echo e(route('user', ['name' => $product['user']['name'], 'id' => $product['user']['id']])); ?>">
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2"><?php echo e($product['user']['name']); ?> <?php echo e($product['user']['surname']); ?></p>
        </a>
        <?php echo $__env->make('parts.rating-calc', ['average_rating' => $product['average_rating']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-semibold text-gray-800 dark:text-gray-100"><?php echo e(number_format($product['price'], 2)); ?> TL</span>

            <?php if($product['user_id'] == session('user_id')): ?>
                <button class="button-sm" onclick="location.href='<?php echo e(route('product', ['slug' => $product['slug'], 'id' => $product['id']])); ?>'">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>
            <?php else: ?>
                <form id="add-to-cart-form-<?php echo e($product['id']); ?>" action="<?php echo e(route('cart.add', ['id' => $product['id']])); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <button class="button-sm" onclick="document.getElementById('add-to-cart-form-<?php echo e($product['id']); ?>').submit();">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/product/single-product.blade.php ENDPATH**/ ?>