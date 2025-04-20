<div class="card article-card hover-zoom-in shadow mb-3" style="height: 100%">
{{--    <div class="row m-0 ">--}}
    <a class="col-12 overflow-hidden d-flex justify-content-start align-items-center" href="{{route('article.detail',$article->slug)}}">
        <img style="border-radius: 8px 8px 0 0" class="col-{{isset($side) ? '12' : '8'}}" src="{{$article->image}}" alt="{{$article->alt}}"/>
    </a>
        <div style="height: 7vh" class="col-12 card-body {{isset($side) ? 'p-2' : ''}}">
            <div class="d-flex flex-column justify-content-evenly height-100">
                <a href="{{route('article.detail',$article->slug)}}">
                    <h5 title="{{$article->name}}" style="font-size: 120%" class=" text-center">{{Illuminate\Support\Str::words($article->name, 12, '...')}}</h5>
                </a>
{{--                <p class="text-center text-body overflow-hidden text-truncate">{{$article->description}}</p>--}}
            </div>
        </div>

{{--    </div>--}}
</div>
