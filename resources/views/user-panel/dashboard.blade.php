@extends('layouts.layout user-panel.index')
@section('dashboard','bg-primary text-white')
@section('page')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">ویرایش اطلاعات</h4>
            </div>

            <div class="card-body pb-0">
                <form method="POST" action="{{ route('user-panel.update.profile') }}"  enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="basicInput">نام و نام خانوادگی</label>
                                    <input value="{{auth()->user()->name}}" name="name" type="text" class="form-control" id="basicInput" placeholder="لطفا نام و نام خانوادگی خود را وارد کنید">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="basicInput">شماره موبایل</label>
                                    <input value="{{auth()->user()->phone}}" name="phone" type="text" class="form-control @if(auth()->user()->verify=='0' && auth()->user()->phone != null) is-invalid @endif" id="basicInput" placeholder="لطفا شماره موبایل خود را وارد کنید">
                                    @if(auth()->user()->verify==0 && auth()->user()->phone != null)
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            شماره تلفن شما تایید نشده است
                                        </div>
                                    @endif
                                </div>
                            </div>

{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group my-2">--}}
{{--                                    <label for="basicInput">ایمیل</label>--}}
{{--                                    <input value="{{auth()->user()->email ?? ''}}" disabled type="text" class="form-control" id="basicInput" placeholder="امکان ویرایش ایمیل وجود ندارد">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="col-12 text-center my-4">
                                <button type="submit" class="btn btn-outline-primary">ویرایش</button>
                            </div>
                        </div>

                    </form>
            </div>
        </div>
    </section>
@endsection
