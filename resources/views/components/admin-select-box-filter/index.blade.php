<div class="md-form my-2">
    <form class="form" method="GET" action="{{ \Illuminate\Support\Facades\URL::current() }}">

        <div class="col-lg-2">
            <label class="m-0 text-dark" >{{$label}}</label>
            <br>
            <select class="form-control filter" name="category_id">
                <option @if(! isset($checkbox))  {{ 'selected'  }}  @endif value="0">همه</option>
                @if(!empty(!empty($values = $value_select_box)))
                    @foreach($values->unique($name_select_box) as $value)
                        <option @if(isset($checkbox))  {{ $checkbox[$name_select_box] == $value->$name_select_box ? 'selected' : ' '  }}  @endif value="{{ $value->$name_model_relation->id }}">{{ $value->$name_model_relation->$name_model_for_show }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </form>
</div>
