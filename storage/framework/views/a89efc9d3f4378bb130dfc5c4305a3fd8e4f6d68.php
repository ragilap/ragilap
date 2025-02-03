<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Create Category
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.categories.store')); ?>" method="post">
                    <?php echo csrf_field(); ?> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                        <label for="photo">Photo</label>
                        <div class="needsclick dropzone" id="photo-dropzone">

                        </div>
                        <?php if($errors->has('photo')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('photo')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Default --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($categoryName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-alt'); ?>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-alt'); ?>   
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
    Dropzone.options.photoDropzone = {
            url: "<?php echo e(route('admin.categories.storeImage')); ?>",
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
        },
        success: function (file, response) {
            $('form').find('input[name="photo"]').remove()
            $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="photo"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
            <?php if(isset($category) && $category->photo): ?>
                var file = <?php echo json_encode($category->photo); ?>

                    this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, "<?php echo e($category->photo->getUrl()); ?>")
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
            <?php endif; ?>
        },
        error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }
            return _results
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>