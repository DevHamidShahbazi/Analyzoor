@extends('layouts.layout admin.index')

@section('Header',' لیست دسته بندی ها')
@section('category','active')
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

                <div class="col-sm-12 float-sm-right">
                    <div style="text-align: initial;" class="m-b-30 text-light mb-2">
                        <a data-toggle="modal" data-target="#AddList" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن دسته بندی</i></a>
                    </div>
                    @include('admin.category.create')
                </div>
            @include('components.admin-select-box-filter.index',['name_checkbox'=>'type','value_selectBox'=>config('fanoram.categoryType')])
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr style="background-color: #343a40;" >
                            <th  class="text-center text-light" scope="col">ردیف</th>
                            <th  class="text-center text-light" scope="col" >نام</th>
                            <th  class="text-center text-light" scope="col" >نوع دسته بندی</th>
                            <th  class="text-center text-light" scope="col" >زیر مجموعه</th>
                            <th  class="text-center text-light" scope="col" >تصویر</th>
                            <th  class="text-center text-light" scope="col" >ویرایش</th>
                            <th  class="text-center text-light" scope="col" >حذف</th>
                        </tr>

                        @if(!empty($categories ))
                            @foreach($categories as $key=> $val)
                                <tr class="item{{$val->id}}">
                                    <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->name}}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{array_search($val->type,config('fanoram.categoryType'))}}</td>
                                    <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                        @if($val->parent_id == '0')

                                            @if($val->children()->get()->isEmpty())
                                                اصلی
                                                <span class="badge bg-primary" style="font-size: 100%">
                                                بدون زیر مجموعه
                                                </span>
                                            @endif

                                            @foreach ($val->children()->get() as $v)
                                                <span class="badge bg-danger" style="font-size: 100%">
                                                {{ $v->name }}
                                                </span>
                                            @endforeach

                                        @else
                                            {{ 'زیرمجموعه '.$val->parent->name }}
                                        @endif
                                    </td>
                                    <td  style="padding:inherit" class="text-center" >
                                        <i>
                                            <img width="100" class="img-thumbnail" src="{{ $val->image }}" alt="{{ $val->alt }}">
                                        </i>
                                    </td>
                                    <td style="padding:1.5rem 0" class="text-center font-weight-bold">
                                        <button data-toggle="modal" data-target="#EditList{{$key}}" type="button" style="width: max-content;" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><i style="margin: inherit;">ویرایش</i></button>
                                    </td>
                                    @include('admin.category.edit',['key'=>$key])

                                    <td  style="padding:1.5rem 0" class="text-center  text-light ">
                                        <a href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.category.destroy',$val->id) }}"  type="submit" style="width: max-content;" class="btn-sm btn-danger btnDelete" ><i style="margin: 0 0 0 5px;" class="fa fa-trash"></i><i style="margin: inherit;">حذف</i></a>
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


