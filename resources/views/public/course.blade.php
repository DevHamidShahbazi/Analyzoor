@extends('layouts.layout public.index')
@section('title'){{setting_with_key('article_title')->value}} @parent @endsection
@section('description'){{setting_with_key('article_description')->value}}@endsection
@section('keywords'){{setting_with_key('article_keywords')->value}}@endsection
@section('content')

    @include('components.public-slider.index',[
    'image'=>'public/img/vectors/td-learning.png',
    'title'=>'برنامه‌ نویسی، تنها نوشتن کد نیست؛ ',
    'description'=>'تلفیقی‌ست از دانش، خلاقیت و تفکر سیستمی ، با مطالعه‌ی مداوم و درک مفاهیم هوش مصنوعی، می‌توان جهانی هوشمندتر ساخت و هم‌زمان با پیشرفت فناوری، هم‌قدم شد',
    ])


<div class="container-xxl">

    <br>
    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>
                <li class="breadcrumb-item active" aria-current="page">دوره های آموزشی</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 text-center pb-3">
        <h3 dir="rtl">
            دوره های آموزشی
        </h3>
        <hr>
    </div>
    <div class="row">

        <div class="col-lg-9">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row row-gap-3">

                        @foreach($courses as $key => $course)
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                @include('components.public-item-course.index',['course'=>$course])
                            </div>
                        @endforeach

                    </div>

                    <br>
                    <br>

                    {{$courses->links("pagination::default")}}

                </div>

            </section>


        </div>

        <div class="col-lg-3">

            <form action="{{\Illuminate\Support\Facades\URL::current()}}" method="GET">
                <div class="widgets-container" >

                    <button data-aos="fade-up" data-aos-delay="150" class="btn btn-primary mb-3 col-12" type="submit">
                        اعمال فیلتر
                        <i class="fas fa-filter"></i>
                    </button>


                    <div class="search-widget widget-item p-3" data-aos="fade-up" data-aos-delay="200">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">جستجو</p>




                        <div class="row align-items-center justify-content-center m-0">
                            <div class="col-lg-12 text-center">
                                <div class="input-group">
                                    <input  value="{{ request()->input('filter.name') }}" placeholder="جستجو" dir="rtl"  type="search" class="form-control" name="filter[name]" >
                                    <button class="btn btn-outline-primary p-2">
                                        <i class="fas fa-search" ></i>
                                    </button>
                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="400">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">نوع دوره آموزشی</p>


                        <div class="d-flex flex-column gap-2">


                            @foreach (config('static_array.courseType') as $name => $value)

                                <div class="form-check">
                                    <input  {{ in_array($value, (array) request()->input('filter.type', [])) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="filter[type][]" value="{{$value}}" id="typeDraft-{{$loop->index}}">
                                    <label class="form-check-label" for="typeDraft-{{$loop->index}}">{{$name}}</label>
                                </div>
                            @endforeach

                        </div>


                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="300">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">وضعیت دوره آموزشی</p>




                        <div class="d-flex flex-column gap-2">
                            @foreach (config('static_array.courseStatus') as $name => $value)

                                <div class="form-check">
                                    <input  {{ in_array($value, request()->input('filter.status', [])) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="filter[status][]" value="{{$value}}" id="statusDraft-{{$loop->index}}">
                                    <label class="form-check-label" for="statusDraft-{{$loop->index}}">{{$name}}</label>
                                </div>
                            @endforeach


                        </div>


                    </div>


                    <div class="categories-widget widget-item p-3" data-aos="fade-up" data-aos-delay="450">

                        <p class="widget-title text-start font-weight-bold" style="font-size: larger">دسته بندی</p>




                        <div class="d-flex flex-column gap-2">

                            @foreach ($categories as $key => $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filter[category_id][]" value="{{ $category->id }}" id="categoryDraft-{{ $loop->index }}"
                                        {{ in_array($category->id, (array) request()->input('filter.category_id', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="categoryDraft-{{ $loop->index }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </form>


        </div>

    </div>
</div>

@endsection

