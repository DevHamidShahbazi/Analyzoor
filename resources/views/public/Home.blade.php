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


    <div class="container">

        @foreach($parentArticleCategories as $key => $parentArticleCategory)

            @include('components.public-grid-background.index')

            <div class="col-12 py-5">

                <div class="row">

                    {{--parent category--}}
                    <div class="col-md-8 col-sm-12">

                        <div class="card">
                            <div class="card-content">

                                    <div class="row m-0 ">
                                        <div class="col-md-5 card-body ">
                                            <div class="d-flex flex-column justify-content-evenly height-100">
                                                <a href="{{route('parent.article.category',$parentArticleCategory->slug)}}">
                                                    <h4 class="card-title text-center">{{$parentArticleCategory->name}}</h4>
                                                </a>
                                                <p class="text-center text-body">{{$parentArticleCategory->description}}</p>
                                            </div>
                                        </div>
                                        <a class="col-md-7 p-3" href="{{route('parent.article.category',$parentArticleCategory->slug)}}">
                                            <img style="border-radius: 16px" class="col-12" src="{{$parentArticleCategory->image}}" alt="{{$parentArticleCategory->alt}}"/>
                                        </a>
                                    </div>

                            </div>
                        </div>

                    </div>

                    {{--child category--}}
                    @php $firstChild = $childrenArticleCategories->where('parent_id',$parentArticleCategory->id)->first() @endphp

                    @if($firstChild)
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <a href="{{route('child.article.category',$firstChild->slug)}}">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid p-2"
                                             style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                             src="{{$firstChild->image}}" alt="{{$firstChild->alt}}"/>
                                        <div class="card-body p-1">
                                            <h4 class="card-title text-center">{{$firstChild->name}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>

                {{--children category--}}
                <div class="col-12">
                    @include('components.public-circle-background.index',
               [
                   'class' => 'right-position-obj',
                   'alt' => 'circle',
                   'image_url' => './public/img/obj/2.2.png',
               ])
                    <div class="row">
                        @php $anotherChildren = $childrenArticleCategories->where('parent_id',$parentArticleCategory->id)->where('id','!=',$firstChild->id) @endphp

                        @if($anotherChildren->isNotEmpty())

                            @foreach( $anotherChildren as $key => $anotherChild)
                                <div class="col-md-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <a href="{{route('child.article.category',$anotherChild->slug)}}">
                                                <img class="card-img-top img-fluid p-2"
                                                     style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                                                     src="{{$anotherChild->image}}" alt="{{$anotherChild->alt}}"/>
                                                <div class="card-body p-1">
                                                    <h4 class="card-title text-center">{{$anotherChild->name}}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>

            </div>

        @endforeach
    </div>





    <div class="col-12">
        <div class="bg-section-1-home" >
            <div class="row m-0 justify-content-center">
                <a target="_blank" href="https://instagram.com/fanoram_ir" class="col-md-8 col-sm-10 col-12">
                    <img class="col-12" src="./public/img/obj/instagram.jpg" alt="فانورام">
                </a>
            </div>
        </div>
    </div>

@endsection
