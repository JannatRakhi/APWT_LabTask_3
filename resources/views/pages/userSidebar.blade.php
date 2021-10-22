<div class="px-2 py-5" style="min-height: 88vh">
    <div class="text-center">
        <a class="btn btn-danger my-2 w-75 fw-bold" href="{{ route ('dashboard') }}"></i>User: {{ session('name') }}</a>
    </div>
    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" href="{{ route ('logout') }}"></i>Logout</a>
    </div>
</div>