<div class="card shadow rounded-2 mb-2 p-4">
    <div class="col-12">
        <div class="row">

            <div class="col-lg-4">
                <div class="d-flex align-items-center" style="height: 100%">
                    <img class="col-12" src="<?php echo e($course->image); ?>" alt="<?php echo e($course->alt); ?>">
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="text-lg-start text-md-start text-center  mt-2"><?php echo e($course->name); ?></h1>
                <br>
                <p>
                    <?php echo e($course->paragraph); ?>

                </p>

                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6 col-12 my-1">
                            <div class="d-flex justify-content-center">
                                <?php echo $__env->make('components.public-price.index',['value'=>$course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 my-1">
                            <div class="d-flex justify-content-center align-items-center height-100">
                                <a href="#" class="btn btn-primary">
                                    <?php echo e($course->type == 'free' ? 'ثبت نام در ':'خرید '); ?> دوره آموزشی
                                    <i class="fas fa-graduation-cap"></i>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-course-top-price/index.blade.php ENDPATH**/ ?>