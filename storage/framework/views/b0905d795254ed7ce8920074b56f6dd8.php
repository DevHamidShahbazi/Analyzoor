
<div class="col-2 text-center">
    <?php if(setting_with_key($key_name)?->value==null): ?>
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                هنوز عکسی برای <?php echo e($label); ?> انتخاب نشده است
            </div>
        </div>
    <?php else: ?>
        <?php echo e($label); ?>

        <a target="_blank" href="<?php echo e(setting_with_key($key_name)?->value); ?>">
            <img src="<?php echo e(setting_with_key($key_name)?->value); ?>" class="rounded col-lg-3" title="<?php echo e($label); ?>" alt="<?php echo e($label); ?>">
        </a>
    <?php endif; ?>

</div>


<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/admin-image-show-setting/show_image_setting.blade.php ENDPATH**/ ?>