@props(['headline'=>'', 'status'=>'', 'editUrl'=>''])
<div style="border: solid black 0.02rem" class="p-2">
    <h4>{{$headline}}</h4>
    <p class="text-secondary">{{$status}} <a href="{{$editUrl}}" class="ms-5"><i class="fa-solid fa-pen"></i></a></p>
</div>
