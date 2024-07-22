@extends('layouts.layout public.index')
@section('title'){{$category->title}} @parent @endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('content')



    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 text-center pb-3">
        <h1 dir="rtl">
            {{$category->name}}
        </h1>
    </div>

    <div class="container">
        <div class="row flex-row-reverse m-0">

            {{--Right--}}
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                @foreach($articles as $key => $article)
                    @include('components.public-item-article.index',['article'=>$article])
                @endforeach
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">
               <div class="row m-0">
                   @foreach($articles_children->take(5) as $key => $article_child)
                       <div class="col-md-12">
                           @include('components.public-item-article.index',['article'=>$article_child,'side'=>true])
                       </div>
                   @endforeach
                   @foreach($children as $key => $child)
                       <div class="col-md-6">
                           @include('components.public-item-category.index',['category'=>$child])
                       </div>
                   @endforeach
               </div>
            </div>


        </div>

        {{$articles->links("pagination::default")}}

    </div>

@endsection
