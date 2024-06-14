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
                <div class="row">
                    @include('components.admin-image-show-setting.show_image_setting',['key_name'=>'logo','label'=>'لوگو'])
                </div>
            </div>




            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('admin.setting.store') }}"  enctype="multipart/form-data" >
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


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">alt</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{setting_with_key('logo_alt')->value}}" name="logo_alt" class="form-control"
                                   placeholder="logo_alt">
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


