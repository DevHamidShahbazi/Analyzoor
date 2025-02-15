@extends('layouts.layout public.index')
@section('title') بازیابی @parent @endsection
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


    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">
                <h3 class="text-center"><b>شماره موبایل خود را وارد کنید</b></h3>
                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <p class="text-center">شماره موبایلی که زمان ثبت نام وارد کردید را وارد کنید</p>
                    <form method="POST" action="{{ route('password.reset.phone.send') }}">

                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <div class="input-group mb-3">

                            <input
                                name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus dir="rtl"

                                type="number" class="form-control @error('email') is-invalid @enderror" placeholder="شماره موبایل خود را وارد کنید">


                            <div class="input-group-append input-group-text">

                                <span class="fas fa-mobile-alt"></span>
                            </div>
                        </div>
                        @include('components.captcha.captcha')
                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold my-4">
                            تایید
                        </button>
                    </form>
                    <p class="text-start mb-1 mt-3">
                        <a dir="rtl" href="{{ route('login') }}" class="text-center">بازگشت</a>
                    </p>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){var c=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":c}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(c){$(".captcha").html(c.captcha)},error:function(c){}})})});
    </script>
@endsection
