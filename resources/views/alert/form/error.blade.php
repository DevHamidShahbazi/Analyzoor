@if($errors->any())
    <br>

    <div class="col-12">
        <div class="alert alert-danger alert-dismissible" dir="rtl">
{{--            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
            <h5 class="text-white"><i class=" icon fa fa-ban"></i>خطا!</h5>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <br>
@endif
