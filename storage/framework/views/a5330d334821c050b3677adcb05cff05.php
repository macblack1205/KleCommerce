
<?php if($product['user']['id'] == session('user_id')): ?>
    <div class="flex w-full flex-row justify-between items-center space-x-2">
        <!-- Edit Product Button -->
        <button class="w-3/4 bg-teal-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-teal-800"
                onclick="toggleEditProductForm()">
            Edit Product
        </button>
        <!-- Delete Product Button -->
        <form method="POST" action="<?php echo e(route('product.destroy', $product['id'])); ?>" class="p-0 m-0 w-1/4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class=" w-full bg-red-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-red-800">
                Delete
            </button>
        </form>
    </div>
<?php else: ?>
    <!-- Add to Cart Form -->
    <form id="add-to-cart-form-<?php echo e($product['id']); ?>" action="<?php echo e(route('cart.add', ['id' => $product['id']])); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
    <button class="w-full bg-teal-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-teal-800"
            onclick="document.getElementById('add-to-cart-form-<?php echo e($product['id']); ?>').submit();">
        Add to Cart
    </button>
<?php endif; ?>

<!-- Include the Edit Product Modal -->
<?php echo $__env->make('parts.edit-product-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/resources/views/parts/add-to-cart.blade.php ENDPATH**/ ?>