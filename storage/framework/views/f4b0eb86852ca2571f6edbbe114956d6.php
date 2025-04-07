<?php $__env->startSection('Header','ویرایش دوره آموزشی'); ?>
<?php $__env->startSection('course','active'); ?>
<?php $__env->startSection('address'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('admin.course.index')); ?>">کل دوره ها</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('admin.episode.index',['course_id'=>$course_id])); ?>"> قسمت های <?php echo e($course->name); ?> </a>
    </li>
    <li class="breadcrumb-item"> ویرایش قسمت <?php echo e($episode->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">ویرایش قسمت <?php echo e($episode->name); ?></h3>
            </div>

        <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- /.card-header -->
            <br>
            <div class="text-center mt-2">
                <div style="text-align: right" class="col-lg-12">
                    <a target="_blank" href="" class="btn btn-primary btn-sm">پیش نمایش</a>
                </div>

            </div>
            <br>















        <!-- form start -->
            <form method="POST" action="<?php echo e(route('admin.episode.update',['episode'=>$episode->id,'course_id'=>$course_id])); ?>"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="<?php echo e($episode->name); ?>" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع </label>
                            <select  class="form-control" name="type">
                                <?php $__currentLoopData = config('static_array.episodeType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($value == $episode ? 'selected' : ''); ?> value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">زمان</label>
                            <input required type="text" value="<?php echo e($episode->time ?? old('time')); ?>" name="time" class="form-control"
                                   placeholder="زمان">
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >انتخاب فصل</label>
                            <select  class="form-control" name="chapter_id">
                                <?php $__currentLoopData = $course?->chapters()?->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($episode?->chapter?->id == $chapter->id ? 'selected' : ''); ?> value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="<?php echo e($episode->title); ?>" name="title" class="form-control"
                                   placeholder="title">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    description
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description"><?php echo e($episode->description); ?></textarea>
                            </div>
                        </div>



                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="<?php echo e($episode->keywords); ?>" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">ویدیو آموزش</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input  name="video" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب ویدیو</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">فایل آموزش</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input  name="file" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea required name="body" class="ckeditor"><?php echo e($episode->body); ?></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اعمال ویرایش</button>
                            <a href="<?php echo e(route('admin.episode.index',['course_id'=>$course_id ])); ?>"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/episode/edit.blade.php ENDPATH**/ ?>