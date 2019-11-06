@extends('layouts.master')
@section('content')

<div class="container justify-content-center col-md-7  ">
    <div class="row ">
        <div class="col-md-12">
            {{ Form::model($userInfo, ['route' => ['user.update', $userInfo->id], 'method' => 'patch' ,'files'=>true] ) }}
            @csrf
            <div class="d-flex  ">
                <div class="  form-group col">
                    <label >First Name</label>
                    {{Form::text('first_name',  $userInfo->first_name ,['class' => 'form-control'])}}

                </div>
                <div class="form-group  col">
                    <label >Last Name</label>
                    {{Form::text('last_name',   $userInfo->last_name ,['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group ">
                <label >Gender</label><br>
                {{Form::radio('gender','1',  $userInfo->gender == '1' ? true : false,[ ])}} Male &nbsp;&nbsp;
                {{Form::radio('gender','2',  $userInfo->gender == '2' ? true : false,[ ])}} Female &nbsp;&nbsp;
                {{Form::radio('gender','3',  $userInfo->gender == '3' ? true : false,[ ])}} Others &nbsp;&nbsp;
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
                        }else{
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
                {{Form::select('country',['1' => 'Bangladesh','2'=>'India','2'=>'Australia','4'=>'Canada','5'=>'USA','6'=>'UK' ])}}
            </div>
            <div class="form-group ">
                <label >Image</label>
                {{Form::file('image', null ,['class' => 'form-control' ])}}
            </div>

            <div class="form-group ">
                <label >Status</label>
                {{Form::select('cur_status',['1' => 'Active','2'=>'Inactive','3'=>'Under processing' ])}}
            </div>
            <div class="form-group ">
                {{Form::submit('Submit')}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop