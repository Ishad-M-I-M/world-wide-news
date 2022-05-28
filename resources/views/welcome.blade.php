<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>World Wide News</title>

    @include('partials.bootstrap')
</head>
<body>
<x-navigation>
    @if (Route::has('login'))
        @auth
            @if($role == 'reporter')
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary me-1">Dashboard</a>
            @elseif($role == 'admin')
                <a href="{{ url('/admin-panel') }}" class="btn btn-warning me-1">Admin Panel</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="btn btn-secondary me-1" href="{{route('logout')}}"
                   onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                    Logout
                </a>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary me-1">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-secondary me-1">Register</a>
            @endif
        @endauth
    @endif
</x-navigation>
<h1 class="text-center">World Wide News</h1>
@if($role == 'reporter')
    <div class="text-end me-5">
        <a class="btn btn-success" href="/write-article">Report</a>
    </div>
@endif
<hr>
<div class="row ps-5 pe-5" >
    <div class="col-md-9 container">
        @include('all-articles')
    </div>
    <div class="col-md-3 d-none d-md-block d-lg-block d-xl-block text-center container" style="border: rgb(240,240,240) dashed">
        <h4>Categories</h4>
        <hr>
        @foreach($articlesByCategories as $category=>$articles)
            @if(count($articles) > 0)
                <a class="d-block text-decoration-none fs-5" href={{"#".$category}}>{{$category}}</a>
            @endif
        @endforeach
    </div>
</div>

</body>
</html>
