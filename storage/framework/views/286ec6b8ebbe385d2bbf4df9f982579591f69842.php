<?php $__env->startSection('title', 'Create Product'); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mb-0">Add Product</h1>

    <hr />
    <form action="<?php echo e(route('products.store')); ?>" method="GET" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col">
                <label class="form-label">Category:</label>
                <select name="type" id="" class="form-control" required>
                    <option value="">Select Category Type:</option>
                    <option value="Fruit">Fruit</option>
                    <option value="Grocery">Grocery</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Cold-drinks">Cold-drinks</option>
                    <option value="Laptops">Laptops</option>
                    <option value="Mobile Accesories">Mobile accsories</option>
                    <option value="Elctronicas item  ">Electronicas item</option>
                    <option value="T-shirt">Tshirt</option>
                    <option value="Shirt">Shirt</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Product_code:</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" required>
            </div>
            <div class="col">
                <label class="form-label">Description:</label>
                <textarea class="form-control" name="description" placeholder="Description"></textarea>

            </div>
            <div class="col">
                <label class="form-label">Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Enter Files Here" required>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/products/create.blade.php ENDPATH**/ ?>