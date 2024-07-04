
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

                        <form {{--id="SubmitForm"--}} method="POST" action="{{ route('admin.url.update',$val->id) }}"  enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body mb-1">
                                <div class="modal-body mb-1">

                                    <div class="md-form mb-2">
                                        <label class="m-0">نام</label>
                                        <input list="names" required value="{{ $val->name  }}"  dir="rtl" id="name" type="text" class="form-control" name="name" >

                                    </div>

                                    <div class="md-form mb-2">
                                        <label class="m-0" >لینک</label>
                                        <input value="{{ $val->url  }}" id="url" type="text" class="form-control" name="url" >
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
