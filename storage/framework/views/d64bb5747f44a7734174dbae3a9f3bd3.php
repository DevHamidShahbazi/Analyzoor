<!doctype html>
<html lang="fa" >
    <head>
        <meta charset="UTF-8">
        <?php $js='ver=0.0.2';$css='0.0.5'; ?>

        <link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/32.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/image/favicon/48.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(setting_with_key('logo')->value); ?>">
        <link rel="icon" type="image/png" sizes="any" href="<?php echo e(setting_with_key('logo')->value); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php $__env->startSection('title'); ?> - <?php echo e(setting_with_key('banner')->value); ?> <?php echo $__env->yieldSection(); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name=robots content="INDEX,FOLLOW"/>
        <link rel="stylesheet" href="/public/css/app.rtl.css?<?php echo e($css); ?>">

        <link rel="stylesheet" href="/public/css/font.min.css?<?php echo e($css); ?>">
        <link rel="stylesheet" href="/public/plugin/aos/aos.css?<?php echo e($css); ?>">
        <link rel="stylesheet" href="/public/css/custom-style.css?<?php echo e($css); ?>">
        <link rel="stylesheet" href="/admin/css/sweet-alert.css">
        <link rel="stylesheet" href="/admin/css/toastr.css">
        <?php echo $__env->yieldContent('style'); ?>
    </head>
    <body class="index-page">
    <?php $menus = \App\Models\Menu::orderBy('sort','desc')->get() ?>
    <div id="app" class="layout-horizontal">
        <?php echo $__env->make('layouts.layout public.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.layout public.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.layout public.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>



        <script type="text/javascript" src="/public/js/app.js?<?php echo e($js); ?>"></script>
    <script type="text/javascript" src="/public/plugin/aos/aos.js?<?php echo e($js); ?>"></script>
    <script type="text/javascript" src="/admin/js/sweet-alert.min.js"></script>
    <script type="text/javascript" src="/admin/js/toastr.js"></script>
    <script type="text/javascript" src="/public/js/custom.js?<?php echo e($js); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/layouts/layout public/index.blade.php ENDPATH**/ ?>