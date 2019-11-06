<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row ">
        <div class="col">
            
            <?php echo e(Form::model($target, ['route' => ['updateRank', $target->id], 'method' => 'patch'] )); ?>

            <?php echo e(Form::hidden('filter',Helper::pageDefine($pageArr))); ?>

            
            <?php echo csrf_field(); ?>
            
            <div class="  form-group col">
                <label >Name <span class="text-danger">*</span></label>
                <?php echo e(Form::text('name', null  ,['class' => 'form-control'])); ?>


            </div>
            <div class="form-group col">
                <label >Code <span class="text-danger">*</span></label>
                <?php echo e(Form::text('code',null ,['class' => 'form-control'])); ?>

                 <span class="text-danger"><?php echo $errors->first('code'); ?></span>
            </div>
            
            <div class="form-group ">
                <label >Status <span class="text-danger">*</span></label>
                <?php echo e(Form::select('status',['0'=>'select status','1' => 'Active','2'=>'Inactive' ])); ?> </br>
                <span class="text-danger"><?php echo $errors->first('status'); ?></span>
            </div>
            <div class="form-group ">
                <?php echo e(Form::submit('Submit',['class' => 'btn btn-primary'])); ?>

                <a class="waves-effect waves-dark  btn btn-icon-only btn-danger" href="<?php echo e(URL::to('rank')); ?>" >Cancel</a>
            </div>
            <?php echo e(Form::close()); ?>


        </div>
    </div>
</div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/edit.blade.php ENDPATH**/ ?>