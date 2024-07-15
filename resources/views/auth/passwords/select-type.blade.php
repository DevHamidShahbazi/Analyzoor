@extends('layouts.layout public.index')

@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')

    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-lg-3">
                <h3 class="text-center"><b>نوع درخواست را انتخاب کنید</b></h3>
                <div class="card p-3 border-white shadow-lg">
                    @include('alert.form.error')
                    <p class="text-center">یک روش را انتخاب کنید</p>

                    <a dir="rtl" href="{{ route('password.request.phone') }}" class="btn btn-block btn-outline-light font-weight-bold btn-d mt-2">
                        بازیابی با رمز شماره تلفن
                        <i class="fa fa-phone mr-2"></i>
                    </a>
                    <a dir="rtl" href="{{ route('password.request') }}" class="btn btn-block btn-outline-danger font-weight-bold mt-2">
                        بازیابی رمز با ایمیل
                        <i class="fa fa-envelope-open mr-2"></i>
                    </a>

                    <div dir="rtl" class="col-12 text-center mt-3"><a href="{{ route('login') }}">بازگشت</a></div>

                </div>
            </div>
        </div>
    </div>

@endsection


