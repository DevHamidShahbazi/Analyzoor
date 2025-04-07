
<!-- Modal: edit Form Demo -->
<div class="modal fade" id="modalLRFormDemo<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div  class="modal-content">

            <!--Modal cascading tabs-->
            <div  class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab"><i class="fa fa-edit"></i>
                            ویرایش  <?php echo e($val->name); ?></a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                        <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="POST" action="<?php echo e(route('admin.user.update',$val->id)); ?>"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                            <div class="modal-body mb-1">
                                <div class="modal-body mb-1">

                                    <div class="md-form mb-2">
                                        <label class="m-0">نام</label>
                                        <input list="names" required value="<?php echo e($val->name); ?>" type="text" class="form-control" name="name" >
                                    </div>

                                    <div class="md-form mb-2">
                                        <label class="m-0" >شماره مویابل</label>
                                        <input value="<?php echo e($val->phone); ?>" id="phone" type="text" class="form-control" name="phone" >
                                        <?php if($errors->has('phone')): ?>
                                            <p style="color: red"><?php echo e($errors->first('phone')); ?></p>
                                        <?php endif; ?>
                                    </div>


                                    <div class="md-form mb-2">
                                        <label class="m-0">ایمیل</label>
                                        <input value="<?php echo e($val->email); ?>" id="email" type="email" class="form-control" name="email" >
                                        <?php if($errors->has('email')): ?>
                                            <p style="color: red"><?php echo e($errors->first('email')); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="md-form mb-2">
                                        <div class="form-group">
                                            <label class="m-0">وضعیت موبایل</label>
                                            <select name="verify" class="form-control">
                                                <?php $__currentLoopData = config('static_array.userVerify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $verify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        <?php echo e(auth()->user()->checkVerifyUser($val)  ? 'selected' : ''); ?>

                                                        value="<?php echo e($key); ?>">
                                                        <?php echo e($verify); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="md-form mb-2">
                                        <div style="text-align: right;direction: rtl" >
                                            <label class="m-0">رمز عبور</label>
                                            <input required placeholder="رمز عبور جدید را وارد کنید" value="<?php echo e(Crypt::decrypt($val->crypt)); ?>"
                                                   dir="rtl" id="password" class="form-control" name="password" >
                                        </div>
                                        <?php if($errors->has('password')): ?>
                                            <p style="color: red"><?php echo e($errors->first('password')); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="md-form mb-2">
                                        <div class="form-group">
                                            <label class="m-0">نوع</label>
                                            <select name="level" class="form-control">

                                                <?php $__currentLoopData = config('static_array.userLevel'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persian_name => $real_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($val->level == $real_name ? 'selected' : ''); ?>

                                                            value="<?php echo e($real_name); ?>"><?php echo e($persian_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm">ویرایش </button>
                                        <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                    <!-- Panel 7 -->

                </div>

            </div>
        </div>
        <!-- Content -->

    </div>
</div>
<!-- Modal: edit Form Demo -->
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>