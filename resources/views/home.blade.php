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
    <div class="container-fluid p-2 m-2">
        <a class="navbar-brand" href="/">
            <img src="{{ URL::to('/assets/logo.svg') }}" alt="" width="30" height="24">
            World Wide News
        </a>
        <span>
            <a class="btn btn-primary" href="/login">Login</a>
            <a class="btn btn-secondary" href="/register">Register</a>
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
</body>
</html>
