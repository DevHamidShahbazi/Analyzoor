<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3">
                <div  style="text-align: center"></div>
                <a href="#" style="text-align: center" class="d-block">Fanoram</a>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php $__env->startSection('dashboard'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link <?php $__env->startSection('users'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fa fa-users"></i>
                            <?php if(notify_user_new()): ?>
                                <span class="badge badge-danger right"><?php echo e(notify_user_new()); ?></span>
                            <?php endif; ?>
                            <p>
                                لیست کاربران
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.visit.index')); ?>" class="nav-link <?php $__env->startSection('visits'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-chart-bar"></i>
                            <p>
                                آمار بازدید
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link <?php $__env->startSection('category'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="nav-icon fa fa-list-ol"></i>
                            <p>
                                 دسته بندی ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.article.index')); ?>" class="nav-link <?php $__env->startSection('Articles'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fa fa-book"></i>
                            <p>
                                مقالات
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.comment.index')); ?>" class="nav-link <?php $__env->startSection('comment'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fa fa-comment 2x"></i>
                            <?php if(notify_comment_new()): ?>
                                <span class="badge badge-danger right"><?php echo e(notify_comment_new()); ?></span>
                            <?php endif; ?>
                            <p>نظرات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.url.index')); ?>" class="nav-link <?php $__env->startSection('urls'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-download"></i>
                            <p>
                                لینک های دانلود
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.file.index')); ?>" class="nav-link <?php $__env->startSection('files'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-images"></i>
                            <p>
                                بارگذاری ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.private-file.index')); ?>" class="nav-link <?php $__env->startSection('private_files'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-lock"></i>
                            <p>
                                بارگذاری های خصوصی
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.message.index')); ?>" class="nav-link <?php $__env->startSection('messages'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-envelope"></i>
                            <?php if(notify_message_new()): ?>
                                <span class="badge badge-danger right"><?php echo e(notify_message_new()); ?></span>
                            <?php endif; ?>
                            <p>تماس با ما</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.menu.index')); ?>" class="nav-link <?php $__env->startSection('menus'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fas fa-stream"></i>
                            <p>
                                منو ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link <?php $__env->startSection('setting'); ?> <?php echo $__env->yieldSection(); ?>">
                            <i class="fa fa-cogs"></i>
                            <p>
                                تنظیمات
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\fanoram\resources\views/layouts/layout admin/sideBar.blade.php ENDPATH**/ ?>