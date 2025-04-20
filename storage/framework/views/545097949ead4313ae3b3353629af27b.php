
<?php if($value->type == 'premium'): ?>
    <div class="price-product defualt">

        <?php if($value->discount != null): ?>
            <strike class="d-flex justify-content-end">
                <span class="order-2 text-secondary iranyekan"><?php echo e(number_format($value->price)); ?></span>
                <span class="order-1 text-secondary font-weight-bold mx-1 iranyekan">تومان</span>
            </strike>
        <?php endif; ?>

        <div  class="d-flex justify-content-end">
            <span class="order-2 text-primary font-weight-bold iranyekan" style="font-size: larger"> <?php echo e($value->discount ? number_format($value->discount) : number_format($value->price)); ?></span>
            <span class="order-1 text-primary font-weight-bold mx-1 iranyekan" style="font-size: larger">تومان</span>
        </div>
    </div>
<?php endif; ?>



























<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-price/index.blade.php ENDPATH**/ ?>