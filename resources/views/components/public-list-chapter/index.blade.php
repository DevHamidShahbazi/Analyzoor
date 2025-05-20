@if($chapters->count())
    <div class="accordion mt-4" id="accordionExample">
        @foreach($chapters as $key => $chapter)
            @php
                $chapterEpisodes = $chapter->episodes()->get();
                $isCurrentChapter = isset($currentEpisode) && $chapterEpisodes->contains('id', $currentEpisode->id);
            @endphp

            <div class="border border-secondary border-1 rounded-2 border-opacity-50 my-2">
                <h5 class="accordion-header rounded-2" id="heading_episode_{{$key}}">
                    <button dir="rtl" class="accordion-button {{ $isCurrentChapter ? '' : 'collapsed' }} rounded-2"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse_episode_{{$key}}"
                            aria-expanded="{{ $isCurrentChapter ? 'true' : 'false' }}"
                            aria-controls="collapse_episode_{{$key}}">
                        <span class="fs-lg-5 fs-6 font-weight-bold">{{$chapter->name}}</span>
                        <span class="mx-lg-3 mx-2">|</span>
                        <span class="fs-lg-5 fs-6">{{$chapter->title}}</span>
                    </button>
                </h5>
                <div id="collapse_episode_{{$key}}" class="accordion-collapse collapse {{ $isCurrentChapter ? 'show' : '' }}"
                     aria-labelledby="heading_episode_{{$key}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-3">
                        @include('components.public-list-episode.index', [
                            'episodes' => $chapterEpisodes,
                            'currentEpisode' => $currentEpisode ?? null
                        ])
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    @include('components.public-list-episode.index', [
        'episodes' => $episodes,
        'currentEpisode' => $currentEpisode ?? null
    ])
@endif
