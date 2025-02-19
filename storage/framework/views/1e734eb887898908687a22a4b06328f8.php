<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.public-update-password.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section>
        <div class="container py-5" dir="rtl">
            <div class="row vh-100">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <a href="<?php echo e(route('user-panel.dashboard')); ?>">
                                <img src="<?php echo e(auth()->user()->image); ?>" alt="<?php echo e(auth()->user()->name); ?>"
                                     class="rounded-circle img-fluid" style="width: 150px;">
                            </a>
                            <h5 class="my-3"><?php echo e(auth()->user()->name); ?></h5>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updatePassword" type="button"
                                   data-mdb-ripple-init class="btn btn-outline-secondary mx-1">تغییر رمز</a>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('layouts.layout user-panel.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-8">
                    <?php $__env->startSection('page'); ?><?php echo $__env->yieldSection(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/layouts/layout user-panel/index.blade.php ENDPATH**/ ?>