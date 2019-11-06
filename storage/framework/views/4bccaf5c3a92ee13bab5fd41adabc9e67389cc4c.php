<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col-md-12">
            <?php echo e(Form::model($userInfo,['files'=>true,'id' => 'editForm'] )); ?>

            <?php echo e(Form::hidden('student_id',$userInfo->id )); ?>

            <?php echo csrf_field(); ?>

            <div class="  form-group">
                <label >First Name</label>
                <?php echo e(Form::text('first_name',  $userInfo->first_name ,['class' => 'form-control'])); ?>


            </div>
            <div class="form-group ">
                <label >Last Name</label>
                <?php echo e(Form::text('last_name',   $userInfo->last_name ,['class' => 'form-control'])); ?>

            </div>

            <div class="form-group ">
                <label >Gender</label><br>
                <?php echo e(Form::radio('gender','1',  $userInfo->gender == '1' ? true : false,[ ])); ?> <?php echo app('translator')->getFromJson('label.MALE'); ?> &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','2',  $userInfo->gender == '2' ? true : false,[ ])); ?> <?php echo app('translator')->getFromJson('label.FEMALE'); ?> &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','3',  $userInfo->gender == '3' ? true : false,[ ])); ?> <?php echo app('translator')->getFromJson('label.OTHERS'); ?> &nbsp;&nbsp;
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
                } else {
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
                <?php echo e(Form::select('country',$countryArr, null,['class'=>"form-control select2"])); ?>

            </div>
            <div class="form-group ">
                <label >Image</label>
                <?php echo e(Form::file('image' ,['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Status</label>
                <?php echo e(Form::select('status',$statusArr, null,['class'=>"form-control select2"])); ?>

            </div>
            <div class="form-group ">
                <button type="button" class="btn btn-secondary submit-btn" >Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(document).on('click', '.submit-btn', function () {
            var formData = new FormData($('#editForm')[0]);
            swal({
                title: "Are you sure?",
                text: "You want to update inserted data?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Bingo, Update it!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo e(URL::to('update')); ?>",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (res) {
                            alert("Student info updated ");
                            location.reload();
                        },
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
    });
</script><?php /**PATH K:\server\htdocs\laravelProject\resources\views/student/edit.blade.php ENDPATH**/ ?>