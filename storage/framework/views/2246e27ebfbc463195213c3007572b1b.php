<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('article_title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('article_description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('article_keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


















    <div class="col-12 ">
        <div class="d-flex justify-content-center">
            <div class="col-12 m-0 p-3">
                <div class="row justify-content-evenly m-0">

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$article,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>

        <?php echo e($articles->links("pagination::default")); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/public/article.blade.php ENDPATH**/ ?>