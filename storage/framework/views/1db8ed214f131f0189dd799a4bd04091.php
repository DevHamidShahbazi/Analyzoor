<?php $__env->startSection('setting','active'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">تنظیمات</h3>
            </div>


            <?php echo $__env->make('alert.toastr.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('alert.toastr.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- /.card-header -->
            <br>
            <div class="col-12">
                <a class="btn btn-primary" href="<?php echo e(route('admin.sitemap')); ?>">
                    <i class="fa fa-download"></i>
                    sitemap
                </a>
            </div>
            <br>


            <div class="col-12">
                <div class="row">
                    <?php echo $__env->make('components.admin-image-show-setting.show_image_setting',['key_name'=>'logo','label'=>'لوگو'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>




            <!-- form start -->
            <form id="myForm" class="form-horizontal" method="POST" action="<?php echo e(route('admin.setting.store')); ?>"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>

                <div class="card-body">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">عنوان وب سایت</label>
                        <div class="col-sm-6">
                            <input type="text" required value="<?php echo e(setting_with_key('banner')->value); ?>" name="banner" class="form-control"
                                   placeholder="عنوان وب سایت">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">شماره موبایل</label>
                        <div class="col-sm-6">
                            <input  value="<?php echo e(setting_with_key('phone')->value); ?>" name="phone" class="form-control"
                                    required placeholder="شماره موبایل">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-12 control-label">title</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo e(setting_with_key('title')->value); ?>" name="title" class="form-control"
                                   placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    description
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description"><?php echo e(setting_with_key('description')->value); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">keywords</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo e(setting_with_key('keywords')->value); ?>" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group">
                        <label  class="col-sm-12 control-label"><?php echo e(setting_with_key('article_title')->label); ?></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo e(setting_with_key('article_title')->value); ?>" name="article_title" class="form-control"
                                   placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    <?php echo e(setting_with_key('article_description')->label); ?>

                                </label>
                                <textarea id="description" name="article_description" class="form-control description" rows="3" placeholder="description"><?php echo e(setting_with_key('article_description')->value); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><?php echo e(setting_with_key('article_keywords')->label); ?></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo e(setting_with_key('article_keywords')->value); ?>" name="article_keywords" class="form-control"
                                   placeholder="keywords">
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">alt</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo e(setting_with_key('logo_alt')->value); ?>" name="logo_alt" class="form-control"
                                   placeholder="logo_alt">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    توضیحات فوتر
                                </label>
                                <textarea name="body_footer" class="form-control" rows="3" placeholder="توضیحات فوتر"><?php echo e(setting_with_key('body_footer')->value); ?></textarea>
                            </div>
                        </div>
                    </div>























                    <input type="hidden" name="articles_home" value="[]">

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><?php echo e(setting_with_key('articles_home')->label); ?></label>
                        <div class="col-sm-6">
                            <select name="articles_home[]" class="form-control select2"  multiple="multiple"
                                    data-placeholder="<?php echo e(setting_with_key('articles_home')->label); ?>"
                                    style="width: 100%;text-align: right">
                                <?php $articles_home = \App\Models\Article::where('is_active','1')->get() ?>
                                <?php $articles_home_specify = setting_with_key('articles_home')->value ?>
                                <?php $__currentLoopData = $articles_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article_home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option <?php echo e($articles_home_specify ? in_array($article_home->id ,$articles_home_specify ) ? 'selected' : ' ': ' '); ?> value="<?php echo e($article_home->id); ?>">
                                        <?php echo e($article_home->name); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="courses_home" value="[]">

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><?php echo e(setting_with_key('courses_home')->label); ?></label>
                        <div class="col-sm-6">
                            <select name="courses_home[]" class="form-control select2"  multiple="multiple"
                                    data-placeholder="<?php echo e(setting_with_key('courses_home')->label); ?>"
                                    style="width: 100%;text-align: right">
                                <?php $courses_home = \App\Models\Article::where('is_active','1')->get() ?>
                                <?php $courses_home_specify = setting_with_key('courses_home')->value ?>
                                <?php $__currentLoopData = $courses_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option <?php echo e($courses_home_specify ? in_array($course_home->id ,$courses_home_specify ) ? 'selected' : ' ': ' '); ?> value="<?php echo e($course_home->id); ?>">
                                        <?php echo e($course_home->name); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="exampleInputFile">لوگو</label>
                        <div class="input-group col-sm-6">
                            <div class="custom-file">
                                <input name="logo" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">اعمال تغییرات</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var price = $(".priceInput1");

        $(price).on("keyup focus", function() {

            $(".priceResult1").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus1").fadeOut()
            } else {
                $(".priceStatus1").fadeIn()
            }
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/admin/setting/edit.blade.php ENDPATH**/ ?>