@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row ">
        <div class="col">
            {{ Form::model($userInfo, ['route' => ['user.update', $userInfo->id], 'method' => 'patch' ,'files'=>true] ) }}
            @csrf

            <div class="  form-group col">
                <label >Name</label>
                {{Form::text('name',  $userInfo->name ,['class' => 'form-control'])}}

            </div>
            <div class="form-group ">
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
            </div>
            {{ Form::close() }}

        </div>
    </div>