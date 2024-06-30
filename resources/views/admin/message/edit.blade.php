
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
                            مشاهده پیام  {{ $val->name }}</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                        @if($val->body)
                            <p class="font-weight-bold text-center p-5">
                                {{$val->body}}
                            </p>
                        @else
                            <div class="col-12 bg-warning p-5">
                                <p class="font-weight-bold text-dark text-center">
                                    کاربر توضیحاتی ارسال نکرده است
                                </p>
                            </div>
                        @endif

                    </div>
                    <!-- Panel 7 -->

                </div>

            </div>
        </div>
        <!-- Content -->

    </div>
</div>
<!-- Modal: edit Form Demo -->
