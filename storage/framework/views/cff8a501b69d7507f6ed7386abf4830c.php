<header class="mb-4">
    <div class="header-top p-3">
        <div class="container">
           <div class="col-12 p-0">
               <div class="d-flex justify-content-between">


                   <a class="col-md-3 col-8 p-0" style="text-align: left" href="<?php echo e(route('Home')); ?>">
                       <img class="col-2" src="<?php echo e(setting_with_key('logo')->value); ?>" alt="<?php echo e(setting_with_key('logo_alt')->value); ?>">
                   </a>


                   <div class="header-top-right col-md-3 p-0">

                        <?php if(auth()->check()): ?>
                           <div class="dropdown">
                               <a class="user-dropdown d-flex align-items-center dropend dropdown-toggle gap-1" href="#" id="topbarUserDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
                                   <div class=" hidden-in-responsive">
                                       <h6 class="user-dropdown-name"><?php echo e(auth()->user()->name); ?></h6>
                                   </div>
                                   <div class="avatar avatar-md2 m-0" >
                                       <img src="<?php echo e(auth()->user()->image); ?>" alt="Avatar">
                                   </div>
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                   <li><a class="dropdown-item" href="<?php echo e(route('user-panel.dashboard')); ?>">
                                           پنل کاربری
                                           <i class="fa fa-user"></i>
                                       </a></li>
                                   <li><hr class="dropdown-divider"></li>

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
                           <a href="<?php echo e(route('login')); ?>" class="font-weight-bold">
                               ورود / ثبت نام
                           </a>
                        <?php endif; ?>

                   <!-- Burger button responsive -->
                       <a href="#" class="burger-btn d-block d-xl-none">
                           <i style="font-size: x-large" class="fa fa-bars"></i>
                       </a>
                   </div>
                </div>

              <div class="col-12 p-2 d-xl-none">

                  <form  method="GET" action="<?php echo e(route('search')); ?>" class="form-inline">
                      <div class="d-flex justify-content-center">
                          <div class="col-md-6 col-10">
                              <input value="<?php echo e(request()->query('name') ?? ''); ?>" autoComplete="off" dir="rtl" class="form-control mr-sm-2" name="name" type="search" placeholder="جستحو" aria-label="جستحو">
                          </div>
                      </div>
                  </form>

              </div>

           </div>
        </div>
    </div>


    <nav class="main-navbar">
        <div class="d-flex justify-content-between ">
            <form  method="GET" action="<?php echo e(route('search')); ?>" class="form-inline">
                <input value="<?php echo e(request()->query('name') ?? ''); ?>" autoComplete="off" dir="rtl" class="form-control mr-sm-2" name="name" type="search" placeholder="جستحو" aria-label="جستحو">
            </form>
            <ul>
                <?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>

                        <li
                            class="menu-item  ">
                            <a target="_blank" href="<?php echo e(url('/admin-panel')); ?>" class='menu-link'>
                            <span>پنل مدیریت</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li
                        class="menu-item  ">
                        <a href="<?php echo e($menu->url); ?>" class='menu-link'>
                            <span>
                                <?php echo e($menu->name); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>



        </div>
    </nav>

</header>

<?php echo $__env->make('alert.default.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\fanoram\resources\views/layouts/layout public/navbar.blade.php ENDPATH**/ ?>