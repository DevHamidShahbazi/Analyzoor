@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')


    <section class="royal py-5 ">
        <div class="container">
            <div class="row m-0">

                <div class="col-lg-6 text-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="public/img/vectors/td-home.png" class="col-lg-10 col-md-8 col-12 my-5 animated" alt="logo">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="text-white text-center text-shadow" data-aos="fade-up" data-aos-delay="200">
                        آموزش
                        <span class="text-purple">برنامه نویسی</span>
                        و هوش مصنوعی
                    </h1>
                    <p style="font-size: larger" class="text-white text-center text-shadow mt-2" data-aos="fade-up" data-aos-delay="250">
                        زیبایی یادگیری در این است که هیچ‌کس نمی‌تواند آن را از تو بگیرد
                    </p>
                </div>





            </div>
        </div>

    </section>


    @include('components.public-grid-background.index')

    <section class=" py-5 ">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <h4 dir="rtl" class="text-shadow" style="font-size: xx-large">
                        از کجا شروع کنم؟؟
                    </h4>
                    <p style="font-size: larger" class="text-shadow mt-2">
                        وقتی هنوز نمی‌دونی قراره چی بشی ، اون موقع بهترین زمان شروعه،
                        <br>
                        چون توی همین لحظه‌ست که می‌تونی بدون ترس، تجربه کنی، یاد بگیری و راه‌ خودت رو پیدا کنی.
                        <br>
                        لازم نیست از همون اول بدونی قراره برنامه‌نویس بشی، طراح، یا حتی کارآفرین.
                        <br>
                        مهم اینه که شروع کنی...
                        <br>
                        قدم اول همیشه سخت‌ترینه، اما اگه بلد باشی از کجا شروع کنی، همه چیز ساده‌تر می‌شه.
                    </p>
                </div>

                <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="350">
                    <img src="public/img/vectors/hat.png" class="col-lg-10 col-md-6 col-6 my-3" alt="logo">
                </div>



            </div>
        </div>

    </section>


    <img class="col-12 mt-1" src="/public/img/t_footer.jpg"  alt="آموزش برنامه نویسی برای بازارکار">

    <div class="container my-5">
        <h3 class="text-center" data-aos="fade-up">
            مراحل آموزشی
        </h3>
        <br>
        <section>
            <div class="row">

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="100">
                    <div class="px-3">
                        <div
                            class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-briefcase" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">توسعه مهارت‌ها برای بازار کار</h5>
                            <p class="font-weight-light text-center my-3">
                                وقتی پایه‌ها رو یاد گرفتی و چند پروژه ساختی، نوبت ارتقاء مهارت‌هاست. اینجا یاد می‌گیری با ابزارهای حرفه‌ای کار کنی. همه‌ی آموزش‌ها با هدف آمادگی برای بازار کار طراحی شدن، دقیق، کاربردی
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="200">
                    <div class="px-3">
                        <div
                            class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-code" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">تمرین با پروژه‌های واقعی</h5>
                            <p class="font-weight-light text-center my-3">
                                یادگیری بدون تمرین هیچ فایده‌ای نداره! ما توی آموزش‌هامون تمرکز اصلی رو گذاشتیم روی ساخت پروژه‌های واقعی و کاربردی. یعنی همزمان با آموزش، چیزهایی می‌سازی که واقعاً توی دنیای واقعی استفاده می‌شن.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 my-2"  data-aos="fade-up" data-aos-delay="300">
                    <div class="px-3">
                        <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                             style="width: 60px;height: 60px; background-color: #9B5DE5">
                            <i class="fas fa-book-open" style="font-size: larger"></i>
                        </div>
                        <div class="px-3 text-center pb-3">
                            <h5 class="text-uppercase" style="font-weight: 600">یادگیری اصول و مفاهیم پایه</h5>
                            <p class="font-weight-light text-center my-3">
                                برای شروع هرچیزی، نیازی نیست همه‌چیز رو بدونی. توی این مرحله، مفاهیم پایه رو با زبانی ساده و کاربردی یاد می‌گیری. مطالب اضافی یا تئوری‌های پیچیده رو کنار گذاشتیم تا سریع و مؤثر وارد دنیای موضوع بشی.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <div class="d-flex justify-content-center">
        <div class="col-10 m-0 p-3">
            <div class="row justify-content-evenly m-0">

                @foreach($articles as $key => $article)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        @include('components.public-item-article.index',['article'=>$article,'side'=>true])
                    </div>
                @endforeach

            </div>
            <div class="col-12 text-center p-0 m-0">
                <a class="font-weight-bold" href="{{route('article.index')}}">نمایش بیشتر</a>
            </div>
        </div>
    </div>

    {{--<section class="col-12 img-fix-home mt-3 p-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-sm-5 text-center">

                </div>

                <div class="col-sm-7 text-center">
                    <p style="font-size: large" class="text-justify text-white">
                        چیزی که برام همیشه جای سوال بود این بود چرا دوره های آموزشی که در این مدت دیدم همیشه به فکر یاد
                        دادن کد بودند و به اصل ماجرا که بازار کار بود نمی پرداختند
                        <br>
                        مشکل آموزش در کشور ما نهادینه شده و به نوعی همه ما قربانی آموزش اشتباه هستیم ، اما از طرفی هم به
                        اساتید دوره های آموزشی حق میدم ، چون بازار تکنولوژی در ایران در بهترین حالت ممکن 10 سال است که
                        فراگیر شده و تجربه ای در این موضوع نبوده
                        <br>
                        توی این مدت تصمیم گرفتم تا دوره آموزشی رو فراهم کنم تا ابزاری باشه برای کسانی که علاقه به برنامه
                        نویسی دارند و شاید دانش کافی ندارند و نمی دانند از کجا باید شروع کنند
                        <br>
                        تا بعد از مشاهده این دوره به راحتی وارد بازارکار شوند
                    </p>
                </div>

            </div>
        </div>
    </section>--}}



    {{--    <div class="col-12">--}}
    {{--        <div class="bg-section-1-home">--}}
    {{--            <div class="row m-0 justify-content-center">--}}
    {{--                <a target="_blank" href="https://instagram.com/fanoram_ir" class="col-md-8 col-sm-10 col-12">--}}
    {{--                    <img class="col-12" src="./public/img/obj/instagram.jpg" alt="فانورام">--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
