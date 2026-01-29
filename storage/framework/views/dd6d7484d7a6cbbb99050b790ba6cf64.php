<div>
    <button class="btn p-1" id="cart-open" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="badge text-bg-warning cart-badge bg-warning rounded-circle"><?php echo e(\App\Helpers\Cart\Cart::getCartQuantityItems()); ?></span>
    </button>
</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/cart/cart-icon-component.blade.php ENDPATH**/ ?>