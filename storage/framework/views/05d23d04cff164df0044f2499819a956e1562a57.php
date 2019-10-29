<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php echo e(Form::open(['url' => 'rank','method' => 'post','files' => true])); ?>

            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Name</label>
                <?php echo e(Form::text('name',null,['class'=> 'form-control','required'=>'required'])); ?>

            </div>
            <div class="form-group">
                <label>Code</label>
                <?php echo e(Form::text('code',null,['class'=> 'form-control','required'=>'required'])); ?>

            </div>
            <div class="form-group">
                <label>order</label>
                <?php echo e(Form::text('order',null,['class'=> 'form-control','required'=>'required'])); ?>

            </div>
            <div class="form-group ">
                <label >Status</label>
                <?php echo e(Form::select('status',['1' => 'Active','2'=>'Inactive' ])); ?>

            </div>
            <div class="form-group ">
                <?php echo e(Form::submit('Submit',['class'=> 'btn btn-primary'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/create.blade.php ENDPATH**/ ?>