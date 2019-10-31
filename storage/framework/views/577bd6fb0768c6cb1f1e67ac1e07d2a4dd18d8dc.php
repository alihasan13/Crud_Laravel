
<div class="text-center">

    <h3>Details information about particular rank..</h3>
</div>




<div class="row">
    <div class="col">
        <div class="d-flex">
            <?php if(!$rankList->isEmpty()): ?>
            <?php $__currentLoopData = $rankList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ranks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col">


                <div>
                    <?php echo e('Name : '); ?> <?php echo e($ranks->name); ?>

                </div>
                <div>
                    <?php echo e('Code:'); ?> <?php echo e($ranks->code); ?>


                </div>
                <div>
                    
                    
                      <?php echo e('Status:'); ?>  <?php echo e(isset($ranks->status) && isset($statusArr[$ranks->status]) ? $statusArr[$ranks->status] : ''); ?>

                    
                </div>

                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/print/index.blade.php ENDPATH**/ ?>