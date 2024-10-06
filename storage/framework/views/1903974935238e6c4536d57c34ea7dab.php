<form method="POST" action="<?php echo e(route('product.store')); ?>" class="flex flex-col md:flex-row items-center space-y-2  md:space-x-3 w-full rounded-lg shadow-lg p-4">
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
    <div class="flex flex-row m-0 p-0 space-x-2">
    <!-- photo Input -->
        <label class="bg-gray-600 text-white px-3 py-1 rounded-md text-base hover:bg-gray-400 focus:outline-none">
            <i class="fa-solid fa-image text-white button"></i>
            <input type="file" name="photo" class="hidden" onchange="updateFileName(this)">
        </label>
        <!-- Submit Button -->
        <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
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
    <span class="input-field-message "><?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
</div><?php /**PATH /var/www/resources/views/parts/user-create-product.blade.php ENDPATH**/ ?>