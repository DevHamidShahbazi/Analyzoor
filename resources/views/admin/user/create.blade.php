

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
                            اضافه کردن کاربر
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 17 -->

                   @include('alert.form.error')


                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <form method="POST" action="{{ route('admin.user.store') }}"  enctype="multipart/form-data" >
                            @csrf

                            <div class="modal-body mb-1">

                                <div class="md-form mb-2">
                                    <label class="m-0">نام</label>
                                    <input required value="{{ old('name')  }}"  dir="rtl" id="name" type="text" class="form-control" name="name" >
                                </div>

                                <div class="md-form mb-2">
                                    <label class="m-0" >شماره مویابل</label>
                                    <input required value="{{ old('phone')  }}" type="text" class="form-control" name="phone" >
                                </div>


                                <div class="md-form mb-2">
                                    <label class="m-0">ایمیل</label>
                                    <input value="{{ old('email')  }}" type="email" class="form-control" name="email" >
                                </div>

                                <div class="md-form mb-2">
                                    <div class="form-group">
                                        <label class="m-0">وضعیت موبایل</label>
                                        <select name="verify" class="form-control">
                                            @foreach(config('static_array.userVerify') as $key => $verify)
                                                <option value="{{$key}}">{{$verify}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="md-form mb-2">
                                    <div style="text-align: right;direction: rtl" >
                                        <label class="m-0">رمز عبور</label>
                                        <input required placeholder="رمز عبور جدید را وارد کنید" value="{{ old('password') }}"
                                               dir="rtl" id="password" class="form-control" name="password" >
                                    </div>
                                </div>


                                <div class="md-form mb-2">
                                    <div class="form-group">
                                        <label class="m-0">نوع</label>
                                        <select name="level" class="form-control">
                                            @foreach(config('static_array.userLevel') as $persian_name => $real_name)
                                                <option value="{{$real_name}}">{{$persian_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 mt-4">
                                        <div class="checkbox ">
                                            <label>
                                                <input type="checkbox" name="sendCode" id="sendCode" {{ old('sendCode') ? 'checked' : '' }}>
                                               رمز عبور به کاربر ارسال شود
                                            </label>
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
