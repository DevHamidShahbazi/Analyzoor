
@if($value->type == 'premium')
    <div class="price-product defualt">

        @if($value->discount != null)
            <strike class="d-flex justify-content-end">
                <span class="order-2 text-secondary iranyekan">{{ number_format($value->price) }}</span>
                <span class="order-1 text-secondary font-weight-bold mx-1 iranyekan">تومان</span>
            </strike>
        @endif

        <div  class="d-flex justify-content-end">
            <span class="order-2 text-primary font-weight-bold iranyekan" style="font-size: larger"> {{ $value->discount ? number_format($value->discount) : number_format($value->price) }}</span>
            <span class="order-1 text-primary font-weight-bold mx-1 iranyekan" style="font-size: larger">تومان</span>
        </div>
    </div>
@endif

{{--@if($product->status == '2')--}}
{{--    <div class="price-product mt-3 defualt">--}}
{{--        <div  class="price-value font-weight-bold">--}}
{{--            <span class="price iranyekan"> {{ $product->discount ? number_format($product->discount) : number_format($product->price) }}</span>--}}
{{--            <span class="priceT price-currency">تومان</span>--}}
{{--        </div>--}}
{{--        @if($product->discount != null)--}}
{{--            <strike style="font-size: 17px" class="discount">--}}
{{--            <span class="discount-price iranyekan">--}}
{{--                {{ number_format($product->price) }}--}}
{{--            </span>--}}
{{--                <span class="discount">تومان</span>--}}
{{--            </strike>--}}
{{--            <div class="discount price-discount" data-title="تخفیف">--}}
{{--                <span class="discount-percent font-weight-bold iranyekan">{{percent($product->price,$product->discount)}}</span>--}}
{{--                <span>%</span>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@else--}}
{{--    <div style="margin: 8% 0" class=" price-discount royal">--}}
{{--        <span class="font-weight-bold">ناموجود</span>--}}
{{--    </div>--}}
{{--@endif--}}


