<div class="col-12 my-2">
    <div  class="row justify-content-center align-items-center">
        <div class="col-5">

           <div class="d-flex justify-content-center align-items-center">
               <div class="col-9">
                   <div class="col-12 captcha" data-cgbf-captcha="">
                       <?php echo captcha_img('mini'); ?>

                   </div>
               </div>

               <div class="col-3">
                   <a href="#" class="col-12 text-center btnRefresh d-flex justify-content-center align-items-center">
                       <i class="fa fa-redo" style="font-size: x-large" ></i>
                   </a>
               </div>
           </div>

        </div>
        <div class="col-7">
            <div class="p-0 d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <input class="form-control" placeholder="اعداد داخل عکس را وارد کنید" dir="rtl" id="captcha" type="number"  name="captcha" required>
                </div>
            </div>
        </div>


    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/captcha/captcha.blade.php ENDPATH**/ ?>