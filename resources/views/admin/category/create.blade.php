

<div class="modal fade" id="AddList">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div style="height: 100%" class="modal-content">

            <!--Modal cascading tabs-->
            <div style="height: 100%" class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab">
                            <i class="fa fa-plus"></i>
                            اضافه کردن دسته بندی
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                   @include('alert.form.error')


                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="{{ route('admin.category.store') }}"  enctype="multipart/form-data" >
                            @csrf

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input required value="{{ old('name')  }}"  dir="rtl" id="name" type="text" class="form-control" name="name" >
                            </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >نوع دسته بندی</label>
                                    <select class="form-control" name="type">
                                        @foreach (config('fanoram.categoryType') as $name => $category)
                                            <option value="{{ $category }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0" >زیر مجموعه</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option style="text-align: center;" value="0">دسته بندی اصلی</option>
                                        @foreach (config('fanoram.categoryType') as $name => $category)
                                            <optgroup label="{{ $name.' ها ' }}">
                                                @foreach ($categories_select_box->where('type',$category) as $k => $value)
                                                    @if($value->parent_id == '0')
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">title</label>
                                        <input type="text" value="{{old('title')}}" name="title" class="form-control"
                                               placeholder="title">
                                </div>

                                <div class="form-group">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label" >
                                                <span class="badge bg-primary" id="count">0</span>
                                                description
                                            </label>
                                            <textarea  name="description" id="description" class="form-control" rows="3" placeholder="description">{{old('description')}}</textarea>
                                        </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">keywords</label>
                                        <input type="text" value="{{old('keywords')}}" name="keywords" class="form-control"
                                               placeholder="keywords">
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">alt</label>
                                        <input type="text" value="{{old('alt')}}" name="alt" class="form-control"
                                               placeholder="alt">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">اضافه کردن</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                </div>


                            </div>

                        </form>



                    </div>
                    <!-- Panel 7 -->

                </div>

            </div>
        </div>
        <!-- Content -->

    </div>
</div>
