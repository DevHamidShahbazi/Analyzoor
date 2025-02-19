<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('components.public-circle-background.index',
    [
        'class' => 'left-position-obj',
        'alt' => 'circle',
        'image_url' => './public/img/obj/1.2.png',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($search): ?>
        <div class="col-12 text-center p-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" dir="rtl">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($name); ?></li>
                </ol>
            </nav>
        </div>

        <div class="col-12 text-center pb-3">
            <h1>
                <?php echo e($name); ?>

            </h1>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row flex-row-reverse m-0">

            <?php if($search): ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item?->category_id): ?>
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">
                    <div class="row m-0">
                        <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!($item?->category_id)): ?>
                                <div class="col-md-6">
                                    <?php echo $__env->make('components.public-item-category.index',['category'=>$item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div style="height: 100vh" class="col-12 d-flex justify-content-center align-items-center">
                    <h1 dir="rtl">
                        محتوا شما یافت نشد!!
                    </h1>
                </div>
            <?php endif; ?>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/public/search.blade.php ENDPATH**/ ?>