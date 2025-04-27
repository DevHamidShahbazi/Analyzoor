@extends('layouts.layout admin.index')

@section('Header','افزودن دوره آموزشی')
@section('course','active')
@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">لیست دوره ها</a>
    </li>
    <li class="breadcrumb-item">افزودن دوره</li>
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

            <form method="POST" action="{{ route('admin.course.store') }}"  enctype="multipart/form-data" >
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
                            <label class="m-0" >دسته بندی</label>
                            <select class="form-control" name="category_id">
                                @php $categories = \App\Models\Category::where('type','course')->get() @endphp
                                @foreach ($categories as $k => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >وضعیت </label>
                            <select  class="form-control" name="status">
                                @foreach(config('static_array.courseStatus') as $key => $value)
                                    <option value="{{$value}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0" >نوع </label>
                            <select  class="form-control" name="type">
                                @foreach(config('static_array.courseType') as $key => $value)
                                    <option value="{{$value}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="md-form mb-2">
                        <div class="col-lg-5">
                            <label class="m-0 parent">قیمت</label>
                            <span class="priceStatus1 parent"><span class="iranyekan mx-2 priceResult1"></span>تومان</span>
                            <input value="{{ old('price')  }}" type="number"
                                   class="form-control parent priceInput1" autocomplete="off" name="price" >
                        </div>
                    </div>

                    <div class="md-form mb-2 row">
                        <div class="col-lg-5">
                            <label class="m-0 parent text-danger">قیمت با تخفیف</label>
                            <span class="priceStatus2 parent"><span class="iranyekan mx-2 priceResult2"></span>تومان</span>
                            <input value="{{ old('discount')  }}" type="number"
                                   class="form-control parent priceInput2" autocomplete="off" name="discount" >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-5">
                            <label  class="col-sm-12 control-label">پاراگراف</label>
                            <input type="text" value="{{old('paragraph')}}" name="paragraph" class="form-control"
                                   placeholder="پاراگراف">
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
                            <label  class="col-sm-2 control-label">alt</label>
                            <input type="text" value="{{old('alt')}}" name="alt" class="form-control"
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
                            <textarea required  name="body" class="ckeditor">{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm">اضافه کردن</button>
                            <a href="{{ route('admin.course.index') }}"  class="btn btn-danger btn-sm">لغو</a>
                        </div>

                    </div>



                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection

@section('script')
    <script>


        /*Price character*/
        var price = $(".priceInput1");
        if (price.val() === ""){
            $(".priceStatus1").fadeOut()
        }else {
            $(".priceResult1").text(PriceNumber(price.val()));
        }


        $(price).on("keyup", function() {

            $(".priceResult1").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus1").fadeOut()
            } else {
                $(".priceStatus1").fadeIn()
            }
        });
        /*Price character*/


        /*Price character*/
        var price2 = $(".priceInput2");
        if (price2.val() === ""){
            $(".priceStatus2").fadeOut()
        }else {
            $(".priceResult2").text(PriceNumber(price2.val()));
        }


        $(price2).on("keyup", function() {

            $(".priceResult2").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus2").fadeOut()
            } else {
                $(".priceStatus2").fadeIn()
            }
        });
        /*Price character*/


    </script>
@endsection
