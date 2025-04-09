<nav class="header-top p-2 text-white navbar-top royal no-print">
    <div class="d-flex justify-content-between flex-row-reverse">

        <div class="d-flex justify-content-center align-items-center gap-2 p-1">

            <?php if(auth()->check()): ?>
                <div class="dropdown">
                    <a class="user-dropdown text-white d-flex align-items-center dropend dropdown-toggle gap-1" href="#"
                       id="topbarUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class=" hidden-in-responsive">
                            <p class="user-dropdown-name"><?php echo e(auth()->user()->name); ?></p>
                        </div>
                        <div class="avatar avatar-md2 m-0">
                            <img src="<?php echo e(auth()->user()->image); ?>" alt="Avatar">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="<?php echo e(route('user-panel.dashboard')); ?>">
                                پنل کاربری
                                <i class="fa fa-user"></i>
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               href="<?php echo e(route('logout')); ?>">
                                خروج
                                <i class="fa fa-power-off"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>

            <?php else: ?>
                <div style="margin-right: 10px;width: max-content" class="font-weight-bold text-white p-1">
                    <a class="font-weight-bold text-white p-1" href="<?php echo e(route('login')); ?>">ورود</a>
                    /
                    <a class="font-weight-bold text-white p-1" href="<?php echo e(route('register')); ?>">ثبت نام</a>
                </div>
            <?php endif; ?>

            <a href="#" class="burger-btn d-block d-xl-none ml-2">
                <i style="font-size: x-large" class="fa fa-bars text-white"></i>
            </a>

        </div>

        <ul class="d-flex align-items-center scroll-x col-sm-8 hidden-in-responsive px-0 col-lg-auto justify-content-center m-0"
            style="font-size: 10px;gap: 25px">

            <?php if($menus->isNotEmpty()): ?>
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="d-inline-block">
                        <a class="text-white" href="<?php echo e($menu->url); ?>"><?php echo e($menu->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <li class="d-inline-block">
                        <a class="text-white" href="<?php echo e(url('/admin-panel')); ?>">پنل ادمین</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>


            <li class="d-inline-block">
                <a class="text-white" href="<?php echo e(route('Home')); ?>">صفحه اصلی</a>
            </li>

        </ul>

        <div class="d-flex align-items-center p-2 mr-0">
            <a class="text-end" href="<?php echo e(route('Home')); ?>"><img class="col-lg-3 col-md-4 col-sm-5 col-6" src="/public/img/logo/logo-white-text.png" alt="<?php echo e(setting_with_key('logo_alt')->value); ?>" srcset=""></a>
        </div>

    </div>
</nav>

<?php echo $__env->make('alert.default.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/layouts/layout public/navbar.blade.php ENDPATH**/ ?>