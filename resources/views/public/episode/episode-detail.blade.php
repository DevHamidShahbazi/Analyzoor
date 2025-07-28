@extends('layouts.layout public.index')
@section('title'){{$episode->title}} @parent @endsection
@section('description'){{$episode->description}}@endsection
@section('keywords'){{$episode->keywords}}@endsection



@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle video download
    document.getElementById('downloadVideoBtn').addEventListener('click', function(e) {
        e.preventDefault();
        generateDownloadToken('video');
    });

    // Handle file download
    document.getElementById('downloadFileBtn').addEventListener('click', function(e) {
        e.preventDefault();
        generateDownloadToken('file');
    });

    function generateDownloadToken(fileType) {
        const button = fileType === 'video' ? document.getElementById('downloadVideoBtn') : document.getElementById('downloadFileBtn');
        const spinner = button.querySelector('.loading-spinner');
        const originalText = button.innerHTML;

        // Show loading state
        button.disabled = true;
        spinner.style.display = 'inline-block';
        button.innerHTML = '<div class="loading-spinner"></div> در حال آماده‌سازی...';

        const url = fileType === 'video'
            ? '{{ route("episode.generate.video.token", $episode) }}'
            : '{{ route("episode.generate.file.token", $episode) }}';

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to download
                window.location.href = data.download_url;
            } else {
                toastr.error(data.message, 'خطا در آماده‌سازی دانلود!')
            }
        })
        .catch(error => {
            console.error('Error:', error);
            toastr.error('خطا در ارتباط با سرور', 'خطا')
        })
        .finally(() => {
            // Reset button state
            button.disabled = false;
            button.innerHTML = originalText;
        });
    }
});
</script>
@endsection

@section('content')

    <section class="pb-0 py-4">
        <div class="container">

            <!-- Download Section -->
            <div class="download-section">
                @if($isEnrolled)
                    <div class="download-grid {{ !$episode->file ? 'single-item' : '' }}">

                        @if($episode->file)
                            <div class="download-item">
                                <div class="download-icon file">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="download-title">فایل آموزشی</div>
                                <div class="download-info">فایل تکمیلی دوره</div>
                                <button id="downloadFileBtn" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    دانلود فایل
                                    <div class="loading-spinner"></div>
                                </button>
                            </div>
                        @endif

                        @if($episode->video)
                            <div class="download-item">
                                <div class="download-icon video">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="download-title">فایل ویدیو</div>
                                <div class="download-info">مدت زمان: {{$episode->time}}</div>
                                <button id="downloadVideoBtn" class="download-btn">
                                    <i class="fas fa-download"></i>
                                    دانلود ویدیو
                                    <div class="loading-spinner"></div>
                                </button>
                            </div>
                        @endif


                    </div>

                    @if(!$episode->video && !$episode->file)
                        <div class="text-center">
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                در حال حاضر فایلی برای دانلود موجود نیست
                            </div>
                        </div>
                    @endif

                @else
                    <div class="access-denied">
                        <p class="text-center">برای دانلود فایل‌های این جلسه، ابتدا باید در دوره ثبت نام کنید</p>
                        <form method="POST" action="{{ route('payment.set-product') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="enroll-btn">
                                {{$course->type == 'free' ? 'ثبت نام رایگان' : 'خرید دوره'}}
                                <i class="fas fa-graduation-cap ms-2"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Episode Content for SEO -->
            @if($episode->body)
                <div class="card rounded-2 shadow p-4 mb-4">
                    <h1 class="episode-title text-center m-0">{{$episode->name}}</h1>
                    <br>
                    {!! $episode->body !!}
                </div>
            @endif

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
                                        'currentEpisode' => $episode,
                                        'isEnrolled' => $isEnrolled
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
                                                    <i class="fas fa-check-circle m-2"></i>
                                                    <span>شما ثبت نام کرده اید</span>
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
