<div>

    <?php $__env->startSection('metatags'); ?>

        <title><?php echo e(config('app.name') . ' :: ' . ($title ?? 'Page Title')); ?></title>
        <meta name="description" content="<?php echo e($desc ?? ''); ?>">

    <?php $__env->stopSection(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs">
                    <ul>
                        <li><a wire:navigate href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><span>Cart</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">

                    <!--[if BLOCK]><![endif]--><?php if($cart = \App\Helpers\Cart\Cart::getCart()): ?>
                        <div class="table-responsive position-relative">

                            <div class="update-loading" wire:loading wire:target="updateItemQuanity, removeFromCart, clearCart">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>

                            <table class="table align-middle table-hover">
                                <thead class="table-dark">
                                <tr>
                                    <th>Photo</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th><i class="fa-regular fa-trash-can"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:key="<?php echo e($id); ?>">
                                    <td class="product-img-td">
                                        <a href="<?php echo e(route('product', $item['slug'])); ?>" wire:navigate>
                                            <img src="<?php echo e(asset($item['image'])); ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('product', $item['slug'])); ?>" class="cart-content-title">
                                            <?php echo e($item['title']); ?>

                                        </a>
                                    </td>
                                    <td>$<?php echo e($item['price']); ?></td>
                                    <td x-data="{ qty: <?php echo e($item['quantity']); ?> }">
                                        <div class="input-group" style="flex-wrap: nowrap;">
                                            <input
                                                type="number"
                                                value="<?php echo e($item['quantity']); ?>"
                                                x-model="qty"
                                                class="form-control cart-qty"
                                                min="1"
                                                style="width: 80px;">
                                            <button
                                                class="btn btn-warning"
                                                wire:loading.attr="disabled"
                                                x-on:click="$wire.updateItemQuanity(<?php echo e($id); ?>, qty)"
                                            >
                                                <i class="fa-solid fa-rotate"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>$<?php echo e($item['quantity'] * $item['price']); ?></td>
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
                                    <td colspan="6" class="text-end">
                                        <button class="btn btn-outline-danger" wire:click="clearCart" wire:loading.attr="disabled" wire:target="clearCart">Clear Cart</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Cart is empty...</p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <div class="col-lg-4 mb-3">

                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Cart Summary</span></h5>

                    <div class="d-flex justify-content-between my-3">
                        <h6>Products</h6>
                        <h6><?php echo e(\App\Helpers\Cart\Cart::getCartQuantityItems()); ?></h6>
                    </div>

                    <div class="d-flex justify-content-between my-3 border-bottom">
                        <h6>Items</h6>
                        <h6><?php echo e(\App\Helpers\Cart\Cart::getCartQuantityTotal()); ?></h6>
                    </div>

                    <div class="d-flex justify-content-between my-3">
                        <h3>Total</h3>
                        <h3><?php echo e(\Illuminate\Support\Number::currency(\App\Helpers\Cart\Cart::getCartTotal(), in: 'USD')); ?></h3>
                    </div>

                    <!--[if BLOCK]><![endif]--><?php if($cart): ?>
                        <div class="d-grid">
                            <a wire:navigate href="<?php echo e(route('checkout')); ?>" class="btn btn-warning">Checkout</a>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>

            </div>

        </div>
    </div>

</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/cart/cart.blade.php ENDPATH**/ ?>