@extends('layouts.layout admin.index')

@section('Header','افزودن قسمت به دوره آموزشی '.$course->name)
@section('course','active')
@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">کل دوره ها</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.episode.index',['course_id'=>$course_id]) }}"> قسمت های {{$course->name}} </a>
    </li>
    <li class="breadcrumb-item">افزودن قسمت</li>
@endsection

@section('content')

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">اضافه کردن دوره</h3>
            </div>
        @include('alert.toastr.error')
        @include('alert.toastr.success')

        @include('alert.form.error')
            <br>

            <form method="POST" action="{{ route('admin.episode.store',['course_id'=>$course_id]) }}"  enctype="multipart/form-data" >
                @csrf

                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="{{ old('name')  }}" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع </label>
                            <select  class="form-control" name="type">
                                @foreach(config('static_array.episodeType') as $key => $value)
                                    <option value="{{$value}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">زمان</label>
                            <input required type="text" value="{{old('time')}}" name="time" class="form-control"
                                   placeholder="زمان کل دوره">
                        </div>

                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >انتخاب فصل</label>
                            <select  class="form-control" name="chapter_id">
                                @foreach($course?->chapters()?->get() as  $chapter)
                                    <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="{{old('title')}}" name="title" class="form-control"
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
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="{{old('keywords')}}" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">ویدیو آموزش</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required name="video" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب ویدیو</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">فایل آموزش</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input  name="file" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea  name="body" class="ckeditor">{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اضافه کردن</button>
                            <a href="{{ route('admin.episode.index',['course_id'=>$course_id ]) }}"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection

