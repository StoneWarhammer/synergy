<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('air-datepicker.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>
        Synergy site
    </title>
</head>
<body class="h-100">
<nav class="navbar bg-body-tertiary" style="height: 3.5rem;">
    <div class="container-fluid bg-light">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img style="height: 40px;" src="{{ asset('storage/logo.png') }}" alt="logo"> Synergy Site</a>
        <div class="d-flex justify-content-end" id="navbarText">
            @guest()
                <span class="navbar-text">
                    <a href="{{route('login')}}" class="btn btn-outline-secondary">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-secondary">Register</a>
                </span>
            @endguest
            @auth()
            <span class="navbar-text p-0 me-5">
                <div class="dropdown" onclick="profile_dropdown();">
                    <a href="" onclick="event.preventDefault();" class="nav-link dropdown-toggle" role="button"><img src="{{ asset('storage/avatar-' . auth()->id() . '.png') }}" height="32px" width="32px" class="rounded-circle me-1"></a>
                    <ul class="dropdown-menu" id="dropdown-menu" style="left: -3.5rem; top: 2.5rem;">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">Log Out</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </span>
            @endauth
        </div>
    </div>
</nav>
<div class="w-100 d-flex" style="height: calc(100% - 3.5rem)">
    @yield('content')
</div>
<script src="{{asset('air-datepicker.js')}}"></script>
<script>
    new AirDatepicker('#airdatepicker', {
        isMobile: true,
        autoClose: true,
        dateFormat: "yyyy-MM-dd",
        timeFormat: "hh:mm"
    });
    function profile_dropdown()
    {
        if (document.getElementById('dropdown-menu').classList.contains("show")) {
            document.getElementById('dropdown-menu').classList.remove("show");
        } else {
            document.getElementById('dropdown-menu').classList.add("show");
        }
    }
</script>
</body>
</html>
