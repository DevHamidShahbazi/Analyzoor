<?php $__env->startSection('title'); ?><?php echo e($course->title); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($course->description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e($course->keywords); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('style'); ?>
    <style>
        .show-more {
            position:relative;
            text-align: center;
            cursor: pointer;
        }
        .show-more-height {
            height: 375px;
            overflow:hidden;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script>
        $(".show-more").click(function () {
            if($(".content-exp").hasClass("show-more-height")) {
                $(this).addClass('d-none');
            }
            $(".content-exp").toggleClass("show-more-height");
        });
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="pb-0 py-4">
        <div class="container">
            <?php echo $__env->make('components.public-course-top-price.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                    <!-- Main content START -->
                <div class="order-1 col-lg-9">

                    <div  class="card shadow rounded-2 mb-2 p-4">
                            <article  class="col-12 text-start content-exp show-more-height" >
                               <?php echo $course->body; ?>

                            </article>
                        <div class="col-12 text-center">
                            <div class="btn btn-md btn-outline-primary font-weight-bold show-more">
                                <i class="fas fa-eye"></i>
                                ادامه مطلب
                            </div>
                        </div>
                        <?php echo $__env->make('components.public-questions.index',['data'=>$questions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                جلسات دوره
                            </span>
                            <hr>
                            <?php echo $__env->make('components.public-list-chapter.index',['chapters'=>$chapters,'episodes'=>$episodes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                    <br>


                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                نظرات دوره
                            </span>
                            <hr>
                            <?php echo $__env->make('components.public-comment.index',['item'=>$course,'type_route'=>'course'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                </div>
                    <!-- Main content END -->

                    <!-- Left sidebar START -->
                    <div class="order-2 col-lg-3 pt-5 pt-lg-0">
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-md-6 col-lg-12">

                                <!-- Course info START -->
                                <div class="card rounded-2 shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h5 class="text-start">اطلاعات دوره</h5>
                                    <hr>
                                    <ul dir="rtl" class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class=" fa-fw <?php echo e($course->status == 'comingSoon' ? '': ($course->status=='currently'?'fas fa-history':'fas fa-check')); ?> text-primary"></i>وضعیت دوره</span>
                                            <span><?php echo e(array_search($course->status,config('static_array.courseStatus'))); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-book-open text-primary"></i>تعداد جلسات</span>
                                            <span><?php echo e($episodes->count()); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-clock text-primary"></i>زمان دوره</span>
                                            <span><?php echo e(time_course($episodes->pluck('time')->toArray())); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-signal text-primary"></i>نوع دوره</span>
                                            <span><?php echo e(array_search($course->type,config('static_array.courseType'))); ?></span>
                                        </li>
                                    </ul>
                                    <div class="col-12 my-1 d-lg-none d-sm-block">
                                        <br>
                                        <div class="d-flex justify-content-center align-items-center height-100">
                                            <a href="#" class="btn btn-primary">
                                                خرید دوره آموزشی
                                                <i class="fas fa-graduation-cap"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <!-- Course info END -->
                            </div>

                        </div><!-- Row End -->
                    </div>
                    <!-- Left sidebar END -->
                </div><!-- Row END -->
            </div>
    </section>


    <!-- =======================
    Page content END -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/public/course-detail.blade.php ENDPATH**/ ?>