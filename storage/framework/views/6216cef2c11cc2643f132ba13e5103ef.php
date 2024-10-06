<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Row 1: Name and Surname -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="text" name="name" placeholder="Name" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="surname" placeholder="Surname" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
            </div>

            <!-- Row 2: Age and Country -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="number" name="age" placeholder="Age" required class="input-field">
                    <i class="fa-solid fa-calendar icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="country" placeholder="Country" required class="input-field">
                    <i class="fa-solid fa-globe icons"></i>
                </div>
            </div>

            <!-- Row 3: Email and Phone -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="email" name="email" placeholder="Email" required class="input-field">
                    <i class="fa-solid fa-envelope icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="phone" placeholder="Phone" class="input-field">
                    <i class="fa-solid fa-phone icons"></i>
                </div>
            </div>

            <!-- Row 4: Password and Confirm Password -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="password" name="password" placeholder="Password" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="input-box mb-4">
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                <i class="fa-solid fa-image icons"></i>
            </div>
            
            <?php if(session('error')): ?>
                <p class="text-red-500 text-xs italic"><?php echo e(session('error')); ?></p>
            <?php endif; ?>

            <!-- Registration Button and Login Link -->
            <div class="flex items-center justify-between mb-4">
                <a href="" class="inline-block align-middle text-gray-600 hover:text-gray-400 font-bold py-2 px-4">
                    Login here
                </a>
                <button type="submit" class="button-sm">
                    Register <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div><?php /**PATH /home/macblack/projs/newfe/resources/views/user/register.blade.php ENDPATH**/ ?>