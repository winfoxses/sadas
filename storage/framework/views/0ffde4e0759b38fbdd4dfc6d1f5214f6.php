<div>

    <?php $__env->startSection('metatags'); ?>

        <title><?php echo e(config('app.name') . ' :: ' . ($title ?? 'Page Title')); ?></title>
        <meta name="description" content="<?php echo e($desc ?? ''); ?>">

    <?php $__env->stopSection(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs" id="products">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>" wire:navigate>Home</a></li>
                        <li><span>Search results</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container position-relative">

        <div class="update-loading" wire:loading wire:target.except="add2Cart">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">

                <h1 class="h3"><span>Search by: <em><?php echo e($query); ?></em></span></h1>

                <!--[if BLOCK]><![endif]--><?php if(count($products)): ?>

                    <div class="row">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-sm-6 mb-3" wire:key="<?php echo e($product->id); ?>">
                                <?php echo $__env->make('incs.product-card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?php echo e($products->links(data: ['scrollTo' => '#products'])); ?>

                        </div>
                    </div>
                <?php else: ?>
                    <p>No products found...</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/search/search-component.blade.php ENDPATH**/ ?>