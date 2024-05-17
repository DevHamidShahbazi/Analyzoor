@extends('layouts.layout site.index')
@section('body',"hold-transition login-page")

@section('content')

    <div class=" login-box" >
        <h3 class="text-center"><b>شماره موبایل خود را وارد کنید</b></h3>
        @include('alert.alert.error')
        @include('alert.alert.success')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">شماره موبایلی که زمان ثبت نام وارد کردید را وارد کنید</p>
                @if($errors->any())
                    <div style="text-align: center" class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('password.reset.phone.send') }}">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">

                        <input
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus

                            type="number" class="form-control @error('email') is-invalid @enderror" placeholder="شماره موبایل خود را وارد کنید">


                        <div class="input-group-append">

                            <span class="fas fa-mobile-alt input-group-text"></span>
                        </div>
                    </div>
                   @captcha
                    <br>
                    <button  type="submit" class="btn btn-block btn-flat royal-dark font-weight-bold">
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
