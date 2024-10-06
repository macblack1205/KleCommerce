<div class="w-3/4 flex flex-row space-x-2 overflow-auto ">
    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200">
        <div class="flex flex-row m-0 p-0 justify-between items-center">
            <span class="text-sm text-gray-500 font-sans w-full text-left p-0 m-0"><?php echo e($coupon['discount_percentage']); ?>% off</span>
            <?php if(session('user')['id'] == $coupon['user_id']): ?>
            <form action="<?php echo e(route('coupon.destroy', $coupon['id'])); ?>" method="POST" class="p-0 m-0 items-center">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="text-gray-700 hover:text-gray-500 text-sm m-0 px-2 py-0"><i class="fa-solid fa-trash"></i></button>
            </form>
            <?php endif; ?>
        </div>
        <span class="text-xl text-gray-600 font-sans p-0 m-0"><?php echo e($coupon['coupon']); ?></span>
    </div>            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /var/www/resources/views/parts/coupon-part.blade.php ENDPATH**/ ?>