<div class="modal fade" id="EditList<?php echo e($key); ?>">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div style="height: 100%" class="modal-content">

            <div style="height: 100%" class="modal-c-tabs">

                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab">
                            <i class="fa fa-plus"></i>
                            ویرایش  <?php echo e($val->name); ?>

                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.chapter.update',['chapter'=>$val->id,'course_id'=>$course_id])); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input  required value="<?php echo e($val->name); ?>" type="text" class="form-control" name="name" >
                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0">عنوان</label>
                                    <input  required value="<?php echo e($val->title); ?>" type="text" class="form-control" name="title" >
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">ترتیب</label>
                                    <input type="number" value="<?php echo e($val->sort); ?>" name="sort" class="form-control"
                                           placeholder="ترتیب">
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">ویرایش</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                </div>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/chapter/edit.blade.php ENDPATH**/ ?>