@extends('layouts.layout public.index')
@section('title'){{$course->title}} @parent @endsection
@section('description'){{$course->description}}@endsection
@section('keywords'){{$course->keywords}}@endsection


@section('style')
    <style>
        .show-more {
            position:relative;
            text-align: center;
            cursor: pointer;
        }
        .show-more-height {
            height: 375px;
            overflow:hidden;
        }

        /* Modern Dropdown Styling */
        .modern-accordion {
            border: none !important;
            box-shadow: 0 2px 10px rgba(140, 78, 244, 0.1);
            border-radius: 12px !important;
            margin-bottom: 16px !important;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .modern-accordion .accordion-header {
            background: linear-gradient(135deg, #2b425d 0%, #15549f 100%);
            border: none;
            border-radius: 12px !important;
            margin: 0;
        }

        .modern-accordion .accordion-button {
            background: transparent !important;
            border: none !important;
            color: white !important;
            font-weight: 600 !important;
            padding: 20px 24px !important;
            border-radius: 12px !important;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .modern-accordion .accordion-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modern-accordion .accordion-button:hover::before {
            opacity: 1;
        }

        .modern-accordion .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #15549f 0%, #2b425d 100%) !important;
            color: white !important;
            box-shadow: 0 4px 15px #2b425d;
        }

        .modern-accordion .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            transition: transform 0.3s ease;
        }

        .modern-accordion .accordion-button:not(.collapsed)::after {
            transform: rotate(180deg);
        }

        .modern-accordion .accordion-collapse {
            border: none;
        }

        .modern-accordion .accordion-body {
            background: #f8f9ff;
            border: none;
            padding: 24px;
            border-radius: 0 0 12px 12px;
        }

        /* Episode styling within accordion */
        .modern-accordion .episode-item {
            background: white;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 12px;
            border: 1px solid rgba(140, 78, 244, 0.1);
            transition: all 0.3s ease;
        }



        .modern-accordion .episode-link {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }



        .modern-accordion .episode-time {
            color: #666;
            font-size: 0.9rem;
        }

        .modern-accordion .episode-btn {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .modern-accordion .episode-btn.btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .modern-accordion .episode-btn.btn-outline-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modern-accordion .accordion-button {
                padding: 16px 20px !important;
                font-size: 0.95rem;
            }

            .modern-accordion .accordion-body {
                padding: 16px;
            }

            .modern-accordion .episode-item {
                padding: 12px;
            }
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script>
        $(".show-more").click(function () {
            if($(".content-exp").hasClass("show-more-height")) {
                $(this).addClass('d-none');
            }
            $(".content-exp").toggleClass("show-more-height");
        });
    </script>
@endsection


@section('content')

    <section class="pb-0 py-4">
        <div class="container">
            @include('components.public-course-top-price.index', ['isEnrolled' => $isEnrolled])
            <div class="row">
                    <!-- Main content START -->
                <div class="order-1 col-lg-9">

                    <div  class="card shadow rounded-2 mb-2 p-4">
                            <article  class="col-12 text-start content-exp show-more-height" >
                               {!! $course->body !!}
                            </article>
                        <div class="col-12 text-center">
                            <div class="btn btn-md btn-outline-primary font-weight-bold show-more">
                                <i class="fas fa-eye"></i>
                                ادامه مطلب
                            </div>
                        </div>
                        @include('components.public-questions.index',['data'=>$questions])
                    </div>

                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                جلسات دوره
                            </span>
                            <hr>
                            @include('components.public-list-chapter.index',['chapters'=>$chapters,'episodes'=>$episodes])
                        </div>
                    </div>

                    <br>


                    <div class="card shadow rounded-2 mb-2 p-4">
                        <div class="col-12 text-start">
                            <span class="fs-4 font-weight-bold mb-2 text-primary">
                                نظرات دوره
                            </span>
                            <hr>
                            @include('components.public-comment.index',['item'=>$course,'type_route'=>'course'])
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
                                    <div class="col-12 my-1 d-lg-none d-sm-block">
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
