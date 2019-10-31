<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col">
            <?php echo $__env->make('defaults.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open(['url' => 'rank','method' => 'post','files' => true])); ?>

            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for='name'>Name <span class="text-danger">*</span></label>
                <?php echo e(Form::text('name',null,['class'=> 'form-control','id'=>'name'])); ?>

                <span class="text-danger"><?php echo $errors->first('name'); ?></span>
            </div>
            <div class="form-group">
                <label>Code <span class="text-danger">*</span></label>
                <?php echo e(Form::text('code',null,['class'=> 'form-control'])); ?>

                <span class="text-danger"><?php echo $errors->first('code'); ?></span>
            </div>
            <!--            <div class="form-group">
                            <label>order</label>
                            <?php echo e(Form::text('order',null,['class'=> 'form-control','required'=>'required'])); ?>

                        </div>-->
            <div class="form-group ">
                <label >Status <span class="text-danger">*</span></label>
                <?php echo e(Form::select('status',['0'=>'select status','1' => 'Active','2'=>'Inactive' ],null,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])); ?> </br>
                <span class="text-danger"><?php echo $errors->first('status'); ?></span>


            </div>
            <div class="form-group ">
                <?php echo e(Form::submit('Submit',['class'=> 'btn btn-primary'])); ?>

                <a class="waves-effect waves-dark  btn btn-icon-only btn-danger" href="<?php echo e(URL::to('rank')); ?>" >Cancel</a>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/create.blade.php ENDPATH**/ ?>