<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <title>Write..</title>

    <style>
        #heading{
            text-align: center;
        }

        p{
            font-size: larger;
        }

        #logo, #publish-btn{
            text-align: center;
        }

        #logout-btn{
            align-self: center;
            justify-self: center;
            
        }

        .article-list{
            text-decoration:none;
            color: black;
            
        }
        .article-list .row{
            border-top: 1px solid grey;
        }
        .article-list .col-2 {
            justify-self:center ; 
            align-self:center;
        }

    </style>
</head>
<body>
    <!-- <div class="row" id="top-bar">
        <div class="col-1" id="logo">
            <img src="{{ URL::to('/assets/logo.svg') }}" alt="logo">
        </div>
        <div class="col-10"></div>
        <div class="col-1" id="logout-btn">
            <button>home</button>
            <button>logout</button>
        </div>
        <hr>
    </div> -->

    <nav class="navbar bg-light">
    <div class="container-fluid p-2 m-2">
        <a class="navbar-brand" href="/">
            <img src="{{ URL::to('/assets/logo.svg') }}" alt="" width="30" height="24">
            World Wide News
        </a>
        <span>
            <a class="btn btn-primary" href="/login">Home</a>
            <a class="btn btn-secondary" href="/register">Logout</a>
        </span>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">World Wide News</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{\Illuminate\Support\Facades\Session::get('success')}}
                </div>
            </div>
        <div>
    @endif

    </nav>

    <div class="row" style="height: 100vh; width: 100vw;" id="container">
        <div class="row" id="heading">
            <div class="p-6 fs-6 col-2">
                <a href="#" class="text-decoration-none"><span class="fs-4">&laquo; </span><span class="text-danger">Back</span></a>
            </div>

            <div class="p-2 col-8" >
                <h1>Report Your News</h1>
            </div>

            <div class="col-2" id="publish-btn">
                <span>
                    <a class="btn btn-primary" href="#">Preview</a>
                    <a class="btn btn-success" href="#">Publish</a>
                    <a class="btn btn-danger" href="#">Discard</a>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-3" style=" border-right:2px solid grey;">
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
