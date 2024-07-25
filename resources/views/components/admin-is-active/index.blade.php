@if($val->is_active == '1')
    <span id="color-{{$val->id}}" class="badge bg-success">
نمایش
</span>
@elseif($val->is_active == '0')
    <span id="color-{{$val->id}}" class="badge bg-danger" >
عدم نمایش
</span>
@endif
