<?php $__env->startSection('title'); ?><?php echo e($category->title); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($category->description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e($category->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>

                <?php $__currentLoopData = $all_parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item">
                        <a
                            href="<?php echo e(route($parent->parent ? 'child.article.category' : 'parent.article.category',$parent->slug)); ?>">
                            <?php echo e($parent->name); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <li class="breadcrumb-item active" aria-current="page"><?php echo e($category->name); ?></li>
            </ol>
        </nav>
    </div>


    <div class="col-12 text-center pb-3">
        <h1>
            <?php echo e($category->name); ?>

        </h1>
    </div>

    <div class="container">
        <div class="row flex-row-reverse m-0">

            
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">

                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.public-item-article.index',['article'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">

                <div class="row m-0">
                    <?php $__currentLoopData = $articles_parents->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$article_parent,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $articles_parents->skip(5)->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$article_p,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>




        </div>

        <?php echo e($articles->links("pagination::default")); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views\public\child-article-category.blade.php ENDPATH**/ ?>