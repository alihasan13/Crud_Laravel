@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-3">
                <img src="{{asset('public/image/'.$userInfo->image)  }}" alt="{{$userInfo->first_name}}" width="200px" height="200px" />
                </div>
                <div class="col">
                    <div>
                        {{'Name: '}}{{ $userInfo->first_name}} {{$userInfo->last_name}}
                    </div>
                    
                    <div>
                       {{'E-mail : '}} {{$userInfo->email}}
                    </div>
                    <div>
                        {{'Gender:'}}
                       @foreach($genderArr as $key =>$gender)
                       @if (in_array($key,$previousGender))
                       {{$gender}}
                       @endif
                       @endforeach
                    </div>
                    <div>
                      {{'Phone : '}}  {{$userInfo->phone}}
                    </div>
                    
                    <div>
                      {{'Hobby: '}} 
                         @foreach($hobbyArr as $key=>$hobbies)
                                <?php
                
                        if (in_array($key, $previousHobby)) {
                            print_r($hobbies);
                            echo ",";
                        }

                 ?>
                    
                @endforeach
                    </div>
                    <div>
                       {{'Address: '}} {{$userInfo->address}}
                    </div>
                    <div>
                       {{'Country: '}} 
                       @foreach($country as $key =>$countries)
                       @if (in_array($key,$previousCountry))
                       {{$countries}}
                       @endif
                       @endforeach
                       
                    </div>
                     <div>
                       {{'Status: '}} 
                       @foreach($statusArr as $key =>$status)
                       @if (in_array($key,$previousStatus))
                       {{$status}}
                       @endif
                       @endforeach
                    </div>
                    
              
                </div>
            </div>

        </div>
    </div>
    
</div>
@stop