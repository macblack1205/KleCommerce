<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php     
    $coupons = session('coupons'); 
    $user = session('user'); 
    $address = session('address'); 
?>
<div class="w-[90%] mx-auto my-10">
    <!-- Upper Main Section -->
    <div class="flex flex-col lg:flex-row gap-6">

        <!-- Left Column: Product Image -->
        <div class="flex w-full lg:w-2/6 bg-white dark:bg-gray-800 rounded-lg p-0">
            <img src="<?php echo e($product['image_url']); ?>" alt="<?php echo e($product['title']); ?>" title="View Product" class="w-full h-[400px] object-cover rounded-md mb-4">
        </div>

        <!-- Middle Column: Product Details and Actions -->
        <div class="flex flex-col w-full lg:w-2/5 bg-white dark:bg-gray-800 rounded-lg space-y-3 p-6">
            <!-- Product Title -->
            <h1 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-2"><?php echo e($product['title']); ?></h1>
            
            <!-- Rating and Number of Reviews -->
            <?php echo $__env->make('parts.rating-calc', ['average_rating' => $product['average_rating']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Price -->
            <h1 class="text-2xl font-medium text-teal-700"><?php echo e(number_format($product['price'], 2)); ?> TL</h1>

            <!-- Available Addresses -->
            <?php echo $__env->make('parts.available-address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Add to Cart Button -->
            <?php echo $__env->make('parts.add-to-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Use Coupons -->
            <?php echo $__env->make('parts.available-coupons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Full Description -->
            <p class="text-gray-700 dark:text-gray-300 mb-6 text-left"><?php echo e($product['description']); ?></p>
        </div>

        <!-- Right Column: Seller Info and Top Review -->
        <div class="w-full lg:w-1/4 bg-white dark:bg-gray-800 rounded-lg p-4">
            <!-- Seller Info -->
            <?php echo $__env->make('parts.seller-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Top Selling Product -->
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Top Selling Product</h2>
            <div class="flex flex-col w-full border-2 border-gray-300 dark:border-gray-700 rounded-lg space-y-4 mb-4 p-2">
                <div class="flex items-center space-x-4">
                    <img src="<?php echo e(asset('bg/jacket.jpg')); ?>" alt="Top Product" class="w-24 h-24 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-200"><?php echo e($topRatedProduct['title']); ?></p>
                        <p class="text-base font-medium text-teal-700"><?php echo e($topRatedProduct['price']); ?> TL</p>
                        <?php echo $__env->make('parts.rating-calc', ['average_rating' => $topRatedProduct['average_rating']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form id="add-to-cart-form-<?php echo e($topRatedProduct['id']); ?>" action="<?php echo e(route('cart.add', ['id' => $topRatedProduct['id']])); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <button class="button-sm" onclick="document.getElementById('add-to-cart-form-<?php echo e($topRatedProduct['id']); ?>').submit();">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <?php
                    $reviews = $topRatedProduct['reviews'];
                    $topReview = collect($reviews)->sortByDesc('rating')->first();
                ?>

                <?php if($topReview): ?>
                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600 dark:text-gray-300 font-bold">User <?php echo e($topReview['user_id']); ?></p>
                            <?php echo $__env->make('parts.rating-calc', ['average_rating' => $topReview['rating']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-400"><?php echo e($topReview['review']); ?></p>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-gray-600 dark:text-gray-300">No reviews available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Lower Section: Similar Products and Reviews -->
    <div class="mt-10">
        <!-- Similar Products -->
        <?php echo $__env->make('sections.similar-prod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Reviews Section -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Reviews</h2>

            <!-- Add Review -->
            <?php echo $__env->make('sections.add-review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Review Listing -->
            <?php echo $__env->make('sections.review-listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div><?php /**PATH /var/www/resources/views/product/index.blade.php ENDPATH**/ ?>