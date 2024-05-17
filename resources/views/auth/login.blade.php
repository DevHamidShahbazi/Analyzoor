@extends('layouts.layout public.index')

@section('style')
    <style>

        .captcha img {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')
            <div class=" login-box" >

                <div class="login-logo">
                    <b class="font-weight-bold">ورود</b>
                </div>

                <div class="card">
                    <div class="card-body login-card-body">
                        @include('alert.form.error')
                        <p class="login-box-msg">فرم زیر را تکمیل کنید و دکمه ورود را بزنید</p>
                        <form method="POST" action="{{ route('login') }}">

                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            <div class="input-group mb-3">
                                <input
                                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus

                                    type="text" class="form-control" placeholder="شماره موبایل یا ایمیل خود را وارد کنید">
                                <div class="input-group-append">
                                    <i class="fas fa-mobile-alt  input-group-text"></i>
                                </div>
                            </div>
                            <div class="input-group mb-3" id="show_hide_password" >
                                <div class="input-group-append">
                                    <a href="">
                                        <i class="fa fa-eye-slash input-group-text" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <input name="password" value="{{ old('password') }}" required autocomplete="new-password"
                                       type="password" class="form-control" placeholder="رمز عبور را وارد کنید">

                                <div class="input-group-append">
                                    <i class="fas fa-lock input-group-text"></i>
                                </div>
                            </div>
                            @include('components.captcha.captcha')
                            <div class="row">
                                <div class="col-8 mt-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            من را به یاد داشته باش
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button  type="submit" class="btn btn-block btn-flat font-weight-bold royal">
                                <i class="fas fa-sign-in-alt"></i>
                                ورود
                            </button>
                            <a href="{{ route('auth.google') }}" class="btn btn-block btn-warning font-weight-bold text-dark">
                                <i class="fab fa-google"></i>
                                ورود با اکانت گوگل
                            </a>
                        </form>

                        <p class="mb-1 mt-3">
{{--                            <a class="text-danger" href="{{ route('reset.password.selectType') }}">رمز عبورم را فراموش کرده ام!!</a>--}}
                        </p>

                        <p class="mb-0 mt-4">
                            <a href="{{ route('register') }}" class="text-center text-primary">هنوز ثبت نام نکرده ام!!</a>
                        </p>

                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>


{{--    @php $user = \App\Models\User::all() @endphp--}}
{{--    <ul class="text-center">--}}
{{--        @foreach($user as $val)--}}
{{--            <li>--}}
{{--                name = {{ $val->name }}--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                Level = {{ $val->level }}--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                email = {{ $val->email }}--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                phone = {{ $val->phone }}--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                pass = {{ \Illuminate\Support\Facades\Crypt::decrypt($val->crypt) }}--}}
{{--            </li>--}}
{{--            <hr>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection



@section('script')
    <script type="text/javascript">
        $(document).ready(function(){$("#show_hide_password a").on("click",function(s){s.preventDefault(),"text"==$("#show_hide_password input").attr("type")?($("#show_hide_password input").attr("type","password"),$("#show_hide_password i").addClass("fa-eye-slash"),$("#show_hide_password i").removeClass("fa-eye")):"password"==$("#show_hide_password input").attr("type")&&($("#show_hide_password input").attr("type","text"),$("#show_hide_password i").removeClass("fa-eye-slash"),$("#show_hide_password i").addClass("fa-eye"))});var s=$("#token").val();$.ajaxSetup({headers:{"X-CSRF-TOKEN":s}}),$(".btnRefresh").click(function(){$.ajax({url:"/refresh/captcha",type:"POST",success:function(s){$(".captcha").html(s.captcha)},error:function(s){}})})});
    </script>
@endsection
