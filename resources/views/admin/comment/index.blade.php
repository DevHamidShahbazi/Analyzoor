@extends('layouts.layout admin.index')

@section('Header','نظر ها')
@section('comment','active')
@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نوع نظر</th>
                            <th  class="text-center text-light" scope="col" >برای مقاله</th>
                            <th  class="text-center text-light" scope="col" >تاریخ ثبت</th>
                            <th  class="text-center text-light" scope="col" >تصویر</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($comments ))
                            @foreach($comments as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        @if($val->parent_id == '0')
                                        اصلی
                                            @else
                                            پاسخ به <span class="text-primary">{{ $val->parent->comment }}</span>
                                        @endif
                                    </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->commentable->name}} @include('components.admin-is-active.index')</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{ Verta::instance($val->created_at)->formatDate() }}</td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <i>
                                            <img width="100" class="img-thumbnail" src="{{ $val->commentable->image}}">
                                        </i>
                                    </td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.comment.edit',['key'=>$key])
                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.comment.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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


