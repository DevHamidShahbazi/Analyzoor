<?php $__env->startSection('Header',' قسمت های آموزشی '.$course->name); ?>
<?php $__env->startSection('course','active'); ?>

<?php $__env->startSection('address'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('admin.course.index')); ?>">لیست دوره ها</a>
    </li>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a href="<?php echo e(route('admin.episode.create',['course_id'=>$course_id])); ?>" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن قسمت</i>
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >ویدیو</th>
                                <th  class="text-center text-light" scope="col" >فایل</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            <?php if(!empty($episodes )): ?>
                                <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="item<?php echo e($val->id); ?>">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                            <a target="_blank" href="">
                                                <?php echo e($val->name); ?>

                                            </a>
                                            <span class="badge bg-<?php echo e($val->type == 'free' ? 'success-gradient':'primary-gradient'); ?>"><?php echo e(array_search($val->type,config('static_array.episodeType'))); ?></span>
                                           </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >
                                            <?php if($val->video): ?>
                                                <video width="320" height="240" controls>
                                                    <source src="<?php echo e(route('admin.episode.video.show',['episode_id'=>$val->id])); ?>" type="video/mp4">
                                                    مرورگر شما امکان پخش این ویدیو را ندارد لطفا از chrome استفاده کنید
                                                </video>
                                            <?php else: ?>
                                                <span class="badge bg-danger" >ندارد</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >
                                            <?php if($val->file): ?>
                                                <a href="<?php echo e(route('admin.episode.file.show',['episode_id'=>$val->id])); ?>" class="text-primary">دانلود</a>
                                            <?php else: ?>
                                                <span class="badge bg-danger" >ندارد</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->created_date); ?></td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">


                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="<?php echo e(route('admin.episode.edit',['episode'=>$val->id,'course_id'=>$course_id])); ?>"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.episode.destroy',$val->id)); ?>"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
                                                <i class="fa fa-trash"></i>
                                            </a>

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
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/episode/index.blade.php ENDPATH**/ ?>