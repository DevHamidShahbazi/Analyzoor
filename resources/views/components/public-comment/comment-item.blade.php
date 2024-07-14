<div class="card col-12 border-white shadow-lg">
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <span class="iranyekan float-right ml-3">{{ $comment->getCreateDateAttribute() }}</span>
                <span>{{ $comment?->user?->name }}</span>
            </div>
        </div>
        <p class="col-lg-12 p-3" style="text-align: right" >
            {{ $comment->comment }}
        </p>

        @auth
            <div class="col-12 alert">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#ResultComment{{$comment->id}}">
                        <b>پاسخ</b>
                    </button>

                </div>
            </div>
            @include('components.public-comment.modal-result')
        @endauth
    </div>
    @php $children_comment = $comment->children()->where('is_active','1')->get() @endphp
    @if(count($children_comment))
        @foreach ($children_comment as $child_comment)
            <div class="p-2">
                @include('components.public-comment.comment-item',['comment'=>$child_comment])
            </div>
        @endforeach
    @endif
</div>
