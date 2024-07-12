@extends('layouts.layout public.index')
@section('title'){{$category->title}} @parent @endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('content')


    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>

                @foreach($all_parents as $parent)
                    <li class="breadcrumb-item">
                        <a
                            href="{{route($parent->parent ? 'child.article.category' : 'parent.article.category',$parent->slug)}}">
                            {{$parent->name}}
                        </a>
                    </li>
                @endforeach

                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>


    <div class="col-12 text-center pb-3">
        <h1>
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
                    @foreach($articles_parents->take(5) as $key => $article_parent)
                        <div class="col-md-12">
                            @include('components.public-item-article.index',['article'=>$article_parent,'side'=>true])
                        </div>
                    @endforeach

                    @foreach($articles_parents->skip(5)->take(5) as $key => $article_p)
                        <div class="col-md-12">
                            @include('components.public-item-article.index',['article'=>$article_p,'side'=>true])
                        </div>
                    @endforeach

                </div>

            </div>




        </div>

        {{$articles->links("pagination::default")}}

    </div>

@endsection
