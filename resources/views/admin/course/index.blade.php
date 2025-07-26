@extends('layouts.layout admin.index')

@section('Header','دوره های آموزشی')
@section('course','active')
@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a href="{{ route('admin.course.create') }}" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن دوره</i>
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >دسته بندی</th>
                                <th  class="text-center text-light" scope="col" >قیمت</th>
                                <th  class="text-center text-light" scope="col" >تعداد فروش</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >تصویر</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            @if(!empty($courses ))
                                @foreach($courses as $key=> $val)
                                    <tr class="item{{$val->id}}">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                            <a target="_blank" href="{{--{{route('course.detail',$val->slug)}}--}}">
                                                {{$val->name}}
                                                @if($val->users->count() > 0)
                                                    <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="تعداد کاربران: {{ $val->users->count() }}">{{ $val->users->count() }}</span>
                                                @endif
                                            </a>
                                            <span class="badge bg-{{$val->status == 'comingSoon' ? 'warning': ($val->status=='currently'?'danger-gradient':'success')}}">{{array_search($val->status,config('static_array.courseStatus'))}}</span>
                                            <span class="badge bg-{{$val->type == 'free' ? 'secondary-gradient':'primary-gradient'}}">{{array_search($val->type,config('static_array.courseType'))}}</span>
                                           </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >{{$val->category->name}}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >
                                            @if($val->type == 'free')
                                                <span class="badge bg-success">رایگان</span>
                                            @else
                                                @if($val->discount)
                                                    <span class="text-decoration-line-through text-muted">{{ number_format($val->price) }} تومان</span>
                                                    <br>
                                                    <span class="badge bg-danger">{{ number_format($val->discount) }} تومان</span>
                                                @else
                                                    <span class="badge bg-primary">{{ number_format($val->price) }} تومان</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >{{count($val->payments()->where('status','1')->get())}}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{ Verta::instance($val->created_at)->formatDate() }}</td>
                                        <td  style="padding:inherit" class="text-center" >
                                            <i>
                                                <img width="100" class="img-thumbnail" src="{{ $val->image }}" alt="{{ $val->alt }}">
                                            </i>
                                        </td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">

                                            <a data-toggle="tooltip" data-placement="top" title="قسمت ها" href="{{ route('admin.episode.index',['course_id'=>$val->id ]) }}"  style="width: max-content;" class="btn-sm btn-primary  col-lg-12">
                                                <i>{{  count($val->episodes()->get()) ?? '' }}</i>
                                                <i class="fas fa-video"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="فصل ها" href="{{ route('admin.chapter.index',['course_id'=>$val->id ]) }}"  style="width: max-content;" class="btn-sm btn-warning  col-lg-12">
                                                <i>{{  count($val->chapters()->get()) ?? '' }}</i>
                                                <i class="fas fa-bar-chart"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="سوال ها" href="{{ route('admin.question.index',['course_id'=>$val->id ]) }}"  style="width: max-content;" class="btn-sm btn-secondary  col-lg-12">
                                                <i>{{  count($val->questions()->get()) ?? '' }}</i>
                                                <i class="fas fa-question"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="{{ route('admin.course.edit',$val->id) }}"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.course.destroy',$val->id) }}"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
                                                <i class="fa fa-trash"></i>
                                            </a>

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
    </div>

@endsection
