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
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-lg-3">
                <h3 class="text-center"><b>کد ارسال شده را وارد کنید</b></h3>
                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <p class="text-center">کد به شماره {{ request()->session()->get('phone') }} ارسال شده است</p>
                    <form method="POST" action="{{ route('password.reset.verify.phone') }}">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="input-group mb-3">

                            <input
                                name="code" value="{{ old('code') }}" required autocomplete="code" autofocus dir="rtl"
                                type="number" class="form-control @error('code') is-invalid @enderror" placeholder="کد ارسال شده را وارد کنید">


                            <div class="input-group-append input-group-text">
                                <i class="fas fa-mobile-alt" ></i>
                            </div>
                        </div>
                        @include('components.captcha.captcha')
                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold my-4">
                            <i class="fas fa-sign-in-alt"></i>
                            تایید
                        </button>

                    </form>

                    <form method="POST" action="{{ route('password.reset.phone.again.send') }}">
                        @csrf
                        <button  href="" class="btn btn-block btn-flat btn-outline-secondary">
                            دوباره ارسال کن
                        </button>
                    </form>

                    <p class="text-start mb-0 mt-4">
                        <a  href="{{ route('password.request.phone') }}" class="text-center">بازگشت</a>
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
