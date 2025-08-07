
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

                        <form method="POST" action="{{ route('admin.user.update',$val->id) }}"  enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body mb-1">
                                <div class="modal-body mb-1">

                                    <div class="md-form mb-2">
                                        <label class="m-0">نام</label>
                                        <input list="names" required value="{{ $val->name  }}" type="text" class="form-control" name="name" >
                                    </div>

                                    <div class="md-form mb-2">
                                        <label class="m-0" >شماره مویابل</label>
                                        <input value="{{ $val->phone  }}" id="phone" type="text" class="form-control" name="phone" >
                                        @if($errors->has('phone'))
                                            <p style="color: red">{{$errors->first('phone')}}</p>
                                        @endif
                                    </div>


                                    <div class="md-form mb-2">
                                        <label class="m-0">ایمیل</label>
                                        <input value="{{ $val->email  }}" id="email" type="email" class="form-control" name="email" >
                                        @if($errors->has('email'))
                                            <p style="color: red">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>

                                    <div class="md-form mb-2">
                                        <div class="form-group">
                                            <label class="m-0">وضعیت موبایل</label>
                                            <select name="verify" class="form-control">
                                                @foreach(config('static_array.userVerify') as $key => $verify)
                                                    <option
                                                        {{ auth()->user()->checkVerifyUser($val)  ? 'selected' : '' }}
                                                        value="{{$key}}">
                                                        {{$verify}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->has('verify'))
                                            <p style="color: red">{{$errors->first('verify')}}</p>
                                        @endif
                                    </div>


                                    <div class="md-form mb-2">
                                        <div style="text-align: right;direction: rtl" >
                                            <label class="m-0">رمز عبور</label>
                                            <input placeholder="رمز عبور جدید را وارد کنید (اختیاری)" value=""
                                                   dir="rtl" id="password" class="form-control" name="password" >
                                        </div>
                                        <small class="form-text text-muted">اگر می‌خواهید رمز عبور را تغییر دهید، آن را وارد کنید</small>
                                        @if($errors->has('password'))
                                            <p style="color: red">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>

                                    <div class="md-form mb-2">
                                        <div class="form-group">
                                            <label class="m-0">نوع</label>
                                            <select name="level" class="form-control">

                                                @foreach(config('static_array.userLevel') as $persian_name => $real_name)
                                                    <option {{ $val->level == $real_name ? 'selected' : '' }}
                                                            value="{{$real_name}}">{{$persian_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->has('level'))
                                            <p style="color: red">{{$errors->first('level')}}</p>
                                        @endif
                                    </div>

                                    <div class="md-form mb-2">
                                        <div class="form-group">
                                            <label class="m-0">دوره‌های کاربر</label>
                                            <select name="courses[]" id="courses-select-{{$val->id}}" class="form-control" multiple>
                                                @php 
                                                    $courses = \App\Models\Course::select('id', 'name', 'type', 'status')->where('status', '!=', 'comingSoon')->orderBy('name')->get();
                                                    $userCourseIds = $val->courses()->pluck('course_id')->toArray();
                                                @endphp
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}" {{ in_array($course->id, $userCourseIds) ? 'selected' : '' }}>
                                                        {{ $course->name }} ({{ array_search($course->type, config('static_array.courseType')) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">می‌توانید چندین دوره را انتخاب کنید</small>
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
