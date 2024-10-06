<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $editable = session('user_id') === $user['id'];
    $coupons = $user['coupons'];
    $address = $user['addresses'];
?>

<div class="w-full md:w-[90%] md:mx-auto md:my-10 flex flex-col bg-white dark:bg-gray-800 md:rounded-lg lg:flex-row space-y-4 lg:space-y-0 lg:space-x-6">
    <div class="w-full lg:w-3/4  rounded-lg p-6 space-y-4 flex flex-col">
        
        <div class="py-4 px-2 w-full rounded-lg border-2 flex flex-col lg:flex-row items-center md:items-center space-y-4 lg:space-y-0 lg:space-x-4">
            
            <?php if($editable): ?>
                <?php echo $__env->make('parts.user-create-coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php if($coupons != null): ?>
            <div class="flex flex-row  p-2 space-x-2 w-4/5 md:w-3/4 overflow-auto items-center justify-start">
                
                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200">
                        <!-- Check if the user is viewing their own profile or someone else's -->
                        <?php if(session('user')['id'] == $user['id']): ?>
                            <!-- Show coupon only if it belongs to the user -->
                            <?php if($coupon['user_id'] == $user['id']): ?>
                                <div class="flex flex-row m-0 p-0 justify-between items-center">
                                    <span class="text-sm text-gray-400 font-sans w-full whitespace-nowrap p-0 m-0"><?php echo e($coupon['discount_percentage']); ?> % off</span>
                                    <!-- Show delete button if it's the session user's coupon -->
                                    <form action="<?php echo e(route('coupon.destroy', $coupon['id'])); ?>" method="POST" class="p-0 m-0 items-center">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-gray-700 hover:text-gray-500 text-sm m-0 px-2 py-0"><i class="fa-solid fa-trash m-0"></i></button>
                                    </form>
                                </div>
                                <span class="text-teal-600 font-sans font-medium text-xl whitespace-nowrap p-0 m-0"><?php echo e($coupon['coupon']); ?></span>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- Show all coupons if viewing someone else's profile -->
                            <div class="flex flex-row m-0 p-0 justify-center items-center">
                                <span class="text-sm text-gray-400 font-sans w-full whitespace-nowrap p-0 m-0"><?php echo e($coupon['discount_percentage']); ?>% off</span>
                            </div>
                            <span class="text-gray-600 font-sans text-md whitespace-nowrap p-0 m-0"><?php echo e($coupon['coupon']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <?php endif; ?>
        </div>

        
        <?php echo $__env->make('parts.edit-profile-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="py-2 px-4 rounded-lg border-2">
            <?php if($editable): ?>
                <?php echo $__env->make('parts.user-create-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(($products)): ?>
                <?php echo $__env->make('product.user-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
    
    
    <div class="w-full lg:w-1/4 rounded-lg p-6 flex flex-col">
        <div class="mb-4 p-2 flex flex-col border-2 rounded-lg space-y-3 items-start">
            <img src="<?php echo e($user['photo'] ? asset('storage/' . $user['photo']) : asset('bg/default-user.png')); ?>" alt="Seller Image" class="w-full h-40 object-cover rounded-md">
            <div class="flex flex-col space-y-1 w-full">
                <div class="flex flex-row justify-between">
                    <p class="text-base text-gray-800 dark:text-gray-200"><b><?php echo e($user['name']); ?> <?php echo e($user['surname']); ?></b>, <?php echo e($user['age']); ?></p>
                    <?php if($editable): ?>
                        <div class="flex flex-row items-center space-x-1">
                            <a onclick="toggleEditForm()" class="cursor-pointer fa-regular fa-pen-to-square" title="edit profile"></a>
                            <form method="POST" action="<?php echo e(route('user.destroy', $user['id'])); ?>" class="p-0 m-0">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="fa-solid fa-trash" title="delete account"></button>
                            </form>
                            <div class="relative group">
                                <i class="fa-solid fa-right-from-bracket" title="Logout"></i>
                                <div class="absolute py-1 w-24 bg-white dark:bg-gray-700 rounded-md shadow-lg z-10 hidden group-hover:block">
                                    <ul class="p-0">
                                        <li class="nav-drop-text">
                                            <form action="<?php echo e(route('logout')); ?>" method="POST" class="p-0 m-0">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="button-logout">Logout</button>
                                            </form>
                                        </li>
                                        <li class="nav-drop-text">
                                            <form action="<?php echo e(route('logout', ['all' => 'true'])); ?>" method="POST" class="m-0 p-0">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="button-logout">Logout All</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Country:</b> <?php echo e($user['country']); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Phone:</b> <?php echo e($user['number'] ? $user['number'] : 'N/A'); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Email:</b> <?php echo e($user['email']); ?></p>
            </div>
        </div>

        <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php if($editable): ?>
        <div class="mb-4 p-2 flex flex-col border-2 rounded-lg space-y-3 items-start">
            <form method="POST" action="<?php echo e(route('address.store')); ?>" class="flex flex-col space-y-3 w-full" id="createForm">
                <?php echo csrf_field(); ?>
                <div class="input-box">
                    <input type="text" placeholder="Street" name="street" class="input-field">
                    <i class="fa-solid fa-location-dot icons"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="City" name="city" class="input-field">
                    <i class="fa-regular fa-map icons"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Country" name="country" class="input-field">
                    <i class="fa-solid fa-globe icons"></i>
                </div>
                <div class="input-field-message-field">
                    <span class="input-field-message"><?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    <span class="input-field-message"><?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    <span class="input-field-message"><?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                </div>
                <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
            </form>

            <?php if($address): ?>
                
                <form method="POST" action="<?php echo e(route('address.update', $address['0']['id'])); ?>" class="flex flex-col space-y-3 w-full" style="display: none;" id="updateForm">
                    <?php echo csrf_field(); ?>
                    <div class="input-box">
                        <input type="text" placeholder="Street" name="street" value="<?php echo e($address['0']['street']); ?>" class="input-field">
                        <i class="fa-solid fa-location-dot icons"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="City" name="city" value="<?php echo e($address['0']['city']); ?>" class="input-field">
                        <i class="fa-regular fa-map icons"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Country" name="country" value="<?php echo e($address['0']['country']); ?>" class="input-field">
                        <i class="fa-solid fa-globe icons"></i>
                    </div>
                    <div class="input-field-message-field">
                        <span class="input-field-message"><?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <span class="input-field-message"><?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <span class="input-field-message"><?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </form>

                
                <div class="flex flex-col text-sm text-gray-700 dark:text-gray-300 space-y-2 w-full">
                    <div class="flex justify-between">
                        <p><b>Address:</b> <?php echo e($address['0']['street'] ? $address['0']['street'] : 'N/A'); ?></p>
                        <div class="flex space-x-1">
                            <a href="javascript:void(0);" onclick="toggleForms();">
                                <i class="fa-regular fa-pen-to-square" title="edit address"></i>
                            </a>
                            <a href="<?php echo e(route('address.destroy', $address[0]['id'])); ?>" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <i class="fa-solid fa-trash" title="delete address"></i>
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p><b>City:</b> <?php echo e($address['0']['city'] ? $address['0']['city'] : 'N/A'); ?></p>
                        <p><b>Country:</b> <?php echo e($address['0']['country'] ? $address['0']['country'] : 'N/A'); ?></p>
                    </div>
                </div>

                
                <form id="delete-form" action="<?php echo e(route('address.destroy', $address[0]['id'])); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function toggleForms() {
        var createForm = document.getElementById('createForm');
        var updateForm = document.getElementById('updateForm');
        if (updateForm.style.display === 'none') {
            updateForm.style.display = 'block';
            createForm.style.display = 'none';
        } else {
            updateForm.style.display = 'none';
            createForm.style.display = 'block';
        }
    }
</script>
<?php /**PATH /var/www/resources/views/user/profile.blade.php ENDPATH**/ ?>