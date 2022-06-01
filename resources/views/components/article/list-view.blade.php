@props(['headline'=>'', 'status'=>'', 'id'=>''])
<div style="border: solid rgb(200,200,200) 0.02rem" class="row">
    <div class="col-10">
        <h5>{{$headline}}</h5>
        <p class="text-secondary">{{$status}} </p>
    </div>
    <div class="col-2 pt-3">
        <a href="{{"/article/".$id}}" data-bs-toggle="tooltip" title="Preview"><i class="fa-solid fa-eye"></i></a>
        @if($status != "Approved")
        <a href="{{"/article/edit/".$id}}" data-bs-toggle="tooltip" title="Edit"><i class="fa-solid fa-pen"></i></a>
        @endif
    </div>
</div>
