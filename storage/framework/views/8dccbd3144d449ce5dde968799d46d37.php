<?php $__env->startSection('Header','دوره های آموزشی'); ?>
<?php $__env->startSection('course','active'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a href="<?php echo e(route('admin.course.create')); ?>" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن دوره</i>
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >دسته بندی</th>
                                <th  class="text-center text-light" scope="col" >تعداد فروش</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >تصویر</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            <?php if(!empty($courses )): ?>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="item<?php echo e($val->id); ?>">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                            <a target="_blank" href="">
                                                <?php echo e($val->name); ?>

                                            </a>
                                            <span class="badge bg-<?php echo e($val->status == 'comingSoon' ? 'warning': ($val->status=='Currently'?'danger-gradient':'success')); ?>"><?php echo e(array_search($val->status,config('static_array.courseStatus'))); ?></span>
                                            <span class="badge bg-<?php echo e($val->type == 'free' ? 'secondary-gradient':'primary-gradient'); ?>"><?php echo e(array_search($val->type,config('static_array.courseType'))); ?></span>
                                           </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " ><?php echo e($val->category->name); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " ><?php echo e(count($val->payments()->where('status','1')->get())); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e(Verta::instance($val->created_at)->formatDate()); ?></td>
                                        <td  style="padding:inherit" class="text-center" >
                                            <i>
                                                <img width="100" class="img-thumbnail" src="<?php echo e($val->image); ?>" alt="<?php echo e($val->alt); ?>">
                                            </i>
                                        </td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">

                                            <a data-toggle="tooltip" data-placement="top" title="قسمت ها" href="<?php echo e(route('admin.episode.index',['course_id'=>$val->id ])); ?>"  style="width: max-content;" class="btn-sm btn-secondary  col-lg-12">
                                                <i><?php echo e(count($val->episodes()->get()) ?? ''); ?></i>
                                                <i class="fas fa-video"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="فصل ها" href="<?php echo e(route('admin.chapter.index',['course_id'=>$val->id ])); ?>"  style="width: max-content;" class="btn-sm btn-warning  col-lg-12">
                                                <i><?php echo e(count($val->chapters()->get()) ?? ''); ?></i>
                                                <i class="fas fa-bar-chart"></i>
                                            </a>


                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="<?php echo e(route('admin.course.edit',$val->id)); ?>"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.course.destroy',$val->id)); ?>"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
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

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/index.blade.php ENDPATH**/ ?>