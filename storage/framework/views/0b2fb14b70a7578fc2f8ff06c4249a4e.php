<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form method="POST" action="">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex flex-row space-x-2 items-center justify-between w-full">
                    <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-700 focus:border-teal-700" required>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
        <?php if(session('error')): ?>
            <p class="text-red-500 text-xs italic"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
        <div class="flex flex-row justify-between items-center text-gray-600">
            <a href="">Register</a>
            <a href="">Back</a>
        </div>
    </div>
</div>
<?php /**PATH /home/macblack/projs/newfe/resources/views/auth/login.blade.php ENDPATH**/ ?>