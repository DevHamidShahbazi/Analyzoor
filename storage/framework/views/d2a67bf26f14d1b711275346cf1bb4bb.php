<div class="card mb-3">
    <div class="row m-0 ">
        <div class="col-8 card-body p-2">
            <div class="d-flex flex-column justify-content-evenly height-100">
                <a href="<?php echo e(route('article.detail',$article->slug)); ?>">
                    <h5 style="font-size: larger" class="card-title text-center"><?php echo e($article->name); ?></h5>
                </a>
            </div>
        </div>
        <a class="col-4 d-flex justify-content-start align-items-center py-2" href="<?php echo e(route('article.detail',$article->slug)); ?>">
            <img style="border-radius: 8px" class="col-12" src="<?php echo e($article->image); ?>" alt="<?php echo e($article->alt); ?>"/>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-item-side-article/index.blade.php ENDPATH**/ ?>