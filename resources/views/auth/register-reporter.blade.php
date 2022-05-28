<x-guest-layout>
    <h1 class="text-center">Register Individual Account </h1>
    <form action="{{ route('register.reporter') }}" method="post">
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
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="{{old('contact')}}" required>
        </div>
        <div class="mb-3">
            <label for="nic" class="form-label">NIC</label>
            <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" value="{{old('contact')}}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="repeat-password" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repeat Password" required>
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
</x-guest-layout>
