<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="w-[90%] mx-auto my-10">
    <!-- Upper Main Section -->
    <div class="flex flex-col lg:flex-row gap-6">

        <!-- Left Column: Product Image -->
        <div class="flex-1 bg-white rounded-lg  p-0">
            <img src="<?php echo e(asset('bg/jacket.jpg')); ?>" alt="Product Image" class="w-full h-[500px] object-cover rounded-md mb-4">            
        </div>

        <!-- Middle Column: Product Details and Actions -->
        <div class="flex-1 bg-white rounded-lg  space-y-3">
            <!-- Product Title -->
            <h1 class="text-2xl font-medium text-gray-800 mb-2">This is a product title Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, aut.</h1>

            <!-- Rating and Number of Reviews -->
            <?php echo $__env->make('parts.rating-calc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Price -->
            <div class="flex items-center justify-center p-4 border-2  border-black rounded-lg">
                <h1 class="text-xl font-medium text-teal-700">322.50 TL</h1>
            </div>

            <!-- Available Addresses -->
            <?php echo $__env->make('parts.available-address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <!-- Add to Cart Button -->
            <?php echo $__env->make('parts.add-to-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Use Coupons -->
            <?php echo $__env->make('parts.available-coupons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Full Description -->
            <p class="text-gray-700 mb-6">This is the full product description. It provides detailed information about the product, its features, benefits, and other relevant details.</p>
        </div>

        <!-- Right Column: Seller Info and Top Review -->
        <div class="w-1/4 bg-white rounded-lg ">
            <!-- Seller Info -->
            <?php echo $__env->make('parts.seller-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Top Selling Product -->
            <h2 class="text-lg font-bold text-gray-800">Top Selling Product</h2>
            <div class="p-0 m-0 flex-1 rounded-lg border-2">
                <button onclick="location.href='#'" class="flex flex-col justify-start mb-4 bg-white rounded-md shadow-md p-2">
                    <img src="<?php echo e(asset('bg/jacket.jpg')); ?>" alt="Top Product" class="w-full h-32 object-cover rounded-md mb-2">
                    <p class="text-sm font-bold text-gray-800">Product Title</p>
                    <p class="text-sm text-teal-500">$99.99</p>
                </button>
    
                <!-- Top Product Review -->
                <h2 class="text-lg font-bold text-gray-800">Top Product Review</h2>
                <div>
                    <p class="text-sm text-gray-700">"Great product! Very satisfied with the quality."</p>
                    <p class="text-xs text-gray-600">- Jane Smith</p>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Lower Section: Similar Products and Reviews -->
    <div class="mt-10">
        <!-- Similar Products -->
        <?php echo $__env->make('sections.similar-prod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Reviews Section -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Reviews</h2>
            <!-- Add Review -->
            <?php echo $__env->make('sections.add-review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Review Listing -->
            <?php echo $__env->make('sections.review-listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<?php /**PATH /home/macblack/projs/newfe/resources/views/product/index.blade.php ENDPATH**/ ?>