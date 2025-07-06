@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')

    @if(session('error'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "خطا",
                    text: "{{ session('error') }}",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonText: "باشه",
                    closeOnConfirm: true
                });
            });
        </script>
    @endif

    @if(session('success'))
        <script>
            $(document).ready(function() {
                toastr.success("{{ session('success') }}", 'انجام شد');
            });
        </script>
    @endif

    <section style="min-height: 100vh" dir="rtl" class="pb-0 py-4">
        <div class="container">
            <div class="row">
                <!-- Right side - Product Information -->
                <div class="col-lg-8">
                    <div class="card shadow rounded-2 mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary text-center mb-4">اطلاعات دوره</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ $course->image }}" alt="{{ $course->alt }}" class="img-fluid rounded" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="font-weight-bold my-3">{{ $course->name }}</h5>
                                    <p class="text-muted my-3">{{ $course->paragraph }}</p>

                                    <div class="row">

                                        <!-- Price Display -->
                                        <div dir="ltr" class="col-6">
                                            <div class="d-flex justify-content-center">
                                                @include('components.public-price.index',['value'=>$course])
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div dir="rtl" class="d-flex align-items-center mb-2 gap-2">
                                                وضعیت: <span class="text-primary font-weight-bold "> {{ array_search($course->status, config('static_array.courseStatus')) }}</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2 gap-2">
                                                نوع: <span class="text-primary font-weight-bold "> {{ array_search($course->type, config('static_array.courseType')) }}</span>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left side - Payment Box -->
                <div class="col-lg-4">
                    <div class="card shadow rounded-2">
                        <div class="card-body p-4">
                            <h5 class="text-center mb-4">خلاصه سفارش</h5>
                            <hr>
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>نام دوره:</span>
                                    <span class="font-weight-bold">{{ $course->name }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>قیمت:</span>
                                    <span class="font-weight-bold">
                                    @if($course->type == 'premium')
                                            {{ $course->discount ? number_format($course->discount) : number_format($course->price) }} تومان
                                        @else
                                            رایگان
                                        @endif
                                </span>
                                </div>
                            </div>

                            <div class="border-bottom pb-3 mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="font-weight-bold">قیمت نهایی:</span>
                                    <span class="font-weight-bold text-primary" style="font-size: 1.1rem;">
                                    @if($course->type == 'premium')
                                            {{ $course->discount ? number_format($course->discount) : number_format($course->price) }} تومان
                                        @else
                                            رایگان
                                        @endif
                                </span>
                                </div>
                            </div>

                            <!-- Payment Button -->
                            <div class="text-center">
                                @if($course->type == 'premium')
                                    <button class="btn btn-primary btn-lg w-100" onclick="processPayment()">
                                        پرداخت
                                        <i class="fas fa-credit-card ml-2"></i>
                                    </button>
                                @else
                                    <button class="btn btn-success btn-lg w-100" onclick="enrollFree()">
                                        ثبت نام رایگان
                                        <i class="fas fa-user-plus ml-2"></i>
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        function processPayment() {
            // Here you can implement the actual payment gateway integration
            swal({
                title: "در حال انتقال",
                text: "در حال انتقال به درگاه پرداخت...",
                type: "info",
                showCancelButton: false,
                confirmButtonText: "باشه",
                closeOnConfirm: true
            });
            // Example: window.location.href = '/payment/gateway';
        }

        function enrollFree() {
            // Here you can implement free course enrollment
            swal({
                title: "ثبت نام موفق",
                text: "ثبت نام در دوره رایگان با موفقیت انجام شد",
                type: "success",
                showCancelButton: false,
                confirmButtonText: "باشه",
                closeOnConfirm: true
            });
            // Example: window.location.href = '/course/enroll-free';
        }
    </script>
@endsection
