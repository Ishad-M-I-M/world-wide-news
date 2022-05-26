<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <title>Article</title>

    <style>
        #heading{
            text-align: center;
        }

        p{
            font-size: larger;
        }

        #logo{
            text-align: center;
        }

        #logout-btn{
            align-self: center;
            justify-self: center;
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
            <!-- <a class="btn btn-primary" href="/login">Homme</a> -->
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
                <h1>World Wide News</h1>
            </div>

            <div class="col-2"></div>
        </div>

        <div id="title" class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>What one photo tells us about North Korea's neucler program</h3>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="media">
            <div class="col-2"></div>
            <div class="col-8" style="text-align:center">
                <img src="{{ URL::to('/assets/articlePic.png') }}" alt="photo">
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="description">
            <div class="col-2"></div>
            <div class="col-8">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium vero blanditiis voluptas accusamus voluptates est ducimus cumque officia veritatis dolor laboriosam molestiae asperiores omnis unde, voluptate voluptatum magnam dolores? Ut?</p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

</body>
</html>
