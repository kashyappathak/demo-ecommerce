<?php $__env->startSection('catrgory', 'Edit category'); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mb-0">Edit category</h1><br />

    <hr />
    <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Category:</label>
                <input type="text" name="category" class="form-control" placeholder="Category"
                    value="<?php echo e($category->category); ?>">
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Image:</label>
                    <input type="file" name="image"
                        class="form-control"accept="image/jpeg, image/png , image/jpg, image/svg" placeholder="Enter Image">
                    <?php if($category->image): ?>
                        <img src="<?php echo e(asset('admin_assets/img/' . $category->image)); ?>" alt="Image"
                            style="max-width:60px;">
                    <?php endif; ?>
                    <?php if($category->image): ?>
                        <div class="mt-2">
                            Delete
                            <label class="form-check-label">
                                <input type="submit" name="image" class="form-check-input">

                            </label>
                        </div>
                    <?php endif; ?>


                </div>
                <script></script>
                <div class="col mb-3">
                    <label class="form-label">Status:</label>
                    <select name="status" id="status-select" class="form-control" value="<?php echo e($category->status); ?>"
                        onchange="showSelectedCategory(this)">
                        <option value="">Select Category Type:</option>
                        <option value="Active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <input type="hidden" name="status_value" id="status-value" value="">
                </div>
                <script>
                    function showSelectedCategory(selectElement) {
                        var selectedCategory = selectElement.value;
                        var selectedTitle = "<?php echo e($category->id); ?>";

                        Swal.fire({
                            title: 'Selected Category',
                            text: 'You have chosen ' + selectedCategory + ' for the product with title: ' + selectedTitle,
                            icon: 'info',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                    document.getElementById('status-select').addEventListener('change', function() {
                        var selectedOption = this.value;
                        var statusValue = (selectedOption === '1') ? 'Active' : 'Inactive';
                        document.getElementById('status-value').value = statusValue;
                    });
                </script>

                <div class="col mb-3">
                    <label class="form-label">Available:</label>
                    <select name="available" id="available-select" class="form-control" value="<?php echo e($category->available); ?>"
                        onchange="showSelectedCategory(this)">
                        <option value="">Select Availibilty Type:</option>
                        <option value="available">Available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
                    <input type="hidden" name="available_value" id="available-value" value="">
                </div>
                <script>
                    function showSelectedCategory(selectElement) {
                        var selectedCategory = selectElement.value;
                        var selectedTitle = "<?php echo e($category->id); ?>";

                        Swal.fire({
                            title: 'Selected Category',
                            text: 'You have chosen ' + selectedCategory + ' for the product with title: ' + selectedTitle,
                            icon: 'info',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                    document.getElementById('available-select').addEventListener('change', function() {
                        var selectedOption = this.value;
                        var statusValue = (selectedOption === '1') ? 'Available' : 'unavailable';
                        document.getElementById('available-value').value = statusValue;
                    });
                </script>





            </div>




        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
            <button class="btn btn-primary">Back</button>

        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/categories/edit.blade.php ENDPATH**/ ?>