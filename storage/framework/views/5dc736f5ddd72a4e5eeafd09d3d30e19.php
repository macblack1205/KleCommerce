
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $user = session('user');
    $editable = session('user_id') === $user['id'];
?>

<div class="w-[90%] mx-auto my-10 flex flex-col lg:flex-row">
    <!-- Main Content -->
    <div class="w-full lg:w-4/5 bg-white dark:bg-gray-800 rounded-lg p-6 space-y-4">
        <!-- Cart Items -->
        <?php if(isset($cart['products']) && count($cart['products']) > 0): ?>
            <?php $__currentLoopData = $cart['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col md:flex-row items-center bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                    <img src="<?php echo e(asset($product['image_url'])); ?>" alt="<?php echo e($product['title']); ?>" class="w-full md:w-1/4 h-32 object-cover rounded-md">
                    <div class="flex-1 md:ml-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200"><?php echo e($product['title']); ?></h3>
                        <p class="text-gray-600 dark:text-gray-400"><?php echo e($product['description']); ?></p>
                        <div class="flex items-center mt-2">
                            <span class="text-teal-600 font-bold text-lg"><?php echo e(number_format($product['price'], 2)); ?> TL</span>
                            <form action="<?php echo e(route('cart.remove', $product['id'])); ?>" method="POST" class="ml-auto">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="icons">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('parts.success-prompt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(isset($cart['coupon'])): ?>
                <p class="text-green-500 mt-2 md:mt-0">Coupon "<?php echo e($cart['coupon']['coupon']); ?>" has been applied!</p>
            <?php endif; ?>

            <!-- Coupon and Proceed to Checkout -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-4">
                <!-- Add Coupon Form -->
                <form action="<?php echo e(route('cart.applyCoupon')); ?>" method="POST" class="flex items-center space-x-2">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="coupon" placeholder="Enter Coupon Code" class="input-field">
                    <button type="submit" class="button-sm">
                        <i class="fa-solid fa-arrow-right"> </i>
                    </button>
                </form>

                <!-- Proceed to Checkout Button -->
                <button onclick="toggleCheckoutModal()" class="button mt-4 md:mt-0">
                    Proceed to Checkout
                </button>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600 dark:text-gray-400">Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <!-- Right Sidebar: User Info and Address -->
    <div class="w-full lg:w-1/5 bg-white dark:bg-gray-800 rounded-lg p-6 flex flex-col mt-6 lg:mt-0 lg:ml-4">
        <!-- User Profile -->
        <div class="mb-4 p-2 flex flex-col border-2 rounded-lg space-y-3 items-center">
            <img src="<?php echo e($user['photo'] ? asset('storage/' . $user['photo']) : asset('bg/default-user.png')); ?>" alt="User Image" class="w-32 h-32 object-cover rounded-full">
            <div class="flex flex-col space-y-1 w-full text-center">
                <p class="text-base text-gray-800 dark:text-gray-200"><b><?php echo e($user['name']); ?> <?php echo e($user['surname']); ?></b>, <?php echo e($user['age']); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Country:</b> <?php echo e($user['country']); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Email:</b> <?php echo e($user['email']); ?></p>
            </div>
        </div>
        <!-- Address -->
        <?php if($address): ?>
            <div class="p-2 flex flex-col border-2 rounded-lg space-y-3">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Shipping Address</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Street:</b> <?php echo e($address['street']); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>City:</b> <?php echo e($address['city']); ?></p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><b>Country:</b> <?php echo e($address['country']); ?></p>
                <a href="<?php echo e(route('profile')); ?>" class="text-teal-500 hover:text-teal-700 mt-2">Edit Address</a>
            </div>
        <?php else: ?>
            <div class="p-2 flex flex-col border-2 rounded-lg space-y-3">
                <p class="text-sm text-gray-600 dark:text-gray-400">No delivery address found.</p>
                <a href="<?php echo e(route('profile')); ?>" class="text-teal-500 hover:text-teal-700 mt-2">Add Address</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Checkout Modal -->
<div id="checkoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden w-11/12 md:w-1/2 relative">
        <!-- Close Button -->
        <button onclick="closeCheckoutModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
            <i class="fas fa-times fa-lg"></i>
        </button>
        <!-- Success Message -->
        <div id="successMessage" class="hidden">
            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold text-green-600">Payment Successful!</h2>
                <p class="mt-4 text-gray-700 dark:text-gray-300">Thank you for your purchase.</p>
                <button onclick="closeCheckoutModal()" class="button mt-6"><a href="home">Continue Shopping</a></button>
            </div>
        </div>
        <!-- Checkout Form -->
        <div id="checkoutForm">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Order Summary</h2>
                <div class="mt-4 space-y-2">
                    <?php
                        $originalPrice = array_reduce($cart['products'], function ($sum, $product) {
                            return $sum + $product['price'];
                        }, 0);
                        $discount = $cart['coupon']['discount_percentage'] ?? 0;
                        $discountAmount = ($originalPrice * $discount) / 100;
                        $finalPrice = $originalPrice - $discountAmount;
                    ?>
                    <?php $__currentLoopData = $cart['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between">
                            <span class="text-gray-700 dark:text-gray-300"><?php echo e($product['title']); ?></span>
                            <span class="text-gray-700 dark:text-gray-300"><?php echo e(number_format($product['price'], 2)); ?> TL</span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr class="my-2">
                    <div class="flex justify-between">
                        <span class="text-gray-700 dark:text-gray-300">Original Price:</span>
                        <span class="text-gray-700 dark:text-gray-300"><?php echo e(number_format($originalPrice, 2)); ?> TL</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700 dark:text-gray-300">Discount:</span>
                        <span class="text-gray-700 dark:text-gray-300"><?php echo e($discount); ?>%</span>
                    </div>
                    <div class="flex justify-between font-bold">
                        <span class="text-gray-800 dark:text-gray-200">Total:</span>
                        <span class="text-gray-800 dark:text-gray-200"><?php echo e(number_format($finalPrice, 2)); ?> TL</span>
                    </div>
                </div>

                <!-- User and Address Info -->
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Shipping Information</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300"><b>Name:</b> <?php echo e($user['name']); ?> <?php echo e($user['surname']); ?></p>
                    <?php if($address): ?>
                        <p class="text-sm text-gray-700 dark:text-gray-300"><b>Address:</b> <?php echo e($address['street']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['country']); ?></p>
                    <?php else: ?>
                        <p class="text-sm text-red-500">No address provided. Please add an address.</p>
                    <?php endif; ?>
                </div>

                <!-- Payment Button -->
                <div class="flex justify-end mt-6">
                    <button onclick="processPayment()" class="button">
                        Confirm and Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleCheckoutModal() {
        const modal = document.getElementById('checkoutModal');
        modal.classList.remove('hidden');
    }

    function closeCheckoutModal() {
        const modal = document.getElementById('checkoutModal');
        modal.classList.add('hidden');
    }

    function processPayment() {
        // Simulate payment processing delay
        setTimeout(() => {
            document.getElementById('checkoutForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
        }, 1000);
    }
</script>
<?php /**PATH /var/www/resources/views/cart.blade.php ENDPATH**/ ?>