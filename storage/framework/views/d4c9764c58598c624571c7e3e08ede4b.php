<?php $__env->startSection('Header',' لیست تراکنش ها'); ?>
<?php $__env->startSection('payments','active'); ?>

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
                            <th  class="text-center text-light" scope="col" >نام محصول</th>
                            <th  class="text-center text-light" scope="col" >کاربر</th>
                            <th  class="text-center text-light" scope="col" >شماره تراکنش</th>
                            <th  class="text-center text-light" scope="col" >پیام بازگشتی</th>
                            <th  class="text-center text-light" scope="col" >تاریخ تراکنش</th>
                        </tr>

                        <?php if(!empty($payments )): ?>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td  style="vertical-align: center" scope="row" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>

                                    <td  class="text-center font-weight-bold" >
                                        <?php echo e($val->course->name); ?>


                                        <?php if($val->status): ?>
                                            <span class="badge bg-success" >
                                            پرداخت شده
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">
                                            عدم پرداخت
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        <a href="#" data-toggle="modal" data-target="#modalLRFormDemo<?php echo e($key); ?>">
                                            <?php echo e($val->user->name); ?>

                                        </a>
                                    </td>
                                    <?php echo $__env->make('admin.user.edit',['key'=>$key,'val'=>$val->user,'dont_edit'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->result_number); ?></td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->result_message); ?></td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->created_date.' - '.$val->created_hour); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/payment/index.blade.php ENDPATH**/ ?>