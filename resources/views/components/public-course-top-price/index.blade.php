<div class="card shadow rounded-2 mb-2 p-4">
    <div class="col-12">
        <div class="row">

            <div class="col-lg-4">
                <div class="d-flex align-items-center" style="height: 100%">
                    <img class="col-12" src="{{$course->image}}" alt="{{$course->alt}}">
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="text-lg-start text-md-start text-center  mt-2">{{$course->name}}</h1>
                <br>
                <p>
                    {{$course->paragraph}}
                </p>

                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6 col-12 my-1">
                            <div class="d-flex justify-content-center">
                                @include('components.public-price.index',['value'=>$course])
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 my-1">
                            <div class="d-flex justify-content-center align-items-center height-100">
                                <form method="POST" action="{{ route('payment.set-product') }}" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{$course->type == 'free' ? 'ثبت نام در ':'خرید '}} دوره آموزشی
                                        <i class="fas fa-graduation-cap"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
