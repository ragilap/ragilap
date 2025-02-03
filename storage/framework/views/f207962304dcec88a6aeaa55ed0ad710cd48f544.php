<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Create tag
                    <a href="<?php echo e(route('admin.tags.index')); ?>" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.tags.store')); ?>" method="post">
                    <?php echo csrf_field(); ?> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/tags/create.blade.php ENDPATH**/ ?>