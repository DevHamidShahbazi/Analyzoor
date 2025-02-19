<?php $__env->startSection('title'); ?><?php echo e($article->title); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($article->description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e($article->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>
                <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item"><a
                            href="<?php echo e(route($category->parent ? 'child.article.category' : 'parent.article.category',$category->slug)); ?>"
                        >
                            <?php echo e($category->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($article->name); ?></li>
            </ol>
        </nav>
    </div>

    <div class="container-lg">

        <div class="row flex-row-reverse m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <img style="border-radius: 15px" class="col-md-6" src="<?php echo e($article->image); ?>" alt="<?php echo e($article->alt); ?>">
                        </div>
                        <div class="col-12 text-center py-3">
                            <h1>
                                <?php echo e($article->h1 ?? $article->name); ?>

                            </h1>
                            <?php if($article->h2): ?>
                                <h2>
                                    <?php echo e($article->h2); ?>

                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body" dir="rtl">
                        <?php echo $article->body; ?>

                    </div>
                </div>
                <?php echo $__env->make('components.public-comment.index',['item'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">

                <div class="row flex-row-reverse m-0">
                    <?php $__currentLoopData = $articles->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$article_child,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $articles->skip(5)->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-article.index',['article'=>$article_child,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views\public\article.blade.php ENDPATH**/ ?>