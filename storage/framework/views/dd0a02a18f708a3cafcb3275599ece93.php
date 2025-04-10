
<div class="modal fade" id="EditList<?php echo e($key); ?>">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div style="height: 100%" class="modal-content">

            <!--Modal cascading tabs-->
            <div style="height: 100%" class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab">
                            <i class="fa fa-plus"></i>
                            ویرایش  <?php echo e($val->name); ?>

                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                    <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <br>

                    <?php if($val->image==null): ?>
                        <div class="col-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                                هنوز عکسی انتخاب نشده است
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="text-center ">
                            <img src="<?php echo e($val->image); ?>" class="rounded col-6" alt="<?php echo e($val->alt); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.category.update',$val->id)); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input  required value="<?php echo e($val->name); ?>" type="text" class="form-control" name="name" >
                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >نوع دسته بندی</label>
                                    <select class="form-control" name="type" >
                                        <?php $__currentLoopData = config('static_array.categoryType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($val->type == $value ? 'selected' :' '); ?>

                                                    value="<?php echo e($value); ?>"><?php echo e($name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >زیرمجموعه</label>
                                    <select class="form-control" name="parent_id" >
                                        <option <?php echo e($val->parent_id == '0' ? 'selected' :' '); ?>

                                                value="0">
                                            دسته بندی اصلی
                                        </option>
                                        <?php $__currentLoopData = $categories_select_box; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($val->parent_id == $value->id ? 'selected' :' '); ?> value="<?php echo e($value->id); ?>">
                                                <?php echo e($value->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">title</label>
                                    <input type="text" value="<?php echo e($val->title); ?>" name="title" class="form-control"
                                           placeholder="title">
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label" >
                                            <span class="badge bg-primary" id="count">0</span>
                                            description
                                        </label>
                                        <textarea  name="description"  id="description" class="form-control" rows="3" placeholder="description"><?php echo e($val->description); ?></textarea>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">keywords</label>
                                    <input type="text" value="<?php echo e($val->keywords); ?>" name="keywords" class="form-control"
                                           placeholder="keywords">
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">alt</label>
                                    <input type="text" value="<?php echo e($val->alt); ?>" name="alt" class="form-control"
                                           placeholder="alt">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">ویرایش</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>