
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

                        <form  method="POST" action="<?php echo e(route('admin.article-file.update',['article_file'=>$val->id])); ?>"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                            <div class="modal-body mb-1">
                                <div class="modal-body mb-1">

                                    <?php if($val->file==null): ?>
                                        <div class="col-12">
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                                                هنوز عکسی انتخاب نشده است
                                            </div>
                                        </div>

                                    <?php else: ?>

                                        <?php if($val->for_download): ?>
                                            <span class="badge bg-primary" >
                                                    برای دانلود
                                                </span>
                                        <?php else: ?>
                                            <div class="text-center">
                                                <img  src="<?php echo e($val->file); ?>" class="rounded col-12" alt="<?php echo e($val->alt); ?>">
                                            </div>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <div class="md-form mb-2">
                                        <label class="m-0">alt</label>
                                        <input value="<?php echo e($val->alt); ?>"  type="text" class="form-control" name="alt" >
                                    </div>

                                        <div class="md-form mb-2">

                                                <label class="m-0" >وضعیت</label>
                                                <select class="form-control" name="for_download">
                                                    <option value="1" <?php echo e($val->for_download == '1'? 'selected':''); ?>>برای دانلود</option>
                                                    <option value="0" <?php echo e($val->for_download == '0'? 'selected':''); ?>>برای نمایش</option>
                                                </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="file" type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                                </div>
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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/article/file/edit.blade.php ENDPATH**/ ?>