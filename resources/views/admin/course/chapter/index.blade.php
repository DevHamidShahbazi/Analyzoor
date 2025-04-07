@extends('layouts.layout admin.index')

@section('Header',' قسمت های آموزشی '.$course->name)
@section('course','active')

@section('address')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.course.index') }}">لیست دوره ها</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.episode.index',['course_id'=>$course_id]) }}"> لیست قسمت ها {{ $course->name }}</a>
    </li>
    <li class="breadcrumb-item">{{ ' فصل های آموزشی '.$course->name }}</li>
@endsection

@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')
    @include('alert.form.error')

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن فصل</i></a>
                    </div>
                    @include('admin.course.chapter.create')
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col">نام</th>
                            <th  class="text-center text-light" scope="col">عنوان</th>
                            <th  class="text-center text-light" scope="col">قسمت ها</th>
                            <th  class="text-center text-light" scope="col">ترتیب</th>
                            <th  class="text-center text-light" scope="col">ویرایش</th>
                            <th  class="text-center text-light" scope="col">حذف</th>
                        </tr>

                        @if(!empty($chapters))
                            @foreach($chapters as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->name}}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->title}}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        @foreach ($val->episodes()->get() as $v)
                                            <span class="badge bg-primary" style="font-size: 100%">{{ $v->name }}</span>
                                        @endforeach
                                    </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->sort}}</td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.course.chapter.edit')

                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.chapter.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


