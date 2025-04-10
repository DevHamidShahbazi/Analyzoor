

<div class="modal fade" id="AddList">
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
                            اضافه کردن دسته بندی
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                   <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.category.store')); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input required value="<?php echo e(old('name')); ?>"  dir="rtl" id="name" type="text" class="form-control" name="name" >
                            </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >نوع دسته بندی</label>
                                    <select class="form-control" name="type">
                                        <?php $__currentLoopData = config('static_array.categoryType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category); ?>"><?php echo e($name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0" >زیر مجموعه</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option style="text-align: center;" value="0">دسته بندی اصلی</option>
                                        <?php $__currentLoopData = config('static_array.categoryType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup label="<?php echo e($name.' ها '); ?>">
                                                <?php $__currentLoopData = $categories_select_box->where('type',$category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($value->parent_id == '0'): ?>
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">title</label>
                                        <input type="text" value="<?php echo e(old('title')); ?>" name="title" class="form-control"
                                               placeholder="title">
                                </div>

                                <div class="form-group">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label" >
                                                <span class="badge bg-primary" id="count">0</span>
                                                description
                                            </label>
                                            <textarea  name="description" id="description" class="form-control" rows="3" placeholder="description"><?php echo e(old('description')); ?></textarea>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">keywords</label>
                                        <input type="text" value="<?php echo e(old('keywords')); ?>" name="keywords" class="form-control"
                                               placeholder="keywords">
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">alt</label>
                                        <input type="text" value="<?php echo e(old('alt')); ?>" name="alt" class="form-control"
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
                                    <button type="submit" class="btn btn-primary btn-sm ">اضافه کردن</button>
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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/category/create.blade.php ENDPATH**/ ?>