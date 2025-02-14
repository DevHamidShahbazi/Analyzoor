@extends('layouts.layout public.index')


@section('content')


    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="col-lg-3">
                <h3 class="text-center"><b>بازیابی رمز</b></h3>
                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <p class="text-center">رمز عبور جدید را وارد کنید</p>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <input
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus dir="rtl"
                                type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل خود را وارد کنید">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-envelope  "></span>
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
                                <span class="fa fa-lock "></span>
                            </div>

                        </div>
                        <div class="input-group mb-3">
                            <input name="password_confirmation" required autocomplete="password_confirmation" dir="rtl"
                                   type="password" class="form-control" placeholder="تکرار رمز عبور">
                            <div class="input-group-append input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>

                        <button  type="submit" class="btn btn-block btn-primary font-weight-bold my-4">
                            تغییر رمز
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))})});
    </script>
@endsection




