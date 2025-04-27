<?php if($chapters->count()): ?>
    <div class="accordion mt-4" id="accordionExample">
        <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="border border-secondary border-1 rounded-2 border-opacity-50 my-2 ">
                <h5 class="accordion-header rounded-2" id="heading_episode_<?php echo e($key); ?>">
                    <button dir="rtl" class="accordion-button collapsed rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_episode_<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse_episode_<?php echo e($key); ?>">
                        <span class="fs-lg-5 fs-6 font-weight-bold"><?php echo e($chapter->name); ?></span>
                        <span class="mx-lg-3 mx-2">|</span>
                        <span class="fs-lg-5 fs-6"><?php echo e($chapter->title); ?></span>
                    </button>
                </h5>
                <div id="collapse_episode_<?php echo e($key); ?>" class="accordion-collapse collapse " aria-labelledby="heading_episode_<?php echo e($key); ?>" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body p-3">
                        <?php echo $__env->make('components.public-list-episode.index',['episodes'=>$chapter->episodes()->get()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('components.public-list-episode.index',['episodes'=>$episodes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-list-chapter/index.blade.php ENDPATH**/ ?>