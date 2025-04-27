<div class="card col-12 mb-2" id="<?php echo e($comment->id); ?>">
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <span class="iranyekan float-right ml-3"><?php echo e($comment->getCreateDateAttribute()); ?></span>
                <span><?php echo e($comment?->user?->name); ?></span>
            </div>
        </div>
        <p class="col-lg-12 p-3" style="text-align: right" >
            <?php echo e($comment->comment); ?>

        </p>

        <?php if(auth()->guard()->check()): ?>
            <div class="col-12 alert">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#ResultComment<?php echo e($comment->id); ?>">
                        <b>پاسخ</b>
                    </button>
                </div>
            </div>
            <?php echo $__env->make('components.public-comment.modal-result', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <?php $children_comment = $comment->children()->where('is_active','1')->get() ?>
    <?php if(count($children_comment)): ?>
        <?php $__currentLoopData = $children_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-2">
                <?php echo $__env->make('components.public-comment.comment-item',['comment'=>$child_comment], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-comment/comment-item.blade.php ENDPATH**/ ?>