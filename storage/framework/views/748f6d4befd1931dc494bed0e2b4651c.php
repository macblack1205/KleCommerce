
<!-- The Modal -->
<div id="editProfileModal" class="modal hidden fixed inset-0 bg-black bg-opacity-40 overflow-y-auto z-50">

    <!-- Modal content -->
    <div class="modal-content bg-white mx-auto mt-[15%] p-5 border-4 border-black  rounded-lg w-4/5 lg:w-1/2">
        <span class="close text-4xl icons" onclick="toggleEditForm()">&times;</span>
      <!-- Form for editing user profile -->
      <form method="POST" action="<?php echo e(route('user.update', $user['id'])); ?>" enctype="multipart/form-data" class="space-y-4">
        <?php echo csrf_field(); ?>        
         <!-- Row 1: Name and Surname -->
         <div class="input-field-space">
            <div class="input-box w-1/2 pr-2">
                <input type="text" name="name" placeholder="Name" value="<?php echo e($user['name']); ?>" required class="input-field">
                <i class="fa-solid fa-user icons"></i>
            </div>
            <div class="input-box w-1/2 pl-2">
                <input type="text" name="surname" placeholder="Surname" value="<?php echo e($user['surname']); ?>" required class="input-field">
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
                <input type="number" name="age" placeholder="Age" value="<?php echo e($user['age']); ?>" required class="input-field">
                <i class="fa-solid fa-calendar icons"></i>
            </div>
            
            <div class="input-box w-1/2 pl-2">
                <input type="text" name="country" placeholder="Country" value="<?php echo e($user['country']); ?>" required class="input-field">
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
                <input type="email" name="email" placeholder="Email" value="<?php echo e($user['email']); ?>" required class="input-field">
                <i class="fa-solid fa-envelope icons"></i>
            </div>
            <div class="input-box w-1/2 pl-2">
                <input type="text" name="number" placeholder="Phone" value="<?php echo e($user['number']); ?>" class="input-field">
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
  
        <!-- Submit Button -->
        <div class="flex items-center justify-end mb-4">
            <div class="flex flex-row m-0 p-0 space-x-2">
                <label class="bg-gray-600 text-white px-3 py-1 rounded-md text-base hover:bg-gray-400 focus:outline-none">
                    <i class="fa-solid fa-image cursor-pointer text-white hover:text-gray-2 00 p-2 hover:scale-110"></i>
                    <input type="file" name="photo" class="hidden" onchange="updateFileName(this)">
                </label>
                <button type="submit" class="button-sm">
                    Update <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
  
  <script>
      function toggleEditForm() {
          var modal = document.getElementById('editProfileModal');
          var displayStyle = window.getComputedStyle(modal).display;
          modal.style.display = (displayStyle === 'none') ? 'block' : 'none';
      }
  </script><?php /**PATH /var/www/resources/views/parts/edit-profile-popup.blade.php ENDPATH**/ ?>