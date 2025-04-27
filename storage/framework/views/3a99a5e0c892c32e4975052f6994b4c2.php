<?php if($data->isNotEmpty()): ?>

    <div class="col-12 text-start p-2">

        <span class="fs-4 font-weight-bold mb-2 text-primary">
            سوالات متداول
        </span>

        <div class="accordion mt-4" id="accordionExample">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-secondary border-1 rounded-2 border-opacity-50 my-2 ">
                    <h5 class="accordion-header rounded-2" id="heading<?php echo e($key); ?>">
                        <button dir="rtl" class="accordion-button collapsed font-weight-bold rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($key); ?>">
                            <?php echo e($question->title); ?>

                        </button>
                    </h5>
                    <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse " aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <?php echo e($question->description); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-questions/index.blade.php ENDPATH**/ ?>