@extends('layouts.layout admin.index')

@section('Header','مقالات')
@section('Articles','active')
@section('script')
    <script>

        var UrlIs_active = "{{route('admin.article.is_active')}}";

        $(document).ready(function(){


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".is_active").change(function() {
                var id = $(this).data('id');
                var is_active = $(this).val();

                if(is_active == 1){
                    $(`#color-${id}`).removeClass('bg-danger').addClass('bg-success').html('نمایش');
                }else if(is_active == 0){
                    $(`#color-${id}`).removeClass('bg-success').addClass('bg-danger').html('عدم نمایش');
                }

                $.ajax({
                    url:UrlIs_active ,
                    type: 'POST',
                    data: {id,is_active},
                });
            });



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
                        <a href="{{ route('admin.article.create') }}" type="button"  class="btn  btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            <i  style="margin: inherit; ">افزودن مقاله</i>
                        </a>
                            @include('components.admin-select-box-filter.index',
                            ['label'=>'نمایش بر اساس دسته بندی',
                            'value_select_box'=>\App\Models\Article::all(),
                            'name_select_box'=>'category_id',
                            'name_model_relation'=>'category',
                            'name_model_for_show'=>'name',
                            ]
                            )
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr style="background-color: #343a40;" >
                                <th  class="text-center text-light" scope="col">ردیف</th>
                                <th  class="text-center text-light" scope="col" >نام</th>
                                <th  class="text-center text-light" scope="col" >دسته بندی</th>
                                <th  class="text-center text-light" scope="col" >وضعیت</th>
                                <th  class="text-center text-light" scope="col" >title</th>
                                <th  class="text-center text-light" scope="col" >تاریخ ایجاد</th>
                                <th  class="text-center text-light" scope="col" >تصویر</th>
                                <th  class="text-center text-light" scope="col" >اقدامات</th>
                            </tr>


                            @if(!empty($articles ))
                                @foreach($articles as $key=> $val)
                                    <tr class="item{{$val->id}}">
                                        <td style="padding:1.5rem 0" class="Dlt text-center font-weight-bold">{{ $loop->count-$key }}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->name}} @include('components.admin-is-active.index')</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->category->name}}</td>

                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >
                                            <select class="is_active" name="is_active" data-id="{{$val->id}}">
                                                <option class="text-danger" @if($val->is_active == 0)  selected  @endif value="0">عدم نمایش</option>
                                                <option class="text-success" @if($val->is_active == 1)  selected  @endif value="1">نمایش</option>
                                            </select>
                                        </td>


                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{$val->title}}</td>
                                        <td style="padding:1.5rem 0"  class="text-center font-weight-bold" >{{ Verta::instance($val->created_at)->formatDate() }}</td>
                                        <td  style="padding:inherit" class="text-center" >
                                            <i>
                                                <img width="100" class="img-thumbnail" src="{{ $val->image }}" alt="{{ $val->alt }}">
                                            </i>
                                        </td>
                                        <td  style="padding:1.5rem 0" class="text-center  text-light ">

                                            @include('components.admin-copy-item.index',['route'=>'admin.article.copy'])


                                            <a data-toggle="tooltip" data-placement="top" title="فایل ها" href="{{ route('admin.article-file.index',['id'=>$val->id ]) }}"  style="width: max-content;" class="btn-sm btn-secondary  col-lg-12">
                                                <i>{{  count($val->files()->get()) ?? '' }}</i>
                                                <i class="fas fa-file"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="لینک های دانلود" href="{{ route('admin.article-url.index',['id'=>$val->id ]) }}"  style="width: max-content;" class="btn-sm btn-warning  col-lg-12">
                                                <i>{{  count($val->urls()->get()) ?? '' }}</i>
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="ویرایش" href="{{ route('admin.article.edit',$val->id) }}"  style="width: max-content;" class="btn-sm btn-info col-lg-12">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a data-toggle="tooltip" data-placement="top" title="حذف" href="#" data-id="{{ $val->id }}" data-route="{{ route('admin.article.destroy',$val->id) }}"  style="width: max-content;" class="btn-sm btn-danger col-lg-12 btnDelete" >
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
