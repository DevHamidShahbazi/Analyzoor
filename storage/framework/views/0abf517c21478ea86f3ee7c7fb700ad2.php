<!doctype html>
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="/admin/css/sweet-alert.css">
        <link rel="stylesheet" href="/admin/css/font.min.css">
        <link rel="stylesheet" href="/admin/css/select2.min.css">
        <link rel="stylesheet" href="/admin/css/adminlte.min.css">
        <link rel="stylesheet" href="/admin/css/dropzone.css">
        <link rel="stylesheet" href="/admin/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="/admin/css/custom-style.css">
        <?php echo $__env->yieldContent('style'); ?>
        <title>پنل مدیریت</title>
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse"  >
    <div class="wrapper">
        <?php echo $__env->make('layouts.layout admin.navBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.layout admin.sideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper" style="background: #343a402b;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 ">
                            <h1 style="font-weight: 900;text-align: center" class="m-0 text-dark"><?php echo $__env->yieldContent('Header'); ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <?php echo $__env->yieldContent('address'); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/admin/js/adminlte.min.js"></script>
    <script type="text/javascript" src="/admin/js/sweet-alert.min.js"></script>
    <script type="text/javascript" src="/admin/js/dropzone.js"></script>
    <script type="text/javascript" src="/admin/plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/admin/js/toastr.js"></script>
    <script type="text/javascript" src="/admin/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/admin/js/custom.js"></script>
    <script src="<?php echo e(asset('react/js/app.js')); ?>" > </script>
    <?php echo $__env->yieldContent('script'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/layouts/layout admin/index.blade.php ENDPATH**/ ?>