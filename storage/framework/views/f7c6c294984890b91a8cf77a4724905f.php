<div class="flex flex-row m-0 px-2 space-x-3 items-center text-xl cursor-pointer duration-500 text-white dark:text-gray-200">
    <div class="relative group">
        <i class="fa-solid fa-user nav-icons" title="Profile"></i>
        <div class="absolute px-1 py-0.5 m-0 w-24 bg-white dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-lg z-10 hidden group-hover:block">
            <ul class="py-0.5 m-0">
                <?php if(session('user')): ?>
                    <a href="<?php echo e(route('profile')); ?>"><li class="nav-drop-text">Profile</li></a>
                    <a class="nav-drop-text">
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="p-0 m-0">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="all" value="false">
                            <button type="submit" class="button-logout">Logout</button>
                        </form>
                    </a>
                <?php else: ?>
                    <a href="login"><li class="nav-drop-text">Login</li></a>
                    <a href="register"><li class="nav-drop-text">Register</li></a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <a href="<?php echo e(route('cart')); ?>"><i class="fa-solid fa-cart-shopping nav-icons" title="Cart"></i></a>
    <a href="profile"><i class="fa-solid fa-boxes-stacked nav-icons" title="My Products"></i></a>
    <button id="darkmode"><i class="fa-solid fa-moon nav-icons" id="darkIcon" title="Dark Mode"></i></button>
</div>

<script>
    document.getElementById('darkmode').addEventListener('click', () => {
        const darkIcon = document.getElementById('darkIcon');
        const isDarkMode = document.documentElement.classList.toggle('dark');
        darkIcon.classList.toggle('fa-moon', !isDarkMode);
        darkIcon.classList.toggle('fa-sun', isDarkMode); // Optionally toggle moon/sun icon
    });
</script>
<?php /**PATH /var/www/resources/views/parts/nav-icons.blade.php ENDPATH**/ ?>