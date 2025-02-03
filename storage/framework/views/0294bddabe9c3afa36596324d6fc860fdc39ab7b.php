<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>tag List
                    <a href="<?php echo e(route('admin.tags.create')); ?>" class="btn btn-primary float-right">
                        Create
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Tag Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($tag->name); ?></td>
                                    <td><?php echo e($tag->slug); ?></td>
                                    <td><?php echo e($tag->products_count); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.tags.edit', $tag->id)); ?>" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="<?php echo e(route('admin.tags.destroy', $tag->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?> 
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/tags/index.blade.php ENDPATH**/ ?>