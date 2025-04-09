@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')


    <div
        style="background-image: linear-gradient(180deg, rgba(62, 57, 57, 0.8), rgba(62, 57, 57, 0.8)), url(/public/img/bg/bg_1.jpg)"
        class="area py-5 ">

        <div class="col-12 center_area">
            <h1 class="text-white text-center text-shadow">
                آموزش
                <span class="text-purple">برنامه نویسی</span>
                و هوش مصنوعی
            </h1>
            <br>
            <h2 style="font-size: larger" class="text-white text-center text-shadow">
                وقتی هنوز نمی‌دونی قراره چی بشی ، اون موقع بهترین زمان شروعه
            </h2>
        </div>
    </div>


    <div class="container my-5">
        <section>
            <div class="row">

                <div class="col-md-4 my-2">
                    <div class="px-3 my-5">
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

                <div class="col-md-4 my-2">
                    <div class="px-3 my-5">
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

                <div class="col-md-4 my-2">
                    <div class="px-3 my-5">
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

    {{--<div class="container py-2">
        <h2 class="font-weight-light text-center text-muted py-3">Bootstrap 5 Timeline</h2>

        <!-- timeline item 1 -->
        <div class="row">
            <!-- timeline item 1 left dot -->
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <!-- timeline item 1 event content -->
            <div class="col py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted">Mon, Jan 9th 2020 7:00 AM</div>
                        <h4 class="card-title text-muted">Day 1 Orientation</h4>
                        <p class="card-text">Welcome to the campus, introduction and get started with the tour.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 2 -->
        <div class="row">
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-success">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col py-2">
                <div class="card border-success shadow">
                    <div class="card-body">
                        <div class="float-right text-success">Tue, Jan 10th 2019 8:30 AM</div>
                        <h4 class="card-title text-success">Day 2 Sessions</h4>
                        <p class="card-text">Sign-up for the lessons and speakers that coincide with your course syllabus. Meet and greet with instructors.</p>
                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-target="#t2_details" data-bs-toggle="collapse">Show Details ▼</button>
                        <div class="collapse border" id="t2_details">
                            <div class="p-2 font-monospace">
                                <div>08:30 - 09:00 Breakfast in CR 2A</div>
                                <div>09:00 - 10:30 Live sessions in CR 3</div>
                                <div>10:30 - 10:45 Break</div>
                                <div>10:45 - 12:00 Live sessions in CR 3</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 3 -->
        <div class="row">
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted">Wed, Jan 11th 2019 8:30 AM</div>
                        <h4 class="card-title">Day 3 Sessions</h4>
                        <p>Shoreditch vegan artisan Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage. Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl lumbersexual
                            bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache. 3 wolf moon hashtag church-key Odd Future. Austin messenger bag normcore, Helvetica Williamsburg sartorial tote bag distillery Portland before
                            they sold out gastropub taxidermy Vice.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 4 -->
        <div class="row">
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted">Thu, Jan 12th 2019 11:30 AM</div>
                        <h4 class="card-title">Day 4 Wrap-up</h4>
                        <p>Join us for lunch in Bootsy's cafe across from the Campus Center.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>--}}
    <!--container-->

    <hr>

    {{--<div class="container py-2">

        <!-- timeline item 1 -->
        <div class="row no-gutters">
            <div class="col-sm">
                <!--spacer-->
            </div>
            <!-- timeline item 1 center dot -->
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <!-- timeline item 1 event content -->
            <div class="col-sm py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted small">Jan 9th 2019 7:00 AM</div>
                        <h4 class="card-title text-muted">Day 1 Orientation</h4>
                        <p class="card-text">Welcome to the campus, introduction and get started with the tour.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 2 -->
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div class="card border-success shadow">
                    <div class="card-body">
                        <div class="float-right text-success small">Jan 10th 2019 8:30 AM</div>
                        <h4 class="card-title text-success">Day 2 Sessions</h4>
                        <p class="card-text">Sign-up for the lessons and speakers that coincide with your course syllabus. Meet and greet with instructors.</p>
                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-target="#t22_details" data-bs-toggle="collapse">Show Details ▼</button>
                        <div class="collapse border" id="t22_details">
                            <div class="p-2 font-monospace">
                                <div>08:30 - 09:00 Breakfast in CR 2A</div>
                                <div>09:00 - 10:30 Live sessions in CR 3</div>
                                <div>10:30 - 10:45 Break</div>
                                <div>10:45 - 12:00 Live sessions in CR 3</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-success">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm">
                <!--spacer-->
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 3 -->
        <div class="row no-gutters">
            <div class="col-sm">
                <!--spacer-->
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted small">Jan 11th 2019 8:30 AM</div>
                        <h4 class="card-title">Day 3 Sessions</h4>
                        <p>Shoreditch vegan artisan Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage. Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl lumbersexual
                            bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 4 -->
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right text-muted small">Jan 12th 2019 11:30 AM</div>
                        <h4 class="card-title">Day 4 Wrap-up</h4>
                        <p>Join us for lunch in Bootsy's cafe across from the Campus Center.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-end">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm">
                <!--spacer-->
            </div>
        </div>
        <!--/row-->
    </div>--}}


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
