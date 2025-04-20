<?php $__env->startSection('Header','افزودن دوره آموزشی'); ?>
<?php $__env->startSection('course','active'); ?>
<?php $__env->startSection('address'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('admin.course.index')); ?>">لیست دوره ها</a>
    </li>
    <li class="breadcrumb-item">افزودن دوره</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">اضافه کردن دوره</h3>
            </div>
        <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <br>

            <form method="POST" action="<?php echo e(route('admin.course.store')); ?>"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>

                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="<?php echo e(old('name')); ?>" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >دسته بندی</label>
                            <select class="form-control" name="category_id">
                                <?php $categories = \App\Models\Category::where('type','course')->get() ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >وضعیت </label>
                            <select  class="form-control" name="status">
                                <?php $__currentLoopData = config('static_array.courseStatus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع </label>
                            <select  class="form-control" name="type">
                                <?php $__currentLoopData = config('static_array.courseType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0 parent">قیمت</label>
                            <span class="priceStatus1 parent"><span class="iranyekan mx-2 priceResult1"></span>تومان</span>
                            <input value="<?php echo e(old('price')); ?>" type="number"
                                   class="form-control parent priceInput1" autocomplete="off" name="price" >
                        </div>
                    </div>

                    <div class="md-form mb-2 row">
                        <div class="col-lg-5">
                            <label class="m-0 parent text-danger">قیمت با تخفیف</label>
                            <span class="priceStatus2 parent"><span class="iranyekan mx-2 priceResult2"></span>تومان</span>
                            <input value="<?php echo e(old('discount')); ?>" type="number"
                                   class="form-control parent priceInput2" autocomplete="off" name="discount" >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">زمان</label>
                            <input type="text" value="<?php echo e(old('time')); ?>" name="time" class="form-control"
                                   placeholder="زمان کل دوره">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">پاراگراف</label>
                            <input type="text" value="<?php echo e(old('paragraph')); ?>" name="paragraph" class="form-control"
                                   placeholder="پاراگراف">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="<?php echo e(old('title')); ?>" name="title" class="form-control"
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
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description"><?php echo e(old('description')); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="<?php echo e(old('keywords')); ?>" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-2 control-label">alt</label>
                            <input type="text" value="<?php echo e(old('alt')); ?>" name="alt" class="form-control"
                                   placeholder="alt">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea required  name="body" class="ckeditor"><?php echo e(old('body')); ?></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اضافه کردن</button>
                            <a href="<?php echo e(route('admin.course.index')); ?>"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>



                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>


        /*Price character*/
        var price = $(".priceInput1");
        if (price.val() === ""){
            $(".priceStatus1").fadeOut()
        }else {
            $(".priceResult1").text(PriceNumber(price.val()));
        }


        $(price).on("keyup", function() {

            $(".priceResult1").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus1").fadeOut()
            } else {
                $(".priceStatus1").fadeIn()
            }
        });
        /*Price character*/


        /*Price character*/
        var price2 = $(".priceInput2");
        if (price2.val() === ""){
            $(".priceStatus2").fadeOut()
        }else {
            $(".priceResult2").text(PriceNumber(price2.val()));
        }


        $(price2).on("keyup", function() {

            $(".priceResult2").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus2").fadeOut()
            } else {
                $(".priceStatus2").fadeIn()
            }
        });
        /*Price character*/


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/course/create.blade.php ENDPATH**/ ?>