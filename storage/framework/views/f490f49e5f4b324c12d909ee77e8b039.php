<div class="flex items-center">
    <?php for($i = 1; $i <= 5; $i++): ?>
        <svg class="w-4 h-4 <?php echo e($average_rating >= $i ? 'text-yellow-500' : 'text-gray-300'); ?> fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.122-6.545L0 6.91l6.562-.955L10 0l3.438 5.955L20 6.91l-5.244 4.635 1.122 6.545z"/>
        </svg>
    <?php endfor; ?>
</div>
<?php /**PATH /var/www/resources/views/parts/rating-calc.blade.php ENDPATH**/ ?>