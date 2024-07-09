@extends('layouts.layout public.index')
@section('title'){{$category->title}} @parent @endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('content')

    <div class="col-12 text-center pb-3">
        <h1>
            {{$category->name}}
        </h1>
    </div>

    <div class="container">
        <div class="row m-0">

            {{--left--}}
            <div class="col-lg-3">
                @foreach(\App\Models\Article::where('is_active','1')->where('category_id','!=',$category->id)->take(5)->latest() as $key => $suggestArticle)
                    <div class="card mb-2">
                        <a href="{{route('article.detail',$suggestArticle->slug)}}">
                            <div class="card-content">
                                <img class="card-img-top img-fluid p-2"
                                     style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                     src="{{$suggestArticle->image}}" alt="{{$suggestArticle->alt}}"/>
                                <div class="card-body p-1">
                                    <h4 class="card-title text-center">{{$suggestArticle->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="col-6">

                @foreach($articles as $key => $article)
                    <div class="card mb-3">
                        <div class="row m-0 ">
                            <div class="col-md-8 card-body ">
                                <div class="d-flex flex-column justify-content-evenly height-100">
                                    <a href="{{route('article.detail',$article->slug)}}">
                                        <h4 class="card-title text-center">{{$article->name}}</h4>
                                    </a>
                                    <p class="text-center text-body">{{$article->description}}</p>
                                </div>
                            </div>
                            <a class="col-md-4 d-flex justify-content-center align-items-center py-2" href="{{route('article.detail',$article->slug)}}">
                                <img style="border-radius: 8px" class="col-12" src="{{$article->image}}" alt="{{$article->alt}}"/>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{--right--}}
            <div class="col-3">
                @foreach($children as $key => $child)
                    <div class="card mb-2">
                        <a href="{{route('child.article.category',$child->slug)}}">
                            <div class="card-content">
                                <img class="card-img-top img-fluid p-2"
                                     style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                     src="{{$child->image}}" alt="{{$child->alt}}"/>
                                <div class="card-body p-1">
                                    <h4 class="card-title text-center">{{$child->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach(\App\Models\Article::where('is_active','1')->where('category_id','!=',$category->id)->skip(5)->take(5)->latest() as $key => $suggestArticle)
                    <div class="card mb-2">
                        <a href="{{route('article.detail',$suggestArticle->slug)}}">
                            <div class="card-content">
                                <img class="card-img-top img-fluid p-2"
                                     style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                     src="{{$suggestArticle->image}}" alt="{{$suggestArticle->alt}}"/>
                                <div class="card-body p-1">
                                    <h4 class="card-title text-center">{{$suggestArticle->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

        {{$articles->links("pagination::default")}}

    </div>

@endsection
