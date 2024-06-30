
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
                            {{$val->commentable->name}}
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                   @include('alert.form.error')

                    <br>

                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="{{ route('admin.comment.update',$val->id) }}"  enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">متن نظر</label>
                                    <textarea name="comment" disabled class="form-control" >{{ $val->comment }}</textarea>
                                </div>

                                <div class="md-form mb-2">
                                        <label class="m-0" >این نظر نمایش داده شود؟</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1" {{ $val->is_active == '1'? 'selected':'' }}>نمایش</option>
                                            <option value="0" {{ $val->is_active == '0'? 'selected':'' }}>عدم نمایش</option>
                                        </select>
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">ویرایش</button>
                                    <button id="closed"  class="btn btn-danger btn-sm"  data-dismiss="modal"  data-toggle="tooltip" data-placement="bottom" data-html="true"  data-original-title="خروج">لغو</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
