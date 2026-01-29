<li <?php if(isset($item['children'])): ?> class="nav-item dropend" <?php endif; ?> wire:key="<?php echo e($item['id']); ?>">
    <?php if(isset($item['children'])): ?>
        <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
           data-bs-auto-close="outside"><?php echo e($item['title']); ?></a>
        <ul class="dropdown-menu dropdown-menu-end">
            <?php echo \App\Helpers\Category\Category::getHtml($item['children']); ?>

        </ul>
    <?php else: ?>
        <a class="dropdown-item" wire:current="active" wire:navigate
           href="<?php echo e(route('category', $item['slug'])); ?>"><?php echo e($item['title']); ?></a>
    <?php endif; ?>
</li>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/incs/menu-tpl.blade.php ENDPATH**/ ?>