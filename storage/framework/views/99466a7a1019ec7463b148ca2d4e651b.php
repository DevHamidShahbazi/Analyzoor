<?php $__env->startSection('Header','مقالات'); ?>
<?php $__env->startSection('Articles','active'); ?>
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
                        <a href="<?php echo e(route('admin.article.create')); ?>" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن مقاله</i>
                        </a>
                            <?php echo $__env->make('components.admin-select-box-filter.index',
                            ['label'=>'نمایش بر اساس دسته بندی',
                            'value_select_box'=>\App\Models\Article::all(),
                            'name_select_box'=>'category_id',
                            'name_model_relation'=>'category',
                            'name_model_for_show'=>'name',
                            ]
                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >دسته بندی</th>
                                <th  class="text-center text-light" scope="col" >title</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >تصویر</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            <?php if(!empty($articles )): ?>
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="item<?php echo e($val->id); ?>">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->name); ?> <?php echo $__env->make('components.admin-is-active.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->category->name); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->title); ?></td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e(Verta::instance($val->created_at)->formatDate()); ?></td>
                                        <td  style="padding:inherit" class="text-center" >
                                            <i>
                                                <img width="100" class="img-thumbnail" src="<?php echo e($val->image); ?>" alt="<?php echo e($val->alt); ?>">
                                            </i>
                                        </td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">

                                            <a data-toggle="tooltip" data-placement="top" title="فایل ها" href="<?php echo e(route('admin.article-file.index',['id'=>$val->id ])); ?>"  style="width: max-content;" class="btn-sm btn-secondary  col-lg-12">
                                                <i><?php echo e(count($val->files()->get()) ?? ''); ?></i>
                                                <i class="fas fa-file"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="لینک های دانلود" href="<?php echo e(route('admin.article-url.index',['id'=>$val->id ])); ?>"  style="width: max-content;" class="btn-sm btn-primary  col-lg-12">
                                                <i><?php echo e(count($val->urls()->get()) ?? ''); ?></i>
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="<?php echo e(route('admin.article.edit',$val->id)); ?>"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.article.destroy',$val->id)); ?>"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
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

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fanoram\resources\views/admin/article/index.blade.php ENDPATH**/ ?>