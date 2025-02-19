<?php $__env->startSection('Header',' لیست لینک دانلود ها'); ?>
<?php $__env->startSection('urls','active'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right mb-2">
                    <div style="text-align: initial;" class="m-b-30 text-light">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن لینک</i></a>
                    </div>
                    <?php echo $__env->make('admin.url.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>



                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >url</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        <?php if(!empty($urls )): ?>
                            <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td   scope="row" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->name); ?></td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->url); ?></td>

                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.url.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <td  class="text-center  text-light ">
                                        <a href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.url.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/url/index.blade.php ENDPATH**/ ?>