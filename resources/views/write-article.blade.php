<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <title>New Article</title>
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
        <form method="post" enctype="multipart/form-data" novalidate action={{route('article.store')}}>
            @csrf
        <div class="row text-center">
            <div class="p-6 col-2 d-none d-md-inline d-lg-inline d-xxl-inline">
                <x-back-link/>
            </div>

            <div class="p-2 col-md-7" >
                <h2>Report Your News</h2>
            </div>

            <div class="p-2 col-md-3" id="publish-btn">
                <span>
                    <button class="btn btn-primary btn-sm" type="button" id="preview"><i class="fa fa-eye p1"></i>Preview</button>
                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-upload p-1"></i>Publish</button>
                    <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-trash-can p-1"></i>Discard</button>
                </span>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-3 container" style="border-right:2px solid grey;">
                <h5 class="text-center">Your articles</h5>
                <br>
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <x-article.list-view :headline="$article['headline']" :status="$article['status']"></x-article.list-view>
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
                                <option value="{{$category}}">{{$category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="headline">Headline</label>
                        <input class="form-control" type="text" name="headline" id="headline" required placeholder="">
                    </div>
                    <div class="mb-3">

                        <x-form.tinymce label="Description" name="report" id="report"></x-form.tinymce>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required accept="image/jpeg,image/gif,image/png">
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
            const [image] = document.getElementById("image").files;
            const report = tinyMCE.activeEditor.getContent();
            document.getElementById("preview-category").innerText = category;
            document.getElementById("preview-headline").innerText = headline;
            if(image){
                document.getElementById("preview-image").src = URL.createObjectURL(image);
            }
            document.getElementById("preview-report").innerHTML = report;
            document.getElementById("dimmer").classList.remove("d-none");
        });

        document.getElementById("close-preview").addEventListener('click',()=>{
            document.getElementById("dimmer").classList.add("d-none");
        })
    </script>
</body>
</html>
