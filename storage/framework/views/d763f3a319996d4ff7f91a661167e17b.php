<?php if($errors->any()): ?>
    <br>

    <div class="col-12">
        <div class="alert alert-danger alert-dismissible" dir="rtl">

            <h5 class="text-white"><i class=" icon fa fa-ban"></i>خطا!</h5>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/alert/form/error.blade.php ENDPATH**/ ?>