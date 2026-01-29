<div class="product-card">
    <div class="product-card-offer">
        <!--[if BLOCK]><![endif]--><?php if($product->is_hit): ?>
            <div class="offer-hit">Hit</div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($product->is_new): ?>
            <div class="offer-new">New</div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="product-thumb">
        <a href="<?php echo e(route('product', $product->slug)); ?>" wire:navigate>
            <img src="<?php echo e(asset($product->getImage())); ?>" alt="">
        </a>
    </div>
    <div class="product-details">
        <h4>
            <a href="<?php echo e(route('product', $product->slug)); ?>" wire:navigate><?php echo e($product->title); ?></a>
        </h4>
        <div class="product-bottom-details d-flex justify-content-between">
            <div class="product-price">
                <!--[if BLOCK]><![endif]--><?php if($product->old_price): ?>
                    <small>$<?php echo e($product->old_price); ?></small>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                $<?php echo e($product->price); ?>

            </div>
            <div class="product-links">
                <button wire:click="add2Cart(<?php echo e($product->id); ?>)" wire:loading.attr="disabled" class="btn btn-outline-secondary add-to-cart">
                    <div wire:loading.remove wire:target="add2Cart(<?php echo e($product->id); ?>)">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div wire:loading wire:target="add2Cart(<?php echo e($product->id); ?>)">
                        <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/incs/product-card.blade.php ENDPATH**/ ?>