@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="text-center">
        <h3>All Users</h3>
    </div>
    <div >
        {{Form::open(['url'=>'rank/filter','method'=>'post'])}}
            <div class="d-flex">
                <div class="form-group col-md-4"> 
                    {{Form::text('text',null,['class'=>'form-control'])}}
                </div>
                <div class=" col form-group">
                    {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                </div>
                
            </div>
        {{Form::Close()}}
    </div>
    <div class=" col form-group">
                    <a  class="btn btn-primary "href="{{ URL::to('rank?view=excel') }}">excel</a>
                </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-block">
                    @include ('defaults.flash')
                    <div class="table-responsive">
                        <div class="pull-right">
                            <a  class="btn btn-primary "href="{{ URL::to('rank/create') }}">Create Rank</a>
                        </div>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Code</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rankList as $ranks)
                                <tr>

                                    <td>{{$ranks->name}}</td>
                                    <td>{{$ranks->code}}</td>
                                    <td>
                                        <?php
                                        $label = '';
                                        if ($ranks->status == '1') {
                                            $label = 'label-success';
                                        } else if ($ranks->status == '2') {
                                            $label = 'label-danger';
                                        }
                                        ?>
                                        <span class="label {{$label}}">
                                            {{ isset($ranks->status) && isset($statusArr[$ranks->status]) ? $statusArr[$ranks->status] : ''}}
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            {{ Form::open(array('url' => 'rank/' . $ranks->id)) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <a class="waves-effect waves-dark  btn btn-icon-only btn-danger  tooltips" href="{{URL::to('rank/'.$ranks->id.'/edit'.Helper::pageDefine($pageArr))}}" >
                                                <i class="mdi mdi-account-edit"></i></a>
                                            <a class="btn btn-icon-only btn-info  tooltips" data-placement="top" data-rel="tooltip" href="{{URL::to('rank?id='.$ranks->id.'&view=pdf')}}"> 
                                                <i class="mdi mdi-file-pdf"></i></a>
                                            <button class="btn btn-icon-only btn-success delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                <i class="mdi mdi-delete-sweep"></i>
                                            </button>
                                            {{Form::close()}}

                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="pull-right">
                            {{ $rankList->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@stop