<?php $__env->startSection('Header',' لیست تماس باما'); ?>
<?php $__env->startSection('messages','active'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >تاریخ درخواست</th>
                            <th  class="text-center text-light" scope="col" >موبایل</th>
                            <th  class="text-center text-light" scope="col" >نام و نام خانوادگی</th>
                            <th  class="text-center text-light" scope="col" >مشاهده</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        <?php if(!empty($messages )): ?>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td  style="vertical-align: center" scope="row" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>

                                    <td  class="text-center font-weight-bold" ><?php echo e($val->getCreateHourAttribute().' - '.$val->getCreateDateAttribute()); ?></td>

                                    <td  class="text-center font-weight-bold" ><?php echo e($val->phone); ?></td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->name); ?></td>
                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-eye ml-2"></i><i style="margin: inherit;">نمایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.message.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <td  class="text-center  text-light ">
                                        <a href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.message.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/message/index.blade.php ENDPATH**/ ?>