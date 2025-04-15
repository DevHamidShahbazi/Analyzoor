@extends('layouts.layout public.index')
@section('title'){{setting_with_key('article_title')->value}} @parent @endsection
@section('description'){{setting_with_key('article_description')->value}}@endsection
@section('keywords'){{setting_with_key('article_keywords')->value}}@endsection
@section('content')


    @include('components.public-slider.index',[
    'image'=>'public/img/vectors/td-article.png',
    'title'=>'برنامه‌ نویسی، تنها نوشتن کد نیست؛ ',
    'description'=>'تلفیقی‌ست از دانش، خلاقیت و تفکر سیستمی ، با مطالعه‌ی مداوم و درک مفاهیم هوش مصنوعی، می‌توان جهانی هوشمندتر ساخت و هم‌زمان با پیشرفت فناوری، هم‌قدم شد',
    ])


<div class="container">

    <br>
    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>
                <li class="breadcrumb-item active" aria-current="page">مقالات</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 text-center pb-3">
        <h3 dir="rtl">
            مقالات
        </h3>
        <hr>
    </div>
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        @foreach($articles as $key => $article)
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                @include('components.public-item-article.index',['article'=>$article,'side'=>true])
                            </div>
                        @endforeach


                    </div>

                    <br>

                    {{$articles->links("pagination::default")}}

                </div>

            </section>


        </div>

        <div class="col-lg-4">

            <div class="widgets-container" >

                <div class="search-widget widget-item" data-aos="fade-up" data-aos-delay="200">

                    <p class="widget-title text-start font-weight-bold" style="font-size: larger">جستجو</p>

                    <form class="filter" method="GET" action="{{\Illuminate\Support\Facades\URL::current()}}">

                        <div class="row align-items-center justify-content-center m-0">
                            <div class="col-lg-12 text-center">
                                <div class="input-group">
                                    <input  value="{{request()->has('filter') ? request()->get('filter')['name'] :''}}" placeholder="جستجو" dir="rtl"  type="search" class="form-control" name="filter[name]" >
                                    <button class="btn btn-outline-primary p-2">
                                        <i class="fas fa-search" ></i>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>




               {{-- <div class="categories-widget widget-item" data-aos="fade-up" data-aos-delay="300">

                    <p class="widget-title text-start font-weight-bold" style="font-size: larger">مطالب پیشنهادی</p>

                    <div class="d-flex justify-content-center">
                        <a href="#" class="col-10 d-flex justify-content-between align-items-baseline btn btn-outline-primary my-2 p-2">
                            <i class="fas fa-arrow-right"></i>
                            <span class="col-10 p-0 mb-0 text-center font-weight-bold"> لوازم بهداشتی ساختمان در کرج </span>
                        </a>
                    </div>

                </div>--}}


            </div>

        </div>

    </div>
</div>



@endsection
