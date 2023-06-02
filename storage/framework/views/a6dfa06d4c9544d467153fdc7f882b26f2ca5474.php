<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mb-0">Edit Product</h1>

    <hr />
    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e($product->title); ?>">
            </div>
            <div class="col mb-3">
                <label class="form-label">Category:</label>
                <select name="type" id="" class="form-control" value="<?php echo e($product->type); ?>"
                    onchange="showSelectedCategory(this)">
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

            <script>
                function showSelectedCategory(selectElement) {
                    var selectedCategory = selectElement.value;
                    var selectedTitle = "<?php echo e($product->title); ?>";

                    Swal.fire({
                        title: 'Selected Category',
                        text: 'You have chosen ' + selectedCategory + ' for the product with title: ' + selectedTitle,
                        icon: 'info',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            </script>
            <div class="col mb-3">
                <label class="form-label">Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo e($product->price); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code:</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code"
                    value="<?php echo e($product->product_code); ?>">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description:</label>

                <textarea class="form-control" name="description" placeholder="Descriptoin"><?php echo e($product->description); ?></textarea>

            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Enter Image"
                    value="<?php echo e($product->image); ?>">
            </div>

        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/products/edit.blade.php ENDPATH**/ ?>