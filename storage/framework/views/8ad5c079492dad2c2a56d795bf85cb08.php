

<div class="col-lg-12 text-center mt-5 py-1 no-print" style="background: radial-gradient(circle at 50% 175%, #1a2236, #192032, #151521, #141420 57%)">
    <a id="GoTop" href="#top" class="text-white">
        برگشت به بالا
    </a>
</div>

<div  class="container-fluid bg-footer px-0 no-print" style="background: radial-gradient(circle at 50% 175%, #1c2a42, #1c2a42, #1c2a42, #151521 57%)">
    <div class="container-fluid">
        <div class="row text-white m-0">
            <div class="col-md-9 col-12">
                <div style="font-size: larger" class="col-12  text-center font-weight-bold mt-2">
                    دسته بندی ها
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="row m-0">
                        <?php $__currentLoopData = \App\Models\Category::where('type','article')->where('parent_id',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 pb-4">
                                <a target="_blank" href="<?php echo e(route('parent.article.category',$parentCategory->slug)); ?>">
                                    <h4 class="text-center text-decoration-underline text-white"><?php echo e($parentCategory->name); ?></h4>
                                </a>
                                <?php $__currentLoopData = $parentCategory->children()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a target="_blank" href="<?php echo e(route('child.article.category',$childCategory->slug)); ?>">
                                        <h5 class="text-center"><?php echo e($childCategory->name); ?></h5>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div style="font-size: larger" class="col-12  text-center font-weight-bold mt-2">
                    فانورام
                </div>
                <hr/>
                
                <p class="text-center">
                    فثسف ثسف ثسفثس
                </p>
            </div>
        </div>
    </div>
    <hr>

    <div  class="container-fluid">
        <div class="row m-0">
            <div style="border-radius: 15px" class="col-12 text-center  my-4 text-white mb-3">

                استفاده از مطالب این سایت فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به <span class="font-weight-bold "><a class='text-white' href="<?php echo e(route('Home')); ?>">فانورام</a></span> می‌باشد


            </div>
        </div>
    </div>
</div>



<?php /**PATH C:\xampp\htdocs\fanoram\resources\views/layouts/layout public/footer.blade.php ENDPATH**/ ?>