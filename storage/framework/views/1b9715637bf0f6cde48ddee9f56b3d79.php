<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Enter Password</h2>
        <form method="POST" action="">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="email" value="">
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="flex flex-row space-x-2 items-center justify-between w-full">
                    <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-700 focus:border-teal-700" required>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>  
        </form>
        <?php if(session('error')): ?>
            <p class="text-red-500 text-xs italic"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
        <div class="flex justify-end text-gray-600">
            <a href="">Back</a>
        </div>
    </div>
</div>

<?php /**PATH /home/macblack/projs/newfe/resources/views/auth/login-password.blade.php ENDPATH**/ ?>