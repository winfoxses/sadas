<div class="col-sm-6 mt-2 mt-md-0">
    <div class="search-form">

        <form wire:submit="search">
            <div class="input-group">
                <input type="text" class="form-control" wire:model.live.debounce.500ms="term" placeholder="Searching..."
                       aria-label="Searching..." aria-describedby="button-search">
                <button class="btn btn-outline-warning <?php if(!$term): ?> disabled <?php endif; ?>" type="submit" id="button-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <!--[if BLOCK]><![endif]--><?php if($term): ?>
                <span class="search-empty" x-on:click="$wire.term = ''; $wire.$refresh()">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </form>

        <!--[if BLOCK]><![endif]--><?php if(count($search_results)): ?>
            <ul class="search-results">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $search_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a wire:navigate href="<?php echo e(route('product', $product->slug)); ?>"><span><?php echo e($product->title); ?></span><span>$<?php echo e($product->price); ?></span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/search/search-form-component.blade.php ENDPATH**/ ?>