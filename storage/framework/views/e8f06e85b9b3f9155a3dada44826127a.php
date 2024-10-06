<form action="#" method="POST" class="mb-4">
    <div class="flex items-center mb-2">
        <label class="mr-2 text-gray-700">Rating:</label>
        <!-- Star Input for Rating -->
        <?php for($i = 1; $i <= 5; $i++): ?>
            <input type="radio" name="rating" value="<?php echo e($i); ?>" class="mr-1"><i class="fa-regular fa-star"></i>
        <?php endfor; ?>
    </div>
    <textarea placeholder="Write your review here..." class="w-full p-2 border border-gray-300 rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
    <button type="submit" class="bg-teal-500 text-white py-2 px-4 rounded-md hover:bg-teal-600">Submit Review</button>
</form><?php /**PATH /home/macblack/projs/newfe/resources/views/sections/add-review.blade.php ENDPATH**/ ?>