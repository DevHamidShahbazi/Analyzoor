

<div class="col-lg-12 text-center mt-5 py-1 no-print" style="background: radial-gradient(circle at 50% 175%, #1a2236, #192032, #151521, #141420 57%)">
    <a id="GoTop" href="#top" class="text-white">
        برگشت به بالا
    </a>
</div>

<div  class="container-fluid bg-footer px-0 no-print" style="background: radial-gradient(circle at 50% 175%, #1c2a42, #1c2a42, #1c2a42, #151521 57%)">
    <div class="container-fluid">
        <div class="row text-white m-0">
            <div class="col-md-9 col-12">
                <div style="font-size: larger" class="col-12  text-center font-weight-bold mt-2">
                    دسته بندی ها
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="row m-0">
                        @foreach(\App\Models\Category::where('type','article')->where('parent_id',0)->get() as $key => $parentCategory)
                            <div class="col-sm-4 pb-4">
                                <a target="_blank" href="{{route('parent.article.category',$parentCategory->slug)}}">
                                    <h4 class="text-center text-decoration-underline text-white">{{$parentCategory->name}}</h4>
                                </a>
                                @foreach($parentCategory->children()->get() as $key => $childCategory)
                                    <a target="_blank" href="{{route('child.article.category',$childCategory->slug)}}">
                                        <h5 class="text-center">{{$childCategory->name}}</h5>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div style="font-size: larger" class="col-12  text-center font-weight-bold mt-2">
                    فانورام
                </div>
                <hr/>
                {{--                @component('layouts.layout site.components.footer.categories')@endcomponent--}}
                <p class="text-center">
                    فثسف ثسف ثسفثس
                </p>
            </div>
        </div>
    </div>
    <hr>

    <div  class="container-fluid">
        <div class="row m-0">
            <div style="border-radius: 15px" class="col-12 text-center  my-4 text-white mb-3">

                استفاده از مطالب این سایت فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به <span class="font-weight-bold "><a class='text-white' href="{{route('Home')}}">فانورام</a></span> می‌باشد


            </div>
        </div>
    </div>
</div>



