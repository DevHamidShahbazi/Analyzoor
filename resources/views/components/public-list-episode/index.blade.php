@foreach($episodes as $key => $episode)
    @php
        $isCurrent = isset($currentEpisode) && $currentEpisode->id === $episode->id;
    @endphp

    <div class="episode-item {{ $isCurrent ? 'current' : '' }}">
        <div dir="rtl" class="d-flex justify-content-between align-items-center">
            <div class="flex-grow-1">
                <span class="fs-lg-5 fs-6 font-weight-bold">
                    جلسه {{$loop->index+1}}
                </span>
                <span class="mx-sm-3 mx-1">|</span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="episode-link fs-lg-5 fs-6">{{$episode->name}}</a>
            </div>

            <div class="d-flex align-items-center gap-3" style="min-width: fit-content">
                <span class="episode-time fs-6">
                    <i class="fas fa-clock"></i>
                    {{$episode->time}}
                </span>
                <a href="{{route('episode.detail',$episode->slug)}}" class="episode-btn btn btn-sm btn-outline-{{$episode->type == 'free' ? 'primary' : 'danger'}}">
                    {{$episode->type == 'free' ? 'مشاهده' : 'نقدی'}}
                    <i class="fas fa-{{$episode->type == 'free' ? 'eye' : 'lock'}}"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach

