@extends('layouts.layout public.index')
@section('content')

    @include('alert.toastr.error')
    @include('alert.toastr.success')
    <div class="register-box">

        <div class="register-logo">
            <b class="font-weight-bold">ثبت نام</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">فرم زیر را تکمیل کنید و دکمه ثبت نام را بزنید</p>
                @include('alert.form.error')
                <form method="POST" action="{{ route('register') }}">

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                    <div class="input-group mb-3">
                        <input
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            type="text" class="form-control" placeholder="نام و نام خانوادگی">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                               type="number" class="form-control" placeholder="شماره موبایل">
                        <div class="input-group-append">
                            <span class="fas fa-mobile-alt input-group-text"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3" id="show_hide_password" >
                        <div class="input-group-append">
                            <a href="">
                                <i class="fa fa-eye-slash input-group-text" aria-hidden="true"></i>
                            </a>
                        </div>

                        <input name="password" value="{{ old('password') }}" required autocomplete="new-password"
                               type="password" class="form-control" placeholder="رمز عبور">

                            <div class="input-group-append">
                                <span class="fa fa-lock input-group-text"></span>
                            </div>

                    </div>
                    <div class="input-group mb-3">

                        <input name="password_confirmation" required autocomplete="password_confirmation"
                               type="password" class="form-control" placeholder="تکرار رمز عبور">
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                    @include('components.captcha.captcha')
                    <br>
                    <button  type="submit" class="btn btn-block btn-flat font-weight-bold royal">
                        <i class="fas fa-sign-in-alt"></i>
                        ثبت نام
                    </button>
                    <a href="{{ route('auth.google') }}" class="btn btn-block btn-warning text-dark font-weight-bold">
                        <i class="fab fa-google"></i>
                        ورود با اکانت گوگل
                    </a>
                </form>
                <br>
                <a href="{{ route('login') }}" class="text-center text-primary">من قبلا ثبت نام کرده ام!!</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>


    <br><br><br>
    <br><br><br>


@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))});var s=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":s}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(s){$(".captcha").html(s.captcha)},error:function(s){}})})});
    </script>
@endsection
