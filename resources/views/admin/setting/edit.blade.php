@extends('layouts.layout admin.index')

@section('setting','active')

@section('content')

    <div class="col-md-12 ">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header text-center" style="background-color: #343a40">
                <h3 class="card-title">تنظیمات</h3>
            </div>


            @include('alert.toastr.error')
            @include('alert.toastr.success')

        @include('alert.form.error')

            <!-- /.card-header -->
            <br>
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('admin.sitemap')}}">
                    <i class="fa fa-download"></i>
                    sitemap
                </a>
            </div>
            <br>


            <div class="col-12">
                <div class="row">
                    @include('components.admin-image-show-setting.show_image_setting',['key_name'=>'logo','label'=>'لوگو'])
                </div>
            </div>




            <!-- form start -->
            <form id="myForm" class="form-horizontal" method="POST" action="{{ route('admin.setting.store') }}"  enctype="multipart/form-data" >
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">عنوان وب سایت</label>
                        <div class="col-sm-6">
                            <input type="text" required value="{{setting_with_key('banner')->value}}" name="banner" class="form-control"
                                   placeholder="عنوان وب سایت">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">شماره موبایل</label>
                        <div class="col-sm-6">
                            <input  value="{{setting_with_key('phone')->value}}" name="phone" class="form-control"
                                    required placeholder="شماره موبایل">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-12 control-label">title</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('title')->value}}" name="title" class="form-control"
                                   placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    description
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description">{{setting_with_key('description')->value}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">keywords</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('keywords')->value}}" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group">
                        <label  class="col-sm-12 control-label">{{setting_with_key('article_title')->label}}</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('article_title')->value}}" name="title" class="form-control"
                                   placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    <span class="badge bg-primary count" id="count">0</span>
                                    {{setting_with_key('article_description')->label}}
                                </label>
                                <textarea id="description" name="description" class="form-control description" rows="3" placeholder="description">{{setting_with_key('article_description')->value}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{setting_with_key('article_keywords')->label}}</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('article_keywords')->value}}" name="keywords" class="form-control"
                                   placeholder="keywords">
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">alt</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('logo_alt')->value}}" name="logo_alt" class="form-control"
                                   placeholder="logo_alt">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label" >
                                    توضیحات فوتر
                                </label>
                                <textarea name="body_footer" class="form-control" rows="3" placeholder="توضیحات فوتر">{{setting_with_key('body_footer')->value}}</textarea>
                            </div>
                        </div>
                    </div>



{{--                    <input type="hidden" name="parent_categories_home" value="[]">--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="col-sm-12 control-label">دسته بندی های اصلی در صفحه اصلی</label>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <select name="parent_categories_home[]" class="form-control select2"  multiple="multiple"--}}
{{--                                    data-placeholder="پروژه های منتخب در صفحه اصلی"--}}
{{--                                    style="width: 100%;text-align: right">--}}
{{--                                @php $parent_categories = \App\Models\Category::where('parent_id','0')->get() @endphp--}}
{{--                                @php $parent_categories_home_specify = setting_with_key('parent_categories_home')->value @endphp--}}
{{--                                @foreach ($parent_categories as $parent_category)--}}

{{--                                    <option {{ $parent_categories_home_specify ? in_array($parent_category->id ,$parent_categories_home_specify ) ? 'selected' : ' ': ' '  }} value="{{ $parent_category->id }}">--}}
{{--                                        {{ $parent_category->name }}</option>--}}

{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <input type="hidden" name="articles_home" value="[]">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">{{setting_with_key('articles_home')->label}}</label>
                        <div class="col-sm-6">
                            <select name="articles_home[]" class="form-control select2"  multiple="multiple"
                                    data-placeholder="{{setting_with_key('articles_home')->label}}"
                                    style="width: 100%;text-align: right">
                                @php $articles_home = \App\Models\Article::where('is_active','1')->get() @endphp
                                @php $articles_home_specify = setting_with_key('articles_home')->value @endphp
                                @foreach ($articles_home as $article_home)

                                    <option {{ $articles_home_specify ? in_array($article_home->id ,$articles_home_specify ) ? 'selected' : ' ': ' '  }} value="{{ $article_home->id }}">
                                        {{ $article_home->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="exampleInputFile">لوگو</label>
                        <div class="input-group col-sm-6">
                            <div class="custom-file">
                                <input name="logo" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">اعمال تغییرات</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>

@endsection

@section('script')
    <script>
        var price = $(".priceInput1");

        $(price).on("keyup focus", function() {

            $(".priceResult1").text(PriceNumber($(this).val()));
            if($(this).val() === "") {
                $(".priceStatus1").fadeOut()
            } else {
                $(".priceStatus1").fadeIn()
            }
        });
    </script>
@endsection


