<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Enter Password</h2>
         
         <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         
        <form method="POST" action="<?php echo e(route('login.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <div class="flex flex-row space-x-2 items-center justify-between w-full">
                    <input type="password" name="password" id="password" placeholder="Password" class="auth-input-field" required>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
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
                </div>
            </div>  
        </form>
        <div class="flex justify-end">
            <a href="login" class="link-text">Back</a>
        </div>
    </div>
</div>

<?php /**PATH /var/www/resources/views/auth/login-password.blade.php ENDPATH**/ ?>