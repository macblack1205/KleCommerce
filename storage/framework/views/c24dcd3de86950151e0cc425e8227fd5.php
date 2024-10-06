<form method="POST" action="<?php echo e(route('coupon.store')); ?>" class="flex items-center space-y-2 md:space-x-2 flex-col md:flex-row p-0 m-0">
    <?php echo csrf_field(); ?>
    <div class="input-box">
        <input type="text" name="coupon" placeholder="Coupon code" class="input-field" required>
        <i class="fa-solid fa-tag icons"></i>
    </div>
    <div class="input-box">
        <input type="number" name="discount_percentage" placeholder="Discount amount" class="input-field" required>
        <i class="fa-solid fa-percent icons"></i>
    </div>
    <button type="submit"><i class="fa-solid fa-arrow-right button"></i></button>
</form><?php /**PATH /var/www/resources/views/parts/user-create-coupon.blade.php ENDPATH**/ ?>