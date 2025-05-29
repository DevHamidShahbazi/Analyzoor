<div id="sidebar">
    <div class="sidebar-wrapper royal-dark active">
        <div class="sidebar-header position-relative">


            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a class="col-6" href="<?php echo e(route('Home')); ?>"><img class="col-12" src="/public/img/logo/logo-white-text.png" alt="<?php echo e(setting_with_key('logo_alt')->value); ?>" srcset=""></a>
                </div>
            </div>

            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i style="font-size: x-large" class="fas fa-times text-white"></i></a>
            </div>
        </div>
        <div class="sidebar-menu">

            <ul class="menu">

                <?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <li class="sidebar-item ">
                            <a target="_blank" href="<?php echo e(url('/admin-panel')); ?>" class='sidebar-link justify-content-center'>
                                <span class="text-white">پنل مدیریت</span>
                            </a>
                        </li>

                    <?php endif; ?>
                <?php endif; ?>

                    <li class="sidebar-item ">
                        <a target="_blank" href="<?php echo e(route('Home')); ?>" class='sidebar-link justify-content-center'>
                            <span class="text-white">صفحه اصلی</span>
                        </a>
                    </li>

                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="sidebar-item ">
                        <a target="_blank" href="<?php echo e($menu->url); ?>" class='sidebar-link justify-content-center'>
                            <span class="text-white"><?php echo e($menu->name); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



































            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/layouts/layout public/sidebar.blade.php ENDPATH**/ ?>