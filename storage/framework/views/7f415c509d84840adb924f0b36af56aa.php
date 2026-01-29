<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel" wire:ignore.self>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!--[if BLOCK]><![endif]--><?php if($cart = \App\Helpers\Cart\Cart::getCart()): ?>
            <div class="table-responsive">
                <table class="table offcanvasCart-table">
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr wire:key="<?php echo e($id); ?>">
                            <td class="product-img-td"><a href="<?php echo e(route('product', $item['slug'])); ?>"><img src="<?php echo e(asset($item['image'])); ?>" alt=""></a>
                            </td>
                            <td><a href="<?php echo e(route('product', $item['slug'])); ?>"><?php echo e($item['title']); ?></a></td>
                            <td>$<?php echo e($item['price']); ?></td>
                            <td>&times;<?php echo e($item['quantity']); ?></td>
                            <td>
                                <button class="btn btn-danger" wire:click="removeFromCart(<?php echo e($id); ?>)" wire:loading.attr="disabled" wire:target="removeFromCart">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" class="text-end">Total:</td>
                        <td>$<?php echo e(\App\Helpers\Cart\Cart::getCartTotal()); ?></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end mt-3">
                <a wire:navigate href="<?php echo e(route('cart')); ?>" class="btn btn-outline-warning">Cart</a>
                <a wire:navigate href="<?php echo e(route('checkout')); ?>" class="btn btn-outline-secondary">Checkout</a>
            </div>
        <?php else: ?>
            <p>Cart is empty...</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/cart/cart-modal-component.blade.php ENDPATH**/ ?>