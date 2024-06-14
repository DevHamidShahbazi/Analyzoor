
<div class="modal fade" id="EditList{{$key}}">
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
                            ویرایش  {{ $val->name }}
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                    @include('alert.form.error')

                    <br>

                    @if($val->image==null)
                        <div class="col-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                                هنوز عکسی انتخاب نشده است
                            </div>
                        </div>

                    @else
                        <div class="text-center ">
                            <img src="{{$val->image}}" class="rounded col-6" alt="{{$val->alt}}">
                        </div>
                    @endif

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="{{ route('admin.category.update',$val->id) }}"  enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input  required value="{{ $val->name  }}" type="text" class="form-control" name="name" >
                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >نوع دسته بندی</label>
                                    <select class="form-control" name="type" >
                                        @foreach (config('fanoram.categoryType') as $name => $value)
                                            <option {{ $val->type == $value ? 'selected' :' ' }}
                                                    value="{{ $value }}">{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0" >زیرمجموعه</label>
                                    <select class="form-control" name="parent_id" >
                                        <option {{ $val->parent_id == '0' ? 'selected' :' ' }}
                                                value="0">
                                            دسته بندی اصلی
                                        </option>
                                        @foreach ($categories_select_box as $value)
                                            <option {{ $val->parent_id == $value->id ? 'selected' :' ' }} value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-12 control-label">title</label>
                                    <input type="text" value="{{$val->title}}" name="title" class="form-control"
                                           placeholder="title">
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label" >
                                            <span class="badge bg-primary" id="count">0</span>
                                            description
                                        </label>
                                        <textarea  name="description"  id="description" class="form-control" rows="3" placeholder="description">{{$val->description}}</textarea>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">keywords</label>
                                    <input type="text" value="{{$val->keywords}}" name="keywords" class="form-control"
                                           placeholder="keywords">
                                </div>


                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">alt</label>
                                    <input type="text" value="{{$val->alt}}" name="alt" class="form-control"
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
                                    <button type="submit" class="btn btn-primary btn-sm ">ویرایش</button>
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
