<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="relative w-[90%] h-[60vh] mx-auto my-10 rounded-lg overflow-hidden shadow-lg">
    <!-- Hero Image Background -->
    <img src="<?php echo e(asset('bg/hero.jpg')); ?>" alt="Hero Image" class="absolute w-full h-full object-cover object-left">
    <!-- Hero Text Overlay -->
    <div class="absolute inset-0 flex items-center pl-10 bg-black bg-opacity-30">
        <div class="text-white max-w-lg">
            <h1 class="text-4xl font-bold mb-4">Discover the Best Products</h1>
            <p class="text-lg">Find the latest and greatest in our collection. Quality products at unbeatable prices, curated just for you.</p>
        </div>
    </div>
</div>


<?php echo $__env->make('sections.create-listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('product.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('user.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/macblack/projs/newfe/resources/views/home.blade.php ENDPATH**/ ?>