@extends('layouts.layout admin.index')

@section('Header',' لیست تماس باما')
@section('messages','active')

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
                            <th  class="text-center text-light" scope="col" >تاریخ درخواست</th>
                            <th  class="text-center text-light" scope="col" >موبایل</th>
                            <th  class="text-center text-light" scope="col" >نام و نام خانوادگی</th>
                            <th  class="text-center text-light" scope="col" >مشاهده</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($messages ))
                            @foreach($messages as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td  style="vertical-align: center" scope="row" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>

                                    <td  class="text-center font-weight-bold" >{{$val->getCreateHourAttribute().' - '.$val->getCreateDateAttribute()}}</td>

                                    <td  class="text-center font-weight-bold" >{{$val->phone}}</td>
                                    <td  class="text-center font-weight-bold" >{{$val->name}}</td>
                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-eye ml-2"></i><i style="margin: inherit;">نمایش</i></button>
                                    </td>
                                    @include('admin.message.edit',['key'=>$key])

                                    <td  class="text-center  text-light ">
                                        <a href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.message.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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


