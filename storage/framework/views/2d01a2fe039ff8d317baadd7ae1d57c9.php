<tr wire:key="<?php echo e($item['id']); ?>">
    <td><?php echo e($item['id']); ?></td>
    <td><span style="padding-left: <?php echo e(strlen($tab) * 3); ?>px;"><?php echo e($tab . $item['title']); ?></span></td>
    <td>
        <a href="<?php echo e(route('category', $item['slug'])); ?>" target="_blank" class="btn btn-info btn-circle">
            <i class="fa-solid fa-eye"></i>
        </a>
        <a href="#" class="btn btn-warning btn-circle">
            <i class="fa-solid fa-pencil"></i>
        </a>
        <button class="btn btn-danger btn-circle" wire:click="deleteCategory(<?php echo e($item['id']); ?>)" wire:confirm="Are you sure?">
            <i class="fa-solid fa-trash"></i>
        </button>
    </td>
</tr>
<!--[if BLOCK]><![endif]--><?php if(isset($item['children'])): ?>
    <?php echo \App\Helpers\Category\Category::getHtml($item['children'], "$tab - "); ?>

<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/incs/menu-table-tpl.blade.php ENDPATH**/ ?>