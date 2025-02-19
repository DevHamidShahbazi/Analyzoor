

<div class="modal fade" id="AddList">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div style="height: 100%" class="modal-content">

            <!--Modal cascading tabs-->
            <div style="height: 100%" class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab">
                            <i class="fa fa-plus"></i>
                            اضافه کردن لینک
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">

                <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Panel 17 -->
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.article-url.store')); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <input style="display: none" type="text" name="article" value="<?php echo e($article->id); ?>">
                            <input style="display: none" type="text" name="class" value="<?php echo e(get_class($article)); ?>">
                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input list="names" required value="<?php echo e(old('name')); ?>"  dir="rtl" id="name" type="text" class="form-control" name="name" >

                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >لینک</label>
                                    <input required value="<?php echo e(old('url')); ?>" id="url" type="text" class="form-control" name="url" >
                                </div>


                                <div class="md-form mb-2">

                                    <label class="m-0" >برای دانلود</label>
                                    <select class="form-control" name="for_download">
                                        <option value="1" selected>تایید</option>
                                        <option value="0" >عدم تایید</option>
                                    </select>

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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/article/url/create.blade.php ENDPATH**/ ?>