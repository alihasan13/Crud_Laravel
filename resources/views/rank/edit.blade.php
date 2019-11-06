@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row ">
        <div class="col">
            
            {{ Form::model($target, ['route' => ['updateRank', $target->id], 'method' => 'patch'] ) }}
            {{Form::hidden('filter',Helper::pageDefine($pageArr))}}
            
            @csrf
            
            <div class="  form-group col">
                <label >Name <span class="text-danger">*</span></label>
                {{Form::text('name', null  ,['class' => 'form-control'])}}

            </div>
            <div class="form-group col">
                <label >Code <span class="text-danger">*</span></label>
                {{Form::text('code',null ,['class' => 'form-control'])}}
                 <span class="text-danger">{!! $errors->first('code') !!}</span>
            </div>
            
            <div class="form-group ">
                <label >Status <span class="text-danger">*</span></label>
                {{Form::select('status',['0'=>'select status','1' => 'Active','2'=>'Inactive' ])}} </br>
                <span class="text-danger">{!! $errors->first('status') !!}</span>
            </div>
            <div class="form-group ">
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                <a class="waves-effect waves-dark  btn btn-icon-only btn-danger" href="{{URL::to('rank')}}" >Cancel</a>
            </div>
            {{ Form::close() }}

        </div>
    </div>
</div>
   @stop