<div class="md-form mb-2">
    <form class="form" method="GET" action="{{ \Illuminate\Support\Facades\URL::current() }}">

        <div class="col-lg-2">
            <label class="m-0" >نوع کاربر</label>
            <br>
            <select class="form-control filter" name="{{$name_checkbox}}">
                <option @if(isset($checkbox))  {{ $checkbox[$name_checkbox] == '0' ? 'selected' : ' '  }}  @endif value="0">همه</option>
                @foreach($value_selectBox as $persian_name => $real_name)
                    <option @if(isset($checkbox))  {{ $checkbox[$name_checkbox] == $real_name ? 'selected' : ' ' }}  @endif  value="{{$real_name}}">{{$persian_name}}</option>
                @endforeach
            </select>
        </div>

    </form>

</div>
