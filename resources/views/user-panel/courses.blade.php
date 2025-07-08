@extends('layouts.layout user-panel.index')
@section('courses','bg-primary text-white')
@section('style')
<style>
    .course-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .course-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
    }
    @media (max-width: 768px) {
        .course-image {
            height: 100px;
        }
        .card-body {
            padding: 1rem !important;
        }
    }
</style>
@endsection
@section('page')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">دوره‌های من</h4>
            </div>

            <div class="card-body">
                @if($courses->count() > 0)
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-sm-12 mb-4">
                                <div class="card h-100 shadow-sm border-white course-card">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
                                                <img src="{{ $course->image }}"
                                                     alt="{{ $course->name }}"
                                                     class="img-fluid rounded course-image">
                                            </div>
                                            <div class="col-md-8 col-sm-12">
                                                <h5 class="card-title mb-2">{{ $course->name }}</h5>
                                                <p class="text-muted mb-2">
                                                    <i class="fas fa-fw fa-clock text-primary ml-1"></i>
                                                    {{time_course($course->episodes()->get()->pluck('time')->toArray())}}
                                                </p>
                                                <p class="text-muted mb-2">
                                                    <i class="fas fa-video text-primary ml-1"></i>
                                                    {{ $course->episodes->count() }} قسمت
                                                </p>
                                                <p class="text-muted mb-3">
                                                    <i class="fas fa-calendar text-primary ml-1"></i>
                                                    تاریخ ثبت نام: {{ \Hekmatinasser\Verta\Facades\Verta::instance($course->pivot->created_at ?? $course->created_at)->format('Y/n/j') }}
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge bg-{{ $course->type == 'free' ? 'success' : 'primary' }}">
                                                        {{ array_search($course->type,config('static_array.courseType')) }}
                                                    </span>
                                                    <a href="{{ route('course.detail', $course->slug) }}"
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye ml-1"></i>
                                                        مشاهده دوره
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-graduation-cap text-muted" style="font-size: 4rem;"></i>
                        <h5 class="text-muted mt-3">هنوز در هیچ دوره‌ای ثبت نام نکرده‌اید</h5>
                        <p class="text-muted text-center">برای مشاهده دوره‌های موجود، به صفحه اصلی مراجعه کنید</p>
                        <a href="{{ route('courses') }}" class="btn btn-primary">
                            <i class="fas fa-home ml-1"></i>
                            دوره های آموزشی
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
