<div class="md-form mb-2">
    <form class="form" method="GET" action="<?php echo e(\Illuminate\Support\Facades\URL::current()); ?>">

        <div class="col-lg-2">
            <label class="m-0" ><?php echo e($label); ?></label>
            <br>
            <select class="form-control filter" name="<?php echo e($name_checkbox); ?>">
                <option <?php if(isset($checkbox)): ?>  <?php echo e($checkbox[$name_checkbox] == '0' ? 'selected' : ' '); ?>  <?php endif; ?> value="0">همه</option>
                <?php $__currentLoopData = $value_selectBox; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persian_name => $real_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(isset($checkbox)): ?>  <?php echo e($checkbox[$name_checkbox] == $real_name ? 'selected' : ' '); ?>  <?php endif; ?>  value="<?php echo e($real_name); ?>"><?php echo e($persian_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

    </form>

</div>
<?php /**PATH C:\xampp\htdocs\fanoram\resources\views\components\admin-select-box-filter-with-static-value\index.blade.php ENDPATH**/ ?>