<option
    value="<?php echo e($item['id']); ?>"
    wire:key="<?php echo e($item['id']); ?>"
    <?php echo $item['parent_id'] == 0 ? 'class="font-weight-bold"' : ''; ?>

>
    <?php echo $tab . $item['title']; ?>

</option>

<!--[if BLOCK]><![endif]--><?php if(isset($item['children'])): ?>
    <?php echo \App\Helpers\Category\Category::getHtml($item['children'], "&nbsp;$tab - "); ?>

<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/incs/menu-select-tpl.blade.php ENDPATH**/ ?>