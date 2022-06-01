<div class="container shadow p-3 mb-5 bg-body rounded" style="width: 30rem; height: 25rem;">
    <h4>{{$headline}}</h4>
    <p>{{$reported_at}}</p>
    <div class="text-center">
        <img src="{{url('article/image/'.$id)}}" style="height: 8rem">
    </div>

    <div class="overflow-hidden" style="max-height: 6rem;">
        {!! $report !!}
    </div>
    <a href="/article/{{$id}}">Read more ...</a>

</div>

