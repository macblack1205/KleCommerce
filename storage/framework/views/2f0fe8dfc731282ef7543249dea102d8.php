<button onclick="location.href='<?php echo e(route('user',['name' =>$product['user']['name'], 'id'=> $product['user']['id']])); ?>'" class="mb-4 p-2 w-full flex flex-row border-2 rounded-lg space-x-3 items-center">
    <img src="<?php echo e(asset($product['user']['photo'])); ?>" alt="Seller photo" class="w-20 h-20 object-cover rounded-md">
    <div class="flex flex-col space-y-2 items-start ">
        <p class="text-sm text-gray-800"><b><?php echo e($product['user']['name']); ?> <?php echo e($product['user']['surname']); ?></b></p>
        <p class="text-sm text-gray-600"><b>Country:</b> <?php echo e($product['user']['country']); ?></p>
        <p class="text-sm text-gray-600"><b>Email:</b> <?php echo e($product['user']['email']); ?></p>
    </div>
</button><?php /**PATH /var/www/resources/views/parts/seller-info.blade.php ENDPATH**/ ?>