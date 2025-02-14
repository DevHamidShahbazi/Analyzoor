@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')


    <div
        style="background-image: linear-gradient(180deg, rgba(62, 57, 57, 0.8), rgba(62, 57, 57, 0.8)), url(/public/img/bg/bg_1.jpg)"
        class="area py-5 ">

        <div class="col-12 center_area">
            <h1 class="text-white text-center text-shadow"> آموزش و <span class="text-purple">برنامه نویسی</span> وب
                سایت </h1> <br>
            <h2 style="font-size: larger" class="text-white text-center text-shadow">طراحی سایت اختصاصی و آموزش تخصصی وب
                و اپلیکیشن</h2>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 py-3">
                <div class="img-place wow fadeInUp">
                    <img class="col-12" src="/public/img/me.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 wow fadeInRight">
                <h4 dir="rtl" style="font-size: x-large">حمید شهبازی</h4>
                <p class="text-muted">
                    {{--                    برنامه نویس فرانت اند و بک اند ، وب و اندروید با هفت سال تجربه در توسعه و طراحی وب سرویس ها و اپلیکیشن های شرکت ها و پروژه های مختلف--}}
                    {{--                    <br>--}}
                    بعد از عشق و علاقه زیادم به حل مسئله و کمک به بهبود کسب کار ها ، وارد برنامه نویسی شدم
                    <br>
                    اوایل فعالیتم به صورت فریلنسر شروع بکار کردم
                    در طول مدت کارم که پر از چالش و یادگیری بود، به عنوان یک فرد مستقل باید می آموختم چگونه مذاکره کنم،
                    چگونه مدیریت کنم ،
                    و چگونه کار را به نحو احسنت به انجام برسانم و چطور آن چیزی که کارفرما میخواست رو کامل پیاده سازی کنم
                    <br>
                    <span class="text-purple">این هفت سال برای من بسیار سخت و جذاب بود</span>،
                    در طول این هفت سال حدود به 16 وب سایت برای کسب و کار های کوچک و متوسط طراحی کردم، علت کم بودن تعداد
                    پروژه ها کمال گرایی من بود که همچنان دوست و بعضی اوقات دشمن من است، که البته من بیشتر آنرا به چشم
                    دوست میبینم ;)
                    <br>


                </p>
                {{--                <br>--}}
                {{--                <p class="text-muted">--}}
                {{--                    مخاطب های شما باید در سطح کشور باشند تا شما بتوانید درآمد حداکثری داشته باشید--}}
                {{--                    <br>--}}
                {{--                    با پیشرفت تکنولوژی که امروزه لحظه به لحظه شده داشتن یک وب سایت لازمه کار شماست--}}
                {{--                </p>--}}
                {{--                <ul class="theme-list" dir="rtl">--}}
                {{--                    <li><b>استان:</b>تهران/کرج</li>--}}
                {{--                    <li><b>Lives In:</b> Texas, US</li>--}}
                {{--                    <li><b>Age:</b> 25</li>--}}
                {{--                    <li><b>Gender:</b> Male</li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </div>



    {{--<div class="vg-page page-service" id="services">
        <h5 class="text-center text-white" style="visibility: visible; animation-name: fadeInUp;">طراحی وب سایت
            اختصاصی</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">کد نویسی صفر تا صد</h4>
                        <p class=" text-justify">
                            بستگی به نیاز شما که در حیطه های مختلف فعالیت می کنید ، به صورت کاملا اختصاصی صفرتاصد وب
                            سایت شما کدنویسی می شود
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">SEO</h4>
                        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">Web Development</h4>
                        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">Web Design</h4>
                        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">SEO</h4>
                        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="card card-body">
                        <h4 style="font-size: 170%" class="text-purple text-center">Web Development</h4>
                        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <img class="col-12 mt-1" src="/public/img/t_footer.jpg" alt="آموزش برنامه نویسی برای بازارکار">




    @include('components.public-grid-background.index')

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

    <section class="col-12 img-fix-home mt-3 p-5">
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
    </section>



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
