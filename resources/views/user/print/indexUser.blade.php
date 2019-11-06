
<div class="text-center">

    <h3>Details information about particular user..</h3>
</div>




<div class="row">
    <div class="col">
        <div class="d-flex">
            @if(!$users->isEmpty())
            @foreach($users as $user)
            <div class="col-md-5">
                <img src="{{asset('public/image/'.$user->image)  }}" alt="{{$user->first_name}}" width="200px" height="200px" />
            </div>
            <div class="col">
                <div>
                    {{'Name: '}}{{ $user->first_name}} {{$user->last_name}}
                </div>

                <div>
                    {{'E-mail : '}} {{$user->email}}
                </div>
                <div>
                    {{'Gender:'}} {{ isset($user->gender) && isset($genderArr[$user->gender]) ? $genderArr[$user->gender] : ''}}

                </div>
                <div>
                    {{'Phone : '}}  {{$user->phone}}
                </div>

                <div>
                    {{'Hobby: '}} {{$user->hobby}}

                </div>
                <div>
                    {{'Address: '}} {{$user->address}}
                </div>
                <div>
                    {{'Country: '}} {{ isset($user->country) && isset($countryArr[$user->country]) ? $countryArr[$user->country] : ''}}


                </div>
                <div>
                    {{'Status: '}} {{ isset($user->status) && isset($statusArr[$user->status]) ? $statusArr[$user->status] : ''}}
                    

                </div>
                @endforeach
                @endif

            </div>
        </div>

    </div>
</div>

