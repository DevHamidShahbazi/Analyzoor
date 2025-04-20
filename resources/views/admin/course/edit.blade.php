@extends('layouts.layout admin.index')

@section('Header','ویرایش دوره آموزشی')
@section('course','active')
@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">لیست دوره ها</a>
    </li>
    <li class="breadcrumb-item"> ویرایش دوره {{ $course->name }}</li>
@endsection

@section('content')

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">ویرایش دوره {{ $course->name }}</h3>
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

            @if($course->image==null)
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                        هنوز عکسی انتخاب نشده است
                    </div>
                </div>
            @else
                <div class="text-center">
                    <img src="{{$course->image}}" class="rounded col-lg-3" alt="{{$course->alt}}">
                </div>
        @endif

        <!-- form start -->
            <form method="POST" action="{{ route('admin.course.update',$course->id) }}"  enctype="multipart/form-data" >
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body mb-1 te">

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0">نام</label>
                            <input required value="{{$course->name}}" type="text"
                                   class="form-control" name="name" >
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >دسته بندی</label>
                            <select class="form-control" name="category_id">
                                @php $categories = \App\Models\Category::where('type','course')->get() @endphp
                                @foreach ($categories as $value)
                                    <option {{ $course->category->id == $value->id ? 'selected' : ' ' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >وضعیت</label>
                            <select class="form-control" name="status">
                                @foreach(config('static_array.courseStatus') as $persian_name => $real_name)
                                    <option {{ $course->status == $real_name ? 'selected' : '' }} value="{{$real_name}}">{{$persian_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع</label>
                            <select class="form-control" name="type">
                                @foreach(config('static_array.courseType') as $persian_name => $real_name)
                                    <option {{ $course->type == $real_name ? 'selected' : '' }} value="{{$real_name}}">{{$persian_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0 parent">قیمت</label>
                            <span class="priceStatus1 parent"><span class="iranyekan mx-2 priceResult1"></span>تومان</span>
                            <input value="{{ $course->price  }}" type="number"
                                   class="form-control parent priceInput1" autocomplete="off" name="price" >
                        </div>
                    </div>

                    <div class="md-form mb-2 row">
                        <div class="col-lg-5">
                            <label class="m-0 parent text-danger">قیمت با تخفیف</label>
                            <span class="priceStatus2 parent"><span class="iranyekan mx-2 priceResult2"></span>تومان</span>
                            <input value="{{ $course->discount  }}" type="number"
                                   class="form-control parent priceInput2" autocomplete="off" name="discount" >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">زمان</label>
                            <input type="text" value="{{$course->time}}" name="time" class="form-control"
                                   placeholder="زمان کل دوره">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">پاراگراف</label>
                            <input type="text" value="{{$course->paragraph}}" name="paragraph" class="form-control"
                                   placeholder="پاراگراف">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">title</label>
                            <input type="text" value="{{$course->title}}" name="title" class="form-control"
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
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description">{{$course->description}}</textarea>
                            </div>
                        </div>



                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-12 control-label">keywords</label>
                            <input type="text" value="{{$course->keywords}}" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-2 control-label">alt</label>
                            <input type="text" value="{{$course->alt}}" name="alt" class="form-control"
                                   placeholder="alt">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 text-center my-4">
                        <h5>توضیحات</h5>
                        <div class="md-form mb-0">
                            <textarea required name="body" class="ckeditor">{{$course->body}}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اعمال ویرایش</button>
                            <a href="{{ route('admin.course.index') }}"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection
