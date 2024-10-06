<div class="flex flex-row m-0 px-2 space-x-3 items-center text-xl cursor-pointer duration-500 text-white ">
    <div class="relative group">
        <i class="fa-solid fa-user  nav-icons" title="Profile"></i>
        <div class="absolute px-1 py-0.5 m-0 w-24 bg-white rounded-md shadow-lg z-10 hidden group-hover:block">
            <ul class="py-0.5 m-0">
                <?php if(auth()->guard()->check()): ?>                    
                    <a href="#"><li class="nav-drop-text ">Profile</li></a>
                    <a href="#"><li class="nav-drop-text ">Logout</li></a>
                <?php else: ?>
                    <a href="#"><li class="nav-drop-text">Login</li></a>
                    <a href="home"><li class="nav-drop-text ">Register</li></a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <a href="#"><i class="fa-solid fa-cart-shopping nav-icons" title="Cart"></i></a>
    <a href="#"><i class="fa-solid fa-boxes-stacked nav-icons" title="My Products"></i></a>
    <a href="#"><i class="fa-solid fa-moon nav-icons" title="Dark Mode"></i></a>
</div>
<?php /**PATH /home/macblack/projs/newfe/resources/views/parts/nav-icons.blade.php ENDPATH**/ ?>