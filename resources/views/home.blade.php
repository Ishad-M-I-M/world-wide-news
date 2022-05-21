<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.includes')
    <title>World Wide News</title>
</head>
<body>
<nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::to('/assets/logo.svg') }}" alt="" width="30" height="24">
            World Wide News
        </a>
        <span>
            <a class="btn btn-primary" href="/login">Login</a>
            <a class="btn btn-secondary" href="/register">Register</a>
        </span>
    </div>
</nav>
</body>
</html>
