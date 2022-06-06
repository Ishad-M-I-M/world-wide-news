<x-guest-layout>
    <h1 class="text-center">Register Individual Account </h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Enter your Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="repeat-password" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repeat Password" required>
        </div>
        <div class="mb-3">
            <label for="subscriptions" class="form-label">Subscriptions (Press cmd or ctrl and select for multiple options)</label>
            <select name="subscriptions" id="subscriptions" class="form-control" multiple required>
                <option value="sport">Sport</option>
                <option value="politics">Politics</option>
                <option value="health">Health</option>
                <option value="weather">Weather</option>
                <option value="entertainment">Entertainment</option>
                <option value="local">Local</option>
                <option value="foreign">Foreign</option>
            </select>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="agree" name="agree" value="true" required>
            <label class="form-check-label" for="agree">I agree terms and conditions</label>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="text-center m-2 mt-5">
            <button type="submit" class="btn btn-warning form-control text-white">Submit</button>
        </div>
    </form>
    <div class="text-center"><a href={{route('register.reporter')}} class="text-decoration-none">Register as a reporter <span class="fs-3">&rarr;</span></a></div>
</x-guest-layout>
