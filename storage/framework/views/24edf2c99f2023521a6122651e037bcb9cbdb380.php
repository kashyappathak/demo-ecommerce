<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('contents'); ?>
    <h1 class="mb-0">Profile</h1>

    <hr />

    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="<?php echo e(route('profileupdate')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="first name"
                                value="<?php echo e(auth()->user()->name); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control"
                                value="<?php echo e(auth()->user()->email); ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                value="<?php echo e(auth()->user()->phone); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo e(auth()->user()->address); ?>"
                                placeholder="Address">
                        </div>
                    </div>

                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Save Profile</button></div>


                </div>
            </div>

        </div>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\demo-ecommerce\resources\views/profile.blade.php ENDPATH**/ ?>