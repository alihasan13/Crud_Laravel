<!-- Custom STYLES -->			
<link href="{{asset('public/css/custom.css')}}" rel="stylesheet" type="text/css" />		
<ul id="searchResult">
    @if($resultArr->isNotEmpty())
    @foreach($resultArr as $student)
    <li value="{{$student->id}}" class="bold"><span>{{$student->first_name}}</span></li>
    @endforeach
    @else
    <li class="no-data" value="" class="bold">No results Found</li>
    @endif
</ul>