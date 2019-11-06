
<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col">
            
            {{ Form::open(['url' => 'user','method' => 'post','files' => true]) }}
            @csrf
            
                <div class="  form-group ">
                    <label >First Name</label>
                    {{Form::text('first_name', null,['class' => 'form-control'])}}

                </div>
                <div class="form-group  ">
                    <label >Last Name</label>
                    {{Form::text('last_name', null,['class' => 'form-control'])}}
                </div>
            
            <div class="form-group ">
                <label >Gender</label><br>
                {{Form::radio('gender','1')}} Male &nbsp;&nbsp;
                {{Form::radio('gender','2')}} Female &nbsp;&nbsp;
                {{Form::radio('gender','3')}} Others &nbsp;&nbsp;
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
                {{Form::checkbox('hobby[]','1')}}Song &nbsp;&nbsp;
                {{Form::checkbox('hobby[]','2')}}Poem &nbsp;&nbsp;
                {{Form::checkbox('hobby[]','3')}}Gardening &nbsp;&nbsp;
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
                {{Form::select('country',['1' => 'Bangladesh','2'=>'India','3'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ], 6,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])}}
            </div>
            <div class="form-group ">
                <label >Image</label>
                {{Form::file('image',['class' => 'form-control' ])}}
            </div>

            <div class="form-group ">
                <label >Status</label>
                {{Form::select('cur_status',['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ], null,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])}}
            </div>
            <div class="form-group ">
                {{Form::submit('Submit')}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
