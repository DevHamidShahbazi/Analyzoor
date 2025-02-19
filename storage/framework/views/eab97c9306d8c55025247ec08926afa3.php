<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">


            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a class="col-12" href="<?php echo e(route('Home')); ?>"><img class="col-12" src="<?php echo e(setting_with_key('logo')->value); ?>" alt="<?php echo e(setting_with_key('logo_alt')->value); ?>" srcset=""></a>
                </div>

            </div>


        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="sidebar-item ">
                        <a target="_blank" href="<?php echo e($menu->url); ?>" class='sidebar-link justify-content-center'>
                            <span><?php echo e($menu->name); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php if(auth()->guard()->check()): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <li class="sidebar-item ">
                                <a target="_blank" href="<?php echo e(url('/admin-panel')); ?>" class='sidebar-link justify-content-center'>
                                    <span>پنل مدیریت</span>
                                </a>
                            </li>

                        <?php endif; ?>
                    <?php endif; ?>



                <?php $__currentLoopData = \App\Models\Category::with('children')->where('parent_id','0')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link justify-content-end'>
                            <span><?php echo e($parentCategory->name); ?></span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item ">
                                <a href="<?php echo e(route('parent.article.category',$parentCategory->slug)); ?>" class="submenu-link py-3">
                                    نمایش همه زیرمجموعه ها
                                </a>
                            </li>

                            <?php $__currentLoopData = $parentCategory->children()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="submenu-item ">
                                    <a href="<?php echo e(route('child.article.category',$childCategory->slug)); ?>" class="submenu-link py-3">
                                        <?php echo e($childCategory->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>


                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\fanoram\resources\views\layouts\layout public\sidebar.blade.php ENDPATH**/ ?>