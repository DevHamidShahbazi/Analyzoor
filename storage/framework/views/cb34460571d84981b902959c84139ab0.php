<?php $__env->startSection('title'); ?><?php echo e(setting_with_key('article_title')->value); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('article_description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('article_keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    


<div class="container-xxl">

    <br>
    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Home')); ?>">صفحه اصلی</a></li>
                <li class="breadcrumb-item active" aria-current="page">دوره های آموزشی</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 text-center pb-3">
        <h3 dir="rtl">
            دوره های آموزشی
        </h3>
        <hr>
    </div>
    <div class="row">

        <div class="col-lg-9">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row row-gap-3">

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                <?php echo $__env->make('components.public-item-course.index',['course'=>$course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <br>
                    <br>

                    <?php echo e($courses->links("pagination::default")); ?>


                </div>

            </section>


        </div>

        <div class="col-lg-3">

            <form action="<?php echo e(\Illuminate\Support\Facades\URL::current()); ?>" method="GET">
                <div class="widgets-container" >

                    <button data-aos="fade-up" data-aos-delay="150" class="btn btn-primary mb-3 col-12" type="submit">
                        اعمال فیلتر
                        <i class="fas fa-filter"></i>
                    </button>


                    <div class="search-widget widget-item p-3" data-aos="fade-up" data-aos-delay="200">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">جستجو</p>




                        <div class="row align-items-center justify-content-center m-0">
                            <div class="col-lg-12 text-center">
                                <div class="input-group">
                                    <input  value="<?php echo e(request()->input('filter.name')); ?>" placeholder="جستجو" dir="rtl"  type="search" class="form-control" name="filter[name]" >
                                    <button class="btn btn-outline-primary p-2">
                                        <i class="fas fa-search" ></i>
                                    </button>
                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="400">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">نوع دوره آموزشی</p>


                        <div class="d-flex flex-column gap-2">


                            <?php $__currentLoopData = config('static_array.courseType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-check">
                                    <input  <?php echo e(in_array($value, (array) request()->input('filter.type', [])) ? 'checked' : ''); ?> class="form-check-input" type="checkbox" name="filter[type][]" value="<?php echo e($value); ?>" id="typeDraft-<?php echo e($loop->index); ?>">
                                    <label class="form-check-label" for="typeDraft-<?php echo e($loop->index); ?>"><?php echo e($name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>


                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="300">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">وضعیت دوره آموزشی</p>




                        <div class="d-flex flex-column gap-2">
                            <?php $__currentLoopData = config('static_array.courseStatus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-check">
                                    <input  <?php echo e(in_array($value, request()->input('filter.status', [])) ? 'checked' : ''); ?> class="form-check-input" type="checkbox" name="filter[status][]" value="<?php echo e($value); ?>" id="statusDraft-<?php echo e($loop->index); ?>">
                                    <label class="form-check-label" for="statusDraft-<?php echo e($loop->index); ?>"><?php echo e($name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>


                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="450">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">دسته بندی</p>




                        <div class="d-flex flex-column gap-2">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filter[category_id][]" value="<?php echo e($category->id); ?>" id="categoryDraft-<?php echo e($loop->index); ?>"
                                        <?php echo e(in_array($category->id, (array) request()->input('filter.category_id', [])) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="categoryDraft-<?php echo e($loop->index); ?>">
                                        <?php echo e($category->name); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                </div>

            </form>


        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/public/course/course.blade.php ENDPATH**/ ?>