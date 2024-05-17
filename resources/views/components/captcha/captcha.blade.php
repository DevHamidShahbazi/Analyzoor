<div class="col-12">
    <div  class="row">

        <div class="col-5">
            <div>
                <div style="padding: inherit;text-align: center;">
                    <a href="#" class="d-inline-block btnRefresh"><i style="font-size: x-large;margin: -60%;color: #213854;" class="fa fa-refresh dark-text "></i></a>
                </div>
            </div>
            <input placeholder="اعداد را وارد کنید"  style=" margin: .5rem 0 0 0 !important;" dir="rtl" id="captcha" type="number" class="form-control form-control-sm" name="captcha" required>
        </div>

        <div class="col-6">
            <div class="captcha" data-cgbf-captcha="">
                {!! captcha_img('mini') !!}
            </div>
        </div>
    </div>
</div>
