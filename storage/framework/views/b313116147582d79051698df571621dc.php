<?php if(session('user')): ?>
    <form action="<?php echo e(route('review.store', $product['id'])); ?>" method="POST" class="mb-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="product_id" value="<?php echo e($product['id']); ?>">

        <!-- Rating Field -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Your Rating:</label>
            <div class="flex items-center">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="<?php echo e($i); ?>" class="hidden" <?php echo e(old('rating') == $i ? 'checked' : ''); ?>>
                        <svg class="w-6 h-6 <?php echo e(old('rating') >= $i ? 'text-yellow-500' : 'text-gray-300 dark:text-gray-500'); ?> fill-current hover:text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.122-6.545L0 6.91l6.562-.955L10 0l3.438 5.955L20 6.91l-5.244 4.635 1.122 6.545z"/>
                        </svg>
                    </label>
                <?php endfor; ?>
            </div>
            <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs italic"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Review Field -->
        <div class="mb-4">
            <label for="review" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Your Review:</label>
            <textarea name="review" id="review" rows="4" class="shadow border dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:ring-2 focus:ring-teal-500"><?php echo e(old('review')); ?></textarea>
            <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs italic"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
            Submit Review
        </button>
    </form>
<?php else: ?>
    <p class="mb-6 text-gray-600 dark:text-gray-300">Please <a href="<?php echo e(route('login')); ?>" class="text-teal-500 underline">login</a> to write a review.</p>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/sections/add-review.blade.php ENDPATH**/ ?>