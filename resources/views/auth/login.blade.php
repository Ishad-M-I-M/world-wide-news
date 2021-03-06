<x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1 class="text-center">LOGIN</h1>
        <form action="{{route('login')}}" method="post">
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
    <div class="text-center"><a href="/admin" class="text-decoration-none">Admin Login <span class="fs-3">&rarr;</span></a></div>
</x-guest-layout>
