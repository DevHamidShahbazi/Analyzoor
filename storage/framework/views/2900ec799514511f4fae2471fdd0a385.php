<?php $__env->startSection('Header','نظر ها'); ?>
<?php $__env->startSection('comment','active'); ?>
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
                            <th  class="text-center text-light" scope="col" >نوع نظر</th>
                            <th  class="text-center text-light" scope="col" >کاربر ثبت شده</th>
                            <th  class="text-center text-light" scope="col" >برای مقاله</th>
                            <th  class="text-center text-light" scope="col" >تاریخ ثبت</th>
                            <th  class="text-center text-light" scope="col" >تصویر</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        <?php if(!empty($comments )): ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        <?php if($val->parent_id == '0'): ?>
                                        اصلی
                                            <?php else: ?>
                                            پاسخ به <span class="text-primary"><?php echo e($val->parent->comment); ?></span>
                                        <?php endif; ?>
                                            <?php echo $__env->make('components.admin-is-active.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val?->user?->name ?? 'بدون ثبت نام'); ?> </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->commentable->name); ?></td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >

                                         <span data-toggle="tooltip" data-placement="right"
                                               data-html="true"
                                               data-original-title="ساعت : <?php echo e($val->getCreateHourAttribute()); ?>">
                                                <?php echo e($val->getCreateDateAttribute()); ?>

                                            </span>

                                    </td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <i>
                                            <img width="100" class="img-thumbnail" src="<?php echo e($val->commentable->image); ?>">
                                        </i>
                                    </td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.comment.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.comment.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views\admin\comment\index.blade.php ENDPATH**/ ?>