<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.includes')
    <title>Login</title>
</head>
<body>
<div class="row" style="height: 100vh; width: 100vw;">
    <div class="col-md-6 bg-black d-none d-lg-block d-xl-block ">
        @include('partials.quote')
    </div>
    <div class="col-md-6 container">
        <div class="p-3 fs-5">
            <a href="/" class="text-decoration-none"><span class="fs-2">&laquo; </span><span
                    class="text-warning">Back</span></a>
        </div>
        <div class="p-2">
            <h1 class="text-center">LOGIN</h1>
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="text-center m-2 mt-5">
                    <button type="submit" class="btn btn-warning form-control text-white">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
