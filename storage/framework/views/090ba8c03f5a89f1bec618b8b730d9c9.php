<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $couponsCollection = collect($coupons); ?>

<div class="min-h-screen dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white">Coupons Dashboard</h1>

    <?php $__currentLoopData = $couponsCollection->groupBy('user_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userCoupons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">User ID: <?php echo e($userId); ?></h2>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <?php $__currentLoopData = $userCoupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <div class="text-sm font-bold text-gray-800 dark:text-white"><?php echo e($coupon['discount_percentage']); ?>% Off</div>
                                <p class="text-teal-600 font-medium text-xl"><?php echo e($coupon['coupon']); ?></p>
                            </div>
                            <?php if(session('user_id') === $coupon['user_id']): ?>
                                <div>
                                    <button onclick="toggleForm('<?php echo e($coupon['id']); ?>')" class="text-blue-500 hover:text-blue-700">
                                        <i class="fa-regular fa-pen-to-square icons" title="Edit"></i>
                                    </button>
                                    <form action="<?php echo e(route('coupon.destroy', $coupon['id'])); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-trash icons" title="Delete"></i>
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                        <form method="POST" action="<?php echo e(route('coupon.update', $coupon['id'])); ?>" id="edit-form-<?php echo e($coupon['id']); ?>" class="hidden mt-2">
                            <?php echo csrf_field(); ?>
                            <div class="flex flex-col space-y-2 justify-start">
                                <div class="input-box">
                                    <input type="text" name="coupon" placeholder="Coupon" value="<?php echo e($coupon['coupon']); ?>" class="input-field">
                                </div>
                                <div class="input-box">
                                    <input type="number" name="discount_percentage" placeholder="Discount %" value="<?php echo e($coupon['discount_percentage']); ?>" class="input-field">
                                </div>
                                <button class="button-sm"><i class="fa-solid fa-arrow-right icons"></i></button>
                            </div>                            
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<script>
function toggleForm(id) {
    const form = document.getElementById(`edit-form-${id}`);
    form.classList.toggle('hidden');
}
</script>
<?php /**PATH /var/www/resources/views/coupons.blade.php ENDPATH**/ ?>