<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.includes')
    <title>Register</title>
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
            <h1 class="text-center">Register Individual Account </h1>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contact" placeholder="Contact Number">
                </div>
                <div class="mb-3">
                    <label for="nic" class="form-label">NIC</label>
                    <input type="text" class="form-control" id="nic" placeholder="NIC">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="repeat-password" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="repeat-password" placeholder="Repeat Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="agree">
                    <label class="form-check-label" for="agree">I agree terms and conditions</label>
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
