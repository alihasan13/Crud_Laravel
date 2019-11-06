<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col-md-12">
            {{ Form::model($userInfo,['files'=>true,'id' => 'editForm'] ) }}
            {{ Form::hidden('student_id',$userInfo->id ) }}
            @csrf

            <div class="  form-group">
                <label >First Name</label>
                {{Form::text('first_name',  $userInfo->first_name ,['class' => 'form-control'])}}

            </div>
            <div class="form-group ">
                <label >Last Name</label>
                {{Form::text('last_name',   $userInfo->last_name ,['class' => 'form-control'])}}
            </div>

            <div class="form-group ">
                <label >Gender</label><br>
                {{Form::radio('gender','1',  $userInfo->gender == '1' ? true : false,[ ])}} @lang('label.MALE') &nbsp;&nbsp;
                {{Form::radio('gender','2',  $userInfo->gender == '2' ? true : false,[ ])}} @lang('label.FEMALE') &nbsp;&nbsp;
                {{Form::radio('gender','3',  $userInfo->gender == '3' ? true : false,[ ])}} @lang('label.OTHERS') &nbsp;&nbsp;
            </div>
            <div class="form-group ">
                <label>Username</label>
                {{Form::text('username',  $userInfo->username ,['class' => 'form-control' ])}}
            </div>
            <div class="form-group ">
                <label >E-mail Address</label>
                {{Form::text('email', $userInfo->email,['class' => 'form-control' ])}}
            </div>

            <div class="form-group ">
                <label >Phone Number</label>
                {{Form::number('phone', $userInfo->phone,['class' => 'form-control' ])}}
            </div>
            <div class="form-group ">
                <label >Hobby</label> <br>



                @foreach($hobbyArr as $key=>$hobbies)
                <?php
                if (in_array($key, $previousHobby)) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                ?>
                {{Form::checkbox('hobby[]',$key,$checked)}} {{$hobbies}}
                @endforeach



            </div>
            <div class="form-group  ">
                <label >Address</label>
                {{Form::textarea('address', $userInfo->address,['class' => 'form-control'])}}

            </div>
            <div class="form-group ">
                <label >Password</label>
                {{Form::password('password',['class' => 'form-control' ])}}
            </div>
            <div class="form-group ">
                <label >Country</label>
                {{Form::select('country',$countryArr, null,['class'=>"form-control select2"])}}
            </div>
            <div class="form-group ">
                <label >Image</label>
                {{Form::file('image' ,['class' => 'form-control' ])}}
            </div>

            <div class="form-group ">
                <label >Status</label>
                {{Form::select('status',$statusArr, null,['class'=>"form-control select2"])}}
            </div>
            <div class="form-group ">
                <button type="button" class="btn btn-secondary submit-btn" >Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            {{ Form::close() }}
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
                        url: "{{ URL::to('update') }}",
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
</script>