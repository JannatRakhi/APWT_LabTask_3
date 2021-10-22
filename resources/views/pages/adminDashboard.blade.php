<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <style>
        body {
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @extends('../layouts.app')
    @section('content')
    <div class="row">
        <div class="col-3" style="background: darkblue;">
            @include('pages.adminSideBar')
        </div>
        <div class="col-9">
            <h1 class="mt-5 text-center">Admin Profile</h1>


            <div class="d-flex justify-content-center align-items-center" style="height: 70vh">
                <div>
                    
                    {{-- <h4>Name: {{ $profileInfo->name }}</h4>
                    <h4>Email: {{ $profileInfo->email }}</h4>
                    <h4>Phone: {{ $profileInfo->phone }}</h4>
                    <h4>Address: {{ $profileInfo->address }}</h4>
                    <a  href={{ "editAdminProfile/".$profileInfo->id }} class="btn btn-danger btn-sm">Edit Profile</a> --}}
                </div>
            </div>

        </div>
        @endsection
</body>

</html>