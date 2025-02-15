@extends('layouts.layout public.index')
@section('title') ورود @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('style')
    <style>

        .captcha img {
            width: 100%;
        }
    </style>
@endsection


@section('content')

    <div class="col-12 ">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">
                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <h1 class="text-center mb-3">ورود</h1>
                    <form method="POST" action="{{ route('login') }}">

                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="input-group mb-3">
                            <input dir="rtl"
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
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

                            <input  dir="rtl" name="password" value="{{ old('password') }}" required autocomplete="new-password"
                                   type="password" class="form-control" placeholder="رمز عبور را وارد کنید">

                            <div class="input-group-append input-group-text">
                                <i class="fas fa-lock "></i>
                            </div>
                        </div>
                        @include('components.captcha.captcha')
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="d-flex justify-content-end">
                                    <div class="checkbox">
                                        <label>
                                            من را به یاد داشته باش
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold my-4">
                            <i class="fas fa-sign-in-alt"></i>
                            ورود
                        </button>
{{--                        <a href="{{ route('auth.google') }}" class="btn btn-block btn-warning font-weight-bold">--}}
{{--                            <i class="fab fa-google"></i>--}}
{{--                            ورود با اکانت گوگل--}}
{{--                        </a>--}}
                    </form>

                    <p class="text-start mb-0 mt-4">
                        <a  href="{{ route('register') }}" class="text-center ">هنوز ثبت نام نکرده ام!!</a>
                    </p>


                    <p class="text-start mb-1 mt-3">
                        <a  class="text-danger" href="{{ route('password.request.phone') }}">رمز عبورم را فراموش کرده ام!!</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))});var s=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":s}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(s){$(".captcha").html(s.captcha)},error:function(s){}})})});
    </script>
@endsection
