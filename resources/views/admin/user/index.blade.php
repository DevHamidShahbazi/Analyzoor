@extends('layouts.layout admin.index')

@section('Header','لیست کاربران')
@section('users','active')
@section('script')
    <script>
        $(document).ready(function(){
            $(".filter").change(function() {
                $(".form").submit();
            });

            $(function() {
                var $magics = $('.pass');
                $magics.on('click', function () {
                    var $magic = $(this);
                    var password = $magic.data('password');
                    $magic.text(password);
                });
            });

        });
    </script>
@endsection
@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="card-header">
                    <div class="col-sm-12 ">

                        <div class="col-sm-12 ">
                            <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                                <a href="#" data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>
                                    <i  style="margin: inherit; ">افزودن کاربر</i>
                                </a>
                            </div>
                            @include('admin.user.create')
                        </div>
                        @include('components.admin-select-box-filter-with-static-value.index',['name_checkbox'=>'status','value_selectBox'=>config('static_array.userLevel'),'label'=>'نوع کاربر'])
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >موبایل</th>
                            <th  class="text-center text-light" scope="col" >ایمیل</th>
                            <th  class="text-center text-light" scope="col" >رمز عبور</th>
                            <th  class="text-center text-light" scope="col" >نوع</th>
                            <th  class="text-center text-light" scope="col" >تاریخ ثبت نام</th>
                            <th  class="text-center text-light" scope="col" >کد تایید</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >دوره‌ها</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($users ))
                            @foreach($users as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td   scope="row" class="Dlt text-center font-weight-bold">{{ $key+1 }}</td>
                                    <td  class="text-center font-weight-bold" >
                                        {{$val->name}}
                                    </td>
                                    <td  class="text-center font-weight-bold" >
                                        {{$val->phone == null ? '___' : $val->phone}}
                                        @if(auth()->user()->checkVerifyUser($val))
                                            <span class="badge bg-success" id="count">تایید شده</span>
                                        @else
                                            <span class="badge bg-danger" id="count">تایید نشده</span>
                                        @endif
                                        @if($val->visits()->count())
                                            <span
                                                data-toggle="tooltip" data-placement="right" data-html="true"  data-original-title="تعداد بازدید"
                                                class="badge bg-primary">{{ $val->visits()->count() }}</span>
                                        @endif
                                    </td>
                                    <td  class="text-center font-weight-bold" >{{$val->email == null ? '___' : $val->email}}</td>
                                    <td class="text-center font-weight-bold" >
                                        <span class="pass" data-password="{{\Illuminate\Support\Facades\Crypt::decrypt($val->crypt)}}" >
                                            ****
                                        </span>
                                    </td>
                                    <td  class="text-center font-weight-bold" >
                                        {{array_search($val->level,config('static_array.userLevel'))}}
                                    </td>

                                    <td class="text-center font-weight-bold iranyekan" >
                                        <span class="px-2" data-toggle="tooltip" data-placement="right" data-html="true"  data-original-title="ساعت : {{Verta::instance($val->created_at)->format('H:i:s')}}" >
                                            {{ Verta::instance($val->created_at)->format('Y/n/j') }}
                                        </span>
                                    </td>

                                    <td class="text-center font-weight-bold iranyekan" >
                                        @if($val->activeCode()->where('expire_at','<=',now())->get()->count())
                                            @foreach ($val->activeCode()->where('expire_at','<=',now())->get() as $key => $code)
                                                @php $code->delete() @endphp
                                            @endforeach
                                        @endif
                                         {{ $val->activeCode()->where('expire_at','>',now())->first()->code ?? '__' }}
                                    </td>

                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.user.edit',['key'=>$key])

                                    <td class="text-center font-weight-bold">
                                        <a href="{{ route('admin.course.index', ['user_id' => $val->id]) }}" type="button" style="width: max-content;" class="btn btn-success btn-sm">
                                            <i class="fas fa-graduation-cap"></i>
                                            <i style="margin: inherit;">دوره‌ها</i>
                                            @if($val->courses()->count() > 0)
                                                <span class="badge badge-light">{{ $val->courses()->count() }}</span>
                                            @endif
                                        </a>
                                    </td>

                                    <td  class="text-center  text-light ">
                                        <a href="#!" data-id="{{ $val->id }}" data-route="{{ route('admin.user.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
