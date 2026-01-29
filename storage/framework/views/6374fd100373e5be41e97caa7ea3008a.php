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
                        <li><a wire:navigate href="<?php echo e(route('account')); ?>">Account</a></li>
                        <li><span>Orders</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container position-relative">

        <div class="update-loading" wire:loading>
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Links</span></h5>
                    <?php echo $__env->make('incs.account-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">
                    <h5 class="section-title"><span>Orders</span></h5>

                    <!--[if BLOCK]><![endif]--><?php if($orders->isNotEmpty()): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th><i class="fa-solid fa-eye"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr wire:key="<?php echo e($order->id); ?>">
                                        <td><?php echo e($order->id); ?></td>
                                        <td>$<?php echo e($order->total); ?></td>
                                        <td><?php echo e($order->status ? 'Completed' : 'New'); ?></td>
                                        <td><?php echo e($order->created_at); ?></td>
                                        <td><?php echo e($order->updated_at); ?></td>
                                        <td><a href="<?php echo e(route('orders-show', $order->id)); ?>" class="btn btn-warning" wire:navigate><i class="fa-solid fa-eye"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                        <?php echo e($orders->links()); ?>

                    <?php else: ?>
                        <p>No orders...</p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>
            </div>

        </div>
    </div>

</div>


<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/user/order-component.blade.php ENDPATH**/ ?>