@extends('layouts.layout site.index')
@section('body',"hold-transition login-page")

@section('content')

    <div class=" login-box" >
        <h3 class="text-center"><b>بازیابی رمز</b></h3>
        @include('alert.alert.error')
        @include('alert.alert.success')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">رمز عبور جدید را وارد کنید</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group mb-3">
                        <input
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل خود را وارد کنید">
                        <div class="input-group-append">
                            <span class="fa fa-envelope  input-group-text"></span>
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

                    <button  type="submit" class="btn btn-block btn-flat btn-primary">
                        تغییر رمز
                    </button>

                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))})});
    </script>
@endsection




