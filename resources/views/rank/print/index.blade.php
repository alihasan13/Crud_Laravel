
<div class="text-center">
    <h3>Details information about particular rank..</h3>
</div>
<div class="row">
    <div class="col">
        <div class="d-flex">
            @if(!$rankList->isEmpty())
            @foreach($rankList as $ranks)

            <div class="col">
                <div>
                    {{'Name : '}} {{$ranks->name}}
                </div>
                <div>
                    {{'Code:'}} {{$ranks->code}}
                </div>
                <div>
                    {{'Status:'}}  {{ isset($ranks->status) && isset($statusArr[$ranks->status]) ? $statusArr[$ranks->status] : ''}}
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
</div>

