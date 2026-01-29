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
                        <li><span>Checkout</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">

        <!--[if BLOCK]><![endif]--><?php if($cart = \App\Helpers\Cart\Cart::getCart()): ?>

                <div class="row">

                    <div class="col-lg-8 mb-3">
                        <div class="Checkout p-3 h-100 bg-white">

                            <h1 class="section-title h5"><span>Checkout</span></h1>

                            <form wire:submit="saveOrder">

                                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->guest()): ?>

                                    <div class="mb-3">
                                        <label for="name" class="form-label required">Name</label>
                                        <input type="text" id="name"
                                               class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="John Doe" aria-label="Name" wire:model="name">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Email</label>
                                        <input type="email" id="email"
                                               class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="johndoe@mail.com" aria-label="Name" wire:model="email">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="note"
                                              rows="5"
                                              placeholder="Note to order..." wire:model="note"></textarea>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-warning">
                                        Checkout
                                        <div wire:loading wire:target="saveOrder">
                                            <div class="spinner-grow spinner-grow-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">

                        <div class="cart-summary p-3 sidebar">
                            <h5 class="section-title"><span>Cart Summary</span></h5>

                            <ul class="list-unstyled">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li wire:key="<?php echo e($k); ?>" class="d-flex justify-content-between my-3">
                                        <span class="fw-medium"><?php echo e($item['title']); ?></span>
                                        <span><?php echo e($item['quantity']); ?> x <?php echo e($item['price']); ?></span>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>

                            <div class="d-flex justify-content-between pt-3 border-top">
                                <h3>Total</h3>
                                <h3>$<?php echo e(\App\Helpers\Cart\Cart::getCartTotal()); ?></h3>
                            </div>

                        </div>

                    </div>

                </div>
        <?php else: ?>
            <p>Cart is empty...</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/cart/checkout-component.blade.php ENDPATH**/ ?>