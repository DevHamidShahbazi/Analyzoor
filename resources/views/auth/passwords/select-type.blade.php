@extends('layouts.layout site.index')
@section('body',"hold-transition login-page")

@section('content')
    @include('alert.swal.error')
    @include('alert.swal.success')
    <div class=" login-box" >
        <h3 class="text-center"><b>نوع درخواست را انتخاب کنید</b></h3>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    یک روش را انتخاب کنید
                </p>
                <a href="{{ route('password.request') }}" class="btn btn-block royal font-weight-bold mt-2">
                     بازیابی رمز با ایمیل
                    <i class="fa fa-envelope-open mr-2"></i>
                </a>
                <a href="{{ route('password.request.phone') }}" class="btn btn-block btn-info royal-dark font-weight-bold btn-d mt-2">
                     بازیابی با رمز شماره تلفن
                    <i class="fa fa-phone mr-2"></i>
                </a>
                <br>
                <div style="text-align: center" class="col-12"><a href="{{ route('login') }}">بازگشت</a></div>
            </div>
        </div>
    </div>
@endsection


