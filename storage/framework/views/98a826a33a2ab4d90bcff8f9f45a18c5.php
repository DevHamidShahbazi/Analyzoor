<div class="card-body">
    <?php if(auth()->check()): ?>
        <form action="<?php echo e(route($type_route.'.store.comment')); ?>" method="post" class="comment">
            <?php echo csrf_field(); ?>
            <input type="number" hidden value="<?php echo e($item->id); ?>" name="commentable_id">

            <?php if($errors->any()): ?>
                <br>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($error); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <br>
            <?php endif; ?>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <label class="col-12">
                        <textarea dir="rtl" required name="comment"  class="form-control" placeholder="لطفا متن مورد نظر خود را وارد کنید..." rows="5"><?php echo e(old('comment')); ?></textarea>
                    </label>
                    <div class="col-12 my-2 text-center">
                        <button class="btn btn-primary">ارسال نظر</button>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <p class="text-center my-3">
                برای ثبت نظر خود نیاز هست که ثبت نام کنید
            </p>
            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">
                ورود / ثبت نام
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-comment/comment-store.blade.php ENDPATH**/ ?>