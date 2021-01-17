<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin - Glenmore Natural Life</title>
    <link rel="icon" href="{{ asset('assets/user/img/core-img/gnl.jpeg') }}">

    @include('admin.layout.head')
    @yield('css')
    

</head>

<body id="reportsPage">
    <div class="" id="home">
        @if(Route::has('login'))
            @auth
                @include('admin.layout.navbar')
            @else
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            @endauth
        @endif

        @yield('content')
       
        @if(Route::has('login'))
            @auth
                @include('admin.layout.footer')
            @endauth
        @endif

    </div>

    @include('admin.layout.script')

    @yield('script')
</body>

</html>