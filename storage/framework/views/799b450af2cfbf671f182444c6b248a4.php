<div class="card">
    <div class="col-12">
        <?php echo $__env->make('components.public-comment.comment-store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>


<li class="row m-0" >
    <?php $__currentLoopData = $item->comments()->where('is_active','1')->where('parent_id','0')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('components.public-comment.comment-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</li>
<?php /**PATH C:\xampp8.1\htdocs\Analyzoor\resources\views/components/public-comment/index.blade.php ENDPATH**/ ?>