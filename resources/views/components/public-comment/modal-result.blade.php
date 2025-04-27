<div class="modal modal-lg fade text-left" id="ResultComment{{$comment->id}}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i data-feather="x"></i>
                </button>
                <h5 class="modal-title te" id="myModalLabel1">پاسخ به {{ $comment?->user?->name }}</h5>
            </div>
            <form method="POST" action="{{ route($type_route.'.result.comment') }}"  enctype="multipart/form-data" >
                @csrf
                <div class="modal-body">
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <input type="number" hidden value="{{$item->id}}" name="commentable_id">
                        <input type="number" hidden value="{{$comment->id}}" name="parent_id">
                        <div class="modal-body mb-1">
                            <div class="form-group" >
                                <textarea style="height: 150px" placeholder="متن خود را وارد کنید" dir="rtl" class="form-control" name="comment">{{ old('comment') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <span class="d-block">لغو</span>
                    </button>
                    <button  type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <span class="d-block">ثبت نظر</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

