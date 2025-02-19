<?php $__env->startSection('dashboard','bg-primary text-white'); ?>
<?php $__env->startSection('page'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">ویرایش اطلاعات</h4>
            </div>

            <div class="card-body pb-0">
                <form method="POST" action="<?php echo e(route('user-panel.update.profile')); ?>"  enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PATCH')); ?>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="basicInput">نام و نام خانوادگی</label>
                                    <input value="<?php echo e(auth()->user()->name); ?>" name="name" type="text" class="form-control" id="basicInput" placeholder="لطفا نام و نام خانوادگی خود را وارد کنید">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="basicInput">شماره موبایل</label>
                                    <input value="<?php echo e(auth()->user()->phone); ?>" name="phone" type="text" class="form-control <?php if(auth()->user()->verify=='0' && auth()->user()->phone != null): ?> is-invalid <?php endif; ?>" id="basicInput" placeholder="لطفا شماره موبایل خود را وارد کنید">
                                    <?php if(auth()->user()->verify==0 && auth()->user()->phone != null): ?>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            شماره تلفن شما تایید نشده است
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>








                            <div class="col-12 text-center my-4">
                                <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                            </div>
                        </div>

                    </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout user-panel.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/user-panel/dashboard.blade.php ENDPATH**/ ?>