<?php $__env->startSection('Header',' لیست دسته بندی ها'); ?>
<?php $__env->startSection('category','active'); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $(".filter").change(function() {
                $(".form").submit();
            });

            $(function() {
                var $magics = $('.pass');
                $magics.on('click', function () {
                    var $magic = $(this);
                    var password = $magic.data('password');
                    $magic.text(password);
                });
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن دسته بندی</i></a>
                    </div>
                    <?php echo $__env->make('admin.category.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php echo $__env->make('components.admin-select-box-filter-with-static-value.index',['name_checkbox'=>'type','value_selectBox'=>config('static_array.categoryType'),'label'=>'نوع دسته بندی'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- /.card-header -->
                تعداد مقالات <?php echo e($categories->count()); ?>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">id</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >نوع دسته بندی</th>
                            <th  class="text-center text-light" scope="col" >زیر مجموعه</th>
                            <th  class="text-center text-light" scope="col" >تصویر</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        <?php if(!empty($categories )): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($val->id); ?></td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->name); ?></td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e(array_search($val->type,config('static_array.categoryType'))); ?></td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        <?php if($val->parent_id == '0'): ?>

                                            <?php if($val->children()->get()->isEmpty()): ?>
                                                اصلی
                                                <span class="badge bg-primary" style="font-size: 100%">
                                                بدون زیر مجموعه
                                                </span>
                                            <?php endif; ?>

                                            <?php $__currentLoopData = $val->children()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge bg-danger" style="font-size: 100%">
                                                <?php echo e($v->name); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>
                                            <?php echo e('زیرمجموعه '.$val->parent->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td  style="padding:inherit" class="text-center" >
                                        <i>
                                            <img width="100" class="img-thumbnail" src="<?php echo e($val->image); ?>" alt="<?php echo e($val->alt); ?>">
                                        </i>
                                    </td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.category.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.category.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views\admin\category\index.blade.php ENDPATH**/ ?>
