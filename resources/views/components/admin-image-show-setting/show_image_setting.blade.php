
<div class="col-2 text-center">
    @if(setting_with_key($key_name)?->value==null)
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                هنوز عکسی برای {{ $label }} انتخاب نشده است
            </div>
        </div>
    @else
        {{$label}}
        <a target="_blank" href="{{setting_with_key($key_name)?->value}}">
            <img src="{{setting_with_key($key_name)?->value}}" class="rounded col-lg-3" title="{{$label}}" alt="{{$label}}">
        </a>
    @endif

</div>


