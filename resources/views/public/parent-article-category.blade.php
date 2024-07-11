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
        <h1>
            {{$category->name}}
        </h1>
    </div>

    <div class="container">
        <div class="row flex-row-reverse m-0">

            {{--Right--}}
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
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

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pr-lg-3">
               <div class="row m-0">
                   @foreach($children as $key => $child)
                       <div class="col-md-6">
                           <div class="card mb-2">
                               <a href="{{route('child.article.category',$child->slug)}}">
                                   <div class="card-content">
                                       <img class="card-img-top img-fluid p-2"
                                            style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                            src="{{$child->image}}" alt="{{$child->alt}}"/>
                                       <div class="card-body p-1">
                                           <p class="card-title text-center">{{$child->name}}</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   @endforeach

                   @foreach($articles_children->take(5) as $key => $article_child)
                       <div class="col-md-6">
                           <div class="card mb-2">
                               <a href="{{route('article.detail',$article_child->slug)}}">
                                   <div class="card-content">
                                       <img class="card-img-top img-fluid p-2"
                                            style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                            src="{{$article_child->image}}" alt="{{$article_child->alt}}"/>
                                       <div class="card-body p-1">
                                           <p class="card-title text-center">{{$article_child->name}}</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   @endforeach
               </div>
            </div>


        </div>

        {{$articles->links("pagination::default")}}

    </div>

@endsection
