<?php $__env->startSection('category', 'Create category'); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mb-0">Add Category</h1>
    <hr />
    <form action="<?php echo e(route('categories.store')); ?>" method="GET" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Category:</label>
                <input type="text" name="category" class="form-control" placeholder="Enter Your Category" required>
            </div>
            <div class="col">
                <label class="form-label">Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Enter Files Here" required>
            </div>
            <div class="col">
                <label class="form-label">Status:</label>
                <select name="status" id="" class="form-control" required>
                    <option value="">Select status Type:</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

            </div>
            

        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-primary">Back</button>

            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/categories/create.blade.php ENDPATH**/ ?>