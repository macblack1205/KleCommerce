<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<script src="https://kit.fontawesome.com/d3244f9937.js" crossorigin="anonymous"></script>


<section class="grid grid-cols-10 px-10 py-3 w-full bg-black text-white">
    
    <div class="col-span-7 relative overflow-hidden">
        <span class="absolute inset-0 flex items-center whitespace-nowrap animate-slide">
            Use <strong class="mx-2">Coupon10</strong> to get 10% discount
        </span>
    </div>    
    
    <div class="col-span-3 flex items-center justify-end">
        <?php echo $__env->make('parts.nav-icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<header class="bg-white flex py-3 px-10 items-center justify-between">
    
    <div class=" p-0 m-0">
        <a href="#" class="flex flex-row">
            <h2 class="text-2xl"><b>Kle</b>-Commerce</h2>
        </a>
    </div>
    
    <div class="flex flex-row items-center space-x-2 justify-between">
            <a href="" class="hidden md:flex text-S text-black p-0 m-0  flex-row  items-center">
                <p class=" mr-2">EXTRA %</p>
                BY USING <p class=" ml-2 underline">COUPONS</p> 
                <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i>
            </a>
         
        <?php echo $__env->make('parts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>
<hr><?php /**PATH /home/macblack/projs/newfe/resources/views/header.blade.php ENDPATH**/ ?>