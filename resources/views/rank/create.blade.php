@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row">

        <div class="col">
            @include ('defaults.flash')
            {{ Form::open(['url' => 'rank','method' => 'post','files' => true]) }}
            @csrf
            <div class="form-group">
                <label for='name'>Name <span class="text-danger">*</span></label>
                {{Form::text('name',null,['class'=> 'form-control','id'=>'name'])}}
                <span class="text-danger">{!! $errors->first('name') !!}</span>
            </div>
            <div class="form-group">
                <label>Code <span class="text-danger">*</span></label>
                {{Form::text('code',null,['class'=> 'form-control'])}}
                <span class="text-danger">{!! $errors->first('code') !!}</span>
            </div>
            <!--            <div class="form-group">
                            <label>order</label>
                            {{Form::text('order',null,['class'=> 'form-control','required'=>'required'])}}
                        </div>-->
            <div class="form-group ">
                <label >Status <span class="text-danger">*</span></label>
                {{Form::select('status',['0'=>'select status','1' => 'Active','2'=>'Inactive' ],null,['class'=>"form-control",'data-live-search'=>"true","data-width"=>"100%"])}} </br>
                <span class="text-danger">{!! $errors->first('status') !!}</span>


            </div>
            <div class="form-group ">
                {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
                <a class="waves-effect waves-dark  btn btn-icon-only btn-danger" href="{{URL::to('rank')}}" >Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop