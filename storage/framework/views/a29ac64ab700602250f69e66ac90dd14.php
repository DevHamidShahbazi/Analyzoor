<?php $__env->startSection('title'); ?><?php echo e($article->title); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($article->description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e($article->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-12 text-center p-1 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>
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
                            <img style="border-radius: 15px" class="col-md-4 col-sm-6 col-12" src="<?php echo e($article->image); ?>" alt="<?php echo e($article->alt); ?>">
                        </div>
                        <div class="col-12 text-center py-3">
                            <h1 dir="rtl">
                                <?php echo e($article->name); ?>

                            </h1>
                        </div>
                    </div>
                    <div class="card-body" dir="rtl">
                        <?php
                        $body = $article->body;
                        $body = preg_replace_callback('/<code>(.*?)<\/code>/s', function ($matches) {
                            return '<code>' . htmlspecialchars($matches[1]) . '</code>';
                        }, $body);
                        ?>
                        <article>
                            <?php echo $body; ?>

                        </article>
                    </div>
                </div>

                <?php if($urls->isNotEmpty() || $files->isNotEmpty()): ?>
                    <div class="col-12">
                        <div class="card border-white shadow-lg p-2">
                            <div class="row m-0">
                                <?php if($urls->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 my-1" style="text-align: right">
                                            <a class="btn btn-outline-primary p-1" download href="<?php echo e($url->url); ?>"><?php echo e($url->name); ?> <i class="fa fa-download"></i>  </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if($files->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12 my-1" style="text-align: right">
                                                <a class="btn btn-outline-primary p-1" download href="<?php echo e($file->file); ?>"><?php echo e($file->alt); ?> <i class="fa fa-download"></i>  </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <?php echo $__env->make('components.public-comment.index',['item'=>$article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">

                <div class="row flex-row-reverse m-0">
                    <?php $__currentLoopData = $articles->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-side-article',['article'=>$article_child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $articles->skip(5)->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('components.public-item-side-article',['article'=>$article_child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/public/article-detail.blade.php ENDPATH**/ ?>