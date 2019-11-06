<!-- Custom STYLES -->			
<link href="<?php echo e(asset('public/css/custom.css')); ?>" rel="stylesheet" type="text/css" />		
<ul id="searchResult">
    <?php if($resultArr->isNotEmpty()): ?>
    <?php $__currentLoopData = $resultArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li value="<?php echo e($student->id); ?>" class="bold"><span><?php echo e($student->first_name); ?></span></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <li class="no-data" value="" class="bold">No results Found</li>
    <?php endif; ?>
</ul><?php /**PATH K:\server\htdocs\laravelProject\resources\views/student/showName.blade.php ENDPATH**/ ?>