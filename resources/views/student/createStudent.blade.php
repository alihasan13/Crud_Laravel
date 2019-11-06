
<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col">
            @include ('defaults.flash')
            {{ Form::open(['url' => '', 'id' =>'createForm' ,'method' => 'post','files' => true]) }}
            @csrf

            <div class="  form-group ">
                <label >First Name</label>
                {{Form::text('first_name', null,['class' => 'form-control','autocomplete'=>'off'])}}

            </div>
            <div class="form-group  ">
                <label >Last Name</label>
                {{Form::text('last_name', null,['class' => 'form-control'])}}
            </div>

            <div class="form-group ">
                <label >Gender</label><br>
                {{Form::radio('gender','1')}} @lang('label.MALE') &nbsp;&nbsp;
                {{Form::radio('gender','2')}} @lang('label.FEMALE') &nbsp;&nbsp;
                {{Form::radio('gender','3')}} @lang('label.OTHERS') &nbsp;&nbsp;
            </div>
            <div class="form-group ">
                <label>Username</label>
                {{Form::text('username', null,['class' => 'form-control' ])}}
            </div>
            <div class="form-group ">
                <label >E-mail Address</label>
                {{Form::text('email', null,['class' => 'form-control' ])}}
            </div>

            <div class="form-group ">
                <label >Phone Number</label>
                {{Form::text('phone', null,['class' => 'form-control' ])}}
            </div>
            <div class="form-group ">
                <label >Hobby</label> <br>
                {{Form::checkbox('hobby[]','1')}}@lang('label.SONG') &nbsp;&nbsp;
                {{Form::checkbox('hobby[]','2')}}@lang('label.POEM') &nbsp;&nbsp;
                {{Form::checkbox('hobby[]','3')}}@lang('label.GARDENING') &nbsp;&nbsp;
            </div>
            <div class="form-group  ">
                <label >Address</label>
                {{Form::textarea('address', null,['class' => 'form-control'])}}

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
                {{Form::select('cur_status',$statusArr, null,['class'=>"form-control select2"])}}
            </div>
            <div class="form-group ">
                <button type="button" class="btn btn-secondary create-btn" >Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            {{ Form::close() }}
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
                        url: "{{ URL::to('storeStudent') }}",
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
</script>