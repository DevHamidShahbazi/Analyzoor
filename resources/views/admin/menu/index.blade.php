@extends('layouts.layout admin.index')

@section('Header',' لیست منو ها')
@section('menus','active')

@section('content')
    @include('alert.toastr.error')
    @include('alert.toastr.success')

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #353b5000">

                <div class="col-sm-12 float-sm-right mb-2">
                    <div style="text-align: initial;" class="m-b-30 text-light">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن منو</i></a>
                    </div>
                    @include('admin.menu.create')
                </div>



                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >ترتیب</th>
                            <th  class="text-center text-light" scope="col" >لینک</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($menus ))
                            @foreach($menus as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td   scope="row" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                    <td  class="text-center font-weight-bold" >{{$val->name}}</td>
                                    <td  class="text-center font-weight-bold" >{{$val->sort}}</td>

                                    <td  class="text-center font-weight-bold" >{{$val->url}}</td>
                                    <td class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#modalLRFormDemo{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.menu.edit',['key'=>$key])

                                    <td  class="text-center  text-light ">
                                        <a href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.menu.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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


