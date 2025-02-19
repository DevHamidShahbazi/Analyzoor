<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">

                <div  class="col-12 text-start mt-3"><a href="<?php echo e(route('login')); ?>">بازگشت</a></div>
                <div class="card p-3 border-white shadow-lg">
                    <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h3 class="text-center"><b>نوع درخواست را انتخاب کنید</b></h3>

                    <a dir="rtl" href="<?php echo e(route('password.request.phone')); ?>" class="btn btn-block btn-outline-primary font-weight-bold btn-d mt-2">
                        بازیابی با رمز شماره تلفن
                        <i class="fa fa-phone mr-2"></i>
                    </a>
                    <a dir="rtl" href="<?php echo e(route('password.request')); ?>" class="btn btn-block btn-outline-danger font-weight-bold mt-2">
                        بازیابی رمز با ایمیل
                        <i class="fa fa-envelope-open mr-2"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/auth/passwords/select-type.blade.php ENDPATH**/ ?>