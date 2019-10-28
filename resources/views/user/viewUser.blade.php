@extends ('layouts.master')
@section ('content')

<div>
    {{ Form::open(['url' => 'filter','method' => 'post']) }}
            @csrf
            <div class="d-flex  ">
                    <div class="  form-group col-md-10">
                        
                        {{Form::text('text', Request::get('search'),['class' => 'form-control'])}}

                    </div>
                    <div class="form-group  col">
                        
                        {{Form::submit('Search',['class' => 'btn btn-primary'])}}
                    </div>
                </div>
    {{ Form::close() }}
</div>
<div class="text-center">
    
    <h3>All Users</h3>
</div>
<div class="row">
    <div class="col-md-12">
        @include ('defaults.flash')
        <div class="card">
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Hobby</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            @if(!$users->isEmpty())
                            @foreach($users as $user)
                           
                            <tr>
                                <td><img src="{{asset('public/image/'.$user->image)  }}" alt="{{$user->first_name}}" width="50px" height="50px" /></td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->hobby}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->status}}</td>
                                <td>  
                                     <div>
                                        {{ Form::open(array('url' => 'user/' . $user->id)) }}
                                        {{ Form::hidden('_method', 'DELETE') }}

                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips" href="{{ route('user.edit',$user->id) }}" ><i class="mdi mdi-account-edit"></i></a>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips" href="{{ route('user.show',$user->id) }}" ><i class="mdi mdi-face-profile"></i></a>
                                        <button class="btn btn-icon-only btn-danger delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                            <i class="mdi mdi-delete-sweep"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </div>
                                      
                                </td>
                            </tr>
                            
                            @endforeach
                            @endif
                            {{ $users->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop  