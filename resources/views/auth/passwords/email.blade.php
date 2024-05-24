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
        <h3 class="text-center"><b>ایمیل خود را وارد کنید</b></h3>
        @include('alert.toastr.error')
        @include('alert.toastr.success')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">ایمیلی که زمان ثبت نام وارد کردید را وارد کنید</p>
                @include('alert.form.error')
                <form method="POST" action="{{ route('password.email') }}">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                        <input
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل خود را وارد کنید">
                        <div class="input-group-append">
                            <span class="fa fa-envelope  input-group-text"></span>
                        </div>
                    </div>
                    @include('components.captcha.captcha')
                    <br>
                    <button  type="submit" class="btn btn-block btn-flat royal font-weight-bold">
                        تایید
                    </button>

                </form>

                <p class="mb-0 mt-4">
                    <a href="{{ route('reset.password.selectType') }}" class="text-center">بازگشت</a>
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
