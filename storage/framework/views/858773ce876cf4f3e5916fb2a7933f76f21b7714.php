<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-3">
                <img src="<?php echo e(asset('public/image/'.$userInfo->image)); ?>" alt="<?php echo e($userInfo->first_name); ?>" width="200px" height="200px" />
                </div>
                <div class="col">
                    <div>
                        <?php echo e('Name: '); ?><?php echo e($userInfo->first_name); ?> <?php echo e($userInfo->last_name); ?>

                    </div>
                    
                    <div>
                       <?php echo e('E-mail : '); ?> <?php echo e($userInfo->email); ?>

                    </div>
                    <div>
                        <?php echo e('Gender:'); ?>

                       <?php $__currentLoopData = $genderArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if(in_array($key,$previousGender)): ?>
                       <?php echo e($gender); ?>

                       <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                      <?php echo e('Phone : '); ?>  <?php echo e($userInfo->phone); ?>

                    </div>
                    
                    <div>
                      <?php echo e('Hobby: '); ?> 
                         <?php $__currentLoopData = $hobbyArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$hobbies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                
                        if (in_array($key, $previousHobby)) {
                            print_r($hobbies);
                            echo ",";
                        }

                 ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                       <?php echo e('Address: '); ?> <?php echo e($userInfo->address); ?>

                    </div>
                    <div>
                       <?php echo e('Country: '); ?> 
                       <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if(in_array($key,$previousCountry)): ?>
                       <?php echo e($countries); ?>

                       <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </div>
                     <div>
                       <?php echo e('Status: '); ?> 
                       <?php $__currentLoopData = $statusArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if(in_array($key,$previousStatus)): ?>
                       <?php echo e($status); ?>

                       <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
              
                </div>
            </div>

        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/user/showProfile.blade.php ENDPATH**/ ?>