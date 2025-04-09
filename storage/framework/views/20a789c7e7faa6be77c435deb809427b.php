

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
                            اضافه کردن منو
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">

                <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Panel 17 -->
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route('admin.menu.store')); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input list="names" required value="<?php echo e(old('name')); ?>"  dir="rtl" id="name" type="text" class="form-control" name="name" >

                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0" >ترتیب</label>
                                    <input value="<?php echo e(old('sort')); ?>" required id="sort" type="number" class="form-control" name="sort" >
                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0" >لینک</label>
                                    <span style="font-size: small" class="text-danger">(اگر منو ، دسته بندی نداشته باشد این لینک عمل میکند)</span>
                                    <input value="<?php echo e(old('url')); ?>" id="url" type="text" class="form-control" name="url" >
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
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/menu/create.blade.php ENDPATH**/ ?>