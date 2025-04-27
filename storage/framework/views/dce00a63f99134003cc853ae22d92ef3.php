<?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12">
        <div dir="rtl" class="d-flex justify-content-between">
            <div>
                <span class="fs-5 font-weight-bold">
                    جلسه
                    <?php echo e($loop->index+1); ?>

                </span>
                <span class="mx-3">|</span>
                <a href="<?php echo e(route('episode.detail',$episode->slug)); ?>" class="fs-5"><?php echo e($episode->name); ?></a>
            </div>

            <div>
                <span class="fs-6">
                    <?php echo e($episode->time); ?>

                    <i class="fas fa-clock"></i>
                </span>
                <span class="mx-1"></span>
                <a href="<?php echo e(route('episode.detail',$episode->slug)); ?>" class="btn btn-sm btn-outline-<?php echo e($episode->type == 'free' ? 'primary' : 'danger'); ?> ">
                    <?php echo e($episode->type == 'free' ? 'مشاهده' : 'نقدی'); ?>

                    <i class="fas fa-<?php echo e($episode->type == 'free' ? 'eye' : 'lock'); ?>"></i>
                </a>
            </div>

        </div>
    </div>
    <?php if(!$loop->last): ?>
        <hr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-list-episode/index.blade.php ENDPATH**/ ?>