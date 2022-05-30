<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    @isset($article_edit)
        <title>Edit Article</title>
    @else
        <title>New Article</title>
    @endisset
</head>
<body>
    <x-navigation>
        <form method="POST" action="{{ route('logout') }}" >
            @csrf

            <a class="btn btn-secondary me-1" href="{{route('logout')}}"
               onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                Logout
            </a>
        </form>
    </x-navigation>

    <div class="p-2">
        <form method="post" enctype="multipart/form-data" novalidate
        @isset($article_edit)
            action={{url()->current()}}
        @else
            action={{route('article.store')}}
        @endisset
        >
            @csrf
            @isset($article_edit)
                <input hidden name="id" value="{{$article_edit['id']}}">
            @endisset
        <div class="row text-center">
            <div class="p-6 col-2 d-none d-md-inline d-lg-inline d-xxl-inline">
                <x-back-link></x-back-link>
            </div>

            <div class="p-2 col-md-7" >
                <h2>Report Your News</h2>
            </div>

            <div class="p-2 col-md-3" id="publish-btn">
                <span>
                    <button class="btn btn-primary btn-sm" type="button" id="preview"><i class="fa fa-eye p1"></i>Preview</button>
                    @isset($article_edit)
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa-solid fa-floppy-disk p-1"></i>Save</button>
                    @else
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-upload p-1"></i>Publish</button>
                        <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash-can p-1"></i>Discard</button>
                    @endisset
                </span>
            </div>
        </div>
            <div class="accordion d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none" id="accordionArticles">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="articles">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Your Articles
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="articles" data-bs-parent="#accordionArticles">
                        <div class="accordion-body">
                            @if(count($articles) > 0)
                                @foreach($articles as $article)
                                    <x-article.list-view :headline="$article['headline']" :status="$article['status']" :id="$article['id']"></x-article.list-view>
                                @endforeach
                            @else
                                <p>No articles yet</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        <div class="row m-2">
            <div class="col-3 container d-none d-lg-block d-xl-block d-xxl-block" style="border-right:2px solid grey;">
                <h5 class="text-center">Your articles</h5>
                <br>
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <x-article.list-view :headline="$article['headline']" :status="$article['status']" :id="$article['id']"></x-article.list-view>
                    @endforeach
                @else
                    <p>No articles yet</p>
                @endif
            </div>

            <div class="col-9 container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="mb-3">
                        <label for="category" class="form-label">Select a category</label>
                        <select id="category" name="category" class="form-control">
                            @foreach($categories as $category)
                                @isset($article_edit)
                                    @if($article_edit['category'] == $category)
                                        <option value="{{$category}}" selected>{{$category}}</option>
                                    @else
                                        <option value="{{$category}}">{{$category}}</option>
                                    @endif
                                @else
                                    <option value="{{$category}}">{{$category}}</option>
                                @endisset
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="headline">Headline</label>
                        <input class="form-control" type="text" name="headline" id="headline" required placeholder=""
                        @isset($article_edit)
                            value="{{$article_edit['headline']}}"
                        @endisset
                        >
                    </div>
                    <div class="mb-3">

                        <x-form.tinymce label="Description" name="report" id="report">
                            @isset($article_edit)
                                {{$article_edit['report']}}
                            @endisset
                        </x-form.tinymce>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required accept="image/jpeg,image/gif,image/png"
                        @isset($article_edit)
                            disabled
                        @endisset
                        >
                    </div>
            </div>

        </div>
        </form>
    </div>

    <div id="dimmer" class="bg-opacity-75 bg-black d-none" style="position: fixed; top: 0; left: 0; z-index: 100;width: 100vw; height: 100vh">
        <div class="container bg-white rounded-2 mt-3 overflow-auto" style="width: 60vw; height: 90vh;">
            <div  class="text-end fs-2">
                <span id="close-preview" style="cursor: pointer" >&Cross;</span>
                <p class="text-start fs-5" style="margin-top: -2rem;" id="preview-category"></p>
            </div>
            <div class="container overflow-auto mb-3" style="width: 100%; height: 100%">
                <h2 id="preview-headline" class="text-center"></h2>
                <div class="text-center">
                    <img id="preview-image" src="#" alt="image" width="200rem"/>
                </div>
                <div id="preview-report" class="container"></div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("preview").addEventListener('click', ()=>{
            const category = document.getElementById("category").value;
            const headline = document.getElementById("headline").value;
            const report = tinyMCE.activeEditor.getContent();
            document.getElementById("preview-category").innerText = category;
            document.getElementById("preview-headline").innerText = headline;

            if(headline === "" || report === "") {
                alert("Please enter a headline or/and description ");
                return;
            }

            @isset($article_edit)
                document.getElementById("preview-image").src = "{{url('article/image/'.$article_edit['id'])}}"
            @else
                const [image] = document.getElementById("image").files;
                if(image){
                    document.getElementById("preview-image").src = URL.createObjectURL(image);
                }
                else{
                    alert("Please select an image");
                    return;
                }
            @endisset
            document.getElementById("preview-report").innerHTML = report;
            document.getElementById("dimmer").classList.remove("d-none");
        });

        document.getElementById("close-preview").addEventListener('click',()=>{
            document.getElementById("dimmer").classList.add("d-none");
        })
    </script>
</body>
</html>
