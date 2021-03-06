<?php $__env->startSection('content'); ?>

<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col">
            <?php echo $__env->make('defaults.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open(['url' => 'user','method' => 'post','files' => true])); ?>

            <?php echo csrf_field(); ?>
            
                <div class="  form-group ">
                    <label >First Name</label>
                    <?php echo e(Form::text('first_name', null,['class' => 'form-control'])); ?>


                </div>
                <div class="form-group  ">
                    <label >Last Name</label>
                    <?php echo e(Form::text('last_name', null,['class' => 'form-control'])); ?>

                </div>
            
            <div class="form-group ">
                <label >Gender</label><br>
                <?php echo e(Form::radio('gender','1')); ?> Male &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','2')); ?> Female &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','3')); ?> Others &nbsp;&nbsp;
            </div>
            <div class="form-group ">
                <label>Username</label>
                <?php echo e(Form::text('username', null,['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >E-mail Address</label>
                <?php echo e(Form::text('email', null,['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Phone Number</label>
                <?php echo e(Form::text('phone', null,['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >Hobby</label> <br>
                <?php echo e(Form::checkbox('hobby[]','1')); ?>Song &nbsp;&nbsp;
                <?php echo e(Form::checkbox('hobby[]','2')); ?>Poem &nbsp;&nbsp;
                <?php echo e(Form::checkbox('hobby[]','3')); ?>Gardening &nbsp;&nbsp;
            </div>
            <div class="form-group  ">
                <label >Address</label>
                <?php echo e(Form::textarea('address', null,['class' => 'form-control'])); ?>


            </div>
            <div class="form-group ">
                <label >Password</label>
                <?php echo e(Form::password('password',['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >Country</label>
                <?php echo e(Form::select('country',['1' => 'Bangladesh','2'=>'India','3'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ], 6,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])); ?>

            </div>
            <div class="form-group ">
                <label >Image</label>
                <?php echo e(Form::file('image',['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Status</label>
                <?php echo e(Form::select('cur_status',['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ], null,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])); ?>

            </div>
            <div class="form-group ">
                <?php echo e(Form::submit('Submit')); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/user/create.blade.php ENDPATH**/ ?>