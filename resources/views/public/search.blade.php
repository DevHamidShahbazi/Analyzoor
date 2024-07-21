@extends('layouts.layout public.index')
@section('title'){{setting_with_key('title')->value}} @parent @endsection
@section('description'){{setting_with_key('description')->value}}@endsection
@section('keywords'){{setting_with_key('keywords')->value}}@endsection
@section('content')

    @include('components.public-circle-background.index',
    [
        'class' => 'left-position-obj',
        'alt' => 'circle',
        'image_url' => './public/img/obj/1.2.png',
    ])

    @if($search)
        <div class="col-12 text-center p-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" dir="rtl">
                    <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
                </ol>
            </nav>
        </div>

        <div class="col-12 text-center pb-3">
            <h1>
                {{$name}}
            </h1>
        </div>
    @endif

    <div class="container">
        <div class="row flex-row-reverse m-0">

            @if($search)
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    @foreach($search as $key => $item)
                        @if($item?->category_id)
                            @include('components.public-item-article.index',['article'=>$item])
                        @endif
                    @endforeach
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">
                    <div class="row m-0">
                        @foreach($search as $key => $item)
                            @if(!($item?->category_id))
                                <div class="col-md-6">
                                    @include('components.public-item-category.index',['category'=>$item])
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div style="height: 100vh" class="col-12 d-flex justify-content-center align-items-center">
                    <h1 dir="rtl">
                        محتوا شما یافت نشد!!
                    </h1>
                </div>
            @endif
        </div>

    </div>


@endsection
