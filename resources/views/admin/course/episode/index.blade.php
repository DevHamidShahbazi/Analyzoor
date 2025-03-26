@extends('layouts.layout admin.index')

@section('Header',' قسمت های آموزشی '.$course->name)
@section('course','active')

@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">لیست دوره ها</a>
    </li>

@endsection


@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a href="{{ route('admin.episode.create',['course_id'=>$course_id]) }}" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن قسمت</i>
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >ویدیو</th>
                                <th  class="text-center text-light" scope="col" >فایل</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            @if(!empty($episodes ))
                                @foreach($episodes as $key=> $val)
                                    <tr class="item{{$val->id}}">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                            <a target="_blank" href="{{--{{route('episode.detail',$val->slug)}}--}}">
                                                {{$val->name}}
                                            </a>
                                            <span class="badge bg-{{$val->type == 'free' ? 'success-gradient':'primary-gradient'}}">{{array_search($val->type,config('static_array.episodeType'))}}</span>
                                           </td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >@if($val->video) <span  class="badge bg-success" >دارد</span> @else <span class="badge bg-danger" >ندارد</span> @endif</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold " >@if($val->file) <span  class="badge bg-success" >دارد</span> @else <span class="badge bg-danger" >ندارد</span> @endif</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{ $val->created_date }}</td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">


                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="{{ route('admin.episode.edit',$val->id) }}"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.episode.destroy',$val->id) }}"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
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
