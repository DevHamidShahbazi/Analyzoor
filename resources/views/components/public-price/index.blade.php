@if($value->type == 'premium')
    <div class="price-product defualt">

        @if($value->discount != null)
            <strike class="d-flex justify-content-end">
                <span style="font-size: medium" class="order-2 text-secondary iranyekan">{{ number_format($value->price) }}</span>
                <span style="font-size: medium" class="order-1 text-secondary font-weight-bold mx-1 iranyekan">تومان</span>
            </strike>
        @endif

        <div  class="d-flex justify-content-end">
            <span class="order-2 text-primary font-weight-bold iranyekan" style="font-size: larger"> {{ $value->discount ? number_format($value->discount) : number_format($value->price) }}</span>
            <span class="order-1 text-primary font-weight-bold mx-1 iranyekan" style="font-size: larger">تومان</span>
        </div>
    </div>
@else
    <div  class="d-flex justify-content-end">
        <span class="order-2 text-primary font-weight-bold iranyekan" style="font-size: x-large"> رایگان </span>
    </div>
@endif

