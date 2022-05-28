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
        <div class="row" id="heading">
            <div class="p-6 fs-6 col-2">
               <x-back-link/>
            </div>

            <div class="p-2 col-8" >
                <h1>World Wide News</h1>
            </div>

            <div class="col-2"></div>
        </div>

        <div id="title" class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>
                    {{$headline}}
                </h3>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="media">
            <div class="col-2"></div>
            <div class="col-8" style="text-align:center">
                <img src="{{ url('storage/article_images/'.$image) }}" alt="photo">
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="description">
            <div class="col-2"></div>
            <div class="col-8">
                <p>
                    {!! $report !!}}
                </p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

</body>
</html>
