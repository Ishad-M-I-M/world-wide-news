<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <title>Write..</title>
</head>
<body>
    <x-navigation>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="btn btn-secondary me-1" href="{{route('logout')}}"
               onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                Logout
            </a>
        </form>
    </x-navigation>

    <div class="row" style="height: 100vh; width: 100vw;" id="container">
        <div class="row text-center">
            <div class="p-6 col-2 d-none d-md-inline d-lg-inline d-xxl-inline">
                <x-back-link/>
            </div>

            <div class="p-2 col-md-8" >
                <h2>Report Your News</h2>
            </div>

            <div class="p-2 col-md-2" id="publish-btn">
                <span>
                    <a class="btn btn-primary btn-sm" href="#">Preview</a>
                    <a class="btn btn-success btn-sm" href="#">Publish</a>
                    <a class="btn btn-danger btn-sm" href="#">Discard</a>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-3" style="border-right:2px solid grey;">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <span>List</span>
                        <br>

                        <a href="#" class="article-list" id="entry1">
                        <div class="row" >
                            <div class="col-2" >
                                <img src="{{ URL::to('/assets/logo.svg') }}" alt="profilePic" style="max-width:100% ;">
                            </div>
                            <div class="col-10">
                                <h3>Ashesh tournament</h3>
                                <span class="text-success">Published</span>
                            </div>
                        </div>
                        </a>

                        <a href="#" class="article-list" id="entry2">
                        <div class="row">
                            <div class="col-2" >
                                <img src="{{ URL::to('/assets/logo.svg') }}" alt="profilePic" style="max-width:100% ;">
                            </div>
                            <div class="col-10">
                                <h3>Barack Obama</h3>
                                <span class="text-secondary">Draft</span>
                            </div>
                        </div>
                        </a>

                        <a href="#" class="article-list" id="entry3">
                        <div class="row">
                            <div class="col-2" >
                                <img src="{{ URL::to('/assets/logo.svg') }}" alt="profilePic" style="max-width:100% ;">
                            </div>
                            <div class="col-10">
                                <h3>Indian Oil</h3>
                                <span class="text-danger">Pending</span>
                            </div>
                        </div>
                        </a>

                    </div>
                </div>

            </div>

            <div class="col-9">
            <div id="title" class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <h3>Category</h3>
                    <div class="row fs-4">
                        <select name="" id="">
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                            <option value="">Category 3</option>
                            <option value="">Category 4</option>
                            <option value="">Category 5</option>
                            <option value="">Category 6</option>
                        </select>
                    </div>

                    <div><br></div>

                    <h3>Title</h3>
                    <div class="row fs-3">
                        <input type="text" name="title" id="title" placeholder="Lorem Ipsum dolor">
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div><br></div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <h3>Description</h3>
                    <div class="row fs-5">
                        <textarea name="description" id="description" cols="30" rows="10">
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam recusandae nulla modi in ut temporibus deserunt sit alias voluptas, eaque non itaque dolore reprehenderit! Quisquam ipsam quo dolores veniam eligendi.
                        </textarea>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-9">
                    <h3>Media</h3>
                    <div class="row">
                        <input type="file" name="media" id="media">
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            </div>
        </div>
    </div>

</body>
</html>
