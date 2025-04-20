<div class="card article-card hover-zoom-in shadow mb-3" style="height: 100%">

    <a class="col-12 overflow-hidden d-flex justify-content-start align-items-center" href="<?php echo e(route('article.detail',$article->slug)); ?>">
        <img style="border-radius: 8px 8px 0 0" class="col-<?php echo e(isset($side) ? '12' : '8'); ?>" src="<?php echo e($article->image); ?>" alt="<?php echo e($article->alt); ?>"/>
    </a>
        <div style="height: 7vh" class="col-12 card-body <?php echo e(isset($side) ? 'p-2' : ''); ?>">
            <div class="d-flex flex-column justify-content-evenly height-100">
                <a href="<?php echo e(route('article.detail',$article->slug)); ?>">
                    <h5 title="<?php echo e($article->name); ?>" style="font-size: 120%" class=" text-center"><?php echo e(Illuminate\Support\Str::words($article->name, 12, '...')); ?></h5>
                </a>

            </div>
        </div>


</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-item-article/index.blade.php ENDPATH**/ ?>