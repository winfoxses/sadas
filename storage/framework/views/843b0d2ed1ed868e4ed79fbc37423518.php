<div>

    <?php $__env->startSection('metatags'); ?>
        <title><?php echo e(config('app.name') . ' :: ' . ($title ?? 'Page Title')); ?></title>
        <meta name="description" content="<?php echo e($desc ?? 'default...'); ?>">
    <?php $__env->stopSection(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs" id="products">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>" wire:navigate>Home</a></li>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb_slug => $breadcrumb_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!--[if BLOCK]><![endif]--><?php if($loop->last): ?>
                                <li><span><?php echo e($breadcrumb_title); ?></span></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('category', $breadcrumb_slug)); ?>" wire:navigate><?php echo e($breadcrumb_title); ?></a></li>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
            <div class="col-lg-3 col-md-4">
                <div class="sidebar">

                    <button class="btn btn-warning w-100 text-start collapse-filters-btn mb-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false"
                            aria-controls="collapseExample">
                        <i class="fa-solid fa-filter"></i> Filters
                    </button>

                    <div class="collapse collapse-filters" id="collapseFilters">

                        <!--[if BLOCK]><![endif]--><?php if($selected_filters): ?>
                            <button class="btn btn-outline-warning w-100 mb-3" wire:click="clearFilters">Clear filters</button>

                            <div class="selected-filters mb-3">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filter_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filter_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!--[if BLOCK]><![endif]--><?php if(in_array($filter->filter_id, $selected_filters)): ?>
                                            <p wire:click="removeFilter(<?php echo e($filter->filter_id); ?>)" wire:key="<?php echo e($filter->filter_id); ?>">
                                                <i class="fa-solid fa-xmark text-danger"></i> <?php echo e($filter->filter_title); ?>

                                            </p>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="filter-price">
                            <input type="number" class="form-control" wire:model.live.debounce.500ms="min_price" value="<?php echo e($min_price); ?>">
                            <input type="number" class="form-control" wire:model.live.debounce.500ms="max_price" value="<?php echo e($max_price); ?>">
                        </div>

                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filter_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $filter_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="filter-block" wire:key="<?php echo e($k); ?>">
                                <h5 class="section-title"><span>Filter by <?php echo e($filter_group[0]->title); ?></span></h5>

                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filter_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check d-flex justify-content-between" wire:key="<?php echo e($filter->filter_id); ?>">
                                        <div>
                                            <input
                                                wire:model.live="selected_filters"
                                                class="form-check-input"
                                                type="checkbox"
                                                value="<?php echo e($filter->filter_id); ?>"
                                                id="filter-<?php echo e($filter->filter_id); ?>">
                                            <label class="form-check-label" for="filter-<?php echo e($filter->filter_id); ?>">
                                                <?php echo e($filter->filter_title); ?>

                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                    </div>


                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <h1 class="section-title h3"><span><?php echo e($category->title); ?></span></h1>
                    </div>
                </div>

                <!--[if BLOCK]><![endif]--><?php if(count($products)): ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Sort By:</span>
                                <select class="form-select" aria-label="Sort by:" wire:change="changeSort" wire:model="sort">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sortList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>" <?php if($k == $sort): ?> selected <?php endif; ?> wire:key="<?php echo e($k); ?>"><?php echo e($item['title']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Show:</span>
                                <select class="form-select" aria-label="Show:" wire:change="changeLimit" wire:model="limit">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $limitList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($k == $limit): ?> selected <?php endif; ?> wire:key="<?php echo e($k); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-sm-6 mb-3" wire:key="<?php echo e($product->id); ?>">
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

    <?php
        $__scriptKey = '1991347392-0';
        ob_start();
    ?>
<script>

    $wire.on('page-updated', data => {
        // console.log(data);
        document.title = data.title;
    });

</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/product/category-component.blade.php ENDPATH**/ ?>