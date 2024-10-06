<!-- Edit Product Modal -->
<div id="editProductModal" class="modal hidden fixed inset-0 bg-black bg-opacity-40 overflow-y-auto z-50">
    <!-- Modal content -->
    <div class="modal-content bg-white mx-auto mt-20 p-5 border-4 border-black rounded-lg w-4/5 lg:w-2/3">
        <span class="close text-4xl icons cursor-pointer" onclick="toggleEditProductForm()">&times;</span>
        <!-- Form for editing the product -->
        <form method="POST" action="<?php echo e(route('product.update', $product['id'])); ?>" enctype="multipart/form-data" class="flex items-center space-x-3">
            <?php echo csrf_field(); ?>
            <!-- Title Input -->
            <div class="input-box">
                <input type="text" name="title" placeholder="Title" value="<?php echo e($product['title']); ?>" class="input-field" required>
                <i class="fa-solid fa-tag icons"></i>
            </div>
            <!-- Price Input -->
            <div class="input-box">
                <input type="number" name="price" placeholder="Price" value="<?php echo e($product['price']); ?>" class="input-field" required>
                <i class="fa-solid fa-dollar-sign icons"></i>
            </div>
            <!-- Description Input -->
            <div class="input-box">
                <input type="text" name="description" placeholder="Description" value="<?php echo e($product['description']); ?>" class="input-field" required>
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
</div>

<script>
    function toggleEditProductForm() {
        var modal = document.getElementById('editProductModal');
        modal.classList.toggle('hidden');
    }
</script>
<?php /**PATH /var/www/resources/views/parts/edit-product-popup.blade.php ENDPATH**/ ?>