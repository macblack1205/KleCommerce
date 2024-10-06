<div class="flex items-center justify-between mt-2">
    <div class="flex items-center text-yellow-400">
        <?php
            // Round the average rating to the nearest half or whole number
            // $rating = round($averageRating * 2) / 2;
            $rating = round(3.2 * 2) / 2;

            // Calculate number of full, half, and empty stars
            $fullStars = floor($rating); // Full stars
            $halfStar = ($rating - $fullStars) == 0.5; // Check for half star
            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Empty stars
        ?>

        <!-- Full Stars -->
        <?php for($i = 0; $i < $fullStars; $i++): ?>
            <i class="fa-solid fa-star"></i>
        <?php endfor; ?>

        <!-- Half Star -->
        <?php if($halfStar): ?>
            <i class="fa-solid fa-star-half-alt"></i>
        <?php endif; ?>

        <!-- Empty Stars -->
        <?php for($i = 0; $i < $emptyStars; $i++): ?>
            <i class="fa-regular fa-star"></i>
        <?php endfor; ?>
        <p class="text-s text-gray-600 ml-2 ">3.2</p>
    </div>
    
    <p class="text-s text-gray-600 mr-2">297 reviews</p>
</div>
<?php /**PATH /home/macblack/projs/newfe/resources/views/parts/rating-calc.blade.php ENDPATH**/ ?>