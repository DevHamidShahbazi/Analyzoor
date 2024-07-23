@extends('layouts.layout public.index')
@section('title'){{$article->title}} @parent @endsection
@section('description'){{$article->description}}@endsection
@section('keywords'){{$article->keywords}}@endsection
@section('content')

    <div class="col-12 text-center p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" dir="rtl">
                <li class="breadcrumb-item"><a href="{{route('Home')}}">صفحه اصلی</a></li>
                @foreach($all_categories as $category)
                    <li class="breadcrumb-item"><a
                            href="{{route($category->parent ? 'child.article.category' : 'parent.article.category',$category->slug)}}"
                        >
                            {{$category->name}}</a></li>
                @endforeach
                <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="container-lg">

        <div class="row flex-row-reverse m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <img style="border-radius: 15px" class="col-md-6" src="{{$article->image}}" alt="{{$article->alt}}">
                        </div>
                        <div class="col-12 text-center py-3">
                            <h1>
                                {{$article->h1 ?? $article->name}}
                            </h1>
                            @if($article->h2)
                                <h2>
                                    {{$article->h2}}
                                </h2>
                            @endif
                        </div>
                    </div>
                    <div class="card-body" dir="rtl">
                        <?php
                        $body = $article->body;
                        $body = preg_replace_callback('/<code>(.*?)<\/code>/s', function ($matches) {
                            return '<code>' . htmlspecialchars($matches[1]) . '</code>';
                        }, $body);
                        ?>
                        {!! $body !!}
                    </div>
                </div>

                @if($urls->isNotEmpty() || $files->isNotEmpty())
                    <div class="col-12">
                        <div class="card border-white shadow-lg p-2">
                            <div class="row m-0">
                                @if($urls->isNotEmpty())
                                    @foreach($urls as $url)
                                        <div class="col-12 my-1" style="text-align: right">
                                            <a class="btn btn-outline-light p-1" download href="{{$url->url}}">{{$url->name}} <i class="fa fa-download"></i>  </a>
                                        </div>
                                    @endforeach
                                @endif
                                @if($files->isNotEmpty())
                                        @foreach($files as $file)
                                            <div class="col-12 my-1" style="text-align: right">
                                                <a class="btn btn-outline-light p-1" download href="{{$file->file}}">{{$file->alt}} <i class="fa fa-download"></i>  </a>
                                            </div>
                                        @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


                @include('components.public-comment.index',['item'=>$article])
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">

                <div class="row flex-row-reverse m-0">
                    @foreach($articles->take(5) as $key => $article_child)
                        <div class="col-md-12">
                            @include('components.public-item-article.index',['article'=>$article_child,'side'=>true])
                        </div>
                    @endforeach

                    @foreach($articles->skip(5)->take(5) as $key => $article_child)
                        <div class="col-md-12">
                            @include('components.public-item-article.index',['article'=>$article_child,'side'=>true])
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>

@endsection
