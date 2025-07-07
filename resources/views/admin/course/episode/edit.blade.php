@extends('layouts.layout admin.index')

@section('Header','ویرایش دوره آموزشی')
@section('course','active')
@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">کل دوره ها</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.episode.index',['course_id'=>$course_id]) }}"> قسمت های {{$course->name}} </a>
    </li>
    <li class="breadcrumb-item"> ویرایش قسمت {{ $episode->name }}</li>
@endsection

@section('content')

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">ویرایش قسمت {{ $episode->name }}</h3>
            </div>

        @include('alert.toastr.error')
        @include('alert.toastr.success')

        @include('alert.form.error')

        <!-- /.card-header -->
            <br>
            <div class="text-center mt-2">
                <div style="text-align: right" class="col-lg-12">
                    <a target="_blank" href="{{--{{ route('course.detail',$course->slug) }}--}}" class="btn btn-primary btn-sm">پیش نمایش</a>
                </div>

            </div>
            <br>

{{--            @if($course->image==null)--}}
{{--                <div class="col-12">--}}
{{--                    <div class="alert alert-warning alert-dismissible">--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
{{--                        <h5><i class="icon fa fa-warning"></i> توجه!</h5>--}}
{{--                        هنوز عکسی انتخاب نشده است--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="text-center">--}}
{{--                    <img src="{{$course->image}}" class="rounded col-lg-3" alt="{{$course->alt}}">--}}
{{--                </div>--}}
{{--        @endif--}}

        <!-- form start -->
            <form method="POST" action="{{ route('admin.episode.update',['episode'=>$episode->id,'course_id'=>$course_id]) }}"  enctype="multipart/form-data" >
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="{{$episode->name}}" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع </label>
                            <select  class="form-control" name="type">
                                @foreach(config('static_array.episodeType') as $key => $value)
                                    <option {{ $value == $episode ? 'selected' : '' }} value="{{$value}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">زمان</label>
                            <input required type="text" value="{{$episode->time ?? old('time')}}" name="time" class="form-control"
                                   placeholder="زمان">
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >انتخاب فصل</label>
                            <select  class="form-control" name="chapter_id">
                                @foreach($course?->chapters()?->get() as  $chapter)
                                    <option {{$episode?->chapter?->id == $chapter->id ? 'selected' : ''}} value="{{$chapter->id}}">{{$chapter->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="{{$episode->title}}" name="title" class="form-control"
                                   placeholder="title">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    description
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description">{{$episode->description}}</textarea>
                            </div>
                        </div>



                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="{{$episode->keywords}}" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-8">
                            <label class="col-sm-12 control-label">ویدیو آموزش</label>
                            <x-chunked-upload
                                type="video"
                                name="video"
                                accept="video/*"
                                :required="false"
                                :existingFile="$episode->video"
                                label="ویدیو آموزش"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-8">
                            <label class="col-sm-12 control-label">فایل آموزش</label>
                            <x-chunked-upload
                                type="file"
                                name="file"
                                accept="*/*"
                                :required="false"
                                :existingFile="$episode->file"
                                label="فایل آموزش"
                            />
                        </div>
                    </div>


                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea required name="body" class="ckeditor">{{$episode->body}}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اعمال ویرایش</button>
                            <a href="{{ route('admin.episode.index',['course_id'=>$course_id ]) }}"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('admin/js/chunked-uploader.js') }}"></script>
@endsection
