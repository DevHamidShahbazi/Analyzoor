@extends('layouts.layout public.index')
@section('title'){{$episode->title}} @parent @endsection
@section('description'){{$episode->description}}@endsection
@section('keywords'){{$episode->keywords}}@endsection


@section('content')

    <section class="pb-0 py-4">
        <div class="container">

            <div class="card shadow rounded-2 mb-2 p-4">
                <div class="col-12">
                    <div class="row">

                        <div class="position-relative w-100" style="min-height: 70vh; background-image: url('/public/img/bg/bg_episode_video.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.4); backdrop-filter: blur(8px);">
                                <div class="bg-white bg-opacity-75 text-dark rounded-lg p-4 p-md-5 text-center shadow" style="max-width: 400px; width: 90%;">
                                    <div class="d-flex justify-content-center align-items-center height-100">
                                        @if($isEnrolled)
                                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                                <i class="fas fa-check-circle me-2"></i>
                                                <span>شما در این دوره ثبت نام کرده اید</span>
                                            </div>
                                        @else
                                            <form method="POST" action="{{ route('payment.set-product') }}" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <button type="submit" class="btn btn-primary">
                                                    {{$course->type == 'free' ? 'ثبت نام در ':'خرید '}} دوره آموزشی
                                                    <i class="fas fa-graduation-cap"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>


                            <h1 class="text-lg-start text-md-start text-center mt-2">{{$episode->name}}</h1>
                    </div>
                </div>
            </div>




            <div class="row">
                    <!-- Main content START -->
                <div class="order-1 col-lg-9">

                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                جلسات دوره
                            </span>
                            <hr>
                            @include('components.public-list-chapter.index', [
                                        'chapters' => $course->chapters()->get(),
                                        'episodes' => $episodes,
                                        'currentEpisode' => $episode
                                    ])
                        </div>
                    </div>

                    <br>


                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                نظرات
                            </span>
                            <hr>
                            @include('components.public-comment.index',['item'=>$episode,'type_route'=>'episode'])
                        </div>
                    </div>

                </div>
                    <!-- Main content END -->

                    <!-- Left sidebar START -->
                    <div class="order-2 col-lg-3 pt-5 pt-lg-0">
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-md-6 col-lg-12">

                                <!-- Course info START -->
                                <div class="card rounded-2 shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h5 class="text-start">اطلاعات دوره</h5>
                                    <hr>
                                    <ul dir="rtl" class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class=" fa-fw {{$course->status == 'comingSoon' ? '': ($course->status=='currently'?'fas fa-history':'fas fa-check')}} text-primary"></i>وضعیت دوره</span>
                                            <span>{{array_search($course->status,config('static_array.courseStatus'))}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-book-open text-primary"></i>تعداد جلسات</span>
                                            <span>{{$episodes->count()}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-clock text-primary"></i>زمان دوره</span>
                                            <span>{{time_course($episodes->pluck('time')->toArray())}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0"><i style="margin-left: 10px" class="fas fa-fw fa-signal text-primary"></i>نوع دوره</span>
                                            <span>{{array_search($course->type,config('static_array.courseType'))}}</span>
                                        </li>
                                    </ul>
                                    <div class="col-12 my-1  d-sm-block">
                                        <br>
                                        <div class="d-flex justify-content-center align-items-center height-100">
                                            @if($isEnrolled)
                                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                                    <i class="fas fa-check-circle me-2"></i>
                                                    <span>شما در این دوره ثبت نام کرده اید</span>
                                                </div>
                                            @else
                                                <form method="POST" action="{{ route('payment.set-product') }}" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{$course->type == 'free' ? 'ثبت نام در ':'خرید '}} دوره آموزشی
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-center">
                                            @include('components.public-price.index',['value'=>$course])
                                        </div>
                                    </div>
                                </div>
                                <!-- Course info END -->
                            </div>

                        </div><!-- Row End -->
                    </div>
                    <!-- Left sidebar END -->
                </div><!-- Row END -->
            </div>
    </section>


    <!-- =======================
    Page content END -->
@endsection
