

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
                            اضافه کردن فصل
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.chapter.store',['course_id'=>$course_id])); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input required value="<?php echo e(old('name')); ?>"  dir="rtl" id="name" type="text" class="form-control" name="name" >
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">عنوان</label>
                                        <input type="text" value="<?php echo e(old('title')); ?>" name="title" class="form-control"
                                               placeholder="عنوان">
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">ترتیب</label>
                                    <input type="number" value="<?php echo e(old('sort')); ?>" name="sort" class="form-control"
                                           placeholder="ترتیب">
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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/chapter/create.blade.php ENDPATH**/ ?>