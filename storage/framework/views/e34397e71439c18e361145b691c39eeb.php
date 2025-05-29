<div class="card course-card hover-zoom-in shadow mb-3" style="height: 90%">
    <a class="card-img-block overflow-hidden" href="<?php echo e(route('course.detail',$course->slug)); ?>">
        <img style="border-radius: 8px 8px 0 0" class="col-12 " src="<?php echo e($course->image); ?>" alt="<?php echo e($course->alt); ?>"/>
    </a>
        <div  class="col-12 card-body pt-0 p-3">
            <div class="d-flex flex-column justify-content-evenly ">
                <a href="<?php echo e(route('course.detail',$course->slug)); ?>">
                    <h5 class="mb-0" title="<?php echo e($course->name); ?>" style="font-size: 120%"><?php echo e($course->name); ?></h5>
                </a>
                <div class="text-start my-2">
                    <span style="font-size: small" class="badge bg-<?php echo e($course->status == 'comingSoon' ? 'light-primary': ($course->status=='currently'?'light-primary':'primary')); ?>">
                        <?php echo e(array_search($course->status,config('static_array.courseStatus'))); ?>

                        <i class="<?php echo e($course->status == 'comingSoon' ? '': ($course->status=='currently'?'fas fa-history':'fas fa-check')); ?>"></i>
                    </span>
                </div>
                <p class="text-body"><?php echo e(Illuminate\Support\Str::words($course->paragraph, 18, '...')); ?></p>
                <div class="d-flex justify-content-between text-start">
                    <div class="d-flex align-items-center ">
                        <span class="badge bg-light-secondary" style="height: fit-content">
                        <?php echo e($course->time); ?>

                        <i class="fas fa-clock"></i>
                    </span>
                    </div>
                    <?php echo $__env->make('components.public-price.index',['value'=>$course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
</div>
<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/components/public-item-course/index.blade.php ENDPATH**/ ?>