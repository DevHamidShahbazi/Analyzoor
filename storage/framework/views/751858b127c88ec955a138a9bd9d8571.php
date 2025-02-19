<?php $__env->startSection('Header','مقالات'); ?>
<?php $__env->startSection('Articles','active'); ?>
<?php $__env->startSection('address'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('admin.article.index')); ?>">لیست مقالات</a>
    </li>
    <li class="breadcrumb-item"> ویرایش مقاله <?php echo e($article->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">ویرایش مقاله <?php echo e($article->name); ?></h3>
            </div>

        <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- /.card-header -->
            <br>
            <div class="text-center mt-2">
                <div style="text-align: right" class="col-lg-12">
                    <a target="_blank" href="<?php echo e(route('article.detail',$article->slug)); ?>" class="btn btn-primary btn-sm">پیش نمایش</a>
                </div>

            </div>
            <br>

            <?php if($article->image==null): ?>
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                        هنوز عکسی انتخاب نشده است
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center">
                    <img src="<?php echo e($article->image); ?>" class="rounded col-lg-3" alt="<?php echo e($article->alt); ?>">
                </div>
        <?php endif; ?>

        <!-- form start -->
            <form method="POST" action="<?php echo e(route('admin.article.update',$article->id)); ?>"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="<?php echo e($article->name); ?>" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >دسته بندی</label>
                            <select class="form-control" name="article_category_id">
                                <?php $categories = \App\Models\Category::where('type','article')->get() ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($article->category->id == $value->id ? 'selected' : ' '); ?> value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>



                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >وضعیت</label>
                            <select class="form-control" name="is_active">
                                <option value="1" <?php echo e($article->is_active == '1'? 'selected':''); ?>>نمایش</option>
                                <option value="0" <?php echo e($article->is_active == '0'? 'selected':''); ?>>عدم نمایش</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="<?php echo e($article->title); ?>" name="title" class="form-control"
                                   placeholder="title">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    description
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description"><?php echo e($article->description); ?></textarea>
                            </div>
                        </div>



                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="<?php echo e($article->keywords); ?>" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-2 control-label">alt</label>
                            <input type="text" value="<?php echo e($article->alt); ?>" name="alt" class="form-control"
                                   placeholder="alt">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea name="body" class="ckeditor"><?php echo e($article->body); ?></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اعمال ویرایش</button>
                            <a href="<?php echo e(route('admin.article.index')); ?>"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views\admin\article\edit.blade.php ENDPATH**/ ?>