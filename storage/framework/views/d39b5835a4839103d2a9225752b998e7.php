<?php if(session('success') || session('error')): ?>
    <br>
    <div class="d-flex justify-content-center">
        <div class="col-6" dir="rtl">
            <div class="alert alert-<?php echo e(session('success') ? 'success' : 'danger'); ?> alert-dismissible fade show" role="alert">
                <?php echo e(session('success') ?? session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <br>
    <?php session()->forget('error') ?>
    <?php session()->forget('success') ?>
<?php endif; ?>
<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/alert/default/index.blade.php ENDPATH**/ ?>