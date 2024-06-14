@if($val->is_active == '1')
    <span class="badge bg-success">
                            تایید شده
</span>
@elseif($val->is_active == '0')
    <span class="badge bg-danger" >
                            تایید نشده
</span>
@endif

