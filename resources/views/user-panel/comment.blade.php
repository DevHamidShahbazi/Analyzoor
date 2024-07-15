@extends('layouts.layout user-panel.index')
@section('comment','bg-primary')
@section('page')
    <div class="col-12">
       <div class="card">
           <h4 class="card-title text-center my-4">نظرات ثبت شده شما</h4>
           <div class="row justify-content-between m-0">

               @if($comments->count())
                   @foreach($comments as $comment)
                       @php $article = $comment->commentable @endphp
                       @if(!$article->is_active)
                            @continue
                       @endif
                       <div class="col-md-6">
                           <div class="card mb-3 p-2 border-white">
                               <a target="_blank" href="{{route('article.detail',$article->slug.'#'.$comment->id)}}">
                                   <div class="d-flex justify-content-between">
                                       <span>{{ $article->name }}</span>
                                       <span class="iranyekan float-right ml-3">{{ $comment->getCreateDateAttribute() }}</span>
                                   </div>
                                   <div class="row m-0 ">
                                       <div class="col-8 card-body p-2">
                                           <div class="d-flex flex-column justify-content-evenly height-100">

                                               <p class="text-center text-body">{{$comment->comment}}</p>
                                           </div>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   @endforeach
               @endif

           </div>
       </div>
    </div>

@endsection
