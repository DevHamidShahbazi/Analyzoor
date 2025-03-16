<?php if(session('success')): ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        toastr.success("<?php echo e(session('success')); ?>", 'انجام شد')
    </script>
    <?php session()->forget('success') ?>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/alert/toastr/success.blade.php ENDPATH**/ ?>