<nav class="navbar bg-light">
    <div class="container-fluid p-2 m-2">
        <a class="navbar-brand" href="/">
            <img src="{{ url('/assets/logo.svg') }}" alt="" width="30" height="24">
            <span class="d-none d-lg-inline d-md-inline d-xl-inline d-xxl-inline">World Wide News</span>
        </a>
        <span style="display: flex">
            {{$slot}}
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
