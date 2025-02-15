<div class="card-body">
    @if(auth()->check())
        <form action="{{ route('article.store.comment') }}" method="post" class="comment">
            @csrf
            <input type="number" hidden value="{{$item->id}}" name="commentable_id">

            @if($errors->any())
                <br>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <br>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <label class="col-12">
                        <textarea dir="rtl" required name="comment"  class="form-control" placeholder="لطفا متن مورد نظر خود را وارد کنید..." rows="5">{{old('comment')}}</textarea>
                    </label>
                    <div class="col-12 my-2 text-center">
                        <button class="btn btn-primary">ارسال نظر</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="d-flex justify-content-center align-items-center flex-column">
            <p class="text-center my-3">
                برای ثبت نظر خود نیاز هست که ثبت نام کنید
            </p>
            <a href="{{route('register')}}" class="btn btn-primary">
                ورود / ثبت نام
            </a>
        </div>
    @endif
</div>
