<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('components.public-slider.index',[
    'image'=>'public/img/vectors/td-home.png',
    'title'=>'آموزش برنامه نویسی و هوش مصنوعی',
    'description'=>'زیبایی یادگیری در این است که هیچ‌کس نمی‌تواند آن را از تو بگیرد',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('components.public-grid-background.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class=" py-5 ">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <h4 dir="rtl" class="text-shadow" style="font-size: xx-large">
                        از کجا شروع کنم؟؟
                    </h4>
                    <p style="font-size: larger" class="text-shadow mt-2">
                        وقتی هنوز نمی‌دونی قراره چی بشی ، اون موقع بهترین زمان شروعه،
                        <br>
                        چون توی همین لحظه‌ست که می‌تونی بدون ترس، تجربه کنی، یاد بگیری و راه‌ خودت رو پیدا کنی.
                        <br>
                        لازم نیست از همون اول بدونی قراره برنامه‌نویس بشی، طراح، یا حتی کارآفرین.
                        <br>
                        مهم اینه که شروع کنی...
                        <br>
                        قدم اول همیشه سخت‌ترینه، اما اگه بلد باشی از کجا شروع کنی، همه چیز ساده‌تر می‌شه.
                    </p>
                </div>

                <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="350">
                    <img src="public/img/vectors/hat.png" class="col-lg-10 col-md-6 col-6 my-3" alt="logo">
                </div>



            </div>
        </div>

    </section>


    <img class="col-12 mt-1" src="/public/img/t_footer.jpg"  alt="آموزش برنامه نویسی برای بازارکار">

    <div class="container my-5">
        <h3 class="text-center" data-aos="fade-up">
            مراحل آموزشی
        </h3>
        <br>
        <section>
            <div class="row">

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="100">
                    <div class="px-3">
                        <div
                            class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-briefcase" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">توسعه مهارت‌ها برای بازار کار</h5>
                            <p class="font-weight-light text-center my-3">
                                وقتی پایه‌ها رو یاد گرفتی و چند پروژه ساختی، نوبت ارتقاء مهارت‌هاست. اینجا یاد می‌گیری با ابزارهای حرفه‌ای کار کنی. همه‌ی آموزش‌ها با هدف آمادگی برای بازار کار طراحی شدن، دقیق، کاربردی
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="200">
                    <div class="px-3">
                        <div
                            class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-code" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">تمرین با پروژه‌های واقعی</h5>
                            <p class="font-weight-light text-center my-3">
                                یادگیری بدون تمرین هیچ فایده‌ای نداره! ما توی آموزش‌هامون تمرکز اصلی رو گذاشتیم روی ساخت پروژه‌های واقعی و کاربردی. یعنی همزمان با آموزش، چیزهایی می‌سازی که واقعاً توی دنیای واقعی استفاده می‌شن.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="300">
                    <div class="px-3">
                        <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                             style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-book-open" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">یادگیری اصول و مفاهیم پایه</h5>
                            <p class="font-weight-light text-center my-3">
                                برای شروع هرچیزی، نیازی نیست همه‌چیز رو بدونی. توی این مرحله، مفاهیم پایه رو با زبانی ساده و کاربردی یاد می‌گیری. مطالب اضافی یا تئوری‌های پیچیده رو کنار گذاشتیم تا سریع و مؤثر وارد دنیای موضوع بشی.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <div class="d-flex justify-content-center">
        <div class="col-10 m-0 p-3">
            <div class="row justify-content-evenly m-0">

                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <?php echo $__env->make('components.public-item-article.index',['article'=>$article,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="col-12 text-center p-0 m-0">
                <a class="font-weight-bold" href="<?php echo e(route('article.index')); ?>">نمایش بیشتر</a>
            </div>
        </div>
    </div>

    



    
    
    
    
    
    
    
    
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/public/Home.blade.php ENDPATH**/ ?>