<div class="flex w-full justify-center m-0 p-0">
    <div class="flex flex-col w-3/4 bg-white rounded-lg shadow-md p-4 -mt-32 z-50">
        <!-- Hero Text -->
        <h1 class="text-lg font-semibold text-gray-800 mb-2">Have a product in mind?</h1>
        <div class="flex flex-row justify-between items-center m-0 p-0">
            <span class="text-sm text-gray-700 mb-4">Create your listing and contribute to our amazing quality products collection</span>
            <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Form Section -->
        <form method="POST" action="<?php echo e(route('product.store')); ?>" enctype="multipart/form-data" class="flex items-center space-x-3">
            <?php echo csrf_field(); ?>
            <!-- Title Input -->
            <div class="input-box">
                <input type="text" name="title" placeholder="Title" class="input-field" required>
                <i class="fa-solid fa-tag icons"></i>
            </div>
            <!-- Price Input -->
            <div class="input-box">
                <input type="number" name="price" placeholder="Price" class="input-field" required>
                <i class="fa-solid fa-dollar-sign icons"></i>
            </div>
            <!-- Description Input -->
            <div class="input-box">
                <input type="text" name="description" placeholder="Description" class="input-field" required>
                <i class="fa-solid fa-align-left icons"></i>
            </div>
            <!-- photo Input -->
            <label class="bg-gray-600 text-white px-3 py-1 rounded-md text-base hover:bg-gray-400 focus:outline-none">
                <i class="fa-solid fa-image text-white icons"></i>
                <input type="file" name="image" id="image" class="hidden" onchange="updateFileName(this)">
            </label>
            
            <!-- Submit Button -->
            <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
        </form>
        <div class="input-field-message-field">
            <span class="input-field-message "><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            <span class="input-field-message "><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            <span class="input-field-message "><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            <span class="input-field-message "><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
        </div>
    </div>
</div><?php /**PATH /var/www/resources/views/sections/create-listing.blade.php ENDPATH**/ ?>