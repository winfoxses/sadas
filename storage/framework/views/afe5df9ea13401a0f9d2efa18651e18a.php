<div class="header-top-account d-flex justify-content-end">
    <div class="btn-group me-2">
        <div class="dropdown">
            <button class="btn btn-sm dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Account
            </button>
            <ul class="dropdown-menu">
                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->guest()): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('login')); ?>" wire:navigate>Login</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('register')); ?>" wire:navigate>Register</a>
                    </li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('account')); ?>" wire:navigate>Your account</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
                    </li>
                    <!--[if BLOCK]><![endif]--><?php if(auth()->user()->is_admin): ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Dashboard</a>
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </ul>
        </div>
    </div>
</div>
<!-- ./header-top-account -->
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/user/nav-component.blade.php ENDPATH**/ ?>