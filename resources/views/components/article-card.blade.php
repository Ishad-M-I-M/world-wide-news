<div class="container shadow p-3 mb-5 bg-body rounded" style="width: 30rem">
    <h3>{{$headline}}</h3>
    <div class="text-center">
        <img src="{{url('assets/logo.svg')}}">
    </div>
    <p>
        {{$report}}
        <br>
        <a href="/article/{{$id}}">Read more ...</a>
    </p>
</div>

