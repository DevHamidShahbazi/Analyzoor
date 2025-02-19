<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        <a class="list-group-item-action text-center my-1 p-2 border-white <?php $__env->startSection('dashboard'); ?> <?php echo $__env->yieldSection(); ?>" href="<?php echo e(route('user-panel.dashboard')); ?>">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">پروفایل</p>
                                <i class="fa fa-user-alt"></i>
                            </div>
                        </a>
                        <a class="list-group-item-action text-center my-1 p-2 border-white <?php $__env->startSection('comment'); ?> <?php echo $__env->yieldSection(); ?>" href="<?php echo e(route('user-panel.comment')); ?>">
                            <div class="d-flex justify-content-between align-items-center px-2">
                                <p class="m-0">نظرات شما</p>
                                <i class="fa fa-comment 2x"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/layouts/layout user-panel/sidebar.blade.php ENDPATH**/ ?>