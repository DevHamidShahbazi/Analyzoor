<div class="card">
    <div class="p-3" style="text-align: end">
        <p class="font-weight-bold">
            نظرات
        </p>
    </div>
    <div class="col-12">
        @include('components.public-comment.comment-store')
    </div>
</div>


<li class="row m-0" >
    @foreach ($item->comments()->where('is_active','1')->where('parent_id','0')->latest()->get() as $comment)
        @include('components.public-comment.comment-item')
    @endforeach
</li>
