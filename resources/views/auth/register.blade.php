@extends('layouts.layout public.index')

@section('style')
    <style>

        .captcha img {
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">

                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <h1 class="text-center mb-3">ثبت نام</h1>
                    <form method="POST" action="{{ route('register') }}">

                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


                        <div class="input-group mb-3">
                            <input dir="rtl"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                type="text" class="form-control" placeholder="نام و نام خانوادگی">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-user "></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input dir="rtl" name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                   type="number" class="form-control" placeholder="شماره موبایل">
                            <div class="input-group-append input-group-text">
                                <span class="fas fa-mobile-alt"></span>
                            </div>
                        </div>

                        <div class="input-group mb-3" id="show_hide_password" >
                            <div class="input-group-append input-group-text">
                                <a href="" class="d-flex align-items-center">
                                    <i class="fa fa-eye-slash " ></i>
                                </a>
                            </div>

                            <input dir="rtl" name="password" value="{{ old('password') }}" required autocomplete="new-password"
                                   type="password" class="form-control" placeholder="رمز عبور">

                            <div class="input-group-append input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>

                        </div>
                        <div class="input-group mb-3">

                            <input dir="rtl" name="password_confirmation" required autocomplete="password_confirmation"
                                   type="password" class="form-control" placeholder="تکرار رمز عبور">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                        @include('components.captcha.captcha')

                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold  my-4">
                            <i class="fas fa-sign-in-alt"></i>
                            ثبت نام
                        </button>
{{--                        <a href="{{ route('auth.google') }}" class="btn btn-block btn-warning font-weight-bold">--}}
{{--                            <i class="fab fa-google"></i>--}}
{{--                            ورود با اکانت گوگل--}}
{{--                        </a>--}}

                    </form>

                    <p class="text-start mb-0 mt-4">
                        <a  href="{{ route('login') }}" class="text-center ">من قبلا ثبت نام کرده ام!!</a>
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
