<?php $__env->startSection('comment','bg-primary text-white'); ?>
<?php $__env->startSection('page'); ?>
    <div class="col-12">
       <div class="card">
           <h4 class="card-title text-center my-4">نظرات ثبت شده شما</h4>
           <div class="row justify-content-between m-0">

               <?php if($comments->count()): ?>
                   <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php $article = $comment->commentable ?>
                       <?php if(!$article->is_active): ?>
                            <?php continue; ?>
                       <?php endif; ?>
                       <div class="col-md-6">
                           <div class="card mb-3 p-2 border-white">
                               <a target="_blank" href="<?php echo e(route('article.detail',$article->slug.'#'.$comment->id)); ?>">
                                   <div class="d-flex justify-content-between">
                                       <span><?php echo e($article->name); ?></span>
                                       <span class="iranyekan float-right ml-3"><?php echo e($comment->getCreateDateAttribute()); ?></span>
                                   </div>
                                   <div class="row m-0 ">
                                       <div class="col-8 card-body p-2">
                                           <div class="d-flex flex-column justify-content-evenly height-100">

                                               <p class="text-center text-body"><?php echo e($comment->comment); ?></p>
                                           </div>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>

           </div>
       </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout user-panel.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/user-panel/comment.blade.php ENDPATH**/ ?>