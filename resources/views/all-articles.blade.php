@foreach($articlesByCategories as $category => $articles)
    @if(count($articles) > 0)
        <h3 class="ms-2">{{$category}}</h3>
        <hr/>
        <div style="display: flex; flex-direction: row; flex-wrap: wrap">
            @foreach($articles as $article)
                @include('components.article.article-card',$article)
            @endforeach
        </div>
    @endif
@endforeach
