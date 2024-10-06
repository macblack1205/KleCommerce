<div class="text-sm text-gray-600 mb-4 flex flex-row justify-between">
    <a href="<?php echo e(route('profile')); ?>"><p><strong>Manage Address:</strong></p></a>
    <?php if($address): ?>
    <span class="text-teal-500"><?php echo e($address['street']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['country']); ?><i class="fa-solid fa-truck ml-2"></i></span>
    <?php else: ?>
    <span class="text-teal-500">No delivery address found!<i class="fa-solid fa-truck ml-2"></i></span>
    <?php endif; ?>
</div><?php /**PATH /var/www/resources/views/parts/available-address.blade.php ENDPATH**/ ?>