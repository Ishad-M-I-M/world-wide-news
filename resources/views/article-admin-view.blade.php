<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <title>Article Approve</title>

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
                <img src="{{ url('article/image/'.$id) }}" alt="photo" width="400rem">
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="description">
            <div class="col-2"></div>
            <div class="col-8">
                <p>
                    {!! $report !!}
                </p>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" id="buttons">
            <div class="col-2"></div>
            <div class="col-8 d-flex justify-content-evenly align-items-start">
                <form method="post" action="{{url()->current()."/Approved"}}">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check-circle fa-xl" style="color:white"></i>   Approve</button>
                </form>
                <form method="post" action="{{url()->current()."/Rejected"}}">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-circle-xmark fa-xl" style="color:white"></i>   Reject</button>
                </form>
                <form method="post" action="{{url()->current()."/Pending"}}">
                    @csrf
                    <button type="submit" class="btn btn-warning" style="color:white"><i class="fa-solid fa-ellipsis fa-xl" style="color:white"></i>   Keep</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

</body>
</html>
