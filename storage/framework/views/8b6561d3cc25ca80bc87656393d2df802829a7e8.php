
<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col">
            <?php echo $__env->make('defaults.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(Form::open(['url' => '', 'id' =>'createForm' ,'method' => 'post','files' => true])); ?>

            <?php echo csrf_field(); ?>

            <div class="  form-group ">
                <label >First Name</label>
                <?php echo e(Form::text('first_name', null,['class' => 'form-control','autocomplete'=>'off'])); ?>


            </div>
            <div class="form-group  ">
                <label >Last Name</label>
                <?php echo e(Form::text('last_name', null,['class' => 'form-control'])); ?>

            </div>

            <div class="form-group ">
                <label >Gender</label><br>
                <?php echo e(Form::radio('gender','1')); ?> <?php echo app('translator')->getFromJson('label.MALE'); ?> &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','2')); ?> <?php echo app('translator')->getFromJson('label.FEMALE'); ?> &nbsp;&nbsp;
                <?php echo e(Form::radio('gender','3')); ?> <?php echo app('translator')->getFromJson('label.OTHERS'); ?> &nbsp;&nbsp;
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
                <?php echo e(Form::checkbox('hobby[]','1')); ?><?php echo app('translator')->getFromJson('label.SONG'); ?> &nbsp;&nbsp;
                <?php echo e(Form::checkbox('hobby[]','2')); ?><?php echo app('translator')->getFromJson('label.POEM'); ?> &nbsp;&nbsp;
                <?php echo e(Form::checkbox('hobby[]','3')); ?><?php echo app('translator')->getFromJson('label.GARDENING'); ?> &nbsp;&nbsp;
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
                <?php echo e(Form::select('country',$countryArr, null,['class'=>"form-control select2"])); ?>

            </div>
            <div class="form-group ">
                <label >Image</label>
                <?php echo e(Form::file('image' ,['class' => 'form-control' ])); ?>

            </div>

            <div class="form-group ">
                <label >Status</label>
                <?php echo e(Form::select('cur_status',$statusArr, null,['class'=>"form-control select2"])); ?>

            </div>
            <div class="form-group ">
                <button type="button" class="btn btn-secondary create-btn" >Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(document).on('click', '.create-btn', function () {
            var formData = new FormData($('#createForm')[0]);
            var options = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
            };

             swal({
                title: "Are you sure?",
                text: "You want to save inserted data?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo e(URL::to('storeStudent')); ?>",
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
                            alert("Student  id had been created!!");
                            location.reload();
                        },
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
    });
</script><?php /**PATH K:\server\htdocs\laravelProject\resources\views/student/createStudent.blade.php ENDPATH**/ ?>