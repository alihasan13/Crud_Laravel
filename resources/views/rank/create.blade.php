@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{ Form::open(['url' => 'rank','method' => 'post','files' => true]) }}
            @csrf
            <div class="form-group">
                <label>Name</label>
                {{Form::text('name',null,['class'=> 'form-control','required'=>'required'])}}
            </div>
            <div class="form-group">
                <label>Code</label>
                {{Form::text('code',null,['class'=> 'form-control','required'=>'required'])}}
            </div>
            <div class="form-group">
                <label>order</label>
                {{Form::text('order',null,['class'=> 'form-control','required'=>'required'])}}
            </div>
            <div class="form-group ">
                <label >Status</label>
                {{Form::select('status',['1' => 'Active','2'=>'Inactive' ])}}
            </div>
            <div class="form-group ">
                {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop