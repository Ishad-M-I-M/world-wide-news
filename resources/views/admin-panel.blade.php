<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.bootstrap')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Admin's Panel</title>

    <style>
        td{
            border: #f4f4f4 solid;
        }
    </style>

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


    <div class="row" style="text-align:center; margin: 30px;"><br>
        <h1>Admin's Panel</h1>
    <br></div>
    <div class="row">
        <div class="col-1"></div>

        <div class="col-10" style="background-color:#F2F3F6; border-radius:10px; text-align:center">
            <table class="table table-striped table-hover ">

                <thead>
                    <tr>
                    <th scope="col">Headline</th>
                    <th scope="col">Date</th>
                    <th scope="col">Personnel</th>
                    <th scope="col">Category</th>
                    <th scope="col">Word Count</th>
                    <th scope="col">Image Size (MB)</th>
                    <th scope="col">Reporter's Country</th>
                    <th scope="col"><i class="fa-solid fa-triangle-exclamation fa-xl"></i></th>
                    <th scope="col">Note</th>
                    <th scope="col"><i class="fa-solid fa-arrow-rotate-right fa-xl"></i></th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><a href="#">Ashesh Tournement</a></th>
                    <td>2021-01-06</td>
                    <td>Charles</td>
                    <td>Sports</td>
                    <td>756</td>
                    <td>20</td>
                    <td>England</td>
                    <td></td>
                    <td>Any Note ny Admin</td>
                    <td></td>
                    <td><i class="fa-solid fa-check-circle fa-xl" style="color:green"></i></td>
                    </tr>

                    <tr>
                    <th scope="row"><a href="#">Barack Obama</a></th>
                    <td>2021-01-06</td>
                    <td>Mike</td>
                    <td>Politics</td>
                    <td>800</td>
                    <td>14</td>
                    <td>America</td>
                    <td></td>
                    <td>Any Note ny Admin</td>
                    <td></td>
                    <td><i class="fa-solid fa-ellipsis fa-xl"></i></td>
                    </tr>

                    <tr>
                    <th scope="row"><a href="#">Indian Oil</a></th>
                    <td>2021-01-06</td>
                    <td>Arvinth</td>
                    <td>Science</td>
                    <td>1500</td>
                    <td>13</td>
                    <td>India</td>
                    <td></td>
                    <td>Any Note ny Admin</td>
                    <td></td>
                    <td><i class="fa-solid fa-circle-xmark fa-xl" style="color:red"></i> </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

</body>
</html>