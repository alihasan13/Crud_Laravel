@extends ('layouts.master')
@section ('content')

<div>
    {{ Form::open(['url' => 'filter','method' => 'post']) }}
    @csrf
    <div class="row">
        <div class="form-group col-md-3">
            {{Form::search('text',null,['class' => 'form-control ','id' => 'query','autocomplete'=>'off'])}}
            <div id='searchBox'></div>
        </div>
        <div class="form-group">
            {{Form::submit('Search',['class' => 'btn btn-primary','id' => 'search'])}}
        </div>
    </div>
    {{ Form::close() }}
</div>

<div class="row">
    <div class="pull-right col">
        <a  class="btn btn-outline-info " id="modalShowCreate" data-toggle="modal" data-target="#exampleModalCenter" href="">Create Student</a>
    </div>
    <div class="col-md-12">
        @include ('defaults.flash')

        <div class="card">
            <div class="card-block">

                <div class="table-responsive">
                    <table class="table " id="myTable">
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

                            @if(!empty($users))
                            @foreach($users as $user)

                            <tr>
                                <td><img src="{{asset('public/image/'.$user->image)  }}" alt="{{$user->first_name}}" width="50px" height="50px" /></td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ isset($user->gender) && isset($genderArr[$user->gender]) ? $genderArr[$user->gender] : ''}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->hobby}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{ isset($user->country) && isset($countryArr[$user->country]) ? $countryArr[$user->country] : ''}}</td>
                                <td>{{ isset($user->status) && isset($statusArr[$user->status]) ? $statusArr[$user->status] : ''}}</td>
                                <td>  
                                    <div>
                                        {{ Form::open(array('url' => 'student/' . $user->id,'id'=>'deleteForm')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}

                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-success  tooltips"  title="Edit" data-rel="tooltip" data-placement="top" data-original-title="Edit" id="modalShowEdit" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$user->id}}" ><i class="mdi mdi-account-edit"></i></a>
                                        <a class="waves-effect waves-dark  btn btn-icon-only  btn-secondary  tooltips modal-show" title="Profile View" data-rel="tooltip" data-placement="top" data-original-title="Edit" id="modalShow" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$user->id}}"><i class="mdi mdi-face-profile"></i></a>
                                        <a class="btn btn-icon-only btn-info  tooltips" title="Download PDF" data-rel="tooltip" data-placement="top" data-original-title="Edit"  href="{{URL::to('student?id='.$user->id.'&view=pdf')}}"> 
                                            <i class="mdi mdi-file-pdf"></i></a>
                                        <button class="btn btn-icon-only btn-danger delete tooltips" title="Delete" type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                            <i class="mdi mdi-delete-sweep"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <!--                        {{ $users->links() }}-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade "  id="exampleModalCenter"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Information</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span aria-hidden="true">Close</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        //profile details
        $(document).on('click', '.modal-show', function () {
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
                beforeSend: function () {
                    $("#modalContent").html('<div id="wait" class="text-center"><img src={{asset('public / image / loder.gif')}} width="200" height="auto" alt="Loading..." /></div>');
                    $('#wait').show();
                },
                success: function (data) {
                    $('#wait').hide();
                    $('#modalContent').html(data.view);
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }

            })
        });

        //for create user
        $(document).on('click', '#modalShowCreate', function () {

            $.ajax({
                url: "{{ URL::to('createStudent') }}",
                type: 'GET',
                dataType: 'html',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#modalContent').html(data);
                    $('.select2').select2();
                },
                error: function (data) {
//                    console.log('Error:', data);
//                    $('#saveBtn').html('Save Changes');
                }

            })
        });

        //for student edit
        $(document).on('click', '#modalShowEdit', function () {
            var userId = $(this).data('id');
            $.ajax({
                url: "{{ URL::to('edit') }}",
                type: 'post',
                data: {id: userId},
                dataType: 'json',
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#modalContent').html(data.info);
                    $('.select2').select2();
                },
                error: function (data) {
                    // console.log('Error:', data);
                    // $('#saveBtn').html('Save Changes');
                }

            })
        });

        //swl for deelete
        $(document).on('click', '.delete', function () {
            var deleteForm = $(this).parents('form');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!"
            }, function (isConfirm) {
                if (isConfirm) {
                    deleteForm.submit();
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });

        //live search
        $("#query").keyup(function () {
            var value = $(this).val();
            $.ajax({
                url: "{{  URL::to('search') }}",
                type: 'post',
                data: {search: value},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#searchBox').html(data.view);

                    $('#searchResult li ').bind('click', function () {
                        setText($(this));
                    })
                },
            })
        });
        
         //For Click Outside of loaded element
        $(document).mouseup(function(e)
        {
            var container = $("#searchResult"); // YOUR CONTAINER SELECTOR
            if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.hide();
            }
        });
        
        function setText(element) {
            var value = $(element).text();
            if (value == '') {
                $("#searchResult").click(function (event) {
                    event.stopPropagation();
                });
            } else {
                $("#query").val(value);
                $("#searchResult").empty();
            }
        }



    }); //EOF-main ajax function
</script>

@stop