<?php $__env->startSection('content'); ?>

<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col-md-12">
            <?php echo e(Form::model($userInfo, ['route' => ['user.update', $userInfo->id], 'method' => 'patch' ,'files'=>true] )); ?>

            <?php echo csrf_field(); ?>
            <div class="d-flex  ">
                <div class="  form-group col">
                    <label >First Name</label>
                    <?php echo e(Form::text('first_name',  $userInfo->first_name ,['class' => 'form-control'])); ?>


                </div>
                <div class="form-group  col">
                    <label >Last Name</label>
                    <?php echo e(Form::text('last_name',   $userInfo->last_name ,['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group ">
                <label >Gender</label><br>
                <?php echo e(Form::radio('gender','1',  $userInfo->gender == '1' ? true : false,[ ])); ?> Male &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','2',  $userInfo->gender == '2' ? true : false,[ ])); ?> Female &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','3',  $userInfo->gender == '3' ? true : false,[ ])); ?> Others &nbsp;&nbsp;
            </div>
            <div class="form-group ">
                <label>Username</label>
                <?php echo e(Form::text('username',  $userInfo->username ,['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >E-mail Address</label>
                <?php echo e(Form::text('email', $userInfo->email,['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Phone Number</label>
                <?php echo e(Form::number('phone', $userInfo->phone,['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >Hobby</label> <br>


               
                <?php $__currentLoopData = $hobbyArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$hobbies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                
                        if (in_array($key, $previousHobby)) {
                            $checked = 'checked';
                        }else{
                            $checked = '';
                        }

                 ?>
                    <?php echo e(Form::checkbox('hobby[]',$key,$checked)); ?> <?php echo e($hobbies); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
               
              
            </div>
            <div class="form-group  ">
                <label >Address</label>
                <?php echo e(Form::textarea('address', $userInfo->address,['class' => 'form-control'])); ?>


            </div>
            <div class="form-group ">
                <label >Password</label>
                <?php echo e(Form::password('password',['class' => 'form-control' ])); ?>

            </div>
            <div class="form-group ">
                <label >Country</label>
                <?php echo e(Form::select('country',['1' => 'Bangladesh','2'=>'India','2'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ])); ?>

            </div>
            <div class="form-group ">
                <label >Image</label>
                <?php echo e(Form::file('image', null ,['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Status</label>
                <?php echo e(Form::select('cur_status',['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ])); ?>

            </div>
            <div class="form-group ">
                <?php echo e(Form::submit('Submit')); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/user/edit.blade.php ENDPATH**/ ?>