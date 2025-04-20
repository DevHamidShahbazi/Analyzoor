<div class="card course-card hover-zoom-in shadow mb-3" style="height: 90%">
    <a class="card-img-block overflow-hidden" href="{{route('course.detail',$course->slug)}}">
        <img style="border-radius: 8px 8px 0 0" class="col-12 " src="{{$course->image}}" alt="{{$course->alt}}"/>
    </a>
        <div  class="col-12 card-body pt-0 p-3">
            <div class="d-flex flex-column justify-content-evenly ">
                <a href="{{route('course.detail',$course->slug)}}">
                    <h5 class="mb-0" title="{{$course->name}}" style="font-size: 120%">{{$course->name}}</h5>
                </a>
                <div class="text-start my-2">
                    <span style="font-size: small" class="badge bg-{{$course->status == 'comingSoon' ? 'light-primary': ($course->status=='currently'?'light-primary':'primary')}}">
                        {{array_search($course->status,config('static_array.courseStatus'))}}
                        <i class="{{$course->status == 'comingSoon' ? '': ($course->status=='currently'?'fas fa-history':'fas fa-check')}}"></i>
                    </span>
                </div>
                <p class="text-body">{{Illuminate\Support\Str::words($course->paragraph, 18, '...')}}</p>
                <div class="d-flex justify-content-between text-start">
                    <div class="d-flex align-items-center ">
                        <span class="badge bg-light-secondary" style="height: fit-content">
                        {{$course->time}}
                        <i class="fas fa-clock"></i>
                    </span>
                    </div>
                    @include('components.public-price.index',['value'=>$course])
                </div>
            </div>
        </div>
</div>
