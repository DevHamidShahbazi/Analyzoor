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

@endsection
