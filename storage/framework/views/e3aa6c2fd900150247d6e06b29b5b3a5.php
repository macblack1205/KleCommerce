<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        
        <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <form method="POST" action="<?php echo e(route('login.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <div class="flex flex-row space-x-2  items-center justify-between w-full">
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo e(old('email')); ?>" class=" auth-input-field" required>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
        
        <div class="flex flex-row justify-between items-center">
            <a href="register" class="link-text">Register</a>
            <a href="home" class="link-text">Back</a>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/auth/login.blade.php ENDPATH**/ ?>