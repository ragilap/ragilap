<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Category List
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary float-right">
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
                                <th>Product Count</th>
                                <th>Image</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->slug); ?></td>
                                    <td><?php echo e($category->products_count); ?></td>
                                    <td>
                                        <?php if($category->photo): ?>
                                            <a href="<?php echo e($category->photo->getUrl()); ?>" target="_blank">
                                                <img src="<?php echo e($category->photo->getUrl()); ?>" width="50px" height="50px">
                                            </a>
                                        <?php else: ?>
                                            <span class="badge badge-warning">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($category->parent->name ?? 'Null'); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="post">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>