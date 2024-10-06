<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mx-auto p-4 bg-white dark:bg-gray-800 h-full md:h-[83vh] flex justify-center items-start md:items-center">
    <div class="w-full px-4 md:px-0 md:max-w-lg max-h-[100vh]">
        <h2 class="text-2xl text-gray-800 dark:text-white font-bold mb-6 text-center">Register</h2>
        
        <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <form method="POST" action="<?php echo e(route('user.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- Row 1: Name and Surname -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="text" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="surname" placeholder="Surname" value="<?php echo e(old('surname')); ?>" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message "><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <span class="input-field-message "><?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            </div>

            <!-- Row 2: Age and Country -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="number" name="age" placeholder="Age" value="<?php echo e(old('age')); ?>" required class="input-field">
                    <i class="fa-solid fa-calendar icons"></i>
                </div>
                
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="country" placeholder="Country" value="<?php echo e(old('country')); ?>" required class="input-field">
                    <i class="fa-solid fa-globe icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message "><?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <span class="input-field-message "><?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            </div>

            <!-- Row 3: Email and Phone -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required class="input-field">
                    <i class="fa-solid fa-envelope icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="number" placeholder="Phone number" value="<?php echo e(old('number')); ?>" class="input-field">
                    <i class="fa-solid fa-phone icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <span class="input-field-message "><?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
            </div>

            <!-- Row 4: Password and Confirm Password -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" value="<?php echo e(old('password_confirmation')); ?>" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message "><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                <span class="input-field-message "><?php $__errorArgs = ['password_confirmation'];
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
            </div>

            <!-- Registration Button and Login Link and Photo upload -->
            <div class="flex items-center justify-between mb-4">
                <a href="login" class="link-text">
                    Login here
                </a>
                <div class="flex flex-row m-0 p-0 space-x-2">
                    <label class="bg-gray-600 text-white px-3 py-1 rounded-md text-base hover:bg-gray-400 focus:outline-none">
                        <i class="fa-solid fa-image cursor-pointer text-white hover:text-gray-2 00 p-2 hover:scale-110"></i>
                        <input type="file" name="photo" class="hidden" onchange="updateFileName(this)">
                    </label>
                    <button type="submit" class="button-sm">
                        Register <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH /var/www/resources/views/user/register.blade.php ENDPATH**/ ?>