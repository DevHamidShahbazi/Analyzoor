
<!-- Modal: edit Form Demo -->
<div class="modal fade" id="modalLRFormDemo{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div {{--style="height: 550px"--}} class="modal-content">

            <!--Modal cascading tabs-->
            <div {{--style="height: 100%"--}} class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul style=" background-color: #353b50 !important" class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-light" data-toggle="tab" href="#panel17" role="tab"><i class="fa fa-edit"></i>
                            ویرایش  {{ $val->name }}</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                       @include('alert.form.error')

                        <form {{--id="SubmitForm"--}} method="POST" action="{{ route('admin.private-file.update', $val->id) }}"  enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body mb-1">
                                <div class="modal-body mb-1">

                                    @if($val->file==null)
                                        <div class="col-12">
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                                                هنوز عکسی انتخاب نشده است
                                            </div>
                                        </div>

                                    @else

                                        @if($val->for_download)
                                            <span class="badge bg-primary" >
                                                    برای دانلود
                                                </span>
                                        @else
                                            <div class="text-center">
                                                <img  src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($val->file) }}" class="rounded col-12" alt="{{$val->alt}}">
                                            </div>
                                        @endif

                                    @endif

                                    <div class="md-form mb-2">
                                        <label class="m-0">alt</label>
                                        <input value="{{ $val->alt }}"  type="text" class="form-control" name="alt" >
                                    </div>

                                        <div class="md-form mb-2">

                                                <label class="m-0" >وضعیت</label>
                                                <select class="form-control" name="for_download">
                                                    <option value="1" {{ $val->for_download == '1'? 'selected':'' }}>برای دانلود</option>
                                                    <option value="0" {{ $val->for_download == '0'? 'selected':'' }}>برای نمایش</option>
                                                </select>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="file" type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm">ویرایش </button>
                                        <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                    </div>
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
<!-- Modal: edit Form Demo -->
