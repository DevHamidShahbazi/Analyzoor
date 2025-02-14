@extends('layouts.layout public.index')
@section('title'){{setting_with_key('article_title')->value}} @parent @endsection
@section('description'){{setting_with_key('article_description')->value}}@endsection
@section('keywords'){{setting_with_key('article_keywords')->value}}@endsection
@section('content')

{{--    <div class="col-12 text-center p-1">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb" dir="rtl">--}}
{{--                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--    </div>--}}

{{--    <div class="col-12 text-center pb-3">--}}
{{--        <h1 dir="rtl">--}}
{{--            {{$category->name}}--}}
{{--        </h1>--}}
{{--    </div>--}}



    <div class="col-12 ">
        <div class="d-flex justify-content-center">
            <div class="col-12 m-0 p-3">
                <div class="row justify-content-evenly m-0">

                    @foreach($articles as $key => $article)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                            @include('components.public-item-article.index',['article'=>$article,'side'=>true])
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{$articles->links("pagination::default")}}

    </div>

@endsection
