<div class="modal fade text-left" id="ResultComment<?php echo e($comment->id); ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i data-feather="x"></i>
                </button>
                <h5 class="modal-title te" id="myModalLabel1">پاسخ به <?php echo e($comment?->user?->name); ?></h5>
            </div>
            <form method="POST" action="<?php echo e(route('article.result.comment')); ?>"  enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">
                        <input type="number" hidden value="<?php echo e($item->id); ?>" name="commentable_id">
                        <input type="number" hidden value="<?php echo e($comment->id); ?>" name="parent_id">
                        <div class="modal-body mb-1">
                            <div class="form-group" >
                                <textarea style="height: 150px" placeholder="متن خود را وارد کنید" dir="rtl" class="form-control" name="comment"><?php echo e(old('comment')); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">لغو</span>
                    </button>
                    <button  type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ثبت نظر</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-comment/modal-result.blade.php ENDPATH**/ ?>