<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $user = session('user'); $coupons = session('coupons'); ?>


<section class="grid grid-cols-10 px-10 py-3 w-full h-15  bg-black text-white dark:bg-gray-900 dark:text-gray-200">
    
    <div class="col-span-7 relative overflow-hidden">
        <span class="absolute inset-0 flex items-center whitespace-nowrap animate-slide">
            <?php if($user && !empty($coupons)): ?>
                Use <strong class="mx-2"><?php echo e($coupons['0']['coupon']); ?></strong> to get <?php echo e($coupons['0']['discount_percentage']); ?>% discount
            <?php else: ?> 
                Get started to buy and sell products at <strong class="mx-2 italic">discount prices</strong>
            <?php endif; ?>
        </span>
    </div>    
    
    <div class="col-span-3 flex items-center justify-end">
        <?php if($user): ?><?php echo e($user['name']); ?><?php endif; ?>
        <?php echo $__env->make('parts.nav-icons', ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>


<header class="bg-white dark:bg-gray-800 flex py-3 px-10 items-center justify-between">
    
    <div class="p-0 m-0">
        <a href="<?php echo e(route('home')); ?>" class="flex flex-row">
            <h2 class="text-2xl text-black dark:text-white"><b>Kle</b>-Commerce</h2>
        </a>
    </div>
    
    <?php if($user): ?>
    <div class="flex flex-row items-center space-x-2 justify-end">
        <a href="<?php echo e(route('coupons')); ?>" class="hidden md:flex text-S text-black dark:text-gray-300 p-0 m-0 flex-row items-center">
            <p class="mr-2">EXTRA %</p>
            BY USING <p class="ml-2 underline">COUPONS</p>
            <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i>
        </a>
        
        <?php echo $__env->make('parts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>
</header>
<hr>
<script 
    src="https://kit.fontawesome.com/d3244f9937.js" crossorigin="anonymous">
</script>

<body>
    

<?php /**PATH /var/www/resources/views/header.blade.php ENDPATH**/ ?>