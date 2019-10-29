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
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger tooltips modal-show" id="modalShow" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$user->id}}"><i class="mdi mdi-face-profile"></i></a>
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profile Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="profileView">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(function () {
        $(document).on('click','.modal-show', function () {
            var userId = $(this).data('id');
            
            $.ajax({
                url: "{{ URL::to('userProfile') }}",
                type: 'POST',
                data: {id: userId},
                dataType: 'json',
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() { 
                $("#profileView").html('<div id="wait" class="text-center"><img src={{asset('public/image/loder.gif')}} width="200" height="auto" alt="Loading..." /></div>');
                $('#wait').show(); 
            },
                success: function (data) {
                    $('#wait').hide(); 
                    $('#profileView').html(data.view);

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }

            })
        });
    });
</script>


@stop  