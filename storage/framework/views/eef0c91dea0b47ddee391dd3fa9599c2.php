<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="w-[90%] mx-auto my-10 flex flex-row">

    <div class="w-3/4 bg-white rounded-lg p-6 space-y-2 flex flex-col">
        
        <div class="h-10 py-8 px-2 rounded-lg border-2 items-center justify-between flex flex-row space-x-4">

            <div class=" flex flex-row space-x-2 ">
                <div class="input-box">
                    <input type="text" placeholder="Coupon code" class="input-field">
                    <i class="fa-solid fa-tag icons"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Discount amount" class="input-field">
                    <i class="fa-solid fa-percent icons"></i>
                </div>
            </div>

            <div class="w-3/4 flex flex-row space-x-2 overflow-auto ">
                <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200  ">
                    <span class="text-sm text-gray-400 font-sans w-full text-left p-0 m-0">50% off</span>
                    <span class="text-xl text-gray-600 font-sans p-0 m-0">Code50</span>
                </div>
                <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200  ">
                    <span class="text-sm text-gray-400 font-sans w-full text-left p-0 m-0">50% off</span>
                    <span class="text-xl text-gray-600 font-sans p-0 m-0">Code50</span>
                </div>
                <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200  ">
                    <span class="text-sm text-gray-400 font-sans w-full text-left p-0 m-0">50% off</span>
                    <span class="text-xl text-gray-600 font-sans p-0 m-0">Code50</span>
                </div>
                <div class="flex flex-col px-2 py-0 items-center rounded-sm border-2 bg-gray-200  ">
                    <span class="text-sm text-gray-400 font-sans w-full text-left p-0 m-0">50% off</span>
                    <span class="text-xl text-gray-600 font-sans p-0 m-0">Code50</span>
                </div>
            </div>

        </div>

        
        <div class=" py-2 px-4 rounded-lg border-2">

            
            <form action="#" class="flex items-center space-x-3 rounded-lg shadow-lg p-4">
                <!-- Title Input -->
                <div class="input-box">
                    <input type="text" placeholder="Title" class="input-field">
                    <i class="fa-solid fa-tag icons"></i>
                </div>
                <!-- Price Input -->
                <div class="input-box">
                    <input type="text" placeholder="Price" class="input-field">
                    <i class="fa-solid fa-dollar-sign icons"></i>
                </div>
                <!-- Description Input -->
                <div class="input-box">
                    <input type="text" placeholder="Description" class="input-field">
                    <i class="fa-solid fa-align-left icons"></i>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
            </form>

            
            
            <section class="relative mx-auto my-10 rounded-lg overflow-hidden   bg-gradient-to-b from-gray-100 via-white to-white">
                <!-- Gradient Overlay -->
                <div class="product-section-gradient"></div>
            
                <!-- Product Grid -->
                    <div class="relative z-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
            
                    <!-- Sample Product Card -->
                   <?php echo $__env->make('product.single-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Repeat Product Card for other products -->
                </div>
            </section>

        </div>

    </div>

    
    <div class="w-full lg:w-1/4 bg-white rounded-lg p-6 flex flex-col">
        
            <div class="mb-4 p-2 flex flex-col border-2 rounded-lg space-y-3 items-start">
                <img src="<?php echo e(asset('bg/seller.jpg')); ?>" alt="Seller Image" class="w-full h-40 object-cover rounded-md">
                <div class="flex flex-col space-y-1 w-full">
                    <div class="flex flex-row justify-between">
                        <p class="text-base text-gray-800"><b>John Doe</b>, 23</p>
                        
                        <div class="flex flex-row justify-between space-x-1">
                            <a href=""><i class="fa-regular fa-pen-to-square" title="edit profile"></i></a>
                            <a href=""><i class="fa-solid fa-trash" title="delete account"></i></a>
                            <a href=""></a>
                            <div class="relative group">
                                <i class="fa-solid fa-right-from-bracket" title="Logout"></i>
                                <div class="absolute px-1 py-0.5 m-0 w-24 bg-white rounded-md shadow-lg z-10 hidden group-hover:block">
                                    <ul class="py-0.5 m-0">                 
                                        <a href="#"><li class="nav-drop-text ">Logout</li></a>
                                        <a href="#"><li class="nav-drop-text ">Logout all</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600"><b>Country:</b> USA</p>
                    <p class="text-sm text-gray-600"><b>Phone:</b> +1 234 56 89</p>
                    <p class="text-sm text-gray-600"><b>Email:</b> johndoe@example.com</p>
                </div>
            </div>

            
            <h2 class="text-lg font-bold text-gray-800">Manage addresses</h2>
            <div class="mb-4 p-2 flex flex-col border-2 rounded-lg space-y-3 items-start">
                
                <form action="#" class="flex flex-col space-y-3 w-full">
                    <div class="input-box">
                        <input type="text" placeholder="Street" class="input-field">
                        <i class="fa-solid fa-dollar-sign icons"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="City" class="input-field">
                        <i class="fa-solid fa-dollar-sign icons"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Country" class="input-field">
                        <i class="fa-solid fa-dollar-sign icons"></i>
                    </div>    
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </form>
                
                <div class="flex flex-col text-sm text-gray-700 font-sans p-2 m-0 space-y-2 w-full ">
                    <div class="flex flex-row justify-between">
                        <p><b>Address:</b> 123. New Street</p>
                        <div class="flex flex-row justify-between space-x-1">
                            <a href=""><i class="fa-regular fa-pen-to-square" title="edit address"></i></a>
                            <a href=""><i class="fa-solid fa-trash" title="delete address"></i></a>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p><b>City:</b> New York</p>
                        <p><b>Country:</b> USA</p>
                    </div>
                    <hr>
                </div>
            </div>

    </div>
</div><?php /**PATH /home/macblack/projs/newfe/resources/views/user/profile.blade.php ENDPATH**/ ?>