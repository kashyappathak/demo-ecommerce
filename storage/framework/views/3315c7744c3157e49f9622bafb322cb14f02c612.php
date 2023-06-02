<?php $__env->startSection('title', 'Home Product'); ?>
<?php $__env->startSection('contents'); ?>
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Add Product</a>
    </div>

    <hr />
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            <?php if($product->count() > 0): ?>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="align-middle"><?php echo e($loop->iteration); ?></td>
                        <td class="align-middle"><?php echo e($rs->title); ?></td>
                        <td class="allign-middle"><?php echo e($rs->type); ?></td>
                        <td class="align-middle"><?php echo e($rs->price); ?></td>
                        <td class="align-middle"><?php echo e($rs->product_code); ?></td>
                        <td class="align-middle"><?php echo e($rs->description); ?></td>
                        <td class="align-middle">
                            <img src="<?php echo e(asset('admin_assets/img/' . $rs->image)); ?>" alt="Image" width="70">
                        </td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('products.show', $rs->id)); ?>" type="button" class="btn btn-secondary"
                                    onclick="showDetail('<?php echo e(route('products.show', $rs->id)); ?>')">Detail</a>
                                <a href="<?php echo e(route('products.edit', $rs->id)); ?>" type="button" class="btn btn-warning"
                                    onclick="showEdit('<?php echo e(route('products.edit', $rs->id)); ?>')">Edit</a>


                                <form action="<?php echo e(route('products.destroy', $rs->id)); ?>" method="POST"
                                    class="btn btn-danger p-0"
                                    onsubmit="event.preventDefault(); confirmDelete('<?php echo e(route('products.destroy', $rs->id)); ?>')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>

                        <?php $__env->startPush('scripts'); ?>
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                function showDetail(url) {
                                    Swal.fire({
                                        title: 'Product Detail',
                                        text: 'Are you sure you want to see the  details.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK',
                                        timer: 10000000, // Duration in milliseconds (e.g., 3000ms = 3 seconds)
                                        timerProgressBar: true, // Enable progress bar
                                        toast: true, // Display as toast
                                        position: 'top-center'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            detailproduct(url);
                                        }
                                    });
                                }

                                function showEdit(url) {
                                    Swal.fire({
                                        title: 'Edit Product',
                                        text: 'Are you sure you want to edit this product?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, edit it!',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {

                                            editProduct(url);
                                        }

                                    });
                                }

                                function editProduct(url) {
                                    $.ajax({
                                        url: url,
                                        type: 'POST',
                                        data: {
                                            '_method': 'EDIT',
                                            '_token': '<?php echo e(csrf_token()); ?>'
                                        },
                                        success: function(response) {
                                            Swal.fire({
                                                title: 'edited!',
                                                text: 'The product has been edited.',
                                                icon: 'success',
                                                timer: 2000,
                                                timerProgressBar: false,
                                                showConfirmButton: true
                                            }).then(() => {
                                                window.location.reload();
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'An error occurred while editing the product.',
                                                icon: 'error',
                                                timer: 2000,
                                                timerProgressBar: true,
                                                showConfirmButton: true
                                            });
                                        }
                                    });
                                }

                                function confirmDelete(url) {
                                    Swal.fire({
                                        title: 'Delete Product',
                                        text: 'Are you sure you want to delete this product?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Yes, delete it!',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            deleteProduct(url);
                                        }
                                    });
                                }

                                function deleteProduct(url) {
                                    $.ajax({
                                        url: url,
                                        type: 'POST',
                                        data: {
                                            '_method': 'DELETE',
                                            '_token': '<?php echo e(csrf_token()); ?>'
                                        },
                                        success: function(response) {
                                            Swal.fire({
                                                title: 'Deleted!',
                                                text: 'The product has been deleted.',
                                                icon: 'success',
                                                timer: 2000,
                                                timerProgressBar: true,
                                                showConfirmButton: false
                                            }).then(() => {
                                                window.location.reload();
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'An error occurred while deleting the product.',
                                                icon: 'error',
                                                timer: 2000,
                                                timerProgressBar: true,
                                                showConfirmButton: false
                                            });
                                        }
                                    });
                                }
                            </script>
                        <?php $__env->stopPush(); ?>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('scripts'); ?>
        </tbody>
    </table>
    <!-- Pagination links -->
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/products/index.blade.php ENDPATH**/ ?>