<div class="sidebar">
    <div class="sidebar__item">
    <h4>Categories</h4>
    <ul>
        <?php $__currentLoopData = $menu_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('shop.index', $menu_category->slug)); ?>"><?php echo e($menu_category->name); ?></a>
            <ul>
                <?php $__currentLoopData = $menu_category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="px-2">
                    <a href="<?php echo e(route('shop.index', $child->slug)); ?>" style="color: #b4b4b4;"><?php echo e($child->name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>
    <div class="sidebar__item">
    <h4>Tags</h4>
    <?php $__currentLoopData = $menu_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="sidebar__item__size">
        <label for="large">
        <a href="<?php echo e(route('shop.tag', $menu_tag->slug)); ?>"><?php echo e($menu_tag->name); ?></a>
        </label>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\Laravel-project\E-commerce\resources\views/frontend/shop/sidebar.blade.php ENDPATH**/ ?>