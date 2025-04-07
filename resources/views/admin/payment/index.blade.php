@extends('layouts.layout admin.index')

@section('Header',' لیست تراکنش ها')
@section('payments','active')

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
                            <th  class="text-center text-light" scope="col" >نام محصول</th>
                            <th  class="text-center text-light" scope="col" >کاربر</th>
                            <th  class="text-center text-light" scope="col" >شماره تراکنش</th>
                            <th  class="text-center text-light" scope="col" >پیام بازگشتی</th>
                            <th  class="text-center text-light" scope="col" >تاریخ تراکنش</th>
                        </tr>

                        @if(!empty($payments ))
                            @foreach($payments as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td  style="vertical-align: center" scope="row" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>

                                    <td  class="text-center font-weight-bold" >
                                        {{$val->course->name}}

                                        @if($val->status)
                                            <span class="badge bg-success" >
                                            پرداخت شده
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                            عدم پرداخت
                                            </span>
                                        @endif
                                    </td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        <a href="#" data-toggle="modal" data-target="#modalLRFormDemo{{$key}}">
                                            {{$val->user->name}}
                                        </a>
                                    </td>
                                    @include('admin.user.edit',['key'=>$key,'val'=>$val->user,'dont_edit'=>true])
                                    <td  class="text-center font-weight-bold" >{{$val->result_number}}</td>
                                    <td  class="text-center font-weight-bold" >{{$val->result_message}}</td>
                                    <td  class="text-center font-weight-bold" >{{$val->created_date.' - '.$val->created_hour}}</td>
                                </tr>
                            @endforeach
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


