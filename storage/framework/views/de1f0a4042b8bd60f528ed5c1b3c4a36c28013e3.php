<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>product List
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary float-right">
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
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td>
                                        <span class="badge badge-success"><?php echo e($product->category->name); ?></span>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-primary"> <?php echo e($tag->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                                    <td><?php echo e($product->quantity); ?></td>
                                    <td>
                                        <?php if(count($product->gallery)  > 0): ?>
                                            <a href="<?php echo e($product->getMedia('gallery')->first()->getUrl()); ?>" target="_blank">
                                                <img src="<?php echo e($product->getMedia('gallery')->first()->getUrl()); ?>" width="45px" height="45px" alt="">  
                                            </a>
                                        <?php else: ?>
                                            <span class="badge badge-warning">no image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.products.show', $product->id)); ?>" class="btn btn-warning">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="post">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/products/index.blade.php ENDPATH**/ ?>