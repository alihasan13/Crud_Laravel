@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="text-center">
        <h3>All Users</h3>
    </div>
    <div>
        <a  class="btn btn-primary "href="{{ URL::to('rank/create') }}">Create Rank</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
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
                                @foreach($user as $member)
                                <tr>

                                    <td>{{$member->name}}</td>
                                    <td>{{$member->code}}</td>
                                    <td>{{$member->status}}</td>
                                    <td>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips"  ><i class="mdi mdi-account-edit"></i></a>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger tooltips modal-show"  ><i class="mdi mdi-face-profile"></i></a>
                                       <button class="btn btn-icon-only btn-danger delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                <i class="mdi mdi-delete-sweep"></i></button>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $user->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@stop