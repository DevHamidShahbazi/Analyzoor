<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('article_title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('article_description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('article_keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


   


<div class="container">

    <br>
    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>
                <li class="breadcrumb-item active" aria-current="page">مقالات</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 text-center pb-3">
        <h3 dir="rtl">
            مقالات
        </h3>
        <hr>
    </div>
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                <?php echo $__env->make('components.public-item-article.index',['article'=>$article,'side'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>

                    <br>

                    <?php echo e($articles->links("pagination::default")); ?>


                </div>

            </section>


        </div>

        <div class="col-lg-4">

            <div class="widgets-container" >

                <div class="search-widget widget-item" data-aos="fade-up" data-aos-delay="200">

                    <p class="widget-title text-start font-weight-bold" style="font-size: larger">جستجو</p>

                    <form class="filter" method="GET" action="<?php echo e(\Illuminate\Support\Facades\URL::current()); ?>">

                        <div class="row align-items-center justify-content-center m-0">
                            <div class="col-lg-12 text-center">
                                <div class="input-group">
                                    <input  value="<?php echo e(request()->has('filter') ? request()->get('filter')['name'] :''); ?>" placeholder="جستجو" dir="rtl"  type="search" class="form-control" name="filter[name]" >
                                    <button class="btn btn-outline-primary p-2">
                                        <i class="fas fa-search" ></i>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>




               


            </div>

        </div>

    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/public/article.blade.php ENDPATH**/ ?>