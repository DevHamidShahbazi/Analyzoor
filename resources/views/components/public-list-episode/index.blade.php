@foreach($episodes as $key => $episode)
    @php
        $isCurrent = isset($currentEpisode) && $currentEpisode->id === $episode->id;
    @endphp

    <div class="col-12 {{ $isCurrent ? 'bg-primary bg-opacity-10 rounded p-2' : '' }}">
        <div dir="rtl" class="d-flex justify-content-between">
            <div>
                <span class="fs-lg-5 fs-6 font-weight-bold">
                    جلسه {{$loop->index+1}}
                </span>
                <span class="mx-sm-3 mx-1">|</span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="fs-lg-5 fs-6">{{$episode->name}}</a>
            </div>

            <div class="d-sm-block d-grid" style="min-width: fit-content">
                <span class="fs-6">
                    <i class="fas fa-clock"></i>
                    {{$episode->time}}
                </span>
                <span class="mx-1 d-sm-none"></span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="btn btn-sm btn-outline-{{$episode->type == 'free' ? 'primary' : 'danger'}}">
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

