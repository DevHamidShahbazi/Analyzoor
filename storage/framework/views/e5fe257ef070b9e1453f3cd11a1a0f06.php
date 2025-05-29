<?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $isCurrent = isset($currentEpisode) && $currentEpisode->id === $episode->id;
    ?>

    <div class="col-12 <?php echo e($isCurrent ? 'bg-primary bg-opacity-10 rounded p-2' : ''); ?>">
        <div dir="rtl" class="d-flex justify-content-between">
            <div>
                <span class="fs-lg-5 fs-6 font-weight-bold">
                    جلسه <?php echo e($loop->index+1); ?>

                </span>
                <span class="mx-sm-3 mx-1">|</span>
                <a href="<?php echo e(route('episode.detail',$episode->slug)); ?>" class="fs-lg-5 fs-6"><?php echo e($episode->name); ?></a>
            </div>

            <div class="d-sm-block d-grid" style="min-width: fit-content">
                <span class="fs-6">
                    <i class="fas fa-clock"></i>
                    <?php echo e($episode->time); ?>

                </span>
                <span class="mx-1 d-sm-none"></span>
                <a href="<?php echo e(route('episode.detail',$episode->slug)); ?>" class="btn btn-sm btn-outline-<?php echo e($episode->type == 'free' ? 'primary' : 'danger'); ?>">
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

<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/components/public-list-episode/index.blade.php ENDPATH**/ ?>