@foreach($episodes as $key => $episode)
    <div class="col-12">
        <div dir="rtl" class="d-flex justify-content-between">
            <div>
                <span class="fs-5 font-weight-bold">
                    جلسه
                    {{$loop->index+1}}
                </span>
                <span class="mx-3">|</span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="fs-5">{{$episode->name}}</a>
            </div>

            <div>
                <span class="fs-6">
                    {{$episode->time}}
                    <i class="fas fa-clock"></i>
                </span>
                <span class="mx-1"></span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="btn btn-sm btn-outline-{{$episode->type == 'free' ? 'primary' : 'danger'}} ">
                    {{$episode->type == 'free' ? 'مشاهده' : 'نقدی'}}
                    <i class="fas fa-{{$episode->type == 'free' ? 'eye' : 'lock'}}"></i>
                </a>
            </div>

        </div>
    </div>
    @if(!$loop->last)
        <hr>
    @endif
@endforeach
