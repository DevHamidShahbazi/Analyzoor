<div class="card mb-2">
    <a href="<?php echo e(route($category->parent ? 'child.article.category' : 'parent.article.category',$category->slug)); ?>">
        <div class="card-content">
            <img class="card-img-top img-fluid p-2"
                 style="border-top-left-radius: 16px;border-top-right-radius: 16px"
                 src="<?php echo e($category->image); ?>" alt="<?php echo e($category->alt); ?>"/>
            <div class="card-body p-1">
                <p class="card-title text-center"><?php echo e($category->name); ?></p>
            </div>
        </div>
    </a>
</div>
<?php /**PATH C:\xampp\htdocs\Analyzoor\resources\views/components/public-item-category/index.blade.php ENDPATH**/ ?>