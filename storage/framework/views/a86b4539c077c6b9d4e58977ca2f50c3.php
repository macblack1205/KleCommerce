<?php  $coupons = session('coupons'); ?>
<div class="flex flex-row justify-between mb-2">
    <h2 class="text-lg font-bold text-gray-800 ">Available Coupons</h2>
    <a href="<?php echo e(route('coupons')); ?>"><h2 class="text-lg font-sm text-gray-500">View all</h2></a>
</div>
<div class="mb-4 border-2 overflow-auto rounded-lg p-2">
    <div class="flex overflow-auto space-x-2 w-auto">
        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-gray-100 p-2 shrink-0 rounded-md shadow-md text-center">
                <p class="text-sm font-bold text-gray-800"><?php echo e($c['discount_percentage']); ?> % Off</p>
                <h1 class="text-teal-600 font-medium text-xl"><?php echo e($c['coupon']); ?></h1>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /var/www/resources/views/parts/available-coupons.blade.php ENDPATH**/ ?>