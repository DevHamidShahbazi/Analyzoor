<?php $__env->startSection('Header','لیست کاربران'); ?>
<?php $__env->startSection('users','active'); ?>
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

                <div class="card-header">
                    <div class="col-sm-12 ">

                        <div class="col-sm-12 ">
                            <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                                <a href="#" data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>
                                    <i  style="margin: inherit; ">افزودن کاربر</i>
                                </a>
                            </div>
                            <?php echo $__env->make('admin.user.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php echo $__env->make('components.admin-select-box-filter-with-static-value.index',['name_checkbox'=>'status','value_selectBox'=>config('static_array.userLevel'),'label'=>'نوع کاربر'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >موبایل</th>
                            <th  class="text-center text-light" scope="col" >ایمیل</th>
                            <th  class="text-center text-light" scope="col" >رمز عبور</th>
                            <th  class="text-center text-light" scope="col" >نوع</th>
                            <th  class="text-center text-light" scope="col" >تاریخ ثبت نام</th>
                            <th  class="text-center text-light" scope="col" >کد تایید</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        <?php if(!empty($users )): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($val->id); ?>">
                                    <td   scope="row" class="Dlt text-center font-weight-bold"><?php echo e($key+1); ?></td>
                                    <td  class="text-center font-weight-bold" >
                                        <?php echo e($val->name); ?>

                                    </td>
                                    <td  class="text-center font-weight-bold" >
                                        <?php echo e($val->phone == null ? '___' : $val->phone); ?>

                                        <?php if(auth()->user()->checkVerifyUser($val)): ?>
                                            <span class="badge bg-success" id="count">تایید شده</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger" id="count">تایید نشده</span>
                                        <?php endif; ?>
                                        <?php if($val->visits()->count()): ?>
                                            <span
                                                data-toggle="tooltip" data-placement="right" data-html="true"  data-original-title="تعداد بازدید"
                                                class="badge bg-primary"><?php echo e($val->visits()->count()); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td  class="text-center font-weight-bold" ><?php echo e($val->email == null ? '___' : $val->email); ?></td>
                                    <td class="text-center font-weight-bold" >
                                        <span class="pass" data-password="<?php echo e(\Illuminate\Support\Facades\Crypt::decrypt($val->crypt)); ?>" >
                                            ****
                                        </span>
                                    </td>
                                    <td  class="text-center font-weight-bold" >
                                        <?php echo e(array_search($val->level,config('static_array.userLevel'))); ?>

                                    </td>

                                    <td class="text-center font-weight-bold iranyekan" >
                                        <span class="px-2" data-toggle="tooltip" data-placement="right" data-html="true"  data-original-title="ساعت : <?php echo e(Verta::instance($val->created_at)->format('H:i:s')); ?>" >
                                            <?php echo e(Verta::instance($val->created_at)->format('Y/n/j')); ?>

                                        </span>
                                    </td>

                                    <td class="text-center font-weight-bold iranyekan" >
                                        <?php if($val->activeCode()->where('expire_at','<=',now())->get()->count()): ?>
                                            <?php $__currentLoopData = $val->activeCode()->where('expire_at','<=',now())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $code->delete() ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                         <?php echo e($val->activeCode()->where('expire_at','>',now())->first()->code ?? '__'); ?>

                                    </td>

                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo<?php echo e($key); ?>" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    <?php echo $__env->make('admin.user.edit',['key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <td  class="text-center  text-light ">
                                        <a href="#!" data-id="<?php echo e($val->id); ?>" data-route="<?php echo e(route('admin.user.destroy',$val->id)); ?>"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/user/index.blade.php ENDPATH**/ ?>