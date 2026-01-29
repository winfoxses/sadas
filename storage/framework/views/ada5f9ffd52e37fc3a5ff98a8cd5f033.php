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
                        <li><span>Account</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Links</span></h5>
                    <?php echo $__env->make('incs.account-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">
                    <p>Welcome, <?php echo e(auth()->user()->name); ?>!</p>

                    <?php echo $__env->make('incs.account-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

        </div>
    </div>

</div>

<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/user/account-component.blade.php ENDPATH**/ ?>