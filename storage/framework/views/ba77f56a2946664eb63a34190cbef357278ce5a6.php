
<div class="text-center">

    <h3>Details information about particular user..</h3>
</div>




<div class="row">
    <div class="col">
        <div class="d-flex">
            <?php if(!$users->isEmpty()): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-5">
                <img src="<?php echo e(asset('public/image/'.$user->image)); ?>" alt="<?php echo e($user->first_name); ?>" width="200px" height="200px" />
            </div>
            <div class="col">
                <div>
                    <?php echo e('Name: '); ?><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                </div>

                <div>
                    <?php echo e('E-mail : '); ?> <?php echo e($user->email); ?>

                </div>
                <div>
                    <?php echo e('Gender:'); ?> <?php echo e(isset($user->gender) && isset($genderArr[$user->gender]) ? $genderArr[$user->gender] : ''); ?>


                </div>
                <div>
                    <?php echo e('Phone : '); ?>  <?php echo e($user->phone); ?>

                </div>

                <div>
                    <?php echo e('Hobby: '); ?> <?php echo e($user->hobby); ?>


                </div>
                <div>
                    <?php echo e('Address: '); ?> <?php echo e($user->address); ?>

                </div>
                <div>
                    <?php echo e('Country: '); ?> <?php echo e(isset($user->country) && isset($countryArr[$user->country]) ? $countryArr[$user->country] : ''); ?>



                </div>
                <div>
                    <?php echo e('Status: '); ?> <?php echo e(isset($user->status) && isset($statusArr[$user->status]) ? $statusArr[$user->status] : ''); ?>

                    

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<?php /**PATH K:\server\htdocs\laravelProject\resources\views/user/print/viewUser.blade.php ENDPATH**/ ?>