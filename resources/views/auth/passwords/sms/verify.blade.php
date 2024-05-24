@extends('layouts.layout public.index')


@section('style')
    <style>

        .captcha img {
            width: 100%;
        }
    </style>
@endsection


@section('content')

    <div class=" login-box" >
        <h3 class="text-center"><b>کد ارسال شده را وارد کنید</b></h3>
        @include('alert.toastr.error')
        @include('alert.toastr.success')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">کد به شماره {{ request()->session()->get('phone') }} ارسال شده است</p>
                @include('alert.form.error')
                <form method="POST" action="{{ route('password.reset.verify.phone') }}">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">

                        <input
                            name="code" value="{{ old('code') }}" required autocomplete="code" autofocus

                            type="number" class="form-control @error('code') is-invalid @enderror" placeholder="کد ارسال شده را وارد کنید">


                        <div class="input-group-append">
                            <span class="fa fa-mobile-phone input-group-text"></span>
                        </div>
                    </div>

                    @include('components.captcha.captcha')
                    <br>
                    <button  type="submit" class="btn btn-block btn-flat btn-info">
                        تایید
                    </button>
                </form>
                <br>
                <form method="POST" action="{{ route('password.reset.phone.again.send') }}">
                    @csrf
                    <button  href="" class="btn btn-block btn-flat btn-outline-secondary">
                        دوباره ارسال کن
                    </button>
                </form>

                <p class="mb-0 mt-4">
                    <a href="{{ route('password.request.phone') }}" class="text-center">بازگشت</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){var c=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":c}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(c){$(".captcha").html(c.captcha)},error:function(c){}})})});
    </script>
@endsection
