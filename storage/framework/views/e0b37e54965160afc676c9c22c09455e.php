<?php $__env->startSection('title'); ?> ورود <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(setting_with_key('description')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(setting_with_key('keywords')->value); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>

        .captcha img {
            width: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="col-12 ">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">
                <div class="card p-3 border-white shadow-lg">
                    <?php echo $__env->make('alert.form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h1 class="text-center mb-3">ورود</h1>
                    <form method="POST" action="<?php echo e(route('login')); ?>">

                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

                        <div class="input-group mb-3">
                            <input dir="rtl"
                                name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus
                                type="text" class="form-control" placeholder="شماره موبایل یا ایمیل خود را وارد کنید">
                            <div class="input-group-append input-group-text">
                                <i class="fas fa-mobile-alt" ></i>
                            </div>
                        </div>
                        <div class="input-group mb-3" id="show_hide_password" >

                            <div class="input-group-append input-group-text">
                                <a href="" class="d-flex align-items-center">
                                    <i class="fa fa-eye-slash " ></i>
                                </a>
                            </div>

                            <input  dir="rtl" name="password" value="<?php echo e(old('password')); ?>" required autocomplete="new-password"
                                   type="password" class="form-control" placeholder="رمز عبور را وارد کنید">

                            <div class="input-group-append input-group-text">
                                <i class="fas fa-lock "></i>
                            </div>
                        </div>
                        <?php echo $__env->make('components.captcha.captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="d-flex justify-content-end">
                                    <div class="checkbox">
                                        <label>
                                            من را به یاد داشته باش
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold my-4">
                            <i class="fas fa-sign-in-alt"></i>
                            ورود
                        </button>




                    </form>

                    <p class="text-start mb-0 mt-4">
                        <a  href="<?php echo e(route('register')); ?>" class="text-center ">هنوز ثبت نام نکرده ام!!</a>
                    </p>


                    <p class="text-start mb-1 mt-3">
                        <a  class="text-danger" href="<?php echo e(route('password.request.phone')); ?>">رمز عبورم را فراموش کرده ام!!</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))});var s=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":s}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(s){$(".captcha").html(s.captcha)},error:function(s){}})})});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout public.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/auth/login.blade.php ENDPATH**/ ?>