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
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb_slug => $breadcrumb_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('category', $breadcrumb_slug)); ?>"
                                   wire:navigate><?php echo e($breadcrumb_title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <li><span><?php echo e($product->title); ?></span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-4 mb-3">
                <div class="bg-white h-100">
                    <div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo e(asset($product->getImage())); ?>" class="d-block w-100" alt="...">
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item">
                                    <img src="<?php echo e(asset($item)); ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($product->gallery): ?>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-lg-8 mb-3">
                <div class="bg-white product-content p-3 h-100">
                    <h1 class="section-title h3"><span><?php echo e($product->title); ?></span></h1>

                    <div class="product-price">
                        <!--[if BLOCK]><![endif]--><?php if($product->old_price): ?>
                            <small>$<?php echo e($product->old_price); ?></small>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        $<?php echo e($product->price); ?>

                    </div>

                    <p><?php echo e($product->excerpt); ?></p>

                    <div class="product-add2cart">
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?php echo e($quantity); ?>" wire:model="quantity" min="1">
                            <button class="btn btn-warning" wire:click="add2Cart(<?php echo e($product->id); ?>, true)" wire:loading.attr="disabled">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Add to cart</span>
                                <div wire:loading wire:target="add2Cart(<?php echo e($product->id); ?>, true)">
                                    <div class="spinner-grow spinner-grow-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-4 mb-2">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-shield-halved"></i> Гарантия
                                    </h5>
                                    <ul class="list-unstyled">
                                        <li>Гарантия 1 год</li>
                                        <li>Возвращение товара в течение 14 дней</li>
                                        <li>Гарантия качества</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-truck-fast"></i> Доставка</h5>
                                    <ul class="list-unstyled">
                                        <li>Доставка по всей стране</li>
                                        <li>Доставка почтой</li>
                                        <li>Самовывоз</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-regular fa-credit-card"></i> Оплата</h5>
                                    <ul class="list-unstyled">
                                        <li>Наличный рассчет</li>
                                        <li>Безналичный рассчет</li>
                                        <li>VISA/MasterCard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="product-content-details bg-white p-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description-tab-pane" type="button" role="tab"
                                    aria-controls="description-tab-pane" aria-selected="true">Description
                            </button>
                        </li>
                        <!--[if BLOCK]><![endif]--><?php if($attributes->isNotEmpty()): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="features-tab" data-bs-toggle="tab"
                                        data-bs-target="#features-tab-pane" type="button" role="tab"
                                        aria-controls="features-tab-pane" aria-selected="false">Features
                                </button>
                            </li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                             aria-labelledby="description-tab" tabindex="0">
                            <?php echo $product->content; ?>

                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($attributes->isNotEmpty()): ?>
                            <div class="tab-pane fade" id="features-tab-pane" role="tabpanel"
                                 aria-labelledby="features-tab" tabindex="0">
                                <table class="table">
                                    <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($attribute->filter_groups_title); ?></th>
                                            <td><?php echo e($attribute->filters_title); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(count($related_products)): ?>
        <section class="new-products">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">
                            <span>Related products</span>
                        </h2>
                    </div>
                </div>

                <div class="owl-carousel owl-theme owl-carousel-full" wire:ignore>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div wire:key="<?php echo e($product->id); ?>">
                            <?php echo $__env->make('incs.product-card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

            </div>
        </section>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>

    <?php
        $__scriptKey = '3999585980-0';
        ob_start();
    ?>
<script>
    $(function () {

        $(".owl-carousel-full").owlCarousel({
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                500: {
                    items: 2
                },
                700: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

    });
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH D:\Server6\OSPanel\home\laravel-eshop.loc\resources\views/livewire/product/product-component.blade.php ENDPATH**/ ?>