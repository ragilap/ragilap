<?php $__env->startSection('content'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Create product
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.products.store')); ?>" method="post">
                    <?php echo csrf_field(); ?> 
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($categoryName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <select class="form-control" name="tags[]" multiple id="tags">
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $tagName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($tagName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">quantity</label>
                        <input type="number" name="quantity" value="<?php echo e(old('quantity')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">weight</label>
                        <input type="number" name="weight" value="<?php echo e(old('weight')); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="details">details</label>
                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group <?php echo e($errors->has('gallery') ? 'has-error' : ''); ?>">
                        <label for="gallery">gallery</label>
                        <div class="needsclick dropzone" id="gallery-dropzone">

                        </div>
                        <?php if($errors->has('gallery')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('gallery')); ?>

                            </em>
                        <?php endif; ?>
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
   var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: "<?php echo e(route('admin.products.storeImage')); ?>",
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
<?php if(isset($product) && $product->gallery): ?>
      var files =
        <?php echo json_encode($product->gallery); ?>

          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.original_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/admin/products/create.blade.php ENDPATH**/ ?>