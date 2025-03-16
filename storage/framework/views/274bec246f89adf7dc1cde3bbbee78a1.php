<?php if(session('error')): ?>
    <?php $__env->startSection('script'); ?>
        <script type="text/javascript">
            toastr.error("<?php echo e(session('error')); ?>", 'خطا!')
        </script>
        <?php session()->forget('error') ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/alert/toastr/error.blade.php ENDPATH**/ ?>