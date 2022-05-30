<div class="container shadow p-3 mb-5 bg-body rounded" style="width: 30rem; height: 20rem;">
    <h3>{{$headline}}</h3>
    <div class="text-center">
        <img src="{{url('article/image/'.$id)}}" style="height: 8rem">
    </div>

    <div class="overflow-hidden" style="height: 5rem;">
        {!! $report !!}
    </div>
    <a href="/article/{{$id}}">Read more ...</a>

</div>

