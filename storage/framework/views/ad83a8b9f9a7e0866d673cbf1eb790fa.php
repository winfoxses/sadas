<div class="row">

    <div class="col-12 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?php echo e(route('admin.categories.create')); ?>" wire:navigate class="btn btn-primary">Add Category</a>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 70%;">Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo \App\Helpers\Category\Category::getMenu('incs.menu-table-tpl'); ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

</div>

<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/admin/category/category-index-component.blade.php ENDPATH**/ ?>