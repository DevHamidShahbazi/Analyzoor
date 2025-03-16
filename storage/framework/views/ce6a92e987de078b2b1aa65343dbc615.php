<?php if($val->is_active == '1'): ?>
    <span id="color-<?php echo e($val->id); ?>" class="badge bg-success">
نمایش
</span>
<?php elseif($val->is_active == '0'): ?>
    <span id="color-<?php echo e($val->id); ?>" class="badge bg-danger" >
عدم نمایش
</span>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/admin-is-active/index.blade.php ENDPATH**/ ?>