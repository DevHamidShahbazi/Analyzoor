<div class="md-form my-2">
    <form class="form" method="GET" action="<?php echo e(\Illuminate\Support\Facades\URL::current()); ?>">

        <div class="col-lg-2">
            <label class="m-0 text-dark" ><?php echo e($label); ?></label>
            <br>
            <select class="form-control filter" name="category_id">
                <option <?php if(! isset($checkbox)): ?>  <?php echo e('selected'); ?>  <?php endif; ?> value="0">همه</option>
                <?php if(!empty(!empty($values = $value_select_box))): ?>
                    <?php $__currentLoopData = collect($values)->unique($name_select_box); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(isset($checkbox)): ?>  <?php echo e($checkbox[$name_select_box] == $value->$name_select_box ? 'selected' : ' '); ?>  <?php endif; ?> value="<?php echo e($value->$name_model_relation->id); ?>"><?php echo e($value->$name_model_relation->$name_model_for_show); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/admin-select-box-filter/index.blade.php ENDPATH**/ ?>