<a data-toggle="modal" data-target="#CopyList<?php echo e($key); ?>"  style="width: max-content;" class="btn-sm btn-primary col-lg-12">
    <i data-toggle="tooltip" data-placement="top" title="کپی" class="fa fa-copy"></i>
</a>




<div class="modal fade" id="CopyList<?php echo e($key); ?>">
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
                            کپی کردن  <?php echo e($val->name); ?>

                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->


                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="<?php echo e(route($route)); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <input hidden required value="<?php echo e($val->id); ?>" type="text" class="form-control" name="id" >
                            <br>
                            <h1 class="text-dark">کپی انجام گیرد؟؟</h1>
                            <br>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">بله</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                </div>
                            <br>
                            <br>
                        </form>



                    </div>
                    <!-- Panel 7 -->

                </div>

            </div>
        </div>
        <!-- Content -->

    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/admin-copy-item/index.blade.php ENDPATH**/ ?>