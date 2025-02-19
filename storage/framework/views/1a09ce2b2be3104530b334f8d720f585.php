<?php $__env->startSection('Header','بارگزاری های خصوصی'); ?>
<?php $__env->startSection('private_files','active'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-12">

            <div class="card" style="background-color: #353b5000">
                <form role="form" method="post" class="dropzone" action="<?php echo e(route('admin.private-file.store')); ?>" enctype="multipart/form-data" id="dZUpload">
                    <?php echo csrf_field(); ?>
                    <div class="fallback">
                        <input  type="file" name="file" />
                    </div>
                </form>
                <br>
                <div class="col-sm-12 float-sm-right mb-2">
                    <div style="text-align: initial;" class="m-b-30 text-light">
                        <a href="<?php echo e(route('admin.private-file.index')); ?>" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-recycle"></i>
                            <i  style="margin: inherit; ">مشاهده</i></a>
                    </div>
                </div>
                <br>
                <div class="col-sm-12 float-sm-right">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #105a8d;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col">لینک فایل</th>
                            <th  class="text-center text-light" scope="col">فایل</th>
                            <th  class="text-center text-light" scope="col">alt</th>
                            <th  class="text-center text-light" scope="col">ویرایش</th>
                            <th  class="text-center text-light" scope="col">حذف</th>
                        </tr>

                        <?php if(!empty($files )): ?>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold"><?php echo e($loop->count-$key); ?></td>

                                    <td  style="padding:1.5rem 0">
                                        <input  id="input_<?php echo e($val->id); ?>" class="col-8 input_url" type="text"  style="direction: ltr" value="<?php echo e(asset('storage/'.$val->file)); ?>">
                                        <button  style="margin-right:10px;" class="btn btn-primary btn-sm btn-copy-url" > کپی کردن</button>

                                        <span class="badge bg-primary">
                                           <?php echo e($val->id); ?>

                                        </span>

                                    </td>

                                    <td  style="padding:inherit" class="text-center" >
                                        <i>
                                            <?php if($val->for_download): ?>
                                                <span class="badge bg-primary" >
                                                    برای دانلود
                                                </span>
                                            <?php else: ?>
                                                <img width="100" class="img-thumbnail" src="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($val->file)); ?>" alt="<?php echo e($val->alt); ?>">
                                            <?php endif; ?>

                                        </i>
                                    </td>


                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" ><?php echo e($val->alt == '0' ? '___':$val->alt); ?></td>

                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.private-file.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.private-file.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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


        <?php $__env->startSection('script'); ?>
            <script>

                $(document).ready(function() {


                    $(document).on('click','.btn-copy-url', function(){
                        var inputId= $(this).prev().attr('id');
                        var copyText = document.getElementById(inputId);


                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                        /* Copy the text inside the text field */
                        document.execCommand("copy");
                        $('.btn-copy-url').removeClass('btn-success').addClass('btn-primary').text('کپی کردن');
                        $(this).text('کپی شد').addClass('btn-success').removeClass('btn-primary')
                        //Basic
                        //swal("لینک تصویر کپی شد");

                    })
                });

            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/private-file/index.blade.php ENDPATH**/ ?>